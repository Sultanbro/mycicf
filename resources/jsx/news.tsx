import React from 'react';
import 'antd/dist/antd.css';
import {AddPostForm} from './components/news/add-post-form';
import {Posts} from './components/news/posts';
import {Col, Divider, Row} from 'antd';
import {notification} from 'antd';
import {CheckOutlined} from '@ant-design/icons';

export function MyCiCNews() {
    let ref = React.createRef();
    return <Row style={{background: '#e9ebee', padding: '20px'}}>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <AddPostForm onAddPost={() => {
                        notification.info({
                            message: 'Пост успешно отправлен',
                            description: '',
                            icon: <CheckOutlined />
                        });
                        console.log(ref);
                    }} />
                </Col>
            </Row>
            <Divider type="horizontal" />
            <Row>
                <Col md={24}>
                    <Posts ref={ref} />
                </Col>
            </Row>
        </Col>
    </Row>
}
