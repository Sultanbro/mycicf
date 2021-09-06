<template>
    <a-table
        :columns="columns"
        :data-source="oracleData"
        :row-selection="rowSelection"
        :expanded-row-keys.sync="expandedRowKeys"
        rowKey="agrempl"
        />
</template>
<script>
    const columns = [
        {
            title: 'Департамент',
            dataIndex: "empl_name",
            agrempl: 'agrempl',
        },
        {
            title: 'Брутто Премии',
            dataIndex: 'brutto_prem',
            agrempl: 'agrempl',
        },
        {
            title: 'ДСД',
            dataIndex: 'dsd',
            agrempl: 'agrempl',
        },
        {
            title: 'АВ/Рейтинг',
            dataIndex: 'comission_and_rating',
            agrempl: 'agrempl',
        },
        {
            title: 'Брутто Выплаты',
            dataIndex: 'total_refund_sum',
            agrempl: 'agrempl',
        },
        {
            title: 'Нетто Выплаты',
            dataIndex: 'netto_refund_sum',
            agrempl: 'agrempl',
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
            periods: Object
        }
    };
</script>




