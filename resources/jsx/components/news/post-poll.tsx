import {Col, Divider, List, Progress, Row, Tag, Typography} from 'antd';
import React, {useState} from 'react';
import {Ajax} from '../ajax/ajax';
import {PostEntity, PostPollAnswer} from '../ajax/types';
import {authUserIsn} from '../../authUserIsn';

interface PostPollProps {
    post: PostEntity;
}

export function PostPoll({post}: PostPollProps) {
    let [voted, setVoted] = useState(post.isVoted);
    let answerVotesCount = post.post_poll.answers.reduce((a, b) => a + b.answer_votes, 0);
    let button = (answer: PostPollAnswer) =>
        <Ajax.Button key={answer.answer_id}
                     url="/news/vote"
                     method="POST"
                     type="default"
                     data={{
                         answerId: answer.answer_id,
                         isn: authUserIsn(),
                         questionId: post.post_poll.question_id,
                     }}
                     onSuccess={() => {
                         setVoted(true);
                     }}
                     block>
            {answer.answer_title}
        </Ajax.Button>

    let progressBar = (answer: PostPollAnswer) => <Row style={
        {width: '100%'}
    }>
        <Col md={24}>
            <Progress
                percent={(answer.answer_votes / answerVotesCount) * 100}
            />
            За <b>{answer.answer_title}</b> проголосовало: <b>{answer.answer_votes}</b>
        </Col>
    </Row>;

    let list = <List
        dataSource={post.post_poll.answers}
        renderItem={answer => <List.Item style={{padding: '5px 5px'}}>
            {voted ? progressBar(answer) : button(answer)}
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
