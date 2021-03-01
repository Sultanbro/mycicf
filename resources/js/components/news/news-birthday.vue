<template>
    <div>
        <div>
            <!--div class="pl-4 pr-4 countdown-main">
                <div class="d-flex justify-content-center bold-text">До праздника Наурыз осталось: </div>
                <Countdown end="March 22, 2021"></Countdown>
            </div-->
            <div class="color-blue pt-2 pl-3 pr-3 pb-2 d-flex jc-center">
                <div class="d-flex vertical-middle">
                    <span class="bold">Ближайшие дни рождения</span>
                </div>
            </div>
            <hr class="mt-0">
            <div class="d-flex align-items-center justify-content-center">
                <h4>{{ birthdays[index].birthday.slice(0, 2) }} {{ monthNames[month] }}</h4>
            </div>
            <div class="pt-2 pl-4 pr-4 pb-2 relative">
                <div class="text-center relative">
                    <div>
                        <div class="absolute height100 zi-3">
                            <div class="pr-2 pl-2 pt-2 pb-2 height100 pointer d-flex vertical-middle events-arrow-bg"
                                 @click="prev"
                                 v-if="index !== 0">
                                <i class="fa fa-long-arrow-alt-left color-blue" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="absolute height100 absolute-right-0 zi-3">
                            <div class="pt-2 pr-2 pb-2 pl-2 height100 pointer d-flex vertical-middle events-arrow-bg"
                                 @click="next"
                                 v-if="index < birthdays.length - 1">
                                <i class="fa fa-long-arrow-alt-right color-blue" aria-hidden="true"></i>
                            </div>
                        </div>
                        <simple-birthday
                            v-if="birthdays.length > 0"
                            :fullName="birthdays[index].fullname"
                            :date="birthdays[index].birthday"
                            :ISN="birthdays[index].ISN"
                            :fakeImage="birthdays[index].fakeImage"
                            :duty="birthdays[index].duty"
                            :dept="birthdays[index].dept"
                            :similar="birthdays[index].similar"
                        ></simple-birthday>
                    </div>
                    <hr>
                </div>
<!--                <div class="text-center">-->
<!--                    <div class="color-darkgray pointer hover-gray hover-gray pt-3 pb-3">-->
<!--                        Показать еще-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
    import Countdown from 'vuejs-countdown'
    export default {
        name: "news-birthday",
        components: { Countdown },

        data() {
            return {
                birthdays: [],
                index: 0,
                today: new Date().getDate(),
                month: new Date().getMonth() + 1,
                monthNames: {
                    1: 'Январь',
                    2: 'Февраль',
                    3: 'Март',
                    4: 'Апрель',
                    5: 'Май',
                    6: 'Июнь',
                    7: 'Июль',
                    8: 'Август',
                    9: 'Сентябрь',
                    10: 'Октябрь',
                    11: 'Ноябрь',
                    12: 'Декабрь'
                }
            }
        },
        mounted () {
            this.getBirthdaysData()
        },
        methods: {
            getBirthdaysData() {
                this.axios.post('/getBirthdays', {})
                    .then(response => {
                        this.birthdays = response.data.birthdays
                    })
                    .catch( error => {
                        alert(error);
                    });
            },
            next(){
                let year = new Date().getFullYear()
                let month = new Date().getMonth() + 1
                let lastDay = new Date(year, month, 0).getDate()

                if(this.birthdays[this.index].birthday.slice(0, 2) == lastDay) {
                    return;
                }
                else {
                    this.index++;
                }
            },
            prev() {
                if(this.today == 1) {
                    return;
                }
                else {
                    this.index--;
                }
            }
        }
    }
</script>
