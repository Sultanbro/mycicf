import {Ajax, AjaxButtonProps, PostEntity} from '../../ajax';
import React, {useState} from 'react';
import {LikeOutlined, LikeTwoTone} from '@ant-design/icons';

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
    let data: LikeRequest = {
        postId: post.postId,
        isn: 5565
    };

    let AjaxButton = ({...props}: AjaxButtonProps<LikeRequest, LikeResponse>) =>
        <Ajax.Button<LikeRequest, LikeResponse> {...props} />;

    return <AjaxButton url="/news/likePost"
                   method="POST"
                   data={data}
                   icon={icon}
                   onSuccess={(res) => {
                       setIsLiked(res.data.success);
                       setLikes(res.data.count);
                   }}>
        {likes} Нравится
    </AjaxButton>;
}
