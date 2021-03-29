import React from 'react';
import 'antd/dist/antd.css';
import {AddPostForm} from './components/news/add-post-form';
import {Posts} from './components/news/posts';
import {Col, Divider, Row} from 'antd';
import {notification} from 'antd';
import {CheckOutlined} from '@ant-design/icons';
import {Ajax} from "./ajax";

export function MyCiCNews() {
    let ref = React.createRef();
    return <Row style={{background: '#e9ebee', padding: '20px'}}>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Posts />

                    {/*<Ajax.Button url="/sandbox/error" method="GET" data={{}} onSuccess={() => {}} icon={<CheckOutlined />}>
                        Error
                    </Ajax.Button>*/}
                </Col>
            </Row>
        </Col>
    </Row>
}
