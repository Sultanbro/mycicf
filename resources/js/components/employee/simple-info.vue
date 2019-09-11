<template>
    <div>
        <div class="flex-row bg-color-blue color-white">
            <div class="left-menu-nickname-fonts ml-3 mr-3 mt-1 mb-1 jc-sb width100">
                <span>{{fullname}}</span>
                <span><i class="fas fa-chevron-up"></i></span>
            </div>
        </div>
        <div class="ml-3 mr-3 mt-2">
            <div class="left-menu-fonts">
                <span>{{duty}}</span>
            </div>
            <div class="left-menu-fonts">
                <span>дата рождения: &nbsp; <span>{{birthday}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span>место рождения: &nbsp; <span>{{place_of_birth}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span>семейное положение: &nbsp; <span>{{married}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span>образование: &nbsp; <span>{{education}}</span></span>
            </div>
        </div>
        <hr class="left-menu-border mb-0">
        </div>
</template>

<script>
    export default {
        name: "simple-info",
        data() {
            return {
                fullname: '',
                duty: '',
                birthday: '',
                place_of_birth: '',
                married: '',
                education: '',
            }
        },
        mounted: function(){
            this.getTables()
        },
        methods: {
            getTables: function(){
                this.axios.post("/simpleInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    var information = response.result.response;
                    this.fullname = information.Name;
                    this.duty = information.Duty;
                    this.birthday = information.Birthday;
                    this.married = information.Married === "0" ? "Не указано" : information.Married;
                    this.education = information.Edu  === "0" ? "Не указано" : information.Edu;
                }else{
                    alert(response.error);
                }
                console.log(response);
            }
        },

    }
</script>
