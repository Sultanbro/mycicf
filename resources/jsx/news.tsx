import React from 'react';
import 'antd/dist/antd.css';
import {AddPostForm} from './components/news/add-post-form';
import {Posts} from './components/news/posts';
import {Col, Divider, Row} from 'antd';
import {notification} from 'antd';
import {CheckOutlined} from '@ant-design/icons';
import {Ajax} from "./ajax";
import {Birthdays} from './components/birthdays/birthdays';

export interface MyCiCNewsProps {
}

export function MyCiCNews({}: MyCiCNewsProps) {
    // debugger;
    // (window as any).Echo.private(`post`)
    //     .listen('NewPost', (e: any) => {
    //         debugger;
    //     });

    return <Row style={{background: '#e9ebee', padding: '20px'}}>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Posts />

                    {/*<Birthdays />*/}
                </Col>
            </Row>
        </Col>
    </Row>
}
