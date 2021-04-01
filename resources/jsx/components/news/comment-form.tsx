import React, {ForwardedRef} from 'react';
import {Col, Input, Row} from 'antd';
import {SendOutlined} from '@ant-design/icons';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {EmojiPicker} from '../emoji-picker';
import {BaseEmoji} from 'emoji-mart';
import {UserAvatar} from '../UserAvatar';
import {authUserIsn} from '../../authUserIsn';
import {PostCommentEntity, PostEntity} from '../ajax/types';
import {AjaxButton, AjaxButtonProps} from '../ajax';
import {ISN} from '../../types';

interface CommentAjaxRequest {
    isn: ISN;
    postId: number;
    commentText: string;
}

interface CommentAjaxResponse {
    commentId: number;
    commentText: string;
    date: string;
    fullname: string;
    postId: number;
    userISN: ISN;
}

interface CommentFormProps {
    post: PostEntity;
    onCommendAdded: (entity: PostCommentEntity) => void;
    text?: string;
}

let commentForm = ({
                  post,
                  onCommendAdded,
                  text = '',
              }: CommentFormProps, ref: ForwardedRef<any>) => {
    let useLocalStorage = createUseLocalStorage(`post:${post.postId}:`);
    let [commentText, setCommentText] = useLocalStorage('commentText', text);
    let AddCommentAjaxButton = ({...props}: AjaxButtonProps<CommentAjaxRequest, CommentAjaxResponse>) =>
        <AjaxButton<CommentAjaxRequest, CommentAjaxResponse> {...props} />

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
                <AddCommentAjaxButton url="/news/comments/addComment"
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
