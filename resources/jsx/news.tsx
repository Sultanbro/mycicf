import React from 'react';
import {Ajax, PostsAjax} from "./ajax";

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
        {({response, refetch}: any) => {
            return <div>
                <ul>
                    {response.data.map((post: any) => <li>Post #{post.postId}: {post.postText}</li>)}
                </ul>
                <button onClick={() => {refetch()}}>
                    Refetch
                </button>
            </div>
        }}
    </PostsAjax>;
}

function Posts2() {
    return <Ajax url="/news/getPosts" method="POST" q={{a: 1}}>
        {({response, refetch}: any) => {
            return <div>
                <ul>
                    {response.data.map((post: any) => <li>Post #{post.postId}: {post.postText}</li>)}
                </ul>
                <button onClick={() => {refetch()}}>
                    Refetch
                </button>
            </div>
        }}
    </Ajax>;
}

function Sandbox({param = 10}) {
    return <div>
        Sandbox: <b>{param}</b>

        <Posts2 />
    </div>
}
