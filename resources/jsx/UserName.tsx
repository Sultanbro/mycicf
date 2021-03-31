import {Button, Card, Col, Divider, Dropdown, Row, Tooltip, Typography} from 'antd';
import React from 'react';
import {UserAvatar} from './components/UserAvatar';
import {Ajax} from './components/ajax/ajax';

let dossierUrl = (isn: string | number) => `/colleagues/${isn}/dossier`;

export interface UserNameProps {
    isn: string;
    username: string;
}

export function UserName({isn, username}: UserNameProps) {
    return <Dropdown overlay={<Info isn={isn} username={username} />}>
        <a href={dossierUrl(isn)}>
            {username}
        </a>
    </Dropdown>
}

interface InfoProps {
    isn: string;
    username: string;
}

interface GetColleagueDataResponse {
    response: {
        Birthday: string;
        Duty: string;
    }
}

function Info({isn, username}: InfoProps) {
    return <Card style={{width: 600, boxShadow: '0 0 8px #0000003b'}}>
        <Row>
            <Col md={6}>
                <UserAvatar isn={isn} size={128} shape="square" />
            </Col>
            <Col md={18}>
                <Ajax.POST<GetColleagueDataResponse> url="/getColleagueData" data={{isn}} cache>
                    {({response}) => {
                        return <div>
                            <Typography.Title level={4}>
                                {username}
                            </Typography.Title>
                            <Typography.Text>
                                <p>{response.data.response.Birthday}</p>
                            </Typography.Text>
                            <Typography.Text>
                                <p>{response.data.response.Duty}</p>
                            </Typography.Text>
                        </div>
                    }}
                </Ajax.POST>
            </Col>
        </Row>
        <Row>
            <Divider />
            <Button href={dossierUrl(isn)}>
                <i className="far fa-clipboard" /> Досье
            </Button>
        </Row>
    </Card>;
}
