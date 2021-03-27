import React, {useState} from 'react';
import axios, {AxiosRequestConfig, AxiosResponse, Method} from 'axios';
import {Button} from 'antd';
import {ButtonProps} from 'antd/lib/button/button';

interface AjaxButtonProps<TReq, TRes> extends ButtonProps {
    url: string;
    data: TReq;
    onSuccess: (res: AxiosResponse<TRes>) => any;
    children: any;
    method: Method;
}

export interface PostCommentEntity {
    date: string;
    commentText: string;
    fullname: string;
    userISN: string;
}

export interface PostEntity {
    postId: number;
    likes: number;
    isLiked: boolean;
    comments: PostCommentEntity[];
    date: string;
    fullname: string;
    isn: string;
    postText: string;
}

interface AjaxPropsChildrenArgs<T> {
    response: AxiosResponse<T>;
    refetch: any;
    callback?: any;
}

interface AjaxProps<T> extends AxiosRequestConfig {
    children: ({response, refetch}: AjaxPropsChildrenArgs<T>) => React.ReactNode;
}

interface PostsAjaxProps extends AjaxProps<PostEntity[]> {
    lastIndex?: number;
}

interface AjaxRefetchArgs {
    method?: Method;
    url?: string;
    params: any;
    data: any;
    previousData?: any;
    callback?: (previousData: any, newData: any) => any;
}

export function Ajax<T>({url, method, params, data, children, headers}: AjaxProps<T>) {
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
                callback = (newData: any) => newData;
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
            refetch: ({params, data, previousData, callback}: any) => {
                refetch({method, url, params, data, previousData, callback});
            }
        })}
    </div>
}

export function PostsAjax({lastIndex, children}: PostsAjaxProps) {
    return <Ajax.POST<PostEntity> url="/news/getPosts" q={{lastIndex}}>
        {({response, refetch, callback}: any) => {
            return children({response, callback, refetch});
        }}
    </Ajax.POST>;
}

Ajax.GET = <T extends any>(props: AjaxProps<any> | any) => <Ajax<T> method="GET" {...props} />;
Ajax.POST = <T extends any>(props: AjaxProps<any> | any) => <Ajax<T> method="POST" {...props} />;
Ajax.PUT = <T extends any>(props: AjaxProps<any> | any) => <Ajax<T> method="PUT" {...props} />;
// ...

Ajax.Button = <TReq extends any, TRes extends any> ({url, data, onSuccess, children, method}: AjaxButtonProps<TReq, TRes>) => {
    return <Button type="text" onClick={() => {
        axios.request({
            url,
            method,
            data
        }).then((res) => {
            onSuccess(res);
        });
    }}>
        {children}
    </Button>
}
