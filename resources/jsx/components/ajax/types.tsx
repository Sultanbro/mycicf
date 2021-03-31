import React from 'react';

export interface PostCommentEntity {
    date: string;
    commentId: number;
    commentText: string;
    fullname: string;
    userISN: any;
    isMine: boolean;
}

export interface PostPollAnswer {
    answer_title: string;
    answer_votes: number;
    answer_id: number;
}

export interface PostPoll {
    question_id: any;
    question_title: any;
    total_votes: any;
    answers: PostPollAnswer[]
}

export interface PostEntity {
    image: string[];
    post_poll: PostPoll;
    isVoted: boolean;
    postId: number;
    likes: number;
    pinned: boolean;
    isLiked: boolean;
    isMine: boolean;
    edited: boolean;
    comments: PostCommentEntity[];
    date: string;
    fullname: string;
    isn: string;
    postText: string;

    showModal?: boolean;
}

export interface AjaxCacheSettings {
    enabled: boolean;
    lifetime: number;
    storage?: 'localstorage' | string;
}
