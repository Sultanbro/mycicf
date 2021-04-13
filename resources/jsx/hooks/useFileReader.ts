import { useEffect, useState } from "react";

const noop = () => {};

interface UseFileReaderOptions {
  method?: keyof FileReader;
  onload?: any;
  autoRead?: boolean;
}

export interface FileEntry {
  file: File;
  dataUrl?: string | ArrayBuffer | null;
}

// https://github.com/jcblw/react-use-file-reader
export function useFileReader(
  options: UseFileReaderOptions = {}
): [FileEntry[], any] {
  const {
    method = "readAsDataURL",
    onload: onloadHook = noop,
    autoRead = false,
  } = options;
  const [file, addFile] = useState<File | null>(null);
  const [, setError] = useState(null);
  const [result, setResult] = useState<FileEntry[]>([]);
  const [, setLoading] = useState(false);

  useEffect(() => {
    if (!file) return;

    const reader = new FileReader();
    reader.onloadstart = () => {
      setLoading(true);
    };
    reader.onloadend = () => {
      setLoading(false);
    };
    reader.onload = (e) => {
      if (!e.target) {
        return;
      }
      setResult((prev) => {
        if (!e.target) {
          return prev;
        }
        prev.push({
          file,
          dataUrl: e.target.result,
        });
        return prev;
      });
      onloadHook(e.target.result);
    };
    reader.onerror = (err: any) => {
      setError(err);
    };
    try {
      if (autoRead) {
        (reader as any)[method](file);
      } else {
        setResult((prev) => {
          prev.push({
            file,
          });
          return prev;
        });
      }
    } catch (e) {
      setError(e);
    }
  }, [file]);

  return [
    result,
    (...files: File[]) => {
      for (let file of files) {
        addFile(file);
      }
    },
  ];
}
