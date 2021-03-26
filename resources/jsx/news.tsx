import React from 'react';
import {Ajax} from "./ajax";

export function MyCiCNews({param}) {
    return <div>
        <p>
            React TS news works correctly.
        </p>
        <p>
            Param: <b>{param}</b>
        </p>

        <Sandbox param={20}/>
    </div>
}

function Posts() {
    return <Ajax url="/news/getPosts" method="POST" q={{a: 1}}>
        {({response, refetch}) => {
            return <div>
                <ul>
                    {response.data.map((post) => <li>Post #{post.postId}: {post.postText}</li>)}
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

        <Posts />
    </div>
}
