import {Col, DatePicker, Divider, Input, Row} from 'antd';
import {LoadingOutlined} from '@ant-design/icons';
import debounce from 'lodash/debounce';
import React, {ChangeEvent} from 'react';
import {Ajax} from '../ajax/ajax';
import moment from 'moment';

type Dispatch<T> = React.Dispatch<React.SetStateAction<string>>;

export interface SearchBoxProps {
    loading: boolean;
    setSearchQuery: Dispatch<string>;
    search: (li?: number | null) => void;
    dateRange: any[];
}

export function SearchBox({loading, setSearchQuery, search, dateRange}: SearchBoxProps) {
    return <Row>
        <Col md={14}>
            <Input
                suffix={loading ? <LoadingOutlined /> : null}
                placeholder="Поиск новостей..."
                allowClear
                onChange={debounce<(e: ChangeEvent<HTMLInputElement>) => void>((e) => {
                    setSearchQuery(e.target.value);

                    search();
                }, 500)}
            />
        </Col>
        <Col md={8}>
            <Ajax<{ start: string, end: string }>
                url="/news/getDateValidRanges"
                method="POST"
                cache
                loading={<div style={{width: 600}}>
                    <Row>
                        <Col md={12}>
                            <DatePicker.RangePicker
                                disabled
                                placeholder={["", ""]} />
                        </Col>
                    </Row>
                </div>}>
                {({response}) => {
                    let defaultValue: any = [moment(response.data.start), moment(response.data.end)];
                    return <div style={{width: 600}}>
                        <Row>
                            <Col md={12}>
                                <DatePicker.RangePicker
                                    defaultValue={dateRange.length > 0 ? dateRange : defaultValue}
                                    placeholder={["", ""]}
                                    allowClear
                                />
                            </Col>
                        </Row>
                    </div>;
                }}
            </Ajax>
        </Col>
        <Divider />
    </Row>;
}
