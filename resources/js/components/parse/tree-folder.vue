<template>
        <li class="item">
            <ul class="client-headings" v-if="model.type !== 'manager' && index === 0">
                <li v-if="model.type !== 'dept'">
                    <span class="straight-line"><svg width="2" height="50" viewBox="0 0 2 50" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 15h20v20H0z"/>
                            <path stroke="#5BA2D4" fill="#D8D8D8" d="M.5.5h1v49h-1z"/>
                            <path d="M20 24v2H0v-2z"/></g></svg></span>
                </li>

                <li class="client-headings__heading client-headings__heading--select"></li>
                <li v-if="model.type === 'dept'" class="client-headings__heading">Департамент</li>
                <li v-if="model.type === 'admin'" class="client-headings__heading">Управление</li>
<!--                <li v-if="model.type === 'manager'" class="client-headings__heading">Менеджер</li>-->
                <li v-if="model.type === 'dept'" class="client-headings__heading">ДСД</li>
                <li v-if="model.type === 'dept'" class="client-headings__heading">Исполнение %</li>
                <li v-if="model.type === 'dept'" class="client-headings__heading">АВ</li>
                <li v-if="model.type === 'dept'" class="client-headings__heading">Выплаты</li>
                <li v-if="model.type === 'dept'" class="client-headings__heading">КВ %</li>

                <li class="client-headings__heading client-headings__heading--options"></li>
            </ul>

            <ul class="client-headings" v-if="model.type === 'manager' && index === 0">
                <li>
                    <span class="straight-line"><svg width="2" height="50" viewBox="0 0 2 50" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 15h20v20H0z"/>
                            <path stroke="#5BA2D4" fill="#D8D8D8" d="M.5.5h1v49h-1z"/>
                            <path d="M20 24v2H0v-2z"/></g></svg></span>
                </li>
                <li>
                    <span class="straight-line straight-line--second">
                        <svg width="2" height="50" viewBox="0 0 2 50" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                            <path d="M0 15h20v20H0z"/>
                            <path stroke="#5BA2D4" fill="#D8D8D8" d="M.5.5h1v49h-1z"/>
                            <path d="M20 24v2H0v-2z"/></g></svg></span>
                </li>

                <li class="client-headings__heading client-headings__heading--select"></li>
                <li class="client-headings__heading">Менеджер</li>
                <li class="client-headings__heading">ДСД</li>
                <li class="client-headings__heading">Исполнение %</li>
                <li class="client-headings__heading">АВ</li>
                <li class="client-headings__heading">Выплаты</li>
                <li class="client-headings__heading">КВ %</li>
                <li class="client-headings__heading client-headings__heading--options"></li>
            </ul>

            <div
                class="child"
                v-bind:class="{'child--hasChildren': hasChildren}"
            >
                <span class="straight-line"><svg width="2" height="50" viewBox="0 0 2 50" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 15h20v20H0z"/><path stroke="#5BA2D4" fill="#D8D8D8" d="M.5.5h1v49h-1z"/><path d="M20 24v2H0v-2z"/></g></svg></span>

                <span class="line">
      <svg width="20" height="50" viewBox="0 0 20 50" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 15h20v20H0z"/><path stroke="#5BA2D4" fill="#D8D8D8" d="M.5.5h1v49h-1z"/><path stroke="#5BA2D4" fill="#D8D8D8" d="M19.5 24.5v1H.5v-1z"/></g></svg>
    </span>
                <span @click="toggle" class="arrow" v-if="hasChildren" v-bind:class="{ 'arrow--isActive': open }">
        <svg width="10" height="14" viewBox="0 0 10 14" xmlns="http://www.w3.org/2000/svg"><path d="M10.1111 7l-10 6.1111V.889z" fill="#5BA2D4" fill-rule="nonzero"/></svg>
      </span>
                <ul class="content">
                    <li class="content__item content__item--select">
                        <input @change="select(model)" :checked="model.selected" class="content__check" type="checkbox" :name="model.name" v-model="model.selected"/><br>
                    </li>
                    <li class="content__item">{{ model.name }}</li>
                    <li class="content__item">{{ model.product }}</li>
                    <li class="content__item">{{ model.fees }}</li>
                    <li v-if="model.AV >= 0" class="content__item">{{ model.AV }}</li>
                    <li v-if="model.payments >= 0" class="content__item">{{ model.payments }}</li>
                    <li v-if="model.KV >= 0" class="content__item">{{ model.KV }}</li>
                    <li v-if="model.lastAlarm" class="content__item" :class="statusColor(model.active)">{{ model.active }}</li>
                    <li v-if="model.notifications" class="content__item">{{ model.notifications }}</li>
                    <li v-if="model.receiver" class="content__item">{{ model.receiver }}</li>
                    <li v-if="model.lastAlarm" class="content__item">{{ model.lastAlarm }}</li>
                    <li @click.stop="optionToggle(model.id)" class="content__item content__item--options">
                        <svg width="5" height="15" viewBox="0 0 5 22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.8889c-1.3807 0-2.5-1.0944-2.5-2.4445C0 1.0944 1.1193 0 2.5 0S5 1.0944 5 2.4444c0 1.35-1.1193 2.4445-2.5 2.4445zm0 8.5555C1.1193 13.4444 0 12.35 0 11c0-1.35 1.1193-2.4444 2.5-2.4444S5 9.65 5 11c0 1.35-1.1193 2.4444-2.5 2.4444zM2.5 22C1.1193 22 0 20.9056 0 19.5556c0-1.35 1.1193-2.4445 2.5-2.4445S5 18.2055 5 19.5556C5 20.9056 3.8807 22 2.5 22z" fill="#B5C0C7" fill-rule="nonzero"/></svg>
                    </li>
                </ul>

                <div @click.stop class="options" v-if="options[model.id]">
                    <ul class="options__list">
                        <li class="options__item">
                            <a class="options__link">Options</a>
                        </li>
                        <li class="options__item">
                            <a class="options__link">Configure</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="child-list" v-show="open" v-if="hasChildren">
                <tree-folder
                    class="item"
                    v-for="(model, index) in filteredList"
                    :list="model.children"
                    :search="search"
                    :index="index"
                    :key="index"
                    :model="model"
                    :options="options"
                    :typeFilter="typeFilter">
                </tree-folder>
                <li class="item">
                    <div class="child">
  <span class="straight-line">
<svg width="2" height="50" viewBox="0 0 2 50" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" fill-rule="evenodd">
        <path d="M0 15h20v20H0z"/>
        <path stroke="#5BA2D4" fill="#D8D8D8" d="M.5.5h1v49h-1z"/>
        <path d="M20 24v2H0v-2z"/></g></svg></span>
                        <!--<span class="line">
<svg width="20" height="26" viewBox="0 0 20 26" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd">
    <path d="M0 15h20v20H0z"/>
    <path d="M0 0h2v50H0z"/>
    <path stroke="#5BA2D4" d="M.5.5h1v24h-1zM19.5 24.5v1H.5v-1z"/></g></svg></span>-->
                        <!--<a @click="addChild()" class="child__add">{{addText(model.type)}}</a>-->
                    </div>
                </li>
            </ul>
        </li>
</template>


<script>
    export default {
        name: "parse-tree-folder",

        props: {
            model: Object,
            index: null,
            options: null,
            search: '',
            list: Array,
            typeFilter: null
        },
        data: function () {
            return {
                open: false,
            }
        },
        computed: {
            hasChildren: function () {
                return this.model.children &&
                    this.model.children.length
            },
            filteredList() {
                return this.list.filter(topBranch => {
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
        },
        methods: {
            optionToggle(index) {
                if (this.$parent && this.$parent.$parent && this.$parent.$parent.$parent) {
                    this.$parent.$parent.$parent.toggleOptions(index);
                } else if (this.$parent && this.$parent.$parent) {
                    this.$parent.$parent.toggleOptions(index);
                } else if (this.$parent) {
                    this.$parent.toggleOptions(index);
                }
            },
            select: function (m) {
                const children = m.children;
                if (children) {
                    children
                        .forEach(function(child) {
                            const subChildren = child.children;
                            child.selected = m.selected;
                            if (subChildren) {
                                subChildren
                                    .forEach(function(subChild) {
                                        subChild.selected = m.selected;
                                    });
                            }
                        });
                }
            },
            toggle: function () {
                if (this.hasChildren) {
                    this.open = !this.open
                }
            },
            changeType: function () {
                if (!this.isFolder) {
                    Vue.set(this.model, 'children', [])
                    this.addChild()
                    this.open = true
                }
            },
            statusColor: function (status) {
                return status ? 'content__item--active' : 'content__item--inactive';
            },
/*            addText(type) {
                if (type === 'ДКС') {
                    return 'Управление №1';
                } else if (type === 'Управление №1') {
                    return 'Менеджер';
                }
            },*/
/*            addChild: function () {
                if (this.model.type === 'ДКС') {
                    this.model.children.push({
                        name: 'Site One', type: 'Управление №', created: 'Yesterday', cameras: 0, selected: this.model.selected
                    })
                } else if (this.model.type === 'Добавить управление') {
                    this.model.children.push({
                        name: 'Camera Two',
                        type: 'Менеджер',
                        created: 'yesterday',
                        status: 'Active',
                        notifications: 'On',
                        receiver: 'NVR',
                        lastAlarm: 'Today',
                        selected: this.model.selected
                    })
                }
            }*/
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

<style scoped>
    .item {
        display: flex;
        flex-flow: column;
        justify-content: center;
    }
    .item:nth-child(odd) .child .content {
        background: #3C4D58;
    }

    .client-headings {
        color: #5BA2D4;
        padding-left: 2rem;
        list-style: none;
        display: flex;
        justify-content: space-around;
        position: relative;
    }
    .client-headings .client-headings__heading {
        opacity: 0.5;
        transition: 0.3s ease;
    }
    .client-headings .straight-line {
        display: inline-flex;
        position: absolute;
        left: 0;
        border-bottom: 3px solid #5BA2D4;
    }
    .client-headings .straight-line--second {
        left: 4.7rem;
    }
    .client-headings:hover .client-headings__heading {
        opacity: 1;
    }

    .child-list .client-headings {
        padding-left: 3.25rem;
    }

    .client-headings__heading {
        flex: 1;
        padding: 1rem;
        border-bottom: 2px solid #5BA2D4;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .client-headings__heading--select {
        max-width: 3rem;
    }

    .client-headings__heading--options {
        max-width: 2rem;
    }

    .content__item {
        display: inline-block;
        flex: 1;
        padding: 1rem;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    .child li.content__item {

    }

    .content__item--select {
        display: inline-flex;
        max-width: 3rem;
    }

    .content__item--options {
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 1rem;
        margin-right: 1rem;
        padding: 0 !important;
        cursor: pointer;
    }
    .content__item--options:hover svg path {
        fill: #5BA2D4;
    }

    .content__item--inactive {
        color: #B45252;
    }

    .content__item--active {
        color: #72B452;
    }

    .child {
        position: relative;
        display: inline-flex;
        flex-flow: row;
    }

    .child--hasChildren ul.content {
        margin-left: 0;
        display: inline-flex;
    }
    .child--hasChildren .content:hover {
        color: #fff;
    }
    .child--hasChildren .line {
        padding-right: 0;
    }

    .content__check {
        cursor: pointer;
        -webkit-appearance: none;
        background-color: transparent;
        border: 1px solid #6BA1D8;
        padding: 0.5rem;
        height: 18px;
        border-radius: 3px;
        display: inline-block;
        position: relative;
        border-radius: 0;
    }
    .content__check:checked {
        background-color: #6BA1D8;
        color: #3C4D58;
    }
    .content__check:checked::before {
        display: block;
        text-align: center;
        content: "✓";
        height: 100%;
        width: 100%;
        position: absolute;
        font-size: 1rem;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
    }

    .arrow {
        cursor: pointer;
        display: inline-flex;
        padding: 0.7rem;
        align-self: center;

    }

    .arrow--isActive {
        transform: rotate(90deg);
    }

    .straight-line {
        display: none;
    }

    .options {
        display: block;
        position: absolute;
        right: 0;
        top: 2rem;
        background: #3C4D58;
        box-shadow: 0 0 10px 0 rgba(21, 35, 45, 0.5);
        border-radius: 3px;
        font-size: 0.9rem;
        z-index: 99;
        overflow: hidden;
    }

    .options__list {
        padding: 0;
        list-style: none;
    }

    .options__link {
        cursor: pointer;
        display: block;
        padding: 0.5rem;
    }
    .options__link:hover {
        color: #5BA2D4;
        background: #15232D;
    }

    .child-list {
        list-style: none;
        padding-left: 1rem;
    }
    .child-list .item .child .content {
        background: #2D3C47;
    }
    .child-list .item:nth-child(odd) .child .content {
        background: #3C4D58;
    }
    .child-list .child-list {
        padding-left: 0;
    }
    .child-list .child-list .client-headings {
        padding-left: 7.95rem;
    }
    .child-list .child-list .line {
        padding-left: 2.55rem;
    }
    .child-list .child-list .item .child .content {
        background: #2D3C47;
    }
    .child-list .child-list .item:nth-child(odd) .child .content {
        background: #3C4D58;
    }
    .child-list .child-list .child .straight-line {
        margin-right: 2rem;
        display: inline-flex;
    }
    .child-list .line {
        display: inline-flex;
    }

    .line {
        display: none;
    }

    ul.content,
    .content {
        padding: 0;
        flex: 1;
        display: flex;
        justify-content: space-around;
        list-style: none;
        margin-left: 2rem;
    }

    .child__add {
        opacity: 0.8;
        flex: initial;
        padding: 1rem;
        background: none !important;
        color: #5BA2D4;
        cursor: pointer;
        margin-left: 1rem;
    }
    .child__add::before {
        content: "+";
        margin-right: 0.5rem;
    }
    .child__add:hover {
        opacity: 1;
    }
/*    .child .content {
        margin-left: 32px;
    }*/
</style>
