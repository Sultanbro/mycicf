import React, {useState} from 'react';
import {Alert, Comment, Button, Col, Divider, Input, Row, Tag, Tooltip} from 'antd';
import {EnterOutlined} from '@ant-design/icons';
import {CommentMenu} from './comment-menu';
import {UserAvatar} from '../UserAvatar';
import {PostCommentEntity} from '../ajax/types';
import {UserName} from '../../UserName';
import {If} from '../if';
import {AjaxButton} from '../ajax';
import './post-comment.css';
import {CommentForm} from "./comment-form";

export interface PostCommentProps {
    postId: number;
    comment: PostCommentEntity;
    onCommentDeleted: (commentId: number) => void;
    onReply?: (comment: PostCommentEntity) => void;
}

export interface CommentEditFormProps {
    comment: PostCommentEntity;
    onCancel: () => void;
    onSaved: (text: string) => void;
}

export function CommentEditForm({comment, onCancel, onSaved}: CommentEditFormProps) {
    let [text, setText] = useState(comment.commentText);
    return <div>
        <Input.TextArea
            value={text}
            onChange={(e) => {
                setText(e.target.value);
            }}
        />

        <AjaxButton<{ commentId: number, commentText: string }, { edited: boolean, success: boolean }>
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
        </AjaxButton>

        <Button onClick={() => {
            onCancel();
        }}>Отмена</Button>
    </div>;
}

export function PostComment({
                                comment,
                                onCommentDeleted,
                                onReply = () => {
                                },
                                postId,
                            }: PostCommentProps) {
    let [showReplyForm, setShowReplyForm] = useState(false);
    let actions = [
        <Button key={0}
                type="link"
                onClick={() => {
                    onReply(comment);
                    setShowReplyForm(true);
                }}>
            Ответить
        </Button>
    ];

    if (comment.isMine) {
        actions.push(<AjaxButton<{ commentId: number }, { success: true }>
            url="/news/comments/deleteComment"
            method="POST"
            block
            data={{commentId: comment.commentId}}
            type="link"
            confirm
            confirmText="Вы уверены?"
            onSuccess={(res) => {
                if (res.data.success) {
                    onCommentDeleted(comment.commentId);
                }
            }}
        >Удалить</AjaxButton>);
    }

    return <div>
        <Comment
            actions={actions}
            author={<UserName isn={comment.userISN} username={comment.fullname}/>}
            avatar={
                <UserAvatar
                    isn={comment.userISN}
                />
            }
            content={
                <p data-id={comment.commentId}>
                    {comment.commentText}
                </p>
            }
        />

        <If condition={showReplyForm}>
            <CommentForm postId={postId} onCommendAdded={() => {}} text={comment.fullname + ', '} />
        </If>
    </div>;
}

export function PostComment2({comment, onCommentDeleted, onReply}: PostCommentProps) {
    let [showEditForm, setShowEditForm] = useState(false);
    let [text, setText] = useState(comment.commentText);
    return <div>
        <Row>
            <Col md={2}>
                <UserAvatar size="default" isn={comment.userISN}/>
            </Col>
            <Col md={20}>
                <Row>
                    <Col md={12}>
                        <UserName isn={comment.userISN} username={comment.fullname}/>
                    </Col>
                    <Col md={2} offset={2}>
                        <If condition={comment.isMine}>
                            <CommentMenu comment={comment}
                                         onCommentDeleted={(commentId) => {
                                             onCommentDeleted(commentId);
                                         }}
                                         onShowEditForm={() => {
                                             setShowEditForm(true);
                                         }}
                            />
                        </If>
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
                                <CommentEditForm
                                    comment={comment}
                                    onCancel={() => {
                                        setShowEditForm(false);
                                    }}
                                    onSaved={(text) => {
                                        setText(text);
                                        setShowEditForm(false);
                                    }}
                                /> :
                                <Alert message={text} type="info"/>
                        }

                    </Col>
                </Row>
                <Row>
                    <Col md={8}>
                        <Tooltip title="Не работает">
                            <Button type="link" icon={<EnterOutlined/>} onClick={() => {
                                if (onReply) {
                                    onReply(comment);
                                }
                            }}>
                                Ответить
                            </Button>
                        </Tooltip>
                    </Col>
                </Row>
            </Col>
        </Row>
        <Row>
            <Divider type="horizontal" style={{margin: '10px 0'}}/>
        </Row>
    </div>;
}
