import React from 'react';
import 'antd/dist/antd.css';
import {AddPostForm} from './components/news/add-post-form';
import {Posts} from './components/news/posts';
import {Col, Divider, Row} from 'antd';
import {message} from 'antd';
import {ReadMore} from './components/read-more';

export function MyCiCNews() {
    return <Row style={{background: '#e9ebee', padding: '20px'}}>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <AddPostForm onAddPost={() => {
                        message.info('Пост отправлен', 2);
                    }} />
                </Col>
            </Row>
            <Divider type="horizontal" />
            <Row>
                <Col md={24}>
                    <Posts />
                </Col>
            </Row>
        </Col>
    </Row>
}
