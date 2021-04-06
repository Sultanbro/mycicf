import React from "react";
import {Table} from "antd";

export interface KVEntry {
    DeptName: string;
    ISN: string;
    curator: string;
    docdate: string;
    empl: string;
    id: string;
}

interface KVProps {
    data: KVEntry[];
}

/**
 * Согласование КВ по ОГПО
 *
 */
export function KV({data}: KVProps) {
    return <Table<KVEntry>
        columns={[
            {
                title: 'Номер документа',
                dataIndex: 'id',
                key: 'id',
            },
            {
                title: 'Инициатор',
                dataIndex: 'curator',
                key: 'curator',
            },
            {
                title: 'Подразделение',
                dataIndex: 'DeptName',
                key: 'DeptName',
            },
            {
                title: 'ФИО Агента',
                dataIndex: 'empl',
                key: 'empl',
            },
            {
                title: 'Дата',
                dataIndex: 'docdate',
                key: 'docdate',
            }
        ]}
        dataSource={data}
    />;
}
