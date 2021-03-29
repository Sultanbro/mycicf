import React, {useState} from 'react';
import axios, {AxiosRequestConfig, AxiosResponse, Method} from 'axios';
import {Button, Popconfirm, Spin, Tooltip} from 'antd';
import {ButtonProps} from 'antd/lib/button/button';
import {CloseOutlined} from '@ant-design/icons';

export interface AjaxButtonProps<TReq, TRes> extends ButtonProps {
    url: string;
    data: TReq;
    onSuccess: (res: AxiosResponse<TRes>) => any;
    children?: any;
    method: Method;
    confirm?: boolean;
    confirmText?: string;
}

export interface PostCommentEntity {
    date: string;
    commentId: number;
    commentText: string;
    fullname: string;
    userISN: any;
    isMine: boolean;
}

export interface PostPollAnswer {
    answer_title: string;
    answer_votes: number;
    answer_id: number;
}

export interface PostPoll {
    question_id: any;
    question_title: any;
    total_votes: any;
    answers: PostPollAnswer[]
}

export interface PostEntity {
    image: string[];
    post_poll: PostPoll;
    isVoted: boolean;
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

export interface AjaxCacheSettings {
    enabled: boolean;
    lifetime: number;
    storage?: 'localstorage' | string;
}

export interface AjaxProps<TRes> extends AxiosRequestConfig {
    loading?: any;
    children: ({response, refetch}: AjaxPropsChildrenArgs<TRes>) => React.ReactNode;

    cache?: AjaxCacheSettings;
}

interface AjaxRefetchArgs {
    method?: Method;
    url?: string;
    params: any;
    data: any;
    previousData?: any;
    callback?: (previousData: any, newData: any) => any;
}

export function Ajax<T>({url, method, params, data, children, headers, cache, loading = <Spin />}: AjaxProps<T>) {
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

    if (cache) {
        let cacheKey = 'cache__' + JSON.stringify({method, url, params, data});
        debugger;
    }

    if (!response) {
        refetch({method, url, params, data});

        if (error) {
            return <div>Error: {error.message}</div>
        }

        return loading;
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
                               type = 'text',
                               confirm,
                               confirmText
                           }: AjaxButtonProps<TReq, TRes>) => {
    let [loading, setLoading] = useState(false);
    let [error, setError] = useState<any>(null);

    let onClick = () => {
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
            setError(err);
        });
    };
    let btn;

    if (confirm) {
        btn = <Popconfirm title={confirmText} onConfirm={onClick}>
            <Button type={loading ? 'ghost' : type}
                    loading={loading}
                    block={block}
                    disabled={disabled}
                    icon={icon}>
                {children}
            </Button>
        </Popconfirm>
    } else {
        btn = <Popconfirm title={confirmText}>
            <Button type={loading ? 'ghost' : type}
                    loading={loading}
                    block={block}
                    disabled={disabled}
                    icon={icon}
                    onClick={onClick}>
                {children}
            </Button>
        </Popconfirm>
    }

    return !error ? btn :
        <Tooltip title={error.message}>
            <Button type="link"
                    style={{
                        color: 'red'
                    }}
                    loading={loading}
                    icon={!icon ? null : <CloseOutlined />}
                    onClick={onClick}>
                Retry
            </Button>
        </Tooltip>
}
//
