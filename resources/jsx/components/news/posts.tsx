import {Ajax, AjaxProps, PostEntity} from '../../ajax';
import {Post} from './post';
import {Button, Col, List, Row, Spin} from 'antd';
import React, {useState} from 'react';
import {EllipsisOutlined} from '@ant-design/icons';
import InfiniteScroll from 'react-infinite-scroller';

import './posts.css';

interface PostsAjaxProps extends AjaxProps<PostEntity[]> {
    lastIndex?: number;
}

export function PostsAjax({lastIndex, children}: PostsAjaxProps) {
    return <Ajax.POST<PostEntity> url="/news/getPosts" data={{lastIndex}}>
        {({response, refetch, callback}: any) => {
            return children({response, callback, refetch});
        }}
    </Ajax.POST>;
}

export function Posts() {
    let [loading, setLoading] = useState(false);
    let [hasMore, setHasMore] = useState(true);

    return <PostsAjax>
        {({response, refetch}) => {
            let loadMore = () => {
                setLoading(true);
                refetch({
                    previousData: response.data,
                    data: {lastIndex},
                    callback: (newData: any, previousData: any) => {
                        if (!previousData) {
                            previousData = [];
                        }

                        if (newData.length === 0) {
                            setHasMore(false);
                        }

                        setLoading(false);
                        return previousData.concat(newData);
                    }
                })
            };

            let lastIndex = Math.min(...response.data.map((post: any) => post.postId));
            return <div className="demo-infinite-container">
                <InfiniteScroll
                    initialLoad={false}
                    pageStart={0}
                    hasMore={hasMore}
                    useWindow={true}
                    getScrollParent={() => {
                        return document.body;
                    }}
                    loadMore={loadMore}>
                    <List
                        dataSource={response.data}
                        renderItem={item => (
                            <List.Item key={item.postId}>
                                <Col md={24}>
                                    <Post post={item}
                                          onDeleted={(post) => {
                                              debugger;
                                              refetch();
                                          }} />
                                </Col>
                            </List.Item>
                        )}
                    >
                        {loading && hasMore && (
                            <div className="demo-loading-container">
                                <Spin />
                            </div>
                        )}
                    </List>

                    <Row>
                        <Col md={24} className="text-center">
                            <Button loading={loading} icon={<EllipsisOutlined />} onClick={() => {
                                loadMore();
                            }}>
                                Больше
                            </Button>
                        </Col>
                    </Row>
                </InfiniteScroll>
            </div>
        }}
    </PostsAjax>
}

export function Posts3() {
    let [loading, setLoading] = useState(false);
    return <PostsAjax>
        {({response, refetch}) => {
            let {data} = response;
            let lastIndex = Math.min(...data.map((post: any) => post.postId));
            return <>
                <Row style={{marginBottom: '50px'}}>
                    <Col md={24}>
                        <Row>
                            <Col md={24}>
                                {data.map((post: any, i: number) =>
                                    <Post key={i}
                                          post={post}
                                          onDeleted={(post) => {
                                              debugger;
                                              refetch();
                                          }} />)}
                            </Col>
                        </Row>
                        <Row>
                            <Col md={24} className="text-center">
                                <Button loading={loading} icon={<EllipsisOutlined />} onClick={() => {
                                    setLoading(true);
                                    refetch({
                                        previousData: data,
                                        data: {lastIndex},
                                        callback: (newData: any, previousData: any) => {
                                            if (!previousData) {
                                                previousData = [];
                                            }

                                            setLoading(false);
                                            return previousData.concat(newData);
                                        }
                                    })
                                }}>
                                    Больше
                                </Button>
                            </Col>
                        </Row>
                    </Col>
                </Row>
            </>
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
