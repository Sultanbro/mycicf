import React from 'react';
import {UserAvatar} from '../UserAvatar';
import {authUserIsn} from '../../authUserIsn';
import {Ajax} from '../ajax';
import {Col, Collapse, Row} from 'antd';

export interface MeProps {

}

interface GetUsersDataResponse {
    response: {
        Name: string;
        Duty: string;
        Birthday: string;
    }
}

export function Me({}: MeProps) {
    return <Row>
        <Col md={24}>
            <UserAvatar size={200} shape="square" isn={authUserIsn()} />
            <Ajax.POST<GetUsersDataResponse> url="/getUsersData" data={{isn: authUserIsn()}}>
                {({response}) => {
                    return <Row>
                        <Col md={24}>
                            <Collapse defaultActiveKey={[]}>
                                <Collapse.Panel header={response.data.response.Name} key="1">
                                    <p>{response.data.response.Duty}</p>
                                    <p>{response.data.response.Birthday}</p>
                                </Collapse.Panel>
                            </Collapse>
                        </Col>
                    </Row>
                }}
            </Ajax.POST>
        </Col>
    </Row>
}
