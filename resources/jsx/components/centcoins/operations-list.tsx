import React, {useState} from 'react';
import moment from 'moment';
import {EyeOutlined} from '@ant-design/icons';
import {Button, Col, DatePicker, Divider, Row, Table} from 'antd';
import {Ajax} from '../ajax/ajax';
import {authUserIsn} from '../../authUserIsn';

export interface CentcoinOperationsListProps {

}

interface CentcoinHistoryEntry {
    id: number;
    description: string;
    quantity: number;
    total: number;
    type: string;
}

export function CentcoinOperationsList({}: CentcoinOperationsListProps) {
    let [dateBeg, setDateBeg] = useState<any>(moment().startOf('year'));
    let [dateEnd, setDateEnd] = useState<any>(moment().endOf('year'));

    const columns = [
        {
            title: '#',
            dataIndex: 'id',
            key: 'id',
        },
        {
            title: 'Вид',
            dataIndex: 'type',
            key: 'type',
        },
        {
            title: 'Описание',
            dataIndex: 'description',
            key: 'description',
        },
        {
            title: 'Количество',
            dataIndex: 'quantity',
            key: 'quantity',
        },
    ];

    return <Ajax.POST<CentcoinHistoryEntry[]> url="/getOperationsList" data={{
        dateBeg: dateBeg.toISOString(),
        dateEnd: dateEnd.toISOString(),
        isn: authUserIsn()
    }}>
        {({response, refetch}) => {
            return <Row>
                <Col md={24}>
                    <Row>
                        <Col md={14}>
                            <DatePicker.RangePicker
                                onChange={(value) => {
                                    if (!value) {
                                        return;
                                    }
                                    setDateBeg(value[0]);
                                    setDateEnd(value[1]);
                                }}
                                value={[dateBeg, dateEnd]}
                                placeholder={["", ""]} />
                        </Col>
                        <Col md={10}>
                            <Button
                                icon={<EyeOutlined />}
                                onClick={() => {
                                refetch();
                            }}>Показать</Button>
                        </Col>
                    </Row>
                    <Row>
                        <Col md={24}>
                            <Divider />
                        </Col>
                    </Row>
                    <Row>
                        <Col md={24}>
                            <Table<CentcoinHistoryEntry> columns={columns} dataSource={response.data} />;
                        </Col>
                    </Row>
                </Col>
            </Row>
        }}
    </Ajax.POST>
}
