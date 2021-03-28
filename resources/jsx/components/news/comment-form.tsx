import React from 'react';
import {Avatar, Col, Input, Row} from 'antd';
import {Ajax, AjaxButtonProps, PostCommentEntity, PostEntity} from '../../ajax';
import {SendOutlined} from '@ant-design/icons';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {EmojiPicker} from '../emoji-picker';
import {BaseEmoji} from 'emoji-mart';

interface CommentFormProps {
    post: PostEntity;
    onCommendAdded: (entity: PostCommentEntity) => void;
    text?: string;
}

interface CommentAjaxRequest {
    isn: any;
    postId: any;
    commentText: string;
}

interface CommentAjaxResponse {
    commentId: number;
    commentText: string;
    date: string;
    fullname: string;
    postId: number;
    userISN: number;
}

export function CommentForm({post, onCommendAdded, text = ''}: CommentFormProps) {
    let useLocalStorage = createUseLocalStorage(`post:${post.postId}:`);
    let [commentText, setCommentText] = useLocalStorage('commentText', text);
    let AjaxButton = ({...props}: AjaxButtonProps<CommentAjaxRequest, CommentAjaxResponse>) =>
        <Ajax.Button<CommentAjaxRequest, CommentAjaxResponse> {...props} />

    return <Row>
        <Col md={2}>
            <Avatar size="small" src="/images/avatar.png" />
        </Col>
        <Col md={18}>
            <Input.TextArea placeholder="Напишите комментарий..."
                            value={commentText}
                            defaultValue={commentText}
                            rows={2}
                            onChange={(e) => {
                                setCommentText(e.target.value);
                            }} />
        </Col>
        <Col md={2}>
            <EmojiPicker onSelect={(data: BaseEmoji) => {
                setCommentText(commentText + data.native);
            }} />
        </Col>
        <Col md={2}>
            <AjaxButton url="/news/comments/addComment"
                        method="POST"
                        type="text"
                        disabled={!commentText}
                        icon={<SendOutlined />}
                        data={{isn: 5565, commentText, postId: post.postId}}
                        onSuccess={(res) => {
                            setCommentText('');
                            onCommendAdded(res.data as any); // TODO
                        }} />
        </Col>
    </Row>
}
