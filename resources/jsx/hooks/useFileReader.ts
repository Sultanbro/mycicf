import { useEffect, useState } from 'react'

const noop = () => {}

interface UseFileReaderOptions {
    method?: keyof FileReader;
    onload?: any;
}

// https://github.com/jcblw/react-use-file-reader
export const useFileReader = (options: UseFileReaderOptions = {}) => {
    const { method = 'readAsDataURL', onload: onloadHook = noop } = options
    const [file, addFile] = useState(null)
    const [error, setError] = useState(null)
    const [result, setResult] = useState<any[]>([])
    const [loading, setLoading] = useState(false)

    useEffect(() => {
        if (!file) return;

        const reader = new FileReader()
        reader.onloadstart = () => {
            setLoading(true)
        }
        reader.onloadend = () => {
            setLoading(false)
        }
        reader.onload = e => {
            if (!e.target) {
                return;
            }
            setResult((prev) => {
                prev.push(e.target.result);
                return prev;
            })
            onloadHook(e.target.result)
        }
        reader.onerror = (err: any) => {
            setError(err);
        }
        try {
            reader[method](file)
        } catch (e) {
            setError(e)
        }
    }, [file])

    return [result, addFile]
}
