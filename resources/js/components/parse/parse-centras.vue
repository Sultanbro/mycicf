<template>
    <a-table
        :columns="columns"
        :data-source="oracleData"
        :row-selection="rowSelection"
        :expanded-row-keys.sync="expandedRowKeys"
        rowKey="id"
        />
</template>
<script>
    const columns = [
        {
            title: 'Департамент',
            dataIndex: "empl_name",
            id: 'id',
        },
        {
            title: 'Брутто Премии',
            dataIndex: 'brutto_prem',
            id: 'id',
        },
        {
            title: 'ДСД',
            dataIndex: 'dsd',
            id: 'id',
        },
        {
            title: 'АВ/Рейтинг',
            dataIndex: 'comission_and_rating',
            id: 'id',
        },
        {
            title: 'Брутто Выплаты',
            dataIndex: 'total_refund_sum',
            id: 'id',
        },
        {
            title: 'Нетто Выплаты',
            dataIndex: 'netto_refund_sum',
            id: 'id',
        },
    ];

    const rowSelection = {
        onChange: (selectedRowKeys, selectedRows) => {
            console.log(`selectedRowKeys: ${selectedRowKeys}`, 'selectedRows: ', selectedRows);
        },
        onSelect: (record, selected, selectedRows) => {
            console.log(record, selected, selectedRows);
        },
        onSelectAll: (selected, selectedRows, changeRows) => {
            console.log(selected, selectedRows, changeRows);
        },
    };

    export default {
        name:'parse-centras',
        data() {
            return {
                columns,
                rowSelection,
                expandedRowKeys: [],
            };
        },
        props: {
            oracleData: Array,
        }
    };
</script>




