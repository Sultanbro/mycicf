import {Button, Divider, Form, Input, Row} from 'antd';
import React, {useState} from 'react';

export function PollForm() {
    let [form] = Form.useForm();
    let [options, setOptions] = useState(['', '']);
    return <Row>
        <Form
            form={form}
    layout="vertical">
    <Form.Item label="Тема опроса" required tooltip="This is a required field">
    <Input placeholder="input placeholder" />
        </Form.Item>
        <Form.Item label="Варианты ответа" required tooltip="This is a required field">
        {options.map((option, i) => <Input key={i} value={option} placeholder={`Ответ ${i + 1}`} />)}
    </Form.Item>
    <Divider type="horizontal" style={{margin: '12px 0'}} />
    <Button onClick={() => {
        debugger;
        options.push('');
        setOptions(options);
    }}>Добавить вариант</Button>
    </Form>
    </Row>;
}
