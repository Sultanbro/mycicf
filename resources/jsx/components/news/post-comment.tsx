import {Alert, Avatar, Col, Divider, Row} from 'antd';
import {CommentMenu} from './comment-menu';
import React from 'react';
import {PostCommentEntity} from '../../ajax';

export interface PostCommentProps {
    comment: PostCommentEntity;
}

export function PostComment({comment}: PostCommentProps) {
    return <div>
        <Row>
            <Col md={2}>
                <Avatar size="small" src={`/storage/images/employee/${comment.userISN}.png`} />
            </Col>
            <Col md={20}>
                <Row>
                    <Col md={2}>
                        {comment.fullname}
                    </Col>
                    <Col md={2} offset={20}>
                        <CommentMenu comment={comment} />
                    </Col>
                </Row>
                <Row>
                    <Col md={24}>
                        <Alert message={comment.commentText} type="info" />
                    </Col>
                </Row>
                <Row>
                    <Col md={6} offset={18}>
                        {comment.date}
                    </Col>
                </Row>
            </Col>
        </Row>
        <Row>
            <Divider type="horizontal" style={{margin: '12px 0'}} />
        </Row>
    </div>;
}
