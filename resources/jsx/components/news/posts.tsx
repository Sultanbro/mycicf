import {Ajax, AjaxProps, PostEntity} from '../../ajax';
import {Post} from './post';
import {Button, Col, Input, List, notification, Row, Spin} from 'antd';
import React, {ChangeEvent, useState} from 'react';
import {CheckOutlined, EllipsisOutlined, LoadingOutlined} from '@ant-design/icons';
import InfiniteScroll from 'react-infinite-scroller';
import debounce from 'lodash/debounce';
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

interface PostsProps {
    ref: React.Ref<any>;
}

export function Posts({ref}: PostsProps) {
    let [loading, setLoading] = useState(false);
    let [hasMore, setHasMore] = useState(true);
    let [searchQuery, setSearchQuery] = useState<string>('');

    return <PostsAjax>
        {({response, refetch}) => {
            let loadMore = () => {
                setLoading(true);
                refetch({
                    previousData: response.data,
                    data: {lastIndex, query: searchQuery},
                    callback: (newData: any, previousData: any) => {
                        if (!previousData) {
                            previousData = [];
                        }

                        if (newData.length === 0) {
                            setHasMore(false);
                        } else {
                            setHasMore(true);
                        }

                        setLoading(false);
                        return previousData.concat(newData);
                    }
                })
            };

            let search = () => {
                setLoading(true);
                refetch({
                    previousData: response.data,
                    data: {lastIndex, query: searchQuery},
                    callback: (newData: any) => {
                        if (newData.length === 0) {
                            setHasMore(false);
                        } else {
                            setHasMore(true);
                        }

                        setLoading(false);
                        return newData;
                    }
                })
            };

            let lastIndex = Math.min(...response.data.map((post: any) => post.postId));
            return <Row>
                <Col md={24}>
                    <Row>
                        <Input
                            suffix={loading ? <LoadingOutlined /> : null}
                            onChange={debounce<(e: ChangeEvent<HTMLInputElement>) => void>((e) => {
                            setSearchQuery(e.target.value);

                            search();
                        }, 500)}
                        />
                    </Row>
                    <Row>
                        <Col md={24}>
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
                                                          notification.info({
                                                              message: 'Пост удалён',
                                                              icon: <CheckOutlined/>
                                                          });
                                                          refetch();
                                                      }}/>
                                            </Col>
                                        </List.Item>
                                    )}
                                >
                                    {loading && hasMore && (
                                        <div className="demo-loading-container">
                                            <Spin/>
                                        </div>
                                    )}
                                </List>

                                {hasMore ? <Row>
                                    <Col md={24} className="text-center">
                                        <Button loading={loading} icon={<EllipsisOutlined/>} onClick={() => {
                                            loadMore();
                                        }}>
                                            Больше
                                        </Button>
                                    </Col>
                                </Row> : null}
                            </InfiniteScroll>
                        </Col>
                    </Row>
                </Col>
            </Row>
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
                                          }}/>)}
                            </Col>
                        </Row>
                        <Row>
                            <Col md={24} className="text-center">
                                <Button loading={loading} icon={<EllipsisOutlined/>} onClick={() => {
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
    return <Ajax url="/news/getPosts" method="POST" data={{test: 1}}>
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
