<!--<template>
    <div>
        <ul id="demo" class="config">
            <div class="config__tools">
                <label for="search" class="search-container">
                    Search
                    <input id="search" class="search-input" type="text" v-model="search" placeholder="Search title.."/>
                </label>
                <label><select v-model="typeFilter">
                    <option value="all">Все</option>
                    <option value="clients">Департамент</option>
                    <option value="sites">Управление</option>
                    <option value="cameras">Менеджер</option>
                </select></label>
            </div>

            <tree-folder
                v-for="(model, index) in filteredList"
                :key="index"
                :index="index"
                :model="model"
                :options="options"
                :list="model.children"
                :search="search"
                :typeFilter="typeFilter"
                :oracleData = "oracleData"></tree-folder>
        </ul>
    </div>
</template>


<script>
    export default {
        name: "parse-centras",
        props: {
            oracleData: Object,
        },
        data() {
            return {
                treeData: [{
                    //1й Деп
                    type: 'dept', name: 'ДКС', product: 'Агентские выплаты',
                    fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                    children: [
                        {
                            type: 'admin',
                            name: 'Управление №1',
                            product: 'Нетто Выплаты',
                            fees: 1000000,
                            AV: 222250,
                            payments: 233412,
                            KV: 2123324,
                            selected: false,
                            children: [
                                {
                                    type: 'manager',
                                    name: 'Калиев',
                                    product: '???',
                                    fees: 238874,
                                    AV: 78946,
                                    payments: 764864,
                                    KV: 87648,
                                    selected: false,
                                    active: false
                                },
                                {
                                    type: 'manager',
                                    name: 'Салимов',
                                    product: '???',
                                    fees: 238874,
                                    AV: 78946,
                                    payments: 764864,
                                    KV: 87648,
                                    selected: false, active: false
                                },
                            ]
                        },
                        {
                            type: 'admin',
                            name: 'Управление №2',
                            product: 'ДСД',
                            fees: 1000000,
                            AV: 222250,
                            payments: 233412,
                            KV: 2123324,
                            selected: false,
                            children: [
                                {
                                    type: 'manager',
                                    name: 'Лисина',
                                    product: '???',
                                    fees: 238874,
                                    AV: 78946,
                                    payments: 764864,
                                    KV: 87648,
                                    selected: false,
                                    active: false
                                },
                                {
                                    type: 'manager', name: 'Байбориев', product: '???',
                                    fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                },
                            ]
                        },
                        {
                            type: 'admin', name: 'Управление №3', product: 'Нетто Выплаты',
                            fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                            children: [
                                {
                                    type: 'manager', name: 'Демчук', product: '???',
                                    fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                },
                                {
                                    type: 'manager', name: 'Салимова', product: '???',
                                    fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                },
                            ]
                        },
                        {
                            type: 'admin', name: 'Управление №4', product: 'Нетто Выплаты',
                            fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                            children: [
                                {
                                    type: 'manager', name: 'Сакенов', product: '???',
                                    fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                },
                                {
                                    type: 'manager', name: 'Уроборос', product: '???',
                                    fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                },
                            ]
                        },
                    ],
                },
                    {
                        //2й Деп
                        type: 'dept', name: 'ДСП', product: 'Агентские выплаты',
                        fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                        children: [
                            {
                                type: 'admin',
                                name: 'Управление №1',
                                product: 'Нетто Выплаты',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Калиев',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager',
                                        name: 'Салимов',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin',
                                name: 'Управление №2',
                                product: 'ДСД',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Лисина',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager', name: 'Байбориев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №3', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Демчук', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимова', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №4', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Калиев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимов', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                        ],
                    },
                    {
                        //3й Деп
                        type: 'dept', name: 'ДРПО', product: 'Агентские выплаты',
                        fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                        children: [
                            {
                                type: 'admin',
                                name: 'Управление №1',
                                product: 'Нетто Выплаты',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Калиев',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager',
                                        name: 'Салимов',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin',
                                name: 'Управление №2',
                                product: 'ДСД',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Лисина',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager', name: 'Байбориев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №3', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Демчук', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимова', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №4', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Калиев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимов', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                        ],
                    },
                    {
                        //4й Деп
                        type: 'dept', name: 'ДП', product: 'Агентские выплаты',
                        fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                        children: [
                            {
                                type: 'admin',
                                name: 'Управление №1',
                                product: 'Нетто Выплаты',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Калиев',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager',
                                        name: 'Салимов',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin',
                                name: 'Управление №2',
                                product: 'ДСД',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Лисина',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager', name: 'Байбориев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №3', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Демчук', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимова', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №4', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Калиев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимов', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                        ],
                    },
                    {
                        //5й Деп
                        type: 'dept', name: 'Филиалы', product: 'Агентские выплаты',
                        fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                        children: [
                            {
                                type: 'admin',
                                name: 'Управление №1',
                                product: 'Нетто Выплаты',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Калиев',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager',
                                        name: 'Салимов',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin',
                                name: 'Управление №2',
                                product: 'ДСД',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Лисина',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager', name: 'Байбориев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №3', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Демчук', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимова', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №4', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Калиев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимов', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                        ],
                    },
                    {
                        //6й Деп
                        type: 'dept', name: 'kupipolis', product: 'Агентские выплаты',
                        fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                        children: [
                            {
                                type: 'admin',
                                name: 'Управление №1',
                                product: 'Нетто Выплаты',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Калиев',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager',
                                        name: 'Салимов',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin',
                                name: 'Управление №2',
                                product: 'ДСД',
                                fees: 1000000,
                                AV: 222250,
                                payments: 233412,
                                KV: 2123324,
                                selected: false,
                                children: [
                                    {
                                        type: 'manager',
                                        name: 'Лисина',
                                        product: '???',
                                        fees: 238874,
                                        AV: 78946,
                                        payments: 764864,
                                        KV: 87648,
                                        selected: false,
                                        active: false
                                    },
                                    {
                                        type: 'manager', name: 'Байбориев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №3', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Демчук', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимова', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                            {
                                type: 'admin', name: 'Управление №4', product: 'Нетто Выплаты',
                                fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                                children: [
                                    {
                                        type: 'manager', name: 'Калиев', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                    {
                                        type: 'manager', name: 'Салимов', product: '???',
                                        fees: 238874, AV: 78946, payments: 764864, KV: 87648, selected: false, active: false
                                    },
                                ]
                            },
                        ],
                    },
                    {
                        //6й Деп
                        type: 'dept', name: 'Итог', product: 'Агентские выплаты',
                        fees: 1000000, AV: 222250, payments: 233412, KV: 2123324, selected: false,
                    },
                ],
                search: '',
                options: {},
                typeFilter: 'all'
            }
        },
        created() {
            this.treeData.forEach((d) => {
                d.id = Math.floor(Math.random() * 999) + 1;
                if (d.children) {
                    d.children.forEach((child) => {
                        child.id = Math.floor(Math.random() * 999) + 1;
                        if (child.children) {
                            child.children.forEach((childChild) => {
                                childChild.id = Math.floor(Math.random() * 999) + 1;
                            });
                        }
                    });
                }
            });
            document.body.addEventListener('click', () => {
                for (const option in this.options) {
                    this.$set(this.options, option, false);
                }
            })
        },
        methods: {
            toggleOptions(index) {
                for (const option in this.options) {
                    if (option != index) {
                        this.$set(this.options, option, false);
                    }
                }
                this.$set(this.options, index, true)
            },
        },
        computed: {
            filteredList() {
                return this.treeData.filter(topBranch => {
                    if (topBranch.children) {
                        return topBranch.children.filter(childBranch => {
                            if (childBranch.children) {
                                return childBranch.children.filter(childsChildBranch => {
                                    return childsChildBranch.name.contains(this.search, true);
                                })
                            }
                            return childBranch.name.contains(this.search, true);
                        })
                    }
                    return topBranch.name.contains(this.search, true);
                })
            }
        }
    }
    String.prototype.contains = function (needle, insensitive) {
        insensitive = insensitive || false;
        return (!insensitive ?
                this.indexOf(needle) !== -1 :
                this.toLowerCase().indexOf(needle.toLowerCase()) !== -1
        );
    }
</script>

<style scoped>
    .search-container {
        display: flex;
        flex-flow: column;
        max-width: 20rem;
    }

    .search-input {
        border-radius: 3px;
        border: 0;
        background: #3C4D58;
        border-radius: 5px;
        font-size: 0.9rem;
        color: #C5CFD6;
        padding: 0.5rem 1rem;
        margin: 0.5rem 0;
    }

    .config {
        color: #C5CFD6;
        padding: 1rem;
        list-style: none;
        min-width: 52rem;
        background: #2D3C47;
        box-sizing: border-box;
    }

    .config *, .config *:before, .config *:after {
        box-sizing: inherit;
    }

    .config__tools {
        padding: 0.5rem;
    }
</style>-->

<template>
    <div class="bg-white mt-4 pl-3 pr-3 box-shadow border-16">
        <a-table
            :columns="columns"
            :data-source="oracleData"
            :row-selection="rowSelection"
            :expanded-row-keys.sync="expandedRowKeys"
        />
    </div>
</template>

<script>
    export default {
        props: {
            oracleData: Array,
        },

        data() {
            return {
                expandedRowKeys: [],
                columns: [
                    {
                        title: 'Департамент',
                        dataIndex: 'emplName',
                        key: 'title1',
                    },
                    {
                        title: 'ДСД',
                        dataIndex: 'DSD',
                        key: 'title2',
                    },
                    {
                        title: 'Исполнение',
                        dataIndex: 'isn',
                        key: 'title4',
                    },
                    {
                        title: 'АВ',
                        dataIndex: 'comissionProc',
                        key: 'title3',
                    },
                    {
                        title: 'Нетто Выплаты',
                        dataIndex: 'nettoRefundSum',
                        key: 'title6',
                    },
                    {
                        title: 'КВ',
                        dataIndex: 'totalRefundSum',
                        key: 'title5',
                    },
                ],
                rowSelection: {
                    onChange: (selectedRowKeys, selectedRows) => {
                        console.log(`selectedRowKeys: ${selectedRowKeys}`, 'selectedRows: ', selectedRows);
                    },
                    onSelect: (record, selected, selectedRows) => {
                        console.log(record, selected, selectedRows);
                    },
                    onSelectAll: (selected, selectedRows, changeRows) => {
                        console.log(selected, selectedRows, changeRows);
                    },
                },



            }
        },
        methods: {

        }
    }
</script>


<style>
    .ant-spin-nested-loading {
        margin-top: 20px;
    }
    .ant-table-thead > tr > th {
        text-align: center;
        background: #f1f4f7;
        border-top: 1px solid #dee2e6;
        border-right: 1px dashed #3c6ccc;
    }
    .ant-table-thead > tr:first-child > th:last-child {
        border-right: 0px;
    }
    .ant-table-row-cell-last {

    }

</style>
