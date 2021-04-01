import {Button, Dropdown, Menu} from 'antd';
import {EllipsisOutlined} from '@ant-design/icons';
import React from 'react';
import {PostCommentEntity} from '../ajax/types';
import {AjaxButton} from '../ajax';

export interface CommentMenuProps {
    comment: PostCommentEntity;
    onCommentDeleted: (commentId: number) => void;
    onShowEditForm: (commentId: number) => void;
}

export function CommentMenu({comment, onCommentDeleted, onShowEditForm}: CommentMenuProps) {
    const menu = (
        <Menu>
            <Menu.Item>
                <Button type="link" onClick={() => {
                    onShowEditForm(comment.commentId);
                }}>
                    Отредактировать
                </Button>
            </Menu.Item>
            <Menu.Item>
                <AjaxButton<{ commentId: number }, { success: true }>
                    url="/news/comments/deleteComment"
                    method="POST"
                    block
                    data={{commentId: comment.commentId}}
                    type="link"
                    onSuccess={(res) => {
                        if (res.data.success) {
                            onCommentDeleted(comment.commentId);
                        }
                    }}
                >
                    Удалить
                </AjaxButton>
            </Menu.Item>
        </Menu>
    );

    return <Dropdown overlay={menu} placement="bottomLeft" arrow>
        <Button size="small" type="text">
            <EllipsisOutlined />
        </Button>
    </Dropdown>;
}
