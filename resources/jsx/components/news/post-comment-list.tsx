import React, {useState} from 'react';
import {PostComment} from './post-comment';
import {PostCommentEntity} from '../ajax/types';
import {Button, Col, Divider, Row} from 'antd';
import {If} from '../if';

export interface PostCommentListProps {
    comments: PostCommentEntity[];
    onReply(comment: PostCommentEntity): void;
    onCommentDeleted(commentId: number): void;
    commentsLimit?: number;
    expanded?: boolean;
}

export function PostCommentList({comments, onReply, onCommentDeleted, commentsLimit = 3, expanded = false}: PostCommentListProps) {
    let [limit, setLimit] = useState(commentsLimit);
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
                                         onReply(comment);
                                     }}
                        />)}
                </Col>
            </Row>
            <Row>
                <Col offset={2} md={20}>
                    <If condition={hasMoreComments}>
                        <Button
                            type="dashed"
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
    </Row>
}
