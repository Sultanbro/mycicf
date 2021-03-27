import React, {useState} from 'react';
import {Avatar, Col, Input, Row} from 'antd';
import {Ajax, PostEntity} from '../../ajax';
import {SendOutlined} from '@ant-design/icons';

interface CommentFormProps {
    post: PostEntity;
}

export function CommentForm({post}: CommentFormProps) {
    let [commentText, setCommentText] = useState('');
    return <div>
        <Row>
            <Col md={2}>
                <Avatar size="small" src="/images/avatar.png" />
            </Col>
            <Col md={20}>
                <Input.TextArea placeholder="Напишите комментарий..."
                                value={commentText}
                                onChange={(e) => {
                                    setCommentText(e.target.value);
                                }} />
            </Col>
            <Col md={2}>
                <Ajax.Button type="text"
                             url="/news/comments/addComment"
                             method="POST"
                             disabled={!commentText}
                             icon={<SendOutlined />}
                             data={{isn: 5565, commentText, "postId": post.postId}} onSuccess={() => {
                    setCommentText('');
                }}>
                </Ajax.Button>
            </Col>
        </Row>
    </div>
}
