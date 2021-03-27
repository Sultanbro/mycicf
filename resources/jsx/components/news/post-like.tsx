import {Ajax, PostEntity} from '../../ajax';
import React, {useState} from 'react';
import {LikeOutlined, LikeTwoTone} from '@ant-design/icons';

export interface PostLikeProps {
    post: PostEntity;
}

export function PostLike({post}: PostLikeProps) {
    let [isLiked, setIsLiked] = useState(post.isLiked);
    let [likes, setLikes] = useState(post.likes);
    let icon = isLiked ? <LikeTwoTone /> : <LikeOutlined />;
    let data = {
        postId: post.postId,
        isn: 5565
    };

    return <Ajax.Button url="/news/likePost"
                        method="POST"
                        data={data}
                        onSuccess={(res: any) => {
                            setIsLiked(res.data.success);
                            setLikes(res.data.success ? likes + 1 : likes - 1);
                        }}>
        {icon} {likes} Нравится
    </Ajax.Button>;
}
