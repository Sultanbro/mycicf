import {Button, Col, Divider, Form, Input, Row} from 'antd';
import React from 'react';
import {CloseOutlined, PlusOutlined} from '@ant-design/icons';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {createArrayUseLocalStorage} from '../../hooks/useStateArrayWithLocalStorage';

let useLocalStorage = createUseLocalStorage('poll');
let useArrayLocalStorage = createArrayUseLocalStorage('poll');

interface PollFormProps {
    onUpdatePoll?(data: { question: string, answers: string[] }): void;
}

export function PollForm({onUpdatePoll}: PollFormProps) {
    let [form] = Form.useForm();
    let [options, setOptions, pushOption, deleteByIndex, updateByIndex] = useArrayLocalStorage('answers', ['', '']);
    let [pollQuestion, setPollQuestion] = useLocalStorage('question', '');

    return <Row>
        <Col md={24}>
            <Row>
                <Col md={22}>
                </Col>
                <Col md={2}>
                    <Button icon={<CloseOutlined />}
                            onClick={() => {
                                setPollQuestion('');
                                setOptions(['', '']);
                            }} />
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <Form form={form}
                          layout="vertical"
                          initialValues={{
                              question: pollQuestion,
                              answers: options
                          }}
                          onInput={(e) => {
                              if (!onUpdatePoll) {
                                  return;
                              }
                              onUpdatePoll({
                                  question: pollQuestion,
                                  answers: options
                              });
                          }}>
                        <Divider />
                        <Form.Item label="Тема опроса"
                                   required tooltip="Тема опроса" name="question">
                            <Input placeholder="Тема опроса"
                                   defaultValue={pollQuestion}
                                   value={pollQuestion}
                                   onChange={(e) => {
                                       setPollQuestion(e.target.value);
                                   }} />
                        </Form.Item>
                        <Form.Item label="Варианты ответа"
                                   name="answers">
                            {options.map((option, i) =>
                                <Row key={i}>
                                    <Col md={21}>
                                        <Input value={option}
                                               placeholder={`Ответ ${i + 1}`}
                                               onChange={(e) => {
                                                   updateByIndex(i, e.target.value);
                                               }} />
                                    </Col>
                                    <Col md={2} offset={1}>
                                        <Button icon={<CloseOutlined />}
                                                type="dashed"
                                                size="small"
                                                onClick={() => {
                                                    if (options.length <= 2) {
                                                        return;
                                                    }
                                                    deleteByIndex(i);
                                                }} />
                                    </Col>
                                </Row>)}
                        </Form.Item>
                        <Divider type="horizontal" style={{margin: '12px 0'}} />
                        <Button
                            type="dashed"
                            icon={<PlusOutlined />}
                            onClick={() => {
                                pushOption('');
                            }}>
                            Добавить вариант
                        </Button>
                    </Form>
                </Col>
            </Row>
        </Col>
    </Row>;
}
