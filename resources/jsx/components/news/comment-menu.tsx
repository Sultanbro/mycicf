import {Button, Dropdown, Menu} from 'antd';
import {EllipsisOutlined} from '@ant-design/icons';
import React from 'react';

export interface CommentMenuProps {
    comment: any
}

export function CommentMenu({comment}: CommentMenuProps) {
    const menu = (
        <Menu>
            <Menu.Item>
                <a target="_blank" rel="noopener noreferrer" href="https://www.antgroup.com">
                    Отредактировать
                </a>
            </Menu.Item>
            <Menu.Item>
                <a target="_blank" rel="noopener noreferrer" href="https://www.aliyun.com">
                    Удалить
                </a>
            </Menu.Item>
        </Menu>
    );

    return <Dropdown overlay={menu} placement="bottomLeft" arrow>
        <Button size="small" type="text">
            <EllipsisOutlined />
        </Button>
    </Dropdown>;
}
