import {Button, Card, Col, Divider, Row, Tag, Typography} from 'antd';
import React, {useState} from 'react';
import {PostLike} from './post-like';
import {CommentOutlined, EditOutlined, EditFilled, CloseOutlined, PushpinOutlined} from '@ant-design/icons';
import {PostComment} from './post-comment';
import {CommentForm} from './comment-form';
import {UserAvatar} from '../UserAvatar';
import {PostPoll} from './post-poll';
import {ReadMore} from '../read-more';
import {EditPostForm} from './edit-post-form';
import {PostImages} from './post-images';
import {PostEntity} from '../ajax/types';
import {Ajax, AjaxButtonProps} from '../ajax/ajax';
import {PostCommentList} from './post-comment-list';
import {UserName} from '../../UserName';

export interface PostProps {
    post: PostEntity;
    onDeleted?: (post: PostEntity) => void;
}

export function Post({ post, onDeleted = () => { } }: PostProps) {
    let [editing, setEditing] = useState(false);
    let [newCommentText, setNewCommentText] = useState('');
    let [comments, setComments] = useState(post.comments);
    let [postText, setPostText] = useState(post.postText);
    let commentForm: React.Ref<any> = React.createRef<any>();

    let AjaxDeletePostButton = ({...props}: AjaxButtonProps<{ postId: number }, { success: boolean }>) =>
        <Ajax.Button<{ postId: number }, { success: boolean }> {...props} />

    return <Card style={{marginBottom: '10px'}}>
        <Row>
            <Col md={3}>
                <a href={`/colleagues/${post.isn}/dossier`}>
                    <UserAvatar isn={post.isn} />
                </a>
            </Col>
            <Col md={18}>
                <Row>
                    <Col>
                        <Typography.Title level={4}>
                            <UserName isn={post.isn} username={post.fullname} />
                            {post.pinned ? <PushpinOutlined /> : null}
                        </Typography.Title>
                    </Col>
                </Row>
                <Row>
                    <Col>
                        <Tag color="green">{post.date}</Tag>
                        {post.edited ? <Tag color="blue" className="is-edited">
                            отредактировано
                        </Tag> : null}
                    </Col>
                </Row>
            </Col>
            <Col md={3}>
                {post.isMine ? <div className="control-buttons text-right">
                    <Button type="text"
                            icon={editing ? <EditFilled /> : <EditOutlined />}
                            onClick={() => {
                                setEditing(!editing);
                            }}
                    />

                    <AjaxDeletePostButton
                        url="/news/my/deletePost"
                        method="POST"
                        data={{postId: post.postId}}
                        type="text"
                        icon={<CloseOutlined />}
                        confirm
                        confirmText="Вы уверены?"
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
                                             }} />
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
                                    {post.post_poll.question_id ? <PostPoll post={post} /> : null}
                                </Col>
                            </Row>
                            <Row>
                                <Col md={24}>
                                    <div style={{margin: '14px'}}>
                                        <ReadMore text={postText} />
                                    </div>
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
                    <CommentOutlined /> {comments.length} Комментарии
                </span>
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
        <Row>
            <Col md={22} offset={2}>
                <PostCommentList comments={comments}
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
        <Row>
            <Col md={24}>
                <CommentForm post={post}
                             ref={commentForm}
                             text={newCommentText}
                             onCommendAdded={(res) => {
                                 setComments((old) => [...old, res]);
                             }} />
            </Col>
        </Row>
    </Card>
}
