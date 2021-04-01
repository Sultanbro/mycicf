import {Post} from './post';
import {Button, Col, Divider, List, Modal, notification, Row, Spin} from 'antd';
import React, {useState} from 'react';
import {CheckOutlined, EllipsisOutlined} from '@ant-design/icons';
import InfiniteScroll from 'react-infinite-scroller';
import './posts.css';
import {AddPostForm} from "./add-post-form";
import {Ajax, AjaxProps} from '../ajax';
import {PostEntity} from '../ajax/types';
import {SearchBox} from './search-box';
import {If} from '../if';

interface PostsAjaxProps extends AjaxProps<PostEntity[]> {

}

export function PostsAjax({children}: PostsAjaxProps) {
    return <Ajax.POST<PostEntity> url="/news/getPosts">
        {({response, refetch, callback}: any) => {
            return children({response, callback, refetch});
        }}
    </Ajax.POST>;
}

interface PostsProps {
}

export function Posts({}: PostsProps) {
    let [loading, setLoading] = useState(false);
    let [hasMore, setHasMore] = useState(true);
    let [searchQuery, setSearchQuery] = useState<string>('');
    let [dateRange, setDateRange] = useState<any[]>([]);

    return <PostsAjax>
        {({response, refetch}) => {
            let posts = response.data
                // Use ORDER BY on backend instead
                .sort((a, b) => +b.pinned - +a.pinned);

            /**
             * @deprecated
             */
            let loadMore = () => {
                let lastIndex = Math.min(...posts.map((post: any) => post.postId));
                setLoading(true);
                refetch({
                    previousData: posts,
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

            let search = (li: number | null = lastIndex, query?: string) => {
                if (!query) {
                    query = searchQuery;
                }
                setLoading(true);
                refetch({
                    previousData: posts,
                    data: {lastIndex: li, query},
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

            let lastIndex = Math.min(...posts.map((post: any) => post.postId));
            return <Row>
                <Col md={24}>
                    <Row>
                        <Col md={24}>
                            <AddPostForm
                                onAddPost={() => {
                                    notification.info({
                                        message: 'Пост успешно отправлен',
                                        description: '',
                                        icon: <CheckOutlined />
                                    });
                                    search(null);
                                }} />
                        </Col>
                        <Divider type="horizontal" />
                    </Row>

                    <SearchBox loading={loading}
                               setSearchQuery={setSearchQuery}
                               search={search}
                               dateRange={dateRange}
                    />

                    <Row>
                        <Col md={24}>
                            <InfiniteScroll
                                initialLoad={false}
                                pageStart={0}
                                hasMore={hasMore}
                                useWindow={true}
                                getScrollParent={() => document.body}
                                loadMore={loadMore}>
                                <List
                                    dataSource={posts}
                                    renderItem={item => {
                                        // let [showModal, setShowModal] = useState(false);

                                        return (
                                            <List.Item key={item.postId} style={{
                                                padding: 0,
                                            }}>
                                                <Col md={24}>
                                                    <Post post={item}
                                                        // onDateClicked={() => setShowModal(true)}
                                                          onDeleted={(post) => {
                                                              notification.info({
                                                                  message: 'Пост удалён',
                                                                  icon: <CheckOutlined />
                                                              });
                                                              search(null);
                                                          }} />

                                                    {/*<Modal visible={showModal}
                                                           width={880}
                                                           onCancel={() => setShowModal(false)}>
                                                        <Post post={item}
                                                              expanded
                                                              onDeleted={(post) => {
                                                                  notification.info({
                                                                      message: 'Пост удалён',
                                                                      icon: <CheckOutlined />
                                                                  });
                                                                  search(null);
                                                              }} />
                                                    </Modal>*/}
                                                </Col>
                                            </List.Item>
                                        );
                                    }}
                                >
                                    {loading && hasMore && (
                                        <div className="demo-loading-container">
                                            <Spin />
                                        </div>
                                    )}
                                </List>
                                <If condition={hasMore}>
                                    <Row>
                                        <Col md={24} className="text-center">
                                            <Button loading={loading}
                                                    icon={<EllipsisOutlined />}
                                                    onClick={() => {
                                                        loadMore();
                                                    }}>
                                                Больше
                                            </Button>
                                        </Col>
                                    </Row>
                                </If>
                            </InfiniteScroll>
                        </Col>
                    </Row>
                </Col>
            </Row>
        }}
    </PostsAjax>
}

export function Posts3({isn}: any) {
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
    return <Ajax url="/news/getPosts" method="POST" data={{test: 1}}>
        {({response, refetch}: any) =>
            <div>
                <ul>
                    {response.data.map((post: PostEntity, index: number) =>
                        <li key={index}>Post #{post.postId}: {post.postText}</li>)}
                </ul>
                <Button onClick={() => {
                    refetch();
                }}>
                    Больше
                </Button>
            </div>}
    </Ajax>;
}
