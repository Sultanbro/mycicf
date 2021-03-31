import React, {useState} from 'react';
import {PostComment} from './post-comment';
import {PostCommentEntity} from '../ajax/types';
import {Button, Col, Row} from 'antd';

export interface PostCommentListProps {
    comments: PostCommentEntity[];
    onReply(comment: PostCommentEntity): void;
    onCommentDeleted(commentId: number): void;
}

export function PostCommentList({comments, onReply, onCommentDeleted}: PostCommentListProps) {
    let [limited, setLimited] = useState(true);

    let limitedComments = comments;
    if (limited) {
        limitedComments = comments.slice(0, 3);
    }

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
                    setLimited(false);
                }}>
                    Показать больше
                </Button> : null}
            </Row>
        </Col>

    </Row>

}
