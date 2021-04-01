import React, {useState} from 'react';
import {Button, Col, Collapse, DatePicker, Divider, Row, Select} from 'antd';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {Ajax} from '../ajax';
import {authUserIsn} from '../../authUserIsn';

export interface DossierProps {

}

let useLocalStorage = createUseLocalStorage('dossier');

export function Dossier({}: DossierProps) {
    let [activeKeys, setActiveKeys] = useLocalStorage<any>('activeKeys', []);

    return <Ajax.POST<any> url="/emplInfo" data={{isn: authUserIsn()}}>
        {({response, refetch}) => {
            let {result} = response.data;
            return <Row>
                <Col md={24}>
                    <Row>
                        <Col md={8}>
                            <DatePicker.RangePicker />
                        </Col>
                        <Col md={6} offset={1}>
                            <Select />
                        </Col>
                        <Col md={6} offset={1}>
                            <Button onClick={() => { refetch() }}>Показать</Button>
                        </Col>
                    </Row>
                    <Divider />
                    <Row>
                        <Col md={24}>
                            <Collapse defaultActiveKey={activeKeys} onChange={(keys) => {
                                setActiveKeys(keys);
                            }}>
                                <Collapse.Panel header="Кадровое перемещение" key="CARIER">
                                    {JSON.stringify(result.CARIER)}
                                </Collapse.Panel>
                                <Collapse.Panel header="Отпуск" key="VACATION">
                                    {JSON.stringify(result.VACATION)}
                                </Collapse.Panel>
                                <Collapse.Panel header="Командировка" key="MISSION">
                                    {JSON.stringify(result.MISSION)}
                                </Collapse.Panel>
                                <Collapse.Panel header="Административные дни" key="ADMINS">
                                    {JSON.stringify(result.ADMINS)}
                                </Collapse.Panel>
                                <Collapse.Panel header="Больничные дни" key="SICK">
                                    {JSON.stringify(result.SICK)}
                                </Collapse.Panel>
                                <Collapse.Panel header="Дисциплинарные взыскания" key="THANKS">
                                    {JSON.stringify(result.THANKS)}
                                </Collapse.Panel>
                            </Collapse>
                        </Col>
                    </Row>
                </Col>
            </Row>
        }}
    </Ajax.POST>
}
