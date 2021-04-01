import React, {useState} from 'react';
import axios, {AxiosResponse, Method} from 'axios';
import {Button, Popconfirm, Tooltip} from 'antd';
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

export function AjaxButton<TReq, TRes>({
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
                           }: AjaxButtonProps<TReq, TRes>) {
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

    let errorBtn = (error: any) => <Tooltip title={error.message}>
        <Button type="link"
                style={{
                    color: 'red'
                }}
                loading={loading}
                block={block}
                icon={!icon ? null : <CloseOutlined/>}
                onClick={onClick}>
            Повторить попытку
        </Button>
    </Tooltip>;
    return !error ? btn : errorBtn(error)
}
