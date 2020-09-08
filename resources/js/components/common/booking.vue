<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <select name="" id="" v-model="office" @change="officeChange">
                    <option value="conf">Конференц зал (6-этаж)</option>
                    <option value="reception">Конференц зал Приемная (2-этаж)</option>
                    <option value="drr">Комната переговоров 2-этаж (западное крыло ДРР)</option>
                    <option value="dsv">Комната переговоров 1-этаж (западное крыло ДСВ)</option>
                    <option value="dps">Комната переговоров 1этаж -(восточное крыло ДПС)</option>
                </select>
            </div>
        </div>
        <kalendar :configuration="calendar_settings" :events.sync="events">
            <!-- CREATED CARD SLOT -->
            <div
                    slot="created-card"
                    slot-scope="{ event_information }"
                    class="details-card"
            >
                <h4 class="appointment-title">
                    {{ event_information.data.title }}
                </h4>
                <small>
                    {{ event_information.data.description }}
                </small>
                <span class="time"
                >{{ event_information.start_time | formatToHours }} -
					{{ event_information.end_time | formatToHours }}</span
                >
                <button @click="removeEvent(event_information)" class="remove">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                            data-reactid="1326"
                    >
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                </button>
            </div>
            <!-- CREATING CARD SLOT -->
            <div slot="creating-card" slot-scope="{ event_information }">
                <h4 class="appointment-title" style="text-align: left;">
                    Новое бронирование
                </h4>
                <span class="time">
					{{ event_information.start_time | formatToHours }}
					-
					{{ event_information.end_time | formatToHours }}
				</span>
            </div>
            <!-- POPUP CARD SLOT -->
            <div
                    slot="popup-form"
                    slot-scope="{ popup_information }"
                    style="display: flex; flex-direction: column;"
            >
                <h4 style="margin-bottom: 10px">
                    Новое бронирование
                </h4>
                <input
                        v-model="new_appointment['title']"
                        type="text"
                        name="title"
                        placeholder="Департамент"
                />
                <textarea
                        v-model="new_appointment['description']"
                        type="text"
                        name="description"
                        placeholder="Описание"
                        rows="2"
                ></textarea>
                <div class="buttons">
                    <button class="cancel" @click="closePopups()">
                        Отмена
                    </button>
                    <button @click="addAppointment(popup_information)">
                        Сохранить
                    </button>
                </div>
            </div>
        </kalendar>
    </div>
</template>
<script>
    const _existing_events = [
        {
            from: '2019-07-10T04:00:00.300Z',
            to: '2019-07-30T04:10:00.300Z',
            data: {
                title: 'Right now',
                description: 'Lorem ipsum',
            },
        },
        {
            from: '2019-07-11T10:22:00-07:00',
            to: '2019-07-31T11:55:00-07:00',
            data: {
                title: 'Truth',
                description: 'Look.',
            },
        },
        {
            from: '2019-07-11T10:22:00-07:00',
            to: '2019-07-31T11:20:00-07:00',
            data: {
                title: 'Side',
                description: 'Look.2',
            },
        },
        {
            from: '2019-07-11T10:22:00+02:00',
            to: '2019-07-31T11:20:00+02:00',
            data: {
                title: 'Europe',
                description: 'Final Countdown',
            },
        },
    ];
    let today = new Date();
    function getCurrentDay() {
        today.setHours(0);
        today.setMinutes(0);
        today.setSeconds(0);
        today.setMilliseconds(0);
        return today.toISOString();
    }
    // change the dates on _existing events to this week
    const startDate = new Date(_existing_events[0].from).getUTCDate();
    function makeNow(dateString) {
        const d = new Date(dateString);
        d.setYear(today.getUTCFullYear());
        d.setMonth(today.getUTCMonth());
        d.setDate(today.getUTCDate() + (d.getUTCDate() - startDate));
        return d.toISOString();
    }
    import Vue from 'vue';
    import { Kalendar } from '../../calendar/dist/index';
    import { DateTime } from 'luxon';
    import PortalVue from "portal-vue";
    Vue.use(PortalVue);
    export default {
        created() {
            Vue.filter('formatToHours', (value, how) => {
                let dt = DateTime.fromISO(value);
                return dt.toLocaleString(DateTime.TIME_24_SIMPLE);
            });

            for (const key in this.booking){
                let parsed = JSON.parse(this.booking[key].data)
                if(parsed.data.office === 'conf') {
                    this.conf.push(parsed)
                } else if (parsed.data.office === 'reception') {
                    this.reception.push(parsed)
                } else if (parsed.data.office === 'drr') {
                    this.drr.push(parsed)
                } else if (parsed.data.office === 'dsv') {
                    this.dsv.push(parsed)
                } else if (parsed.data.office === 'dps') {
                    this.dps.push(parsed)
                }
            }
            if(this.office === 'conf') {
                this.events = this.conf
            }

        },
        components: {
            Kalendar,
        },
        props: {
            booking: Array,
            isn: Number
        },
        data() {
            return {
                office: 'conf',
                conf: [],
                reception: [],
                drr: [],
                dsv: [],
                dps: [],
                events: [],
                calendar_settings: {
                    view_type: 'week',
                    cell_height: 10,
                    scrollToNow: false,
                    start_day: getCurrentDay(),
                    military_time: false,
                    read_only: false,
                    day_starts_at: 9,
                    day_ends_at: 18,
                    overlap: false,
                    hide_dates: ['2019-08-09'],
                    hide_days: [5, 6],
                    past_event_creation: false,
                },
                new_appointment: {},
            };
        },
        methods: {
            addAppointment(popup_info) {
                let payload = {
                    data: {
                        title: this.new_appointment.title,
                        description: this.new_appointment.description,
                        office: this.office,
                    },
                    author: this.isn,
                    from: popup_info.start_time,
                    to: popup_info.end_time,
                };
                this.axios.post('/booking/set', {payload}).then(response => {
                    if(response.data.success){

                    }
                });
                this.$kalendar.addNewEvent(payload);
                this.$kalendar.closePopups();
                this.clearFormData();
            },
            closePopups() {
                this.$kalendar.closePopups();
            },
            clearFormData() {
                this.new_appointment = {
                    description: null,
                    title: null,
                };
            },
            addManually() {
                let title = 'New one';
                let description = 'Lorem dsr';
                let from = makeNow('2019-07-12T10:22:00+02:00');
                let to = makeNow('2019-07-13T11:20:00+02:00');
                let payload = {
                    data: { title, description },
                    from,
                    to,
                };
                this.$kalendar.addNewEvent(payload);
            },
            removeEvent(kalendarEvent) {
                console.log('KalendarEvent', kalendarEvent);
                let day = kalendarEvent.start_time.slice(0, 10);
                this.$kalendar.removeEvent({
                    day,
                    key: kalendarEvent.key,
                    id: kalendarEvent.kalendar_id,
                });
            },
            officeChange() {

                if(this.office === 'conf') {
                    this.events = this.conf
                } else if (this.office === 'reception') {
                    this.events = this.reception
                } else if (this.office === 'drr') {
                    this.events = this.drr
                } else if (this.office === 'dsv') {
                    this.events = this.dsv
                } else if (this.office === 'dps') {
                    this.events = this.dps
                }
                this.$forceUpdate();
            }
        },
        computed: {
        }
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