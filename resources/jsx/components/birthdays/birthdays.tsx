import React, {useState} from 'react';
import {LeftOutlined, RightOutlined} from '@ant-design/icons';
import {Carousel, Col, Row, Image, Typography, Button, Divider} from 'antd';
import {UserAvatar, UserPhoto} from '../UserAvatar';
import {Ajax, AjaxProps} from '../ajax/ajax';

interface BirthdayEntry {
    id: number;
    birthday: string;
    kias_id: number | string;
    fullname: string;
}

interface BirthdaysResponse {
    [birthday: string]: BirthdayEntry[];
}

function Entry({entry}: { entry: BirthdayEntry }) {
    return <div>
        <Row>
            <Col md={24}>
                <UserPhoto isn={entry.kias_id} />
            </Col>
        </Row>
        <Row>
            <Col md={24}>
                <Typography.Title level={2}>
                    {entry.fullname}
                </Typography.Title>
            </Col>
        </Row>
    </div>
}

export function Birthdays() {
    let [index, setIndex] = useState(0);
    return <Ajax.GET<BirthdaysResponse> url="/getBirthdays2">
        {({response, refetch}) => {
            let keys = Object.keys(response.data);
            let date = keys[index];
            if (!date) {
                setIndex((0));
                return;
            }

            let users = response.data[date];

            return <Row>
                <Col md={4}>
                    <Button style={{height: '100%'}}
                            type="text"
                            onClick={() => {
                                setIndex(index - 1);
                            }}
                            disabled={index === 0}
                    >
                        <LeftOutlined />
                    </Button>
                </Col>
                <Col md={16}>
                    <Typography.Title level={4} className="text-center">
                        {date}
                    </Typography.Title>
                    {users.map((user, index) => {
                        return <Row justify="center" align="middle">
                            <Col md={24} key={index}>
                                <Row justify="center" align="middle">
                                    <Col md={6}>
                                        <UserAvatar isn={user.kias_id as any} />
                                    </Col>
                                </Row>
                                <Row>
                                    <Col md={24} className="text-center">
                                        {user.fullname}
                                    </Col>
                                </Row>
                            </Col>
                            <Divider />
                        </Row>
                    })}
                </Col>
                <Col md={4}>
                    <Button style={{height: '100%'}}
                            type="text"
                            onClick={() => {
                                setIndex(index + 1);
                            }}
                            disabled={index === keys.length - 1}>
                        <RightOutlined />
                    </Button>
                </Col>
            </Row>
        }}
    </Ajax.GET>
}
