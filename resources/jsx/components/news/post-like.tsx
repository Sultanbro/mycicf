import {Ajax, PostEntity} from '../../ajax';
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
    let icon = isLiked ? <LikeTwoTone /> : <LikeOutlined />;
    let data: LikeRequest = {
        postId: post.postId,
        isn: 5565
    };

    return <Ajax.Button<LikeRequest, LikeResponse> url="/news/likePost"
                        method="POST"
                        data={data}
                        icon={icon}
                        onSuccess={(res) => {
                            setIsLiked(res.data.success);
                            setLikes(res.data.count);
                        }}>
        {likes} Нравится
    </Ajax.Button>;
}
