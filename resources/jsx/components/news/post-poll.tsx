import {Col, Divider, List, Row, Tag, Typography} from 'antd';
import React from 'react';
import {Ajax} from '../ajax/ajax';
import {PostEntity} from '../ajax/types';
import {authUserIsn} from '../../authUserIsn';

interface PostPollProps {
    post: PostEntity;
}

export function PostPoll({post}: PostPollProps) {
    let list = <List
        dataSource={post.post_poll.answers}
        renderItem={answer => <List.Item style={{ padding: '5px 5px'}}>
            <Ajax.Button key={answer.answer_id}
                         url="/news/vote"
                         method="POST"
                         type="default"
                         data={{
                             answerId: answer.answer_id,
                             isn: authUserIsn(),
                             questionId: post.post_poll.question_id
                         }}
                         onSuccess={() => {

                         }}
                         block>
                <pre>
                    За <b>{answer.answer_title}</b> проголосовало: <b>{answer.answer_votes}</b>
                </pre>
            </Ajax.Button>
        </List.Item>}
    />;
    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Typography.Title level={3}>
                        {post.post_poll.question_title}
                    </Typography.Title>
                    <Typography.Text>
                        Проголосовало: <Tag>{post.post_poll.total_votes}</Tag>
                    </Typography.Text>
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <Divider />
                    {post.post_poll.answers ? list : null}
                    <Divider />
                </Col>
            </Row>
        </Col>
    </Row>
}
