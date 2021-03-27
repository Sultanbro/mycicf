import React, {useState} from 'react';
import axios, {AxiosRequestConfig, AxiosResponse, Method} from 'axios';
import {Button} from 'antd';
import {ButtonProps} from 'antd/lib/button/button';

export interface AjaxButtonProps<TReq, TRes> extends ButtonProps {
    url: string;
    data: TReq;
    onSuccess: (res: AxiosResponse<TRes>) => any;
    children?: any;
    method: Method;
}

export interface PostCommentEntity {
    date: string;
    commentId: number;
    commentText: string;
    fullname: string;
    userISN: any;
    isMine: boolean;
}

export interface PostEntity {
    postId: number;
    likes: number;
    isLiked: boolean;
    isMine: boolean;
    edited: boolean;
    comments: PostCommentEntity[];
    date: string;
    fullname: string;
    isn: string;
    postText: string;
}

interface AjaxPropsChildrenArgs<TRes> {
    response: AxiosResponse<TRes>;
    refetch: any;
    callback?: any;
}

export interface AjaxProps<TRes> extends AxiosRequestConfig {
    children: ({response, refetch}: AjaxPropsChildrenArgs<TRes>) => React.ReactNode;
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

Ajax.GET = <TRes extends any>(props: AjaxProps<TRes>) => <Ajax<TRes> method="GET" {...props} />;
Ajax.POST = <TRes extends any>(props: AjaxProps<TRes>) => <Ajax<TRes> method="POST" {...props} />;
Ajax.PUT = <TRes extends any>(props: AjaxProps<TRes>) => <Ajax<TRes> method="PUT" {...props} />;
// ...

Ajax.Button = <TReq, TRes>({
                               url,
                               data,
                               onSuccess,
                               children,
                               method,
                               icon,
                               disabled = false,
                               block = false,
                               type = 'text'
                           }: AjaxButtonProps<TReq, TRes>) => {
    let [loading, setLoading] = useState(false);
    return <Button type={loading ? 'ghost' : type}
                   loading={loading}
                   block={block}
                   disabled={disabled}
                   icon={icon}
                   onClick={() => {
                       setLoading(true);
                       axios.request({
                           url,
                           method,
                           data
                       }).then((res) => {
                           onSuccess(res);
                           setLoading(false);
                       }).catch((err) => {
                           setLoading(false);
                       });
                   }}>
        {children}
    </Button>
}
//
