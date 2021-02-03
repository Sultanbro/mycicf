<template>
    <div>
        <div class="avatar-menu-size mt-3 mb-3 ml-2 mr-2">

            <div class="crown" :class="likes < 100
            ? '' : likes >= 100 && likes < 200
            ? 'crown-bronze' : likes >= 200 && likes < 300
            ? 'crown-silver' : likes >= 300
            ? 'crown-gold' : 'crown-gold'"
                 v-if="likes >= 100">
                <i class="fas fa-crown"></i>
            </div>

            <img src="/images/avatar.png" class="image" v-if="fakeImage">
            <img :src="imageUrl" @error="fakeImage = true" v-else>
            <div class="sticker-block">
                <span @click="score('like')" class="sticker sticker-like hidden">
                    <span class="sticker-num">{{likes}}</span>
                </span>
                <span @click="score('dislike')" class="sticker sticker-dislike hidden">
                    <span class="sticker-num">{{dislikes}}</span>
                </span>
            </div>

        </div>
        <div class="flex-row bg-color-blue color-white" @click="reverseCaret()" data-toggle="collapse" data-target="#persons-data" aria-expanded="true">
            <div class="pointer left-menu-nickname-fonts ml-3 mr-3 mt-1 mb-1 jc-sb width100">
                <span>{{fullname}}</span>
                <span class="ml-2 vertical-middle"><i class="fas " :class="caretClass" data-toggle="collapse" href="#multiCollapseExample1"></i></span>
            </div>
        </div>
        <div class="ml-3 mr-3 mt-2 collapse in show" id="persons-data">
            <div class="left-menu-fonts">
                <span><strong>{{duty}}</strong></span>
            </div>
            <div class="left-menu-fonts" v-if="rating !== ''">
                <span><strong>Рейтинг: &nbsp; </strong><span>{{rating}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span><strong>Дата рождения: &nbsp; </strong><span>{{birthday}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span><strong>Место рождения: &nbsp; </strong><span>{{place_of_birth}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span><strong>Семейное положение: &nbsp; </strong><span>{{married}}</span></span>
            </div>
            <div class="left-menu-fonts">
                <span><strong>Образование: &nbsp; </strong><span>{{education}}</span></span>
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
                caretClass: 'fa-chevron-up',
                fullname: '',
                duty: '',
                birthday: '',
                place_of_birth: '',
                married: '',
                education: '',
                rating: '',
                fakeImage: false,
                imageUrl : null,
                likes: 0,
                dislikes: 0,
                isLiked: 0,
                isDisLiked: 0,
            }
        },
        props: {
            isn: Number,
        },
        created: function(){
            this.getTables();
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },
        methods: {
            getTables: function(){
                this.axios.post("/getColleagueData", {isn : this.isn}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    var information = response.response;
                    this.fullname = information.Name;
                    this.duty = information.Duty;
                    this.birthday = information.Birthday;
                    this.married = information.Married;
                    this.education = information.Education;
                    this.rating = information.Rating;
                    this.place_of_birth = information.City;
                    this.likes = information.Likes;
                    this.dislikes = information.Dislikes;
                    this.isLiked = information.isLiked;
                    this.isDisLiked = information.isDisliked;
                }else{
                    alert(response.error);
                }
            },
            reverseCaret: function () {
                this.caretClass = this.caretClass === 'fa-chevron-up' ? 'fa-chevron-down' : 'fa-chevron-up';
            },

            score: function (type) {
                switch (type) {
                    case 'like':
                        if(this.isLiked === 1 || this.isLiked === '1') {
                            this.isLiked = false;
                            this.likes--;
                        }
                        else {
                            this.isLiked = true;
                            this.likes++;
                        }

                        this.axios.post('/addScore', {user_isn: this.isn, type: type})
                            .then(response => {
                                if(response.success === true) {
                                    this.isLiked = 1;
                                }
                                else {
                                    this.isLiked = 0;
                                }
                            })
                        break;
                    case 'dislike':
                        if(this.isDisliked === 1 || this.isDisliked === '1') {
                            this.isDisliked = 0;
                            this.dislikes--;
                        }
                        else {
                            this.isDisliked = 1;
                            this.dislikes++;
                        }

                        this.axios.post('/addScore', {user_isn: this.isn, type: type})
                            .then(response => {
                                if(response.success === true) {
                                    this.isDisliked = 1;
                                }
                                else {
                                    this.isDisliked = 0;
                                }
                            })
                        break;
                    default:
                        break;
                }
            },
        },

    }
</script>
