import React, {useState} from 'react';
import {LikeOutlined, LikeTwoTone} from '@ant-design/icons';
import {authUserIsn} from '../../authUserIsn';
import {PostEntity} from '../ajax/types';
import {AjaxButtonProps} from '../ajax';
import {AjaxButton} from '../ajax';

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

    let PostLikeAjaxButton = ({...props}: AjaxButtonProps<LikeRequest, LikeResponse>) =>
        <AjaxButton<LikeRequest, LikeResponse> {...props} />;

    return <PostLikeAjaxButton url="/news/likePost"
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
    </PostLikeAjaxButton>;
}
