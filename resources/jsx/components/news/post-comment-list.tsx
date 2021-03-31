import React, {useState} from 'react';
import {DownOutlined} from '@ant-design/icons';
import {PostComment} from './post-comment';
import {PostCommentEntity} from '../ajax/types';
import {Button, Col, Divider, Row} from 'antd';

export interface PostCommentListProps {
    comments: PostCommentEntity[];
    onReply(comment: PostCommentEntity): void;
    onCommentDeleted(commentId: number): void;
    commentsLimit?: number;
}

export function PostCommentList({comments, onReply, onCommentDeleted, commentsLimit = 3}: PostCommentListProps) {
    let [limit, setLimit] = useState(commentsLimit);
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
                {hasMoreComments ? <Button
                    type="dashed"
                    block
                    onClick={() => {
                        setLimit(limit + 5);
                    }}>
                    Показать ещё &nbsp; <b>{comments.length - limit}</b> &nbsp; комментариев
                </Button> : null}
            </Row>
            <Divider type="horizontal" style={{margin: '10px 0'}} />
        </Col>
    </Row>
}
