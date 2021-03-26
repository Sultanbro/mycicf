import React, {useState} from 'react';
import axios from 'axios'

interface AjaxProps {
    url: string;
    method: "GET" | 'POST';
    q: { [key: string]: any };
    children: (res: any) => React.Element;
}

export function Ajax<T>({url, method, q, children}: AjaxProps | any) {
    let [response, setResponse] = useState();

    if (!response) {
        axios.request<T>({
            method,
            url,
        }).then((res) => {
            setResponse(res);
        });

        return <div>Loading...</div>
    }

    return <div>
            {children(response)}
        </div>
}
