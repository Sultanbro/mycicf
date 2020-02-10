<template>
    <div>
        <div>
            <div class="color-blue pt-2 pl-3 pr-3 pb-2 d-flex jc-center">
                <div class="d-flex vertical-middle">
                    <span class="bold">Ближайшие дни рождения</span>
                </div>
            </div>
            <hr class="mt-0">
            <div class="pt-2 pl-4 pr-4 pb-2 relative">
                <div class="text-center relative">
                    <div>
                        <div class="absolute height100 zi-3">
                            <div class="pr-2 pl-2 pt-2 pb-2 height100 pointer d-flex vertical-middle events-arrow-bg"  v-on:click="prev()" v-if="index !== 0">
                                <i class="fa fa-long-arrow-alt-left color-blue" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="absolute height100 absolute-right-0 zi-3">
                            <div class="pt-2 pr-2 pb-2 pl-2 height100 pointer d-flex vertical-middle events-arrow-bg" v-on:click="next()" v-if="index < birthdays.length-1">
                                <i class="fa fa-long-arrow-alt-right color-blue" aria-hidden="true"></i>
                            </div>
                        </div>
                        <simple-birthday
                            v-if="birthdays.length > 0"
                            :fullName="birthdays[index].fullname"
                            :date="birthdays[index].birthday"
                            :ISN="birthdays[index].ISN"
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
    export default {
        name: "news-birthday",

        data() {
            return {
                birthdays: [],
                index : 0,
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
                this.index++;
            },
            prev(){
                this.index--;
            }
        }
    }
</script>