import React, {useState} from 'react';
import {Alert, Avatar, Button, Col, Divider, Input, Row, Tag, Tooltip, Typography} from 'antd';
import {EnterOutlined} from '@ant-design/icons';
import {CommentMenu} from './comment-menu';
import {UserAvatar} from '../UserAvatar';
import {PostCommentEntity} from '../ajax/types';
import {Ajax} from '../ajax/ajax';
import {FileButton} from './add-post-form';
import {UserName} from '../../UserName';

export interface PostCommentProps {
    comment: PostCommentEntity;
    onCommentDeleted: (commentId: number) => void;
    onReply: (comment: PostCommentEntity) => void;
}

export interface CommentEditFormProps {
    comment: PostCommentEntity;
    onCancel: () => void;
    onSaved: (text: string) => void;
}

export function CommentEditForm({comment, onCancel, onSaved}: CommentEditFormProps) {
    let [text, setText] = useState(comment.commentText);
    return <div>
        <Input.TextArea value={text} onChange={(e) => {
            setText(e.target.value)
        }} />

        <Ajax.Button<{ commentId: number, commentText: string }, { edited: boolean, success: boolean }>
            url="/news/comments/editComment"
            method="POST"
            type="default"
            data={{commentId: comment.commentId, commentText: comment.commentText}}
            onSuccess={(res) => {
                if (res.data.edited) {
                    onSaved(comment.commentText);
                }
            }}>
            Сохранить
        </Ajax.Button>

        <Button onClick={() => {
            onCancel();
        }}>Отмена</Button>
    </div>
}

export function PostComment({comment, onCommentDeleted, onReply}: PostCommentProps) {
    let [showEditForm, setShowEditForm] = useState(false);
    let [text, setText] = useState(comment.commentText);
    return <div>
        <Row>
            <Col md={2}>
                <UserAvatar size="default" isn={comment.userISN} />
            </Col>
            <Col md={20}>
                <Row>
                    <Col md={8}>
                        <UserName isn={comment.userISN} username={comment.fullname} />
                    </Col>
                    <Col md={2} offset={6}>
                        {
                            comment.isMine ?
                                <CommentMenu comment={comment}
                                             onCommentDeleted={(commentId) => {
                                                 onCommentDeleted(commentId);
                                             }}
                                             onShowEditForm={(commentId) => {
                                                 setShowEditForm(true);
                                             }} />
                                : null}

                    </Col>
                    <Col md={8}>
                        <Tag color="green" style={{
                            margin: '4px 0px'
                        }}>{comment.date}</Tag>
                    </Col>
                </Row>
                <Row>
                    <Col md={24}>
                        {
                            showEditForm ?
                                <CommentEditForm comment={comment}
                                                 onCancel={() => {
                                                     setShowEditForm(false);
                                                 }}
                                                 onSaved={(text) => {
                                                     setText(text);
                                                     setShowEditForm(false);
                                                 }} /> :
                                <Alert message={text} type="info" />
                        }

                    </Col>
                </Row>
                <Row>
                    <Col md={8}>
                        <Tooltip title="Не работает">
                            <Button type="text" icon={<EnterOutlined />} onClick={() => {
                                onReply(comment);
                            }}>
                                Ответить
                            </Button>
                        </Tooltip>
                    </Col>
                </Row>
            </Col>
        </Row>
        <Row>
            <Divider type="horizontal" style={{margin: '10px 0'}} />
        </Row>
    </div>;
}
