import {PostEntity} from '../../ajax';
import {Avatar, Button, Col, Divider, Row} from 'antd';
import React from 'react';
import {PostLike} from './post-like';
import {CommentOutlined} from '@ant-design/icons';
import {PostComment} from './post-comment';
import {CommentForm} from './comment-form';

export interface PostProps {
    post: PostEntity;
}

export function Post({post}: PostProps) {
    return <div className="p-2 post-entity" style={{
        borderRadius: '20px',
        backgroundColor: '#8080802e',
        marginBottom: '20px',
    }}>
        <Row>
            <Col>
                <Avatar size={64} src={`/storage/images/employee/${post.isn}.png`} />
            </Col>
            <Col>
                <Row>
                    <Col>
                        {post.fullname}
                    </Col>
                </Row>
                <Row>
                    <Col>
                        {post.date}
                    </Col>
                </Row>
            </Col>
        </Row>
        <Row>
            {post.postText}
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
        <Row>
            <Col>
                <PostLike post={post} />
            </Col>
            <Col>
                <Divider type="vertical" />
            </Col>
            <Col>
                <Button type="text" disabled>
                    <CommentOutlined /> {post.comments.length} комментарии
                </Button>
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
        <Row>
            <Col md={22} offset={2}>
                {post.comments.map((comment: any, i: number) => <PostComment comment={comment} key={i} />)}
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                <CommentForm post={post} />
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
    </div>
}
