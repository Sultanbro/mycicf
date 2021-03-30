import React from 'react';
import 'antd/dist/antd.css';
import {Posts} from './components/news/posts';
import {Col, Row} from 'antd';
import { SuggestionBtn } from './components/suggestion-btn';

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
                <Col offset={18} md={6}>
                    <SuggestionBtn />
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <Posts />

                    {/*<Birthdays />*/}
                </Col>
            </Row>
        </Col>
    </Row>
}
