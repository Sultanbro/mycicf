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
    let [error, setError] = useState();

    function refetch({method, url, q}) {
        axios.request<T>({
            method,
            url,
        }).then((res) => {
            setResponse(res);
        }).catch((err) => {
            setError(err);
        });
    }

    if (!response) {
        refetch({method, url, q});

        if (error) {
            return <div>Error: {error.message}</div>
        }

        return <div>Loading...</div>
    }

    return <div>
            {children({response, refetch})}
        </div>
}
