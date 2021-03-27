import React from 'react';
import {Button} from 'antd';
import {Ajax, PostsAjax} from "./ajax";
import 'antd/dist/antd.css';

export function MyCiCNews({param}: any) {
    return <div>
        <p>
            React TS news works correctly.
        </p>
        <p>
            Param: <b>{param}</b>
        </p>

        <Posts />
    </div>
}

function Posts() {
    return <PostsAjax lastIndex={null}>
        {({data, refetch}: any) => {
            console.log(data.map((post: any) => post.postId));
            let lastIndex = Math.min(...data.map((post: any) => post.postId));
            return <div>
                <ul>
                    {data.map((post: any, i: number) => <li key={i}>Post #{post.postId}: {post.postText}</li>)}
                </ul>
                <Button onClick={() => {
                    refetch({
                        previousData: data,
                        data: {lastIndex}, callback: (newData: any, previousData: any) => {
                            if (!previousData) {
                                previousData = [];
                            }

                            debugger;
                            return previousData.concat(newData);
                        }
                    })
                }}>
                    Refetch
                </Button>
            </div>
        }}
    </PostsAjax>;
}

function Posts2() {
    return <Ajax url="/news/getPosts" method="POST" q={{a: 1}}>
        {({response, refetch}: any) =>
            <div>
                <ul>
                    {response.data.map((post: any) => <li>Post #{post.postId}: {post.postText}</li>)}
                </ul>
                <Button onClick={() => {
                    refetch()
                }}>
                    Refetch
                </Button>
            </div>}
    </Ajax>;
}

function Post() {
    return <div>

    </div>
}
