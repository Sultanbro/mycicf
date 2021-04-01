import {Avatar, Image} from 'antd';
import React from 'react';
import {AvatarSize} from 'antd/es/avatar/SizeContext';

interface UserAvatarProps {
    isn: string;
    size?: AvatarSize;
    shape?: 'circle' | 'square';
}

const DEFAULT_AVATAR = "/images/avatar.png";

// let url = (isn: string) => `/storage/images/employee/${isn}.png`
let url = (isn: string | number) => DEFAULT_AVATAR

export function UserAvatar({isn, size = 64, shape = 'circle'}: UserAvatarProps) {
    let placeholder =
        <Image preview={false}
                src={DEFAULT_AVATAR}
        />;
    let src = <Image preview={false}
                     src={url(isn)}
                     placeholder={placeholder} />;
    return <Avatar size={size}
                   src={src}
                   shape={shape}
    />
}

interface UserPhotoProps {
    isn: string | number;
}

export function UserPhoto({isn}: UserPhotoProps) {
    return <Image src={url(isn)} loading="lazy" />
}
