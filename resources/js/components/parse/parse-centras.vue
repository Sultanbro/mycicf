<template>
    <a-table
        :columns="columns" :data-source="oracleData" :row-selection="rowSelection"
        :expanded-row-keys.sync="expandedRowKeys" rowKey="agrempl" :pagination="false">
        <div
            slot="filterDropdown"
            slot-scope="{ setSelectedKeys, selectedKeys, confirm, clearFilters, column }"
            style="padding: 8px"
        >
            <a-input
                v-ant-ref="c => (searchInput = c+ $children)"
                :placeholder="`Search ${column.dataIndex}`"
                :value="selectedKeys[0]"
                style="width: 188px; margin-bottom: 8px; display: block;"
                @change="e => setSelectedKeys(e.target.value ? [e.target.value] : [])"
                @pressEnter="() => handleSearch(selectedKeys, confirm, column.dataIndex)"
            />
            <a-button
                type="primary"
                icon="search"
                size="small"
                style="width: 90px; margin-right: 8px"
                @click="() => handleSearch(selectedKeys, confirm, column.dataIndex)"
            >
                Найти
            </a-button>
            <a-button size="small" style="width: 90px" @click="() => handleReset(clearFilters)">
                Сбросить
            </a-button>
        </div>
        <a-icon
            slot="filterIcon"
            slot-scope="filtered"
            type="search"
            :style="{color: filtered ? '#108ee9' : undefined }"
        />
        <template slot="customRender" slot-scope="text, record, index, column">
      <span v-if="searchText && searchedColumn === column.dataIndex">
        <template
            v-for="(fragment, i) in text
            .toString()
            .split(new RegExp(`(?<=${searchText})|(?=${searchText})`, 'i'))"
        >
          <mark
              v-if="fragment.toLowerCase() === searchText.toLowerCase()"
              :key="i"
              class="highlight"
          >{{ fragment }}</mark
          >
          <template v-else>{{ fragment }}</template>
        </template>
      </span>
            <template v-else>
                {{ text }}
            </template>
        </template>
    </a-table>
</template>
<script>
    const columns = [
        {
            title: 'Департамент',
            dataIndex: "empl_name",
            agrempl: 'agrempl',
            scopedSlots: {
                filterDropdown: 'filterDropdown',
                filterIcon: 'filterIcon',
                customRender: 'customRender',
            },
            onFilter: (value, record) =>
                record.empl_name
                    .toString()
                    .toLowerCase()
                    .includes(value.toLowerCase()),
            onFilterDropdownVisibleChange: visible => {
                if (visible) {
                    setTimeout(() => {
                        this.searchInput.focus();
                    }, 0);
                }
            },
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
                searchText: '',
                searchInput: null,
                searchedColumn: '',
            };
        },
        props: {
            oracleData: Array,
            periods: Object
        },
        methods: {
            handleSearch(selectedKeys, confirm, dataIndex) {
                confirm();
                this.searchText = selectedKeys[0];
                this.searchedColumn = dataIndex;
            },

            handleReset(clearFilters) {
                clearFilters();
                this.searchText = '';
            },
        },
    };
</script>

<style scoped>
    .anticon svg {
        margin-bottom: 5px;
    }
</style>


