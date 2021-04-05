import React, {useState} from "react";
import {Form, Input, message} from "antd";
import {UserOutlined, LockOutlined} from "@ant-design/icons";
import {AjaxButton} from "./components/ajax";

const layout = {
    labelCol: {span: 8},
    wrapperCol: {span: 16},
};
const tailLayout = {
    wrapperCol: {offset: 8, span: 16},
};

interface FormData {
    username: string;
    password: string;
}

interface LoginFormResponse {
    success: boolean;
    error?: any;
}

export function LoginPage() {
    let [formData, setFormData] = useState<FormData>({username: '', password: ''});

    const onFinishFailed = (errorInfo: any) => {
        console.log('Failed:', errorInfo);
    };
    // @ts-ignore
    return <Form
        {...layout}
        name="basic"
        initialValues={{remember: true}}
        onValuesChange={(values) => {
            setFormData({...formData, ...values});
        }}
        onFinishFailed={onFinishFailed}
    >
        <Form.Item
            label="Username"
            name="username"
            rules={[{required: true, message: 'Please input your username!'}]}
        >
            <Input prefix={<UserOutlined/>}/>
        </Form.Item>

        <Form.Item
            label="Password"
            name="password"
            rules={[{required: true, message: 'Please input your password!'}]}
        >
            <Input.Password prefix={<LockOutlined/>}/>
        </Form.Item>

        <Form.Item {...tailLayout}>
            <AjaxButton<FormData, LoginFormResponse>
                url="/login"
                method="POST"
                data={formData}
                type="primary"
                htmlType="submit"
                block
                onSuccess={(res) => {
                    if (res.data.success) {
                        message.success('Ok');
                    }
                }}>
                Войти
            </AjaxButton>
        </Form.Item>
    </Form>;
}
