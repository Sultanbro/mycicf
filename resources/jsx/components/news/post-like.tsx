import React, {useState} from 'react';
import {LikeOutlined, LikeTwoTone} from '@ant-design/icons';
import {authUserIsn} from '../../authUserIsn';
import {PostEntity} from '../ajax/types';
import {Ajax, AjaxButtonProps} from '../ajax/ajax';

export interface PostLikeProps {
    post: PostEntity;
}

export interface LikeRequest {
    postId: number;
    isn: any;
}

export interface LikeResponse {
    success: boolean;
    count: number;
}

export function PostLike({post}: PostLikeProps) {
    let [isLiked, setIsLiked] = useState(post.isLiked);
    let [likes, setLikes] = useState(post.likes);
    let icon = isLiked ? <LikeTwoTone style={{color: 'red'}} /> : <LikeOutlined />;

    let AjaxButton = ({...props}: AjaxButtonProps<LikeRequest, LikeResponse>) =>
        <Ajax.Button<LikeRequest, LikeResponse> {...props} />;

    return <AjaxButton url="/news/likePost"
                       method="POST"
                       data={{
                           postId: post.postId,
                           isn: authUserIsn()
                       }}
                       icon={icon}
                       onSuccess={(res) => {
                           setIsLiked(res.data.success);
                           setLikes(res.data.count);
                       }}>
        {likes} Нравится
    </AjaxButton>;
}
