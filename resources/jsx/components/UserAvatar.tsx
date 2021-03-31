import {Avatar, Image} from 'antd';
import React, {useState} from 'react';
import {AvatarSize} from 'antd/es/avatar/SizeContext';

interface UserAvatarProps {
    isn: string;
    size?: AvatarSize;
    shape?: 'circle' | 'square';
}

const DEFAULT_AVATAR = "/images/avatar.png";

// let url = (isn: string) => `/storage/images/employee/${isn}.png`
let url = (isn: string) => DEFAULT_AVATAR

export function UserAvatar({isn, size = 64, shape = 'circle'}: UserAvatarProps) {
    let placeholder =
        <Image
            preview={false}
            src={DEFAULT_AVATAR}
        />
    return <Avatar size={size}
                   src={<Image preview={false} src={url(isn)} placeholder={placeholder} />}
                   shape={shape}
    />
}

interface UserPhotoProps {
    isn: string;
}

export function UserPhoto({isn}: UserPhotoProps) {
    return <Image src={url(isn)} loading="lazy" />
}
