<template>
    <div class="comments-container__inner w-100">
        <div class="d-flex comments-section w-100">
            <div>
                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width">
            </div>
            <div class="ml-2 comments-section__body w-100">
                <div class="pt-2 pb-2 pl-3 pr-3 d-flex">
                    <div class="mr-3 w-100">
                        <span class="color-blue">{{comment.fullname}},</span>
                        <div>{{comment.commentText}}</div>
                    </div>
                    <div class="d-flex comment-section__top">
                        <div class="comment-section__dropdown ml-auto">

                            <div class="comment-section__icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>

                            <div class="comment-section__dropcontent">
<!--                                <div class="p-2">-->
<!--                                    <span>-->
<!--                                        <small>Отредактировать</small>-->
<!--                                    </span>-->
<!--                                </div>-->
                                <div class="p-2"
                                     @click="deleteComment">
                                    <span>
                                        <small>Удалить</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex pl-5 pt-1 pb-1 comments-bottom">
            <!-- Не удалять потом дополним функционал -->
            <!--                                <div class="pl-3 mr-3 color-blue comments-bottom_inner"><small>Нравиться</small></div>-->
            <!--                                <div class="mr-3 color-blue comments-bottom_inner"><small>Ответить</small></div>-->
            <div class="color-blue ml-auto pr-2"><small>{{comment.date}}</small></div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "news-comment",

        data() {
            return {

            }
        },

        props: {
            comment: Object,
            index: Number
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
        }



    }
</script>

<style scoped>
    .comments-section__body {
        background-color: #EFEFEF;
        border-radius: 10px;
    }

    .comments-bottom_inner {
        cursor: pointer;
        transition: 0.4s ease;
    }

    .comment-section__icon {
        cursor: pointer;
    }

    .comment-section__dropcontent {
        display: none;
        position: absolute;
        background-color: #e9ebee;
        right: 45px;
        box-shadow: 0px 8px 40px 0px rgba(0,0,0,0.2);
        z-index: 300;
    }

    .comment-section__dropdown:hover .comment-section__dropcontent {
        display: block;
        transition: 0.4s ease;
        cursor: pointer;
    }

    .comment-section__dropcontent div:hover {
        background-color: cornflowerblue;
        color: #FFF;
    }

    .comment-section__dropdown:hover .comment-section__icon i {
        color: cornflowerblue;
    }

    .comment-textarea {
        border-radius: 10px;
        outline: none;
        /*height: 40px !important;*/
    }

    .comment-textarea:focus {
        border: 1px solid cornflowerblue;
    }

    .send-comment-btn {

        border: none;
        outline: none;
        background: #FFF;
    }

    .send-comment-btn i {
        font-size: 1.2em;
        transition: 0.4s ease;
    }

    .send-comment-btn:hover:enabled i {
        color: cornflowerblue;
        cursor: pointer;
    }
</style>
