<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <select name="" id="" v-model="office" @change="officeChange">
                    <option value="reception">Конференц-зал Приемная (2-этаж)</option>
                    <option value="conf">Конференц-зал (6-этаж)</option>
                    <option value="drr">Комната переговоров 2-этаж (западное крыло ДРР)</option>
                    <option value="dsv">Комната переговоров 1-этаж (западное крыло ДСВ)</option>
                    <option value="dps">Комната переговоров 1-этаж (восточное крыло ДПС)</option>
                </select>
            </div>
        </div>
        <reception v-if="office==='reception'" :events.sync="reception" :isn="isn"/>
        <conf v-if="office==='conf'" :events.sync="conf" :isn="isn"/>
        <dps v-if="office==='dps'" :events.sync="dps" :isn="isn"/>
        <drr v-if="office==='drr'" :events.sync="drr" :isn="isn"/>
        <dsv v-if="office==='dsv'" :events.sync="dsv" :isn="isn"/>
    </div>
</template>
<script>
    export default {
        created() {
            for (const key in this.booking){
                if(this.booking[key].data != null && this.booking[key].data != '') {
                    let parsed = JSON.parse(this.booking[key].data);
                    parsed.data.id = parseInt(this.booking[key].id);
                    if (parsed.data.office === 'conf') {
                        this.conf[0].push(parsed)
                    } else if (parsed.data.office === 'reception') {
                        this.reception[0].push(parsed)
                    } else if (parsed.data.office === 'drr') {
                        this.drr[0].push(parsed)
                    } else if (parsed.data.office === 'dsv') {
                        this.dsv[0].push(parsed)
                    } else if (parsed.data.office === 'dps') {
                        this.dps[0].push(parsed)
                    }
                }
            }
            if(this.office === 'conf') {
                this.events = this.conf
            }
        },
        props: {
            booking: Array,
            isn: Number
        },
        data() {
            return {
                office: 'reception',
                conf: [[]],
                reception: [[]],
                drr: [[]],
                dsv: [[]],
                dps: [[]],
                events: [[]],
            };
        },
        methods: {
            officeChange() {
            }
        },
    };
</script>
<style lang="scss">
    $green: #00f0b5;
    $red: #f61067;
    .details-card {
        display: flex;
        flex-direction: column;
        width: 100px;
        height: 100%;
        button {
            margin: 0;
            border: none;
            color: #4c4b4b;
            position: absolute;
            padding-right: 0px;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background: transparent;
            svg {
                width: 18px;
                height: 18px;
                fill: white;
            }
        }
        .remove {
            opacity: 0;
            transition: opacity 0.15s;
        }
        &:hover .remove {
            opacity: 1;
        }
    }
    .popup-event .buttons {
        display: flex;
        justify-content: space-between;
    }
    .popup-event .buttons button {
        border: none;
        color: #29771c;
        background-color: rgba($green, 0.04);
        padding: 5px 10px;
        &.cancel {
            background-color: rgba($red, 0.04);
            color: $red;
        }
    }
</style>