import React from 'react';
import {Col, Collapse, Row} from 'antd';
import {Ajax} from '../ajax';
import {authUserIsn} from '../../authUserIsn';
import {SZ, SZEntry} from "./sz";
import {KV, KVEntry} from "./kv";

export interface CoordinationListProps {

}

/**
 * Обходной лист
 *
 * @constructor
 */
function OL() {
    return <div>OL</div>;
}

interface GetCoordinationResponse {
    result: {
        SZ: SZEntry[];
        KV: KVEntry[];
    }
}

export function CoordinationList({}: CoordinationListProps) {
    return <Ajax.POST<GetCoordinationResponse> url="/getCoordinationList" data={{isn: authUserIsn()}}>
        {({response}) => {
            let {result} = response.data;
            return <Row>
                <Col md={24}>
                    <Row>
                        <Col md={24}>
                            <Collapse>
                                <Collapse.Panel key={0} header="Служебные записки">
                                    <SZ data={result.SZ}/>
                                </Collapse.Panel>
                                <Collapse.Panel key={1} header="Согласование КВ по ОГПО">
                                    <KV data={result.KV}/>
                                </Collapse.Panel>
                                <Collapse.Panel key={2} header="Обходной лист"><OL/></Collapse.Panel>
                                <Collapse.Panel key={3} header="Согласование административных дней">...</Collapse.Panel>
                                <Collapse.Panel key={4}
                                                header="Согласование распоряжений на выплату">...</Collapse.Panel>
                                <Collapse.Panel key={5} header="Согласование АС">...</Collapse.Panel>
                                <Collapse.Panel key={6} header="Согласование Правления">...</Collapse.Panel>
                                <Collapse.Panel key={7} header="Прочие документы на согласование">...</Collapse.Panel>
                            </Collapse>
                        </Col>
                    </Row>
                </Col>
            </Row>;
        }}
    </Ajax.POST>;
}
