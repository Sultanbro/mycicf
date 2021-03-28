import {Button, Divider, Form, Input, Row} from 'antd';
import React, {useState} from 'react';

export function PollForm() {
    let [form] = Form.useForm();
    let [options, setOptions] = useState(['', '']);

    return <Row>
        <Form form={form} layout="vertical">
            <Divider />
            <Form.Item required tooltip="This is a required field">
                <Input placeholder="Тема опроса" />
            </Form.Item>
            <Form.Item label="Варианты ответа">
                {options.map((option, i) =>
                    <Input key={i} value={option} placeholder={`Ответ ${i + 1}`} />)}
            </Form.Item>
            <Divider type="horizontal" style={{margin: '12px 0'}} />
            <Button onClick={() => {
                setOptions((old) => [...old, '']);
            }}>
                Добавить вариант
            </Button>
        </Form>
    </Row>;
}
