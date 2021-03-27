import {Ajax, PostEntity} from '../../ajax';
import {Button, Col, Divider, Input, Row} from 'antd';
import React, {useState} from 'react';
import {PostLike} from './post-like';
import {CommentOutlined, EditOutlined, EditFilled, CloseOutlined} from '@ant-design/icons';
import {PostComment} from './post-comment';
import {CommentForm} from './comment-form';
import {UserAvatar} from '../UserAvatar';

export interface PostProps {
    post: PostEntity;
    onDeleted: (post: PostEntity) => void;
}

export interface EditPostFormProps {
    post: PostEntity;
    onCancel: () => void;
}

export function EditPostForm({post, onCancel}: EditPostFormProps) {
    let [postText, setPostText] = useState(post.postText);
    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Input.TextArea value={postText}
                                    onChange={(e) => {
                                        setPostText(e.target.value);
                                    }}
                    />
                </Col>
            </Row>
            <Row>
                <Col offset={16}>
                    <Ajax.Button type="default"
                                 url="/news/editPost"
                                 data={{}}
                                 method="POST"
                                 onSuccess={() => {

                                 }}>
                        Отправить
                    </Ajax.Button>
                </Col>
                <Col>
                    <Button onClick={() => {
                        onCancel();
                    }}>
                        Отмена
                    </Button>
                </Col>
            </Row>
        </Col>
    </Row>
}

export function Post({post, onDeleted}: PostProps) {
    let [editing, setEditing] = useState(false);
    let [comments, setComments] = useState(post.comments);

    return <div className="p-2 post-entity" style={{
        borderRadius: '20px',
        backgroundColor: '#8080802e',
        marginBottom: '20px',
    }}>
        <Row>
            <Col md={4}>
                <UserAvatar isn={post.isn} />
            </Col>
            <Col md={16}>
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
            <Col md={4}>
                <Button type="text"
                        icon={editing ? <EditFilled /> : <EditOutlined />}
                        onClick={() => {
                            setEditing(!editing);
                        }}
                />
                <Button type="text" icon={<CloseOutlined />} onClick={() => {
                    onDeleted(post);
                }} />
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                {(() => {
                    if (editing) {
                        return <EditPostForm post={post} onCancel={() => {
                            setEditing(false);
                        }} />;
                    }

                    return <Row>
                        <Col>
                            {post.postText}
                        </Col>
                    </Row>
                })()}
            </Col>
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
                <span style={{
                    height: '32px',
                    padding: '4px 15px',
                    lineHeight: 1.5715,
                    display: 'block'
                }}>
                    <CommentOutlined /> {comments.length} комментарии
                </span>
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
        <Row>
            <Col md={22} offset={2}>
                {comments.map((comment: any, i: number) =>
                    <PostComment comment={comment} key={i}
                                 onCommentDeleted={(commentId) => {
                                     setComments((old) => {
                                         return old.filter((comment) => comment.commentId !== commentId);
                                     });
                                 }} />)}
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                <CommentForm post={post}
                             onCommendAdded={(res) => {
                                 setComments((old) => [...old, res]);
                             }} />
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
    </div>
}
