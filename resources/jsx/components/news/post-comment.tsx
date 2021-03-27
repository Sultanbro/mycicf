import {Alert, Avatar, Button, Col, Divider, Input, Row} from 'antd';
import {CommentMenu} from './comment-menu';
import React, {useState} from 'react';
import {Ajax, PostCommentEntity} from '../../ajax';

export interface PostCommentProps {
    comment: PostCommentEntity;
    onCommentDeleted: (commentId: number) => void;
}

export interface CommentEditFormProps {
    comment: PostCommentEntity;
    onCancel: () => void;
    onSaved: () => void;
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
            data={{commentId: comment.commentId, commentText: comment.commentText}}
            onSuccess={(res) => {
                if (res.data.edited) {
                    onSaved();
                }
            }}>
            Сохранить
        </Ajax.Button>

        <Button onClick={() => {
            onCancel();
        }}>Отмена</Button>
    </div>
}

export function PostComment({comment, onCommentDeleted}: PostCommentProps) {
    let [showEditForm, setShowEditForm] = useState(false);
    return <div>
        <Row>
            <Col md={2}>
                <Avatar size="small" src={`/storage/images/employee/${comment.userISN}.png`} />
            </Col>
            <Col md={20}>
                <Row>
                    <Col md={8}>
                        {comment.fullname}
                    </Col>
                    <Col md={2} offset={14}>
                        {comment.isMine ? <CommentMenu comment={comment}
                                                       onCommentDeleted={(commentId) => {
                                                           onCommentDeleted(commentId);
                                                       }}
                                                       onShowEditForm={(commentId) => {
                                                           setShowEditForm(true);
                                                       }} /> : null}

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
                                                 onSaved={() => {
                                                 }} /> :
                                <Alert message={comment.commentText} type="info" />
                        }

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
