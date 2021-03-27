import {Avatar} from 'antd';
import React from 'react';

interface UserAvatarProps {
    isn: string;
    size?: any;
}

export function UserAvatar({isn, size = 64}: UserAvatarProps) {
    return <Avatar size={size} src={`/storage/images/employee/${isn}.png`} />
}
