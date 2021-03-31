import {Button, Popconfirm, Spin, Tooltip} from 'antd';
import React, {useState} from 'react';
import axios, {AxiosRequestConfig, AxiosResponse, Method} from 'axios';
import {AjaxCacheSettings} from './types';
import {CloseOutlined} from '@ant-design/icons';
import {ButtonProps} from 'antd/lib/button/button';

export interface AjaxButtonProps<TReq, TRes> extends ButtonProps {
    url: string;
    data: TReq;
    onSuccess: (res: AxiosResponse<TRes>) => any;
    children?: any;
    method: Method;
    confirm?: boolean;
    confirmText?: string;
}

export interface AjaxPropsChildrenArgs<TRes> {
    response: AxiosResponse<TRes>;
    refetch: any;
    callback?: any;
}

export interface AjaxProps<TRes> extends AxiosRequestConfig {
    loading?: any;
    children: ({response, refetch}: AjaxPropsChildrenArgs<TRes>) => React.ReactNode;

    cache?: AjaxCacheSettings | boolean;
}

export interface AjaxRefetchArgs {
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

    let cacheSettings: AjaxCacheSettings = {
        enabled: false,
        lifetime: 10 * 1000,
        storage: 'localstorage'
    };

    if (cache) {
        if (typeof cache === 'boolean') {
            cacheSettings = {
                enabled: cache,
                lifetime: 10 * 1000,
                storage: 'localstorage'
            };
        }

        if (cacheSettings.enabled) {
            let cacheKey = 'cache__' + JSON.stringify({method, url, params, data});
            let item = localStorage.getItem(cacheKey);
            if (item) {
                let result = JSON.parse(item);

                if (result.expires <= Date.now()) {
                    localStorage.removeItem(cacheKey);
                } else {
                    response = result.data;
                }
            }
        }
    }

    if (!response) {
        refetch({method, url, params, data});

        if (error) {
            return <div>Error: {error.message}</div>
        }

        return loading;
    }

    if (cacheSettings.enabled) {
        let cacheKey = 'cache__' + JSON.stringify({method, url, params, data});
        let result = JSON.stringify({
            expires: Date.now() + cacheSettings.lifetime,
            data: response
        });
        localStorage.setItem(cacheKey, result);
    }

    let inputData = {
        method,
        url,
        params,
        headers,
        data
    };

    return <div>
        {children({
            response,
            refetch: ({params= inputData.params, data = inputData.data, previousData, callback}: any = {}) => {
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
        btn = <Popconfirm title={confirmText} onConfirm={onClick} okText="Да" cancelText="Нет">
            <Button type={loading ? 'ghost' : type}
                    loading={loading}
                    block={block}
                    disabled={disabled}
                    icon={icon}>
                {children}
            </Button>
        </Popconfirm>
    } else {
        btn = <Button type={loading ? 'ghost' : type}
                      loading={loading}
                      block={block}
                      disabled={disabled}
                      icon={icon}
                      onClick={onClick}>
            {children}
        </Button>
    }

    return !error ? btn :
        <Tooltip title={error.message}>
            <Button type="link"
                    style={{
                        color: 'red'
                    }}
                    loading={loading}
                    block={block}
                    icon={!icon ? null : <CloseOutlined />}
                    onClick={onClick}>
                Повторить попытку
            </Button>
        </Tooltip>
}
//
