import {Button, Card, Col, Divider, Modal, Row, Tag, Tooltip, Typography} from 'antd';
import React, {useState} from 'react';
import {PostLike} from './post-like';
import {EditOutlined, EditFilled, CloseOutlined, PushpinOutlined, CommentOutlined} from '@ant-design/icons';
import {CommentForm} from './comment-form';
import {UserAvatar} from '../UserAvatar';
import {PostPoll} from './post-poll';
import {ReadMore} from '../read-more';
import {EditPostForm} from './edit-post-form';
import {PostImages} from './post-images';
import {PostEntity} from '../ajax/types';
import {PostCommentList} from './post-comment-list';
import {UserName} from '../../UserName';
import {If} from '../if';
import {AjaxButton, AjaxButtonProps} from '../ajax';

export interface PostProps {
    post: PostEntity;
    onDeleted?: (post: PostEntity) => void;
    onDateClicked?: (post: PostEntity) => void;
    expanded?: boolean;
}

export function Post({
                         post,
                         onDeleted = () => {
                         },
                         onDateClicked,
                         expanded = false
                     }: PostProps) {
    let [editing, setEditing] = useState(false);
    let [newCommentText, setNewCommentText] = useState('');
    let [comments, setComments] = useState(post.comments);
    let [showCommentsModal, setShowCommentModal] = useState(false);
    let [postText, setPostText] = useState(post.postText);
    let commentForm: React.Ref<any> = React.createRef<any>();

    let AjaxDeletePostButton = ({...props}: AjaxButtonProps<{ postId: number }, { success: boolean }>) =>
        <AjaxButton<{ postId: number }, { success: boolean }> {...props} />

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
                        <Tag color="green"
                             onClick={() => onDateClicked ? onDateClicked(post) : null}
                             style={{cursor: 'pointer'}}
                        >
                            {post.date}
                        </Tag>
                        <If condition={post.edited}>
                            <Tag color="blue" className="is-edited">
                                отредактировано
                            </Tag>
                        </If>
                    </Col>
                </Row>
            </Col>
            <Col md={3}>
                <If condition={post.isMine}>
                    <div className="control-buttons text-right">
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
                    </div>
                </If>
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
                            <Row justify="center" align="middle">
                                <Col md={18}>
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
                                        <ReadMore text={postText} expanded={expanded} />
                                    </div>
                                </Col>
                            </Row>
                        </Col>
                    </Row>
                })()}
            </Col>
        </Row>
        <Row>
            <Col>
                <PostLike post={post} />
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}}>
            <Tooltip title="Показать всю ветку комментариев">
                <Button type="link" onClick={() => {
                    setShowCommentModal(true);
                }}>
                    <CommentOutlined /> Комментарии ({comments.length || 0})
                </Button>
            </Tooltip>
        </Divider>
        <Row>
            <Col md={22} offset={2}>
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

                <Modal visible={showCommentsModal}
                       footer={null}
                       onCancel={() => {
                           setShowCommentModal(false)
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
