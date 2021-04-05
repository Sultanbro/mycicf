import {Button, Card, Col, Row, Tag, Typography} from 'antd';
import React, {useState} from 'react';
import {PostLike} from './post-like';
import {EditOutlined, EditFilled, CloseOutlined, PushpinOutlined} from '@ant-design/icons';
import {CommentForm} from './comment-form';
import {UserAvatar} from '../UserAvatar';
import {PostPoll} from './post-poll';
import {ReadMore} from '../read-more';
import {EditPostForm} from './edit-post-form';
import {PostImages} from './post-images';
import {PostEntity} from '../ajax/types';
import {PostComments} from './post-comment-list';
import {UserName} from '../../UserName';
import {If} from '../if';
import {AjaxButton, AjaxButtonProps} from '../ajax';
import ReactMarkdown from 'react-markdown'
import Editor from "rich-markdown-editor";
import {editorDictionary} from "./editor-dict";

export interface PostProps {
    post: PostEntity;
    onDeleted?: (post: PostEntity) => void;
    onDateClicked?: (post: PostEntity) => void;
    onVoted?: (post: PostEntity) => void;
    expanded?: boolean;
}

export function Post({
                         post,
                         onDeleted = () => {
                         },
                         onVoted = () => {
                         },
                         onDateClicked,
                         expanded = false
                     }: PostProps) {
    let [editing, setEditing] = useState(false);
    let [newCommentText] = useState('');
    let [, setComments] = useState(post.comments);
    let [postText, setPostText] = useState(post.postText);
    let commentForm: React.Ref<any> = React.createRef<any>();

    let AjaxDeletePostButton = ({...props}: AjaxButtonProps<{ postId: number }, { success: boolean }>) =>
        <AjaxButton<{ postId: number }, { success: boolean }> {...props} />;

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
                            <If condition={post.pinned}>
                                <PushpinOutlined />
                            </If>
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
                                             }} />;
                    }

                    return <Row>
                        <Col md={24}>
                            <Row>
                                <Col md={24}>
                                    {post.post_poll.question_id ?
                                        <PostPoll
                                            post={post}
                                            onVoted={() => {
                                                onVoted(post);
                                            }} /> : null}
                                </Col>
                            </Row>
                            <Row justify="center" align="middle">
                                <Col md={18}>
                                    <PostImages post={post} />
                                </Col>
                            </Row>
                            <Row>
                                <Col md={24}>
                                    <div style={{margin: '14px'}}>
                                        <Editor
                                            defaultValue={postText}
                                            readOnly
                                        />
                                    </div>
                                </Col>
                            </Row>
                        </Col>
                    </Row>;
                })()}
            </Col>
        </Row>
        <Row>
            <Col>
                <PostLike post={post} />
            </Col>
        </Row>

        <Row>
            <Col md={22} offset={2}>
                <PostComments post={post}
                              expanded={expanded} />
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
    </Card>;
}
