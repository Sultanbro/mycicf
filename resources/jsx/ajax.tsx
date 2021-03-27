import React, {useState} from 'react';
import axios, {AxiosRequestConfig, AxiosResponse} from 'axios'

interface AjaxProps<T> extends AxiosRequestConfig {
    children: (res: AxiosResponse<T>, refetch: T) => React.ReactNode;
}

interface AjaxRefetchArgs {
    method: "GET" | 'POST';
    url: string;
    params: any;
    data: any;
    previousData?: any;
    callback?: (previousData: any, newData: any) => any;
}

export function Ajax<T>({url, method, params, data, children, headers}: AjaxProps<any> | any) {
    let [response, setResponse] = useState<AxiosResponse<T>>();
    let [error, setError] = useState<Error>();

    function refetch({method, url, params, data, previousData, callback}: AjaxRefetchArgs) {
        axios.request<T>({
            method,
            url,
            params,
            headers,
            data
        }).then((res) => {
            if (!callback) {
                callback = (newData: any, previousData: any) => newData;
            }
            res.data = callback(res.data, previousData);
            setResponse(res);
        }).catch((err) => {
            setError(err);
        });
    }

    if (!response) {
        refetch({method, url, params, data});

        if (error) {
            return <div>Error: {error.message}</div>
        }

        return <div>
            Loading...
        </div>
    }

    return <div>
        {children({
            response,
            data: response.data,
            refetch: ({params, data, previousData, callback}: any) => {
                refetch({method, url, params, data, previousData, callback});
            }
        })}
    </div>
}

interface PostsAjaxProps {
    lastIndex: number | null;
    children: any;
}

export function PostsAjax({lastIndex = null, children}: PostsAjaxProps) {
    return <Ajax.POST url="/news/getPosts" q={{lastIndex}}>
        {({response, refetch, callback}: any) => {
            return children({response, data: response.data, refetch, callback});
        }}
    </Ajax.POST>;
}

Ajax.GET = <T extends any>(props: AjaxProps<any> | any) => <Ajax method="GET" {...props} />;
Ajax.POST = <T extends any>(props: AjaxProps<any> | any) => <Ajax method="POST" {...props} />;
Ajax.PUT = <T extends any>(props: AjaxProps<any> | any) => <Ajax method="PUT" {...props} />;
// ...
