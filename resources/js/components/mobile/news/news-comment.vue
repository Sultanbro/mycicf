<template>
        <div class="mt-2 mb-2">
            <div class="ml-3 mr-3 bg-white">

                <div class="d-flex comments-section">
                    <div class="">
                        <img src="/images/avatar.png"
                             class="avatar-small header-avatar-size"
                             v-if="fakeImage"
                             >
                        <img :src="imageUrl"
                             class="avatar-small header-avatar-size"
                             @error="fakeImage = true"
                             v-else
                             >
<!--                        <img :src="imageUrl"-->
<!--                             class="avatar-small header-avatar-size"-->
<!--                             @error="fakeImage = true"-->
<!--                             v-else>-->
                    </div>

                    <div class="w-100 ml-2">
                        <div class="d-flex">
                            <div class="ml-2">
                                <span>
                                    <small v-if="comment.userISN === isn">{{comment.fullname}}</small>
                                    <small v-else><a :href="`/colleagues/${comment.userISN}/dossier`">{{comment.fullname}}</a></small>
                                </span>
                            </div>
                        </div>
                        <div class="pl-2 pr-2 pt-1 pb-1 w-100 comments-section__body d-flex align-items-center">
                            <div>{{comment.commentText}}</div>
                        </div>
                        <div class="d-flex">
                            <div class="ml-2" v-if="isn === comment.userISN">
                                <span>
                                    <small class="color-blue" @click="deleteComment(index)">Удалить</small>
                                </span>
                            </div>
                            <div class="ml-2" v-if="isn !== comment.userISN">
                                <span>
                                    <small class="color-blue" @click="replyComment">Ответить</small>
                                </span>
                            </div>

                            <div class="ml-auto pr-2">
                                <span><small>{{comment.date}}</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "news-comment",

        data() {
            return {
                fakeImage : false,
                imageUrl : null,
                replyFullName: '',
            }
        },

        props: {
            comment: Object,
            index: Number,
            isn: Number
        },

        mounted () {
            this.imageUrl = "/storage/images/employee/" + this.comment.userISN + ".png";
            // this.comments = [...this.post.comments];
        },

        updated () {
            this.imageUrl = "/storage/images/employee/" + this.comment.userISN + ".png";
            // this.comments = this.allCommentsShown ? this.post.comments.slice() : this.post.comments.slice(0, 3)
        },

        methods: {
            deleteComment: function () {
                var vm = this;
                this.axios.post('/deleteComment', {commentId: this.comment.commentId}).then(response => {
                    if(response.data.success){
                        vm.$parent.post.comments.splice(vm.index, 1);
                    }
                });
            },
            replyComment: function () {
                if(this.replyFullName !== '') {
                    this.replyFullName = '';
                    this.replyFullName = this.comment.fullname;
                    this.$parent.commentText = this.replyFullName + ', ';
                    document.getElementById("comment-mobile-textarea").focus();
                }
                else {
                    this.replyFullName = this.comment.fullname;
                    this.$parent.commentText = this.replyFullName + ', ';
                    document.getElementById("comment-mobile-textarea").focus();
                }
            }

        },
    }
</script>

<style scoped>
    .avatar-small {
        border-radius: 100%;
        height: 35px;
    }

    .comments-section__body {
        background: #EFEFEF;
        border-radius: 10px;
    }

    .create-comment-section {
        display: flex;
        position: fixed;
        bottom: 0;
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
    }
</style>
