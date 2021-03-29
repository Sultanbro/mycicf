import {Button, Col, Divider, Row, Tag, Typography} from 'antd';
import React from 'react';
import {authUserIsn} from '../../authUserIsn';
import { Ajax } from '../ajax/ajax';
import {PostEntity} from '../ajax/types';

interface PostPollProps {
    post: PostEntity;
}

export function PostPoll({post}: PostPollProps) {
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
                    {post.post_poll.answers ? post.post_poll.answers.map((answer, ) => {
                        if (post.isVoted) {
                            return <Button type="text" block key={answer.answer_id}>
                                <pre>
                                    За <b>{answer.answer_title}</b> проголосовало: <b>{answer.answer_votes}</b>
                                </pre>
                            </Button>
                        }

                        return <Ajax.Button key={answer.answer_id}
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
                            {answer.answer_title}
                        </Ajax.Button>;
                    }) : null}
                    <Divider />
                </Col>
            </Row>
        </Col>
    </Row>
}
