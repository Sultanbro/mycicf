import {Avatar, Col, Image} from 'antd';
import React, {useState} from 'react';
import {AvatarSize} from 'antd/es/avatar/SizeContext';

interface UserAvatarProps {
    isn: string;
    size?: AvatarSize;
}

export function UserAvatar({isn, size = 64}: UserAvatarProps) {
    let [src, setSrc] = useState(`/storage/images/employee/${isn}.png`);
    return <Avatar size={size}
                   src={src}
                   onError={() => {
                       setSrc("/images/avatar.png");
                       return true;
                   }}
    />
}

interface UserPhotoProps {
    isn: string;
}

export function UserPhoto({isn}: UserPhotoProps) {
    return <Image src={`/storage/images/employee/${isn}.png`}
                  loading="lazy"/>
}
