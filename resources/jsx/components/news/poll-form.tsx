import {Button, Col, Divider, Form, Input, Row} from 'antd';
import React from 'react';
import {useStateArray} from '../../hooks/useStateArray';
import {CloseOutlined} from '@ant-design/icons';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {createArrayUseLocalStorage} from '../../hooks/useStateArrayWithLocalStorage';

let useLocalStorage = createUseLocalStorage('poll');
let useArrayLocalStorage = createArrayUseLocalStorage('poll');

export function PollForm() {
    let [form] = Form.useForm();
    let [options, , pushOption, deleteByIndex, updateByIndex] = useArrayLocalStorage('answers', ['', '']);
    let [pollQuestion, setPollQuestion] = useLocalStorage('question', '');

    return <Row>
        <Col md={24}>
            <Form form={form} layout="vertical" initialValues={{
                question: pollQuestion,
                answers: options
            }}>
                <Divider />
                <Form.Item required tooltip="This is a required field" name="question">
                    <Input placeholder="Тема опроса"
                           defaultValue={pollQuestion}
                           value={pollQuestion}
                           onChange={(e) => {
                               setPollQuestion(e.target.value);
                           }} />
                </Form.Item>
                <Form.Item label="Варианты ответа"
                           name="answers[]">
                    {options.map((option, i) =>
                        <Row key={i}>
                            <Col md={22}>
                                <Input value={option}
                                       placeholder={`Ответ ${i + 1}`}
                                       onChange={(e) => {
                                           updateByIndex(i, e.target.value)
                                       }} />
                            </Col>
                            <Col md={2}>
                                <Button icon={<CloseOutlined />} type="text" onClick={() => {
                                    if (options.length <= 2) {
                                        return;
                                    }
                                    deleteByIndex(i);
                                }} />
                            </Col>
                        </Row>)}
                </Form.Item>
                <Divider type="horizontal" style={{margin: '12px 0'}} />
                <Button onClick={() => {
                    pushOption('');
                }}>
                    Добавить вариант
                </Button>
            </Form>
        </Col>
    </Row>;
}
