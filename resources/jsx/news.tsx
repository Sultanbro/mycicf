import React, {useState} from 'react';
import {Avatar, Button, Divider, Col, Row, Alert, Input} from 'antd';
import {LikeOutlined, LikeTwoTone, CommentOutlined, EllipsisOutlined, SendOutlined} from '@ant-design/icons';
import { Menu, Dropdown } from 'antd';
import {Ajax, PostsAjax} from "./ajax";
import 'antd/dist/antd.css';
import axios from 'axios';

function CommentForm({post}: any) {
    return <div>
        <Row>
            <Col md={2}>
                <Avatar size="small" src="/images/avatar.png" />
            </Col>
            <Col md={18}>
                <Input.TextArea />
            </Col>
            <Col md={2} offset={2}>
                <Button type="text">
                    <SendOutlined />
                </Button>
            </Col>
        </Row>
    </div>
}

function CommentMenu({comment}: any) {
    const menu = (
        <Menu>
            <Menu.Item>
                <a target="_blank" rel="noopener noreferrer" href="https://www.antgroup.com">
                    Отредактировать
                </a>
            </Menu.Item>
            <Menu.Item>
                <a target="_blank" rel="noopener noreferrer" href="https://www.aliyun.com">
                    Удалить
                </a>
            </Menu.Item>
        </Menu>
    );

    return <Dropdown overlay={menu} placement="bottomLeft" arrow>
        <Button size="small">
            <EllipsisOutlined />
        </Button>
    </Dropdown>;
}

function PostComment({comment}: any) {
    return <div>
        <Row>
            <Col md={2}>
                <Avatar size="small" src="/images/avatar.png" />
            </Col>
            <Col md={20}>
                <Row>
                    <Col md={2}>
                        {comment.fullname}
                    </Col>
                    <Col md={2} offset={20}>
                        <CommentMenu comment={comment} />
                    </Col>
                </Row>
                <Row>
                    <Col md={24}>
                        <Alert message={comment.commentText} type="info" />
                    </Col>
                </Row>
                <Row>
                    <Col md={6} offset={18}>
                        {comment.date}
                    </Col>
                </Row>
            </Col>
        </Row>
        <Row>
            <Divider type="horizontal" style={{margin: '12px 0'}}  />
        </Row>
    </div>;
}

function PostLike({post}: any) {
    let [isLiked, setIsLiked] = useState(post.isLiked);
    let [likes, setLikes] = useState(post.likes);
    let icon = isLiked ? <LikeTwoTone /> : <LikeOutlined />;
    return <div>
        <Button type="text" onClick={() => {
            axios.post('/news/likePost', {
                postId: post.postId,
                isn: 5565
            }).then((res) => {
                setIsLiked(res.data.success);
                setLikes(res.data.success ? likes + 1 : likes - 1);
            });
        }}>
            {icon} {likes} Нравится
        </Button>
    </div>
}

function Post({post}: any) {
    return <div className="p-2 post-entity" style={{
        borderRadius: '20px',
        backgroundColor: '#8080802e',
        marginBottom: '20px',
    }}>
        <Row>
            <Col>
                <Avatar size={64} src="/images/avatar.png" />
            </Col>
            <Col>
                <Row>
                    <Col>
                        {post.fullname}
                    </Col>
                </Row>
                <Row>
                    <Col>
                        {post.date}
                    </Col>
                </Row>
            </Col>
        </Row>
        <Row>
            {post.postText}
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}}  />
        <Row>
            <Col>
                <PostLike post={post}/>
            </Col>
            <Col>
                <Divider type="vertical"  />
            </Col>
            <Col>
                <Button type="text" disabled>
                    <CommentOutlined /> {post.comments.length} комментарии
                </Button>
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}}  />
        <Row>
            <Col md={24} offset={2}>
                {post.comments.map((comment: any, i: number) => <PostComment comment={comment} key={i} />)}
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                <CommentForm post={post}/>
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}}  />
    </div>
}

export function MyCiCNews() {
    return <div>
        <div>
            add post form
        </div>
        <hr/>
        <div>
            <Posts />
        </div>
    </div>
}
//
function Posts() {
    return <PostsAjax lastIndex={null}>
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
