import React, {useState} from 'react';
import axios, {AxiosRequestConfig, AxiosResponse} from 'axios'

interface AjaxProps<T> extends AxiosRequestConfig {
    children: (res: any, refetch: T) => React.ReactNode;
}

interface AjaxRefetchArgs {
    method: "GET" | 'POST';
    url: string;
    params: any;
}

export function Ajax<T>({url, method, params, children, headers}: AjaxProps<any> | any) {
    let [response, setResponse] = useState<AxiosResponse<T>>();
    let [error, setError] = useState<Error>();
    let [loading, setLoading] = useState(false);

    function refetch({method, url, params}: AjaxRefetchArgs) {
        setLoading(true);
        axios.request<T>({
            method,
            url,
            params,
            headers
        }).then((res) => {
            setResponse(res);
            setLoading(false);
        }).catch((err) => {
            setError(err);
            setLoading(false);
        });
    }

    if (!response) {
        refetch({method, url, params});

        if (error) {
            return <div>Error: {error.message}</div>
        }

        return <div>
            <div className="preloader"/>
        </div>
    }

    return <div>
        {children({response, refetch})}
    </div>
}

interface PostsAjaxProps {
    lastIndex: number | null;
    children: any;
}

export function PostsAjax({ lastIndex = null, children }: PostsAjaxProps) {
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
