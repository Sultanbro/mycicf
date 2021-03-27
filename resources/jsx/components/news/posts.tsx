import {Ajax, AjaxProps, PostEntity} from '../../ajax';
import {Post} from './post';
import {Button} from 'antd';
import React from 'react';

interface PostsAjaxProps extends AjaxProps<PostEntity[]> {
    lastIndex?: number;
}

export function PostsAjax({lastIndex, children}: PostsAjaxProps) {
    return <Ajax.POST<PostEntity> url="/news/getPosts" q={{lastIndex}}>
        {({response, refetch, callback}: any) => {
            return children({response, callback, refetch});
        }}
    </Ajax.POST>;
}

export function Posts() {
    return <PostsAjax>
        {({response, refetch}) => {
            let {data} = response;
            console.log(data.map((post: any) => post.postId));
            let lastIndex = Math.min(...data.map((post: any) => post.postId));
            return <div>
                <ul>
                    {data.map((post: any, i: number) => <Post key={i} post={post} />)}
                </ul>
                <Button onClick={() => {
                    refetch({
                        previousData: data,
                        data: {lastIndex}, callback: (newData: any, previousData: any) => {
                            if (!previousData) {
                                previousData = [];
                            }

                            return previousData.concat(newData);
                        }
                    })
                }}>
                    Больше
                </Button>
            </div>
        }}
    </PostsAjax>;
}

export function Posts2() {
    return <Ajax url="/news/getPosts" method="POST" data={{a: 1}}>
        {({response, refetch}: any) =>
            <div>
                <ul>
                    {response.data.map((post: any) => <li>Post #{post.postId}: {post.postText}</li>)}
                </ul>
                <Button onClick={() => {
                    refetch();
                }}>
                    Больше
                </Button>
            </div>}
    </Ajax>;
}
