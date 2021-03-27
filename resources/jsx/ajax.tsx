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
}

export function Ajax<T>({url, method, params, data, children, headers}: AjaxProps<any> | any) {
    let [response, setResponse] = useState<AxiosResponse<T>>();
    let [error, setError] = useState<Error>();

    function refetch({method, url, params, data}: AjaxRefetchArgs) {
        axios.request<T>({
            method,
            url,
            params,
            headers,
            data
        }).then((res) => {
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
            response, refetch: ({params, data}: any) => {
                refetch({method, url, params, data});
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
        {({response, refetch}: any) => {
            return children({response, refetch});
        }}
    </Ajax.POST>;
}

Ajax.GET = <T extends any>(props: AjaxProps<any> | any) => <Ajax method="GET" {...props} />;
Ajax.POST = <T extends any>(props: AjaxProps<any> | any) => <Ajax method="POST" {...props} />;
Ajax.PUT = <T extends any>(props: AjaxProps<any> | any) => <Ajax method="PUT" {...props} />;
// ...
