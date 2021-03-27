import React, {useState} from 'react';
import {Avatar, Col, Input, Row} from 'antd';
import {Ajax, AjaxButtonProps, PostEntity} from '../../ajax';
import {SendOutlined} from '@ant-design/icons';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';

interface CommentFormProps {
    post: PostEntity;
    onCommendAdded: (entity: CommentAjaxResponse) => void;
}

interface CommentAjaxRequest {
    isn: any;
    postId: any;
    commentText: string;
}

interface CommentAjaxResponse {
    commentId: number;
    commentText: string;
    date: string;
    fullname: string;
    postId: number;
    userISN: number;
}

export function CommentForm({post, onCommendAdded}: CommentFormProps) {
    let useLocalStorage = createUseLocalStorage(`post:${post.postId}:`);
    let [commentText, setCommentText] = useLocalStorage('commentText', '');
    let AjaxButton = ({...props}: AjaxButtonProps<CommentAjaxRequest, CommentAjaxResponse>) =>
        <Ajax.Button<CommentAjaxRequest, CommentAjaxResponse> {...props} />

    return <div>
        <Row>
            <Col md={2}>
                <Avatar size="small" src="/images/avatar.png" />
            </Col>
            <Col md={20}>
                <Input.TextArea placeholder="Напишите комментарий..."
                                value={commentText}
                                autoSize
                                onChange={(e) => {
                                    setCommentText(e.target.value);
                                }} />
            </Col>
            <Col md={2}>
                <AjaxButton type="text"
                            url="/news/comments/addComment"
                            method="POST"
                            disabled={!commentText}
                            icon={<SendOutlined />}
                            data={{isn: 5565, commentText, postId: post.postId}}
                            onSuccess={(res) => {
                                setCommentText('');
                                onCommendAdded(res.data);
                            }}>
                </AjaxButton>
            </Col>
        </Row>
    </div>
}
