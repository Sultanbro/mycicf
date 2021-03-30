import React from 'react';
import {Button, Col, Collapse, DatePicker, Divider, Row, Select} from 'antd';

export interface DossierProps {

}

export function Dossier({}: DossierProps) {
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
                    <Button>Показать</Button>
                </Col>
            </Row>
            <Divider />
            <Row>
                <Col md={24}>
                    <Collapse>
                        <Collapse.Panel header="Кадровое перемещение" key="CARIER">
                            ...
                        </Collapse.Panel>
                        <Collapse.Panel header="Отпуск" key="VACATION">
                            ...
                        </Collapse.Panel>
                        <Collapse.Panel header="Командировка" key="MISSION">
                            ...
                        </Collapse.Panel>
                        <Collapse.Panel header="Административные дни" key="KP">
                            ...
                        </Collapse.Panel>
                        <Collapse.Panel header="Больничные дни" key="SICK">
                            ...
                        </Collapse.Panel>
                        <Collapse.Panel header="Дисциплинарные взыскания" key="KP">
                            ...
                        </Collapse.Panel>
                    </Collapse>
                </Col>
            </Row>
        </Col>
    </Row>
}
