import {Avatar, Image} from 'antd';
import React from 'react';
import {AvatarSize} from 'antd/es/avatar/SizeContext';

interface UserAvatarProps {
    isn: string;
    size?: AvatarSize;
    shape?: 'circle' | 'square';
}

const DEFAULT_AVATAR = "/images/avatar.png";

// let url = (isn: string | number) => `/storage/images/employee/${isn}.png`
let url = (isn: string | number) => `https://dummyimage.com/340x340/95bbdf/ffffff.png&text=${isn}`;
// let url = (isn: string | number) => DEFAULT_AVATAR

export function UserAvatar({isn, size = 64, shape = 'circle'}: UserAvatarProps) {
    let placeholder =
        <Image preview={false}
               src={DEFAULT_AVATAR}
               loading="lazy"
        />;
    let src =
        <Image preview={false}
               src={url(isn)}
               placeholder={placeholder}
               loading="lazy"
        />;
    return <Avatar size={size}
                   src={src}
                   shape={shape}
    />
}

interface UserPhotoProps {
    isn: string | number;
}

export function UserPhoto({isn}: UserPhotoProps) {
    return <Image src={url(isn)} loading="lazy"/>
}
