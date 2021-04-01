import React, {useState} from 'react';
import {LeftOutlined, RightOutlined} from '@ant-design/icons';
import {Col, Row, Typography, Button, Divider} from 'antd';
import {UserAvatar} from '../UserAvatar';
import {Ajax} from '../ajax';

const monthNames = {
    1: 'Январь',
    2: 'Февраль',
    3: 'Март',
    4: 'Апрель',
    5: 'Май',
    6: 'Июнь',
    7: 'Июль',
    8: 'Август',
    9: 'Сентябрь',
    10: 'Октябрь',
    11: 'Ноябрь',
    12: 'Декабрь'
};

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
    return <Row justify="center" align="middle">
        <Col md={24}>
            <Row justify="center" align="middle">
                <Col md={6} className="jc-center d-flex width50 events-window-size relative">
                    <UserAvatar isn={entry.kias_id as any} shape="square" size={100} />
                    <img alt=""
                         src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif"
                         className="absolute width100 height100"
                    />
                </Col>
            </Row>
            <Row>
                <Col md={24} className="text-center">
                    {entry.fullname}
                </Col>
            </Row>
        </Col>
        <Divider />
    </Row>
}

export function Birthdays() {
    let [index, setIndex] = useState(0);
    return <Ajax.GET<BirthdaysResponse> url="/getBirthdays2" cache>
        {({response, refetch}) => {
            let keys = Object.keys(response.data);
            let date = keys[index];
            if (!date) {
                setIndex((0));
                return;
            }

            let users = response.data[date];

            let [day, month] = date.split('-').map(el => parseInt(el));

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
                        {day} {(monthNames as any)[month]}
                    </Typography.Title>
                    {users.map((entry, index) => {
                        return <Entry entry={entry} key={index} />
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
