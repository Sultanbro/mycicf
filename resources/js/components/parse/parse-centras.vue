<template>
<div>
            <ul id="demo" class="config">
                <div class="config__tools">
                    <label for="search" class="search-container">
                        Search
                        <input id="search" class="search-input" type="text" v-model="search" placeholder="Search title.."/>
                    </label>
                    <label><select v-model="typeFilter">
                        <option value="all">All</option>
                        <option value="clients">Clients</option>
                        <option value="sites">Sites</option>
                        <option value="cameras">Camera</option>
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
                    :typeFilter="typeFilter"></tree-folder>
            </ul>
    </div>
</template>


<script>
    export default {
        name: "parse-centras",

        data() {
            return {
                treeData: [{
                    name: 'Агентские выплаты',
                    type: 'ДКС',
                    created: 111,
                    sites: 333,
                    cameras: 2,
                    sum: 777,
                    selected: false,
                    children: [
                        { name: 'Нетто Выплаты', type: 'Управление №1', created: '1000000', cameras: 222250, selected: false },
                        { name: 'Фин. Сборы', type: 'Управление №2', created: '20000000', cameras: 6669850, selected: false },
                        { name: 'ДСД', type: 'Управление №3', created: '7000000', cameras: 668242, selected: false },
                        {
                            name: 'Брутто',
                            type: 'Управление №4',
                            created: '224568',
                            cameras: 65647,
                            selected: false,
                            sum: 8876,
                            children: [
                                {
                                    name: '2456874',
                                    type: 'Калиев',
                                    created: '238874',
                                    active: false,
                                    notifications: 'On',
                                    receiver: 'NVR',
                                    lastAlarm: 'Today',
                                    selected: false
                                },
                                {
                                    name: '77732',
                                    type: 'Салимов',
                                    created: '252577',
                                    active: true,
                                    notifications: 'On',
                                    receiver: 'NVR',
                                    lastAlarm: 'Today',
                                    selected: false
                                }
                            ]}]
                },{
                    name: 'Агентские выплаты',
                    type: 'ДСП',
                    created: '222',
                    sites: 333,
                    cameras: 2,
                    sum: 777,
                    selected: false,
                    children: [
                        { name: 'Site One', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                        { name: 'Site Two', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                        {
                            name: 'Site Three',
                            type: 'site',
                            created: 'Yesterday',
                            cameras: 2,
                            selected: false,
                            children: [
                                {
                                    name: 'Camera One',
                                    type: 'camera',
                                    created: 'yesterday',
                                    active: false,
                                    notifications: 'On',
                                    receiver: 'NVR',
                                    lastAlarm: 'Today',
                                    selected: false
                                },
                                {
                                    name: 'Camera Two',
                                    type: 'camera',
                                    created: 'yesterday',
                                    active: true,
                                    notifications: 'On',
                                    receiver: 'NVR',
                                    lastAlarm: 'Today',
                                    selected: false
                                },
                                {
                                    name: 'Camera Three',
                                    type: 'camera',
                                    created: 'yesterday',
                                    active: true,
                                    notifications: 'On',
                                    receiver: 'NVR',
                                    lastAlarm: 'Today',
                                    selected: false
                                }
                            ]}]
                },{  name: 'Нетто Выплаты',
                    type: 'ДРПО',
                    created: '888',
                    sites: 333,
                    cameras: 2,
                    sum: 888,
                    selected: false,
                    children: [
                        { name: 'Site One', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                        { name: 'Site Two', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                    ]
                },
                    {
                        name: 'Нетто выплаты',
                        type: 'ДП',
                        created: '222',
                        sites: 333,
                        cameras: 2,
                        sum: 999,
                        selected: false,
                        children: [
                            { name: 'Site One', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                            { name: 'Site Two', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                        ]},
                    {
                        name: 'Нетто выплаты',
                        type: 'Филиалы',
                        created: '222',
                        sites: 333,
                        cameras: 2,
                        sum: 999,
                        selected: false,
                        children: [
                            { name: 'Site One', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                            { name: 'Site Two', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                        ]},
                    {
                        name: 'Нетто выплаты',
                        type: 'kupipolis',
                        created: '222',
                        sites: 333,
                        cameras: 2,
                        sum: 999,
                        selected: false,
                        children: [
                            { name: 'Site One', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                            { name: 'Site Two', type: 'site', created: 'Yesterday', cameras: 0, selected: false },
                        ]}
                ],
                search: '',
                options: {},
                typeFilter: 'all'
            }
        },
        created() {
            this.treeData.forEach((d) => {
                d.id = Math.floor(Math.random()*999)+1;
                if(d.children) {
                    d.children.forEach((child) => {
                        child.id = Math.floor(Math.random()*999)+1;
                        if(child.children) {
                            child.children.forEach((childChild) => {
                                childChild.id = Math.floor(Math.random()*999)+1;
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
    String.prototype.contains = function(needle, insensitive){
        insensitive = insensitive || false;
        return (!insensitive ?
                this.indexOf(needle) !== -1 :
                this.toLowerCase().indexOf(needle.toLowerCase()) !== -1
        );
    }
</script>

<style  scoped>
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
</style>
