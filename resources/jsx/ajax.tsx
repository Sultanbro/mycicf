import React, {useState} from 'react';
import axios, {AxiosResponse} from 'axios'

interface AjaxProps {
    url: string;
    method: "GET" | 'POST';
    params: { [key: string]: any };
    children: (res: any) => React.ReactNode;
}

interface AjaxRefetchArgs {
    method: "GET" | 'POST';
    url: string;
    params: any;
}

export function Ajax<T>({url, method, params, children}: AjaxProps | any) {
    let [response, setResponse] = useState<AxiosResponse<T>>();
    let [error, setError] = useState<Error>();

    function refetch({method, url, params}: AjaxRefetchArgs) {
        axios.request<T>({
            method,
            url,
            params
        }).then((res) => {
            setResponse(res);
        }).catch((err) => {
            setError(err);
        });
    }

    if (!response) {
        refetch({method, url, params});

        if (error) {
            return <div>Error: {error.message}</div>
        }

        return <div>
            <div className="preloader" />
        </div>
    }

    return <div>
        {children({response, refetch})}
    </div>
}

Ajax.GET = <T extends any>(props: AjaxProps | any) => <Ajax method="GET" {...props} />;
Ajax.POST = <T extends any>(props: AjaxProps | any) => <Ajax method="POST" {...props} />;
Ajax.PUT = <T extends any>(props: AjaxProps | any) => <Ajax method="PUT" {...props} />;
