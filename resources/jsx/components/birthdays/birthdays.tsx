import React from 'react';
import {Carousel, Col, Row, Image, Typography} from 'antd';
import {Ajax, AjaxProps} from '../../ajax';
import {UserAvatar, UserPhoto} from '../UserAvatar';

interface BirthdayEntry {
    ISN: string;
    birthday: string
    dept: string
    duty: string
    fakeImage: boolean
    fullname: string
    similar: any[]
}

interface BirthdaysResponse {
    birthdays: BirthdayEntry[];
}

function Entry({entry}: { entry: BirthdayEntry }) {
    return <div>
        <Row>
            <Col md={24}>
                <UserPhoto isn={entry.ISN} />
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
    let BirthdaysAjax = (props: AjaxProps<BirthdaysResponse>) =>
        <Ajax.POST<BirthdaysResponse> url="/getBirthdays"  {...props} />

    return <BirthdaysAjax data={{}}>
        {({response, refetch}) => {
            return <Carousel>
                {response.data.birthdays.map((entry, i) => <Entry entry={entry} key={i}/>)}
            </Carousel>
        }}
    </BirthdaysAjax>
}
