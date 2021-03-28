import {Avatar} from 'antd';
import React from 'react';
import {AvatarSize} from 'antd/es/avatar/SizeContext';

interface UserAvatarProps {
    isn: string | number;
    size?: AvatarSize;
}

export function UserAvatar({isn, size = 64}: UserAvatarProps) {
    return <Avatar size={size} src={`/storage/images/employee/${isn}.png`} />
}
