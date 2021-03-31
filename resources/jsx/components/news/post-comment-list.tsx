import React, {useState} from 'react';
import {PostComment} from './post-comment';
import {PostCommentEntity} from '../ajax/types';
import {Button, Col, Row} from 'antd';

export interface PostCommentListProps {
    comments: PostCommentEntity[];
    onReply(comment: PostCommentEntity): void;
    onCommentDeleted(commentId: number): void;
    commentsLimit?: number;
}

export function PostCommentList({comments, onReply, onCommentDeleted, commentsLimit = 3}: PostCommentListProps) {
    let [limit, setLimited] = useState(commentsLimit);

    let limitedComments = comments.slice(0, limit);

    let hasMoreComments = limitedComments.length < comments.length;

    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    {limitedComments.map((comment: any, i: number) =>
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
                {hasMoreComments ? <Button type="link" onClick={() => {
                    setLimited(limit + 5);
                }}>
                    Показать больше
                </Button> : null}
            </Row>
        </Col>

    </Row>

}
