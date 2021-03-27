import {Button, Dropdown, Menu} from 'antd';
import {EllipsisOutlined} from '@ant-design/icons';
import React from 'react';
import {Ajax, PostCommentEntity} from '../../ajax';

export interface CommentMenuProps {
    comment: PostCommentEntity;
    onCommentDeleted: (commentId: number) => void;
}

export function CommentMenu({comment, onCommentDeleted}: CommentMenuProps) {
    const menu = (
        <Menu>
            <Menu.Item>
                <a target="_blank"
                   rel="noopener noreferrer"
                   href="https://www.antgroup.com">
                    Отредактировать
                </a>
            </Menu.Item>
            <Menu.Item>
                <Ajax.Button<{ commentId: number }, { success: true }>
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
                </Ajax.Button>
            </Menu.Item>
        </Menu>
    );

    return <Dropdown overlay={menu} placement="bottomLeft" arrow>
        <Button size="small" type="text">
            <EllipsisOutlined />
        </Button>
    </Dropdown>;
}
