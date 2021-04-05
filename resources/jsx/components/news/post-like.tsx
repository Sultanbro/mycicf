import React, {useState} from 'react';
import {LikeOutlined, LikeTwoTone} from '@ant-design/icons';
import {authUserIsn} from '../../authUserIsn';
import {PostEntity} from '../ajax/types';
import {Ajax, AjaxButtonProps} from '../ajax';
import {AjaxButton} from '../ajax';
import {Card, Dropdown} from 'antd';
import {UserAvatar} from '../UserAvatar';
import {ISN} from '../../types';

export interface PostLikeProps {
    post: PostEntity;
}

export interface LikeRequest {
    postId: number;
    isn: ISN;
}

export interface LikeResponse {
    success: boolean;
    count: number;
}

export interface LikedUserEntry {
    id: number;
    ISN: ISN;
    username: "Dahlia Johnston MD";
    full_name: "Armani McDermott V";
}

interface LikedUsersProps {
    postId: number;
}

export function LikedUsers({postId}: LikedUsersProps) {
    // /news/getLikes
    return <Card style={{boxShadow: '0 0 8px #0000003b'}} onClick={(e) => e.preventDefault()}>
        <Ajax.POST<LikedUserEntry[]> url="/news/getLikes" data={{postId}} cache>
            {({response}) => {
                let users = response.data.slice(0, 5);
                return users.map((user, index) => {
                    return <UserAvatar isn={user.ISN}
                                       size="default"
                                       key={index}
                                       title={user.full_name}
                    />;
                });
            }}
        </Ajax.POST>
    </Card>;
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
        {(() => {
            let span = <span>
                {likes} Нравится
            </span>;

            if (likes === 0) {
                return span;
            }

            return <Dropdown overlay={<LikedUsers postId={post.postId} />} placement="topCenter">
                {span}
            </Dropdown>;
        })()}
    </PostLikeAjaxButton>;
}
