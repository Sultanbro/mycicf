<template>
    <div>
        <div class="row mb-4 mt-4">
            <div class="col">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#basicModal">Забронировать</a>
            </div>
        </div>
        <kalendar ref="calendar" :configuration="calendar_settings" :events.sync="events[0]">
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
                <i v-if="loading" class="fas fa-spinner fa-spin remove"></i>
                <button v-if="!loading && (isn===event_information.data.author || event_information.data.author ==='246533')"
                        :disabled="loading" @click="removeEvent(event_information)" class="remove">
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
                <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                <div class="buttons">
                    <button :disabled="loading" class="cancel" @click="closePopups()">
                        Отмена
                    </button>

                    <button :disabled="loading" @click="addAppointment(popup_information)">
                        Сохранить
                    </button>
                </div>
            </div>
        </kalendar>
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Забронировать конференц</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <input type="text" class="form-control" placeholder="Департамент" v-model="title">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input type="text" class="form-control" placeholder="Описание" v-model="description">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input type="date" class="form-control" placeholder="Дата начало" v-model="day">
                                </div>
                                <div  class="col-md-6 mb-2" >
                                    <span class="small">С</span>
                                    <input type="time" class="form-control" placeholder="Дата начало" v-model="fromTime">
                                </div>
                                <div  class="col-md-6 mb-2" >
                                    <span class="small">До</span>
                                    <input type="time" class="form-control" placeholder="Дата окончания" v-model="toTime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="addManually">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
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
        name: "reception",
        created() {
            Vue.filter('formatToHours', (value, how) => {
                let dt = DateTime.fromISO(value);
                return dt.toLocaleString(DateTime.TIME_24_SIMPLE);
            });
        },
        components: {
            Kalendar,
        },
        props: {
            events: Array,
            isn: Number
        },
        data() {
            return {
                title: '',
                description: '',
                day: '',
                fromTime: '',
                toTime: '',
                loading: false,
                reception: [],
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
                this.loading = true
                let payload = {
                    data: {
                        title: this.new_appointment.title,
                        description: this.new_appointment.description,
                        office: 'conf',
                        id: null,
                        author: null,
                    },
                    author: this.isn,
                    from: popup_info.start_time,
                    to: popup_info.end_time,
                };
                this.axios.post('/booking/set', {payload}).then(response => {
                    if(response.data.success){
                        payload = JSON.parse(response.data.data.data)
                        this.$kalendar.addNewEvent(payload);
                        this.$kalendar.closePopups();
                        this.clearFormData();
                        this.loading = false
                    }
                });
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
                this.loading = true;
                let title = this.title;
                let description = this.description;
                let from = `${this.day}T${this.fromTime}:00.000Z`;
                let to = `${this.day}T${this.toTime}:00.000Z`;
                let payload = {
                    data: {
                        title,
                        description,
                        office: 'conf',
                        id: null,
                        author: null,
                    },
                    author: this.isn,
                    from,
                    to,
                };
                this.axios.post('/booking/set', {payload}).then(response => {
                    if(response.data.success){
                        payload = JSON.parse(response.data.data.data)
                        this.$kalendar.addNewEvent(payload);
                        this.title = '';
                        this.description = '';
                        this.from = '';
                        this.to = '';
                        this.loading = false
                    }
                });
            },
            removeEvent(kalendarEvent) {
                this.loading = true
                let day = kalendarEvent.start_time.slice(0, 10);
                this.axios.post('booking/remove', kalendarEvent).then((response)=>{
                    if(response.data.success) {
                        this.loading = false
                        this.$kalendar.removeEvent({
                            day,
                            key: kalendarEvent.key,
                            id: kalendarEvent.kalendar_id,
                        });
                    }
                    else {
                        alert('Невозможно удалить!')
                    }
                })
            },
        },
        computed: {
        },
    }
</script>

<style scoped>

</style>