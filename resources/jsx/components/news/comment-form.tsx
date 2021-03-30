import React, {ForwardedRef} from 'react';
import {Col, Input, Row} from 'antd';
import {Ajax, AjaxButtonProps} from '../ajax/ajax';
import {SendOutlined} from '@ant-design/icons';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {EmojiPicker} from '../emoji-picker';
import {BaseEmoji} from 'emoji-mart';
import {UserAvatar} from '../UserAvatar';
import {authUserIsn} from '../../authUserIsn';
import {PostCommentEntity, PostEntity} from '../ajax/types';

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

interface CommentFormProps {
    post: PostEntity;
    onCommendAdded: (entity: PostCommentEntity) => void;
    text?: string;
    children?: React.ReactNode;
}

let commentForm = ({
                  post,
                  onCommendAdded,
                  text = '',
                  children
              }: CommentFormProps, ref: ForwardedRef<any>) => {
    let useLocalStorage = createUseLocalStorage(`post:${post.postId}:`);
    let [commentText, setCommentText] = useLocalStorage('commentText', text);
    let AjaxButton = ({...props}: AjaxButtonProps<CommentAjaxRequest, CommentAjaxResponse>) =>
        <Ajax.Button<CommentAjaxRequest, CommentAjaxResponse> {...props} />

    return <div ref={ref}>
        <Row>
            <Col md={2} className="d-flex justify-content-center align-items-center">
                <UserAvatar size="default" isn={authUserIsn()} />
            </Col>
            <Col md={19}>
                <Input.TextArea placeholder="Напишите комментарий..."
                                value={commentText}
                                defaultValue={commentText}
                                rows={2}
                                onChange={(e) => {
                                    setCommentText(e.target.value);
                                }} />
            </Col>
            <Col md={1}>
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
                            data={{isn: authUserIsn(), commentText, postId: post.postId}}
                            onSuccess={(res) => {
                                setCommentText('');
                                onCommendAdded(res.data as any); // TODO
                            }} />
            </Col>
        </Row>
    </div>
};
export let CommentForm = React.forwardRef<HTMLDivElement, CommentFormProps>(commentForm);
