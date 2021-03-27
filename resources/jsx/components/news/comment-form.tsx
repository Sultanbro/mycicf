import React, {useState} from 'react';
import {Avatar, Button, Col, Input, Row} from 'antd';
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
            <Col md={18}>
                <Input.TextArea placeholder="Напишите комментарий..."
                                value={commentText}
                                rows={2}
                                onChange={(e) => {
                                    setCommentText(e.target.value);
                                }} />
            </Col>
            <Col md={2}>
                <Button type="text">
                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z" />
                </svg>
            </Button>
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
