import React from 'react';
import {Col, Row, Typography} from 'antd';
import {Ajax} from '../ajax';
import {authUserIsn} from '../../authUserIsn';

export interface CoordinationListProps {

}

export function CoordinationList({}: CoordinationListProps) {
    return <Ajax.POST url="/getCoordinationList" data={{isn: authUserIsn()}}>
        {({ response }) => {
            return <Row>
                <Col>
                    <Row>
                        <Col>
                            <Typography.Title>Служебные записки</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Согласование КВ по ОГПО</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Обходной лист</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Согласование административных дней</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Согласование распоряжений на выплату</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Согласование АС</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Согласование Правления</Typography.Title>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Typography.Title>Прочие документы на согласование</Typography.Title>
                        </Col>
                    </Row>
                </Col>
            </Row>
        }}
    </Ajax.POST>
}
