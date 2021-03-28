import {Ajax, AjaxButtonProps, PostEntity} from '../../ajax';
import {Button, Card, Carousel, Col, Divider, Image, Input, Row, Tag, Typography} from 'antd';
import React, {useState} from 'react';
import {PostLike} from './post-like';
import {CommentOutlined, EditOutlined, EditFilled, CloseOutlined} from '@ant-design/icons';
import {PostComment} from './post-comment';
import {CommentForm} from './comment-form';
import {UserAvatar} from '../UserAvatar';
import {PostPoll} from './post-poll';
import {ReadMore} from '../read-more';

export interface PostProps {
    post: PostEntity;
    onDeleted: (post: PostEntity) => void;
}

export interface EditPostFormProps {
    post: PostEntity;
    onCancel: () => void;
    onSaved: (post: PostEntity) => void;
}

export function EditPostForm({post, onCancel, onSaved}: EditPostFormProps) {
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
                    <Ajax.Button<{ postId: number, postText: string }, { edited: boolean, success: boolean }>
                        type="default"
                        url="/news/my/editPost"
                        data={{postId: post.postId, postText: postText}}
                        method="POST"
                        onSuccess={(res) => {
                            post.postText = postText;
                            if (res.data.edited) {
                                onSaved(post);
                            }
                        }}>
                        Отправить
                    </Ajax.Button>
                </Col>
                <Col>
                    <Divider type="vertical" />
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

interface PostImagesProps {
    post: PostEntity;
}

function PostImages({post}: PostImagesProps) {
    let images = post.image || [];
    return <Carousel>
        {images.map((image, index) => {
            return <Row justify="center" align="middle">
                <Col md={12}>
                    <Image src={image} key={index} />
                </Col>
            </Row>
        })}
    </Carousel>
}

export function Post({post, onDeleted}: PostProps) {
    let [editing, setEditing] = useState(false);
    let [newCommentText, setNewCommentText] = useState('');
    let [comments, setComments] = useState(post.comments);
    let [postText, setPostText] = useState(post.postText);

    let AjaxDeleteButton = ({...props}: AjaxButtonProps<{ postId: number }, { success: boolean }>) =>
        <Ajax.Button<{ postId: number }, { success: boolean }> {...props} />

    return <Card style={{marginBottom: '10px'}}>
        <Row>
            <Col md={4}>
                <UserAvatar isn={post.isn} />
            </Col>
            <Col md={16}>
                <Row>
                    <Col>
                        <Typography.Title level={5}>
                            <a href={`/colleagues/${post.isn}/dossier`}>
                                {post.fullname}
                            </a>
                        </Typography.Title>
                    </Col>
                </Row>
                <Row>
                    <Col>
                        <Tag color="green">{post.date}</Tag>
                        {post.edited ? <Tag color="blue">отредактировано</Tag> : null}
                    </Col>
                </Row>
            </Col>
            <Col md={4}>
                {post.isMine ? <div>
                    <Button type="text"
                            icon={editing ? <EditFilled /> : <EditOutlined />}
                            onClick={() => {
                                setEditing(!editing);
                            }}
                    />
                    <AjaxDeleteButton
                        url="/news/my/deletePost"
                        method="POST"
                        data={{postId: post.postId}}
                        type="text"
                        icon={<CloseOutlined />}
                        onSuccess={(res) => {
                            if (res.data.success) {
                                onDeleted(post);
                            }
                        }} />
                </div> : null}
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                {(() => {
                    if (editing) {
                        return <EditPostForm post={post}
                                             onCancel={() => {
                                                 setEditing(false);
                                             }}
                                             onSaved={(post) => {
                                                 setPostText(post.postText);
                                                 setEditing(false);
                                             }} />;
                    }

                    return <Row>
                        <Col md={24}>
                            <Row>
                                <Col md={24}>
                                    <PostImages post={post} />
                                </Col>
                            </Row>
                            <Row>
                                <Col md={24}>
                                    {
                                        post.post_poll.question_id ?
                                            <PostPoll post={post} /> :
                                            null
                                    }
                                </Col>
                            </Row>
                            <Row>
                                <Col>
                                    <ReadMore>
                                        {postText}
                                    </ReadMore>
                                </Col>
                            </Row>
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
                                 }}
                                 onReply={(comment) => {
                                     setNewCommentText(`${comment.fullname}, `);
                                 }}
                    />)}
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                <CommentForm post={post}
                             text={newCommentText}
                             onCommendAdded={(res) => {
                                 setComments((old) => [...old, res]);
                             }} />
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
    </Card>
}
