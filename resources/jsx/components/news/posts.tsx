
import {Ajax, PostsAjax} from '../../ajax';
import {Post} from './post';
import {Button} from 'antd';
import React from 'react';

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
