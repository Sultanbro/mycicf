import {Button, Col, Dropdown, Menu, Row} from 'antd';
import {CloseOutlined, EditOutlined, EllipsisOutlined} from '@ant-design/icons';
import React from 'react';
import {Ajax, PostCommentEntity} from '../../ajax';

export interface CommentMenuProps {
    comment: PostCommentEntity;
    onCommentDeleted: (commentId: number) => void;
    onShowEditForm: (commentId: number) => void;
}

export function CommentButtons({comment, onCommentDeleted, onShowEditForm}: CommentMenuProps) {
    return <Row>
        <Col md={4}>
            <Button type="link"
                    icon={<EditOutlined />}
                    onClick={() => {
                        onShowEditForm(comment.commentId);
                    }} />
        </Col>

        <Col md={4}>
            <Ajax.Button<{ commentId: number }, { success: true }>
                url="/news/comments/deleteComment"
                method="POST"
                block
                data={{commentId: comment.commentId}}
                type="link"
                icon={<CloseOutlined />}
                onSuccess={(res) => {
                    if (res.data.success) {
                        onCommentDeleted(comment.commentId);
                    }
                }}
            >a</Ajax.Button>
        </Col>
    </Row>;
}
