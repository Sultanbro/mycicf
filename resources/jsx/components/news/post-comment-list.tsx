import React, {useState} from 'react';
import {PostComment} from './post-comment';
import {PostCommentEntity, PostEntity} from '../ajax/types';
import {Button, Col, Divider, Modal, Row, Tooltip} from 'antd';
import {If} from '../if';
import {CommentOutlined} from '@ant-design/icons';

export interface PostCommentListProps {
    comments: PostCommentEntity[];
    onReply(comment: PostCommentEntity): void;
    onCommentDeleted(commentId: number): void;
    commentsLimit?: number;
    expanded?: boolean;
}

export interface PostCommentsProps {
    post: PostEntity;
    expanded?: boolean;
}

export function PostComments({post, expanded}: PostCommentsProps) {
    let [, setNewCommentText] = useState('');
    let [showCommentsModal, setShowCommentModal] = useState(false);
    let [comments, setComments] = useState<PostCommentEntity[]>(post.comments);
    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Divider type="horizontal" style={{margin: '12px 0'}}>
                        <Tooltip title="Показать всю ветку комментариев">
                            <Button type="link" onClick={() => {
                                setShowCommentModal(true);
                            }}>
                                <CommentOutlined /> Комментарии ({comments.length || 0})
                            </Button>
                        </Tooltip>
                    </Divider>
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <PostCommentList comments={comments}
                                     commentsLimit={expanded ? 1000 : 3}
                                     onReply={(comment) => {
                                         setNewCommentText(`${comment.fullname}, `);
                                     }}
                                     onCommentDeleted={(commentId) => {
                                         setComments((old) => {
                                             return old.filter((comment) => comment.commentId !== commentId);
                                         });
                                     }} />
                </Col>
            </Row>
        </Col>

        <Modal visible={showCommentsModal}
               footer={null}
               onCancel={() => {
                   setShowCommentModal(false);
               }}
               style={{width: 1000}}>
            <Divider type="horizontal" style={{margin: '12px 0'}}>
                Комментарии ({comments.length || 0})
            </Divider>
            <PostCommentList comments={comments}
                             commentsLimit={1000}
                             expanded={expanded}
                             onReply={(comment) => {
                                 setNewCommentText(`${comment.fullname}, `);
                             }}
                             onCommentDeleted={(commentId) => {
                                 setComments((old) => {
                                     return old.filter((comment) => comment.commentId !== commentId);
                                 });
                             }} />

        </Modal>
    </Row>;
}

export function PostCommentList({comments, onReply, onCommentDeleted, commentsLimit = 3}: PostCommentListProps) {
    let [limit, setLimit] = useState(commentsLimit);
    let [showReplyForm, setShowReplyForm] = useState(false);
    let limitedComments = comments.slice(0, limit);
    let hasMoreComments = limitedComments.length < comments.length;

    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    {limitedComments.map((comment: PostCommentEntity, i: number) =>
                        <PostComment comment={comment}
                                     key={i}
                                     onCommentDeleted={(commentId) => {
                                         onCommentDeleted(commentId);
                                     }}
                                     onReply={(comment) => {
                                         setShowReplyForm(true);
                                     }}
                        />)}
                </Col>
            </Row>
            <Row>
                <Col offset={2} md={20}>
                    <If condition={hasMoreComments}>
                        <Button
                            type="link"
                            block
                            onClick={() => {
                                setLimit(limit + 5);
                            }}>
                            Ещё &nbsp; <b>{comments.length - limit}</b> &nbsp; комментариев
                        </Button>
                    </If>
                </Col>
            </Row>
            <Divider type="horizontal" style={{margin: '10px 0'}} />
        </Col>
    </Row>;
}
