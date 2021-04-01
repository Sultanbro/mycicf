import React, {ChangeEvent} from 'react';
import {Col, DatePicker, Divider, Input, Row} from 'antd';
import {LoadingOutlined} from '@ant-design/icons';
import debounce from 'lodash/debounce';
import {Ajax} from '../ajax';
import moment from 'moment';

type Dispatch<T> = React.Dispatch<React.SetStateAction<T>>;

export interface SearchBoxProps {
    loading: boolean;
    setSearchQuery: Dispatch<string>;
    search: (li?: number | null, query?: string) => void;
    dateRange: any[];
}

interface DateValidRangesResult {
    start: string;
    end: string;
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

                    search(null, e.target.value);
                }, 500)}
            />
        </Col>
        <Col md={8}>
            <Ajax.POST<DateValidRangesResult>
                url="/news/getDateValidRanges"
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
            </Ajax.POST>
        </Col>
        <Divider />
    </Row>;
}
