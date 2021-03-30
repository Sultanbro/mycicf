import {Avatar, Image} from 'antd';
import React, {useState} from 'react';
import {AvatarSize} from 'antd/es/avatar/SizeContext';

interface UserAvatarProps {
    isn: string;
    size?: AvatarSize;
    shape?: 'circle' | 'square';
}

const DEFAULT_AVATAR = "/images/avatar.png";

let url = (isn: string) => `/storage/images/employee/${isn}.png`

export function UserAvatar({isn, size = 64, shape = 'circle'}: UserAvatarProps) {
    let [src, setSrc] = useState(url(isn));
    return <Avatar size={size}
                   src={src}
                   shape={shape}
                   onError={() => {
                       setSrc(DEFAULT_AVATAR);
                       return true;
                   }}
    />
}

interface UserPhotoProps {
    isn: string;
}

export function UserPhoto({isn}: UserPhotoProps) {
    return <Image src={url(isn)} loading="lazy" />
}
