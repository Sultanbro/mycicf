import React, {useState} from 'react';
import {CheckOutlined, UserOutlined} from '@ant-design/icons';
import {Ajax} from './ajax/ajax';
import {Button, Col, Form, Input, Modal, notification, Row} from 'antd';
import {authUserName} from '../authUserName';

export interface SuggestionBtnProps {

}

export function SuggestionBtn({}: SuggestionBtnProps) {
    const [isModalVisible, setIsModalVisible] = useState(false);
    return <Row>
        <Col md={12}>
            <Button
                icon={<CheckOutlined />}
                onClick={() => {
                    setIsModalVisible(true);
                }}>
                Предложить улучшение
            </Button>
            <Modal title="Предложить улучшение"
                   visible={isModalVisible}
                   footer={null}
                   onCancel={() => {
                       setIsModalVisible(false);
                   }}>
                <Form>
                    <Form.Item
                        name="username"
                        rules={[{required: true, message: 'Please input your Username!'}]}
                    >
                        <Input prefix={<UserOutlined className="site-form-item-icon" />}
                               defaultValue={authUserName()}
                               placeholder="Ваше имя" />
                    </Form.Item>
                    <Form.Item
                        name="username"
                        rules={[{required: true, message: 'Please input your Username!'}]}
                    >
                        <Input.TextArea placeholder="Обращение" rows={15} />
                    </Form.Item>
                </Form>

                <Ajax.Button
                    url="/news/addSuggestion"
                    method="POST"
                    data={{}}
                    block
                    onSuccess={() => {
                        notification.info({
                            message: 'Спасибо за обращение!'
                        });
                    }}>
                    Отправить
                </Ajax.Button>
            </Modal>
        </Col>
    </Row>;
}
