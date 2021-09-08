<template>
    <div onscroll="bottomOfWindow" class="mt-3">
        <div class="mb-3">
            <div class="d-flex bg-white p-4 rounded">
                <div class="mr-3 w-25">
                    <img src="/images/boss-says.jpg" alt="" class="boss-image">
                </div>
                <div class="w-75">
                    <h5><b>Бейбит Турысбеков</b></h5>
                    <p>Председатель Правления.</p>
                    <p>Добро пожаловать в мой личный блог!</p>
                    <p>В любой работе я предпочитаю действовать по определенной схеме. Все мои посты – это часть большого плана, идеи которого я хочу донести до каждого сотрудника нашей Компании.</p>
                    <p>Удобно, когда все это будет собрано в специальном разделе. Мой блог – о компании, о бизнесе, о цифрах, о стратегии развития и внедрении новых тенденций. Конечно, тут будет возникать множество вопросов: к чему будем стремиться, что происходит на рынке страхования, как поднять эффективность продавцов и многие другие. Для этого и блог, в каждом посте будет заключен ответ.</p>
                    <p>Найдите в этом блоге для себя нужное, полезное и мотивирующее людей, и реализовывайте свой собственный потенциал в стенах нашей Компании Centras Insurance!</p>
                    <p>И не забывайте ставить лайки! </p>
                </div>
            </div>
        </div>
        <div>
            <div v-for="(post, index) in posts" v-if="!post.pinned" class="mb-3 rounded">
                <news-post
                    :post="post"
                    :isn="isn"
                    :index="index"
                    :moderators="moderators"
                    v-on:deletePost="deleteFromPost(index)"
                ></news-post>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "boss-news",
        data() {
            return {
                posts: [],
                moderators: [],
                bottomOfWindow: 0,
                allPostShown : false,
                lastIndex : null,
                postIds : [],
            }
        },
        props: {
            isn: Number,
        },
        mounted() {
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
            Echo.private(`post`)
                .listen("NewPost", (e) => {
                    this.handleIncoming(e);
                });
            this.getPosts();
            this.getModerators();
        },
        methods: {
            getPosts() {
                this.preloader(true);
                this.axios.post("boss-news/getBossPosts", {lastIndex: this.lastIndex}).then(response => {
                    this.setPosts(response.data)
                });
            },
            setPosts(response) {
                var vm = this;
                var i = 0;
                if(response.length < 5) {
                    this.allPostShown = true;
                }
                response.forEach(function (data) {
                    if(vm.lastIndex === null || vm.lastIndex > data.postId){
                        vm.lastIndex = data.postId;
                    }

                    if(data.pinned){
                        vm.pinnedPost = data;
                        vm.pinnedPostIndex = i;
                    }

                    if(!vm.postIds.includes(data.postId)){
                        vm.postIds.push(data.postId);
                        vm.posts.push(data);
                    }
                    i++;
                });
                this.preloader(false);
            },

            getModerators() {
                this.axios.get('/getModerators', {}).then(response => {
                        this.moderators = response.data.moderators
                }).catch()
            },

            handleScroll() {
                if(document.documentElement.scrollTop > 50){
                    this.showToTopBtn = true;
                }else{
                    this.showToTopBtn = false;
                }
                this.bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
                if (this.bottomOfWindow && !this.allPostShown) {
                    this.preloader(true);
                    this.axios.post("boss-news/getBossPosts", {lastIndex: this.lastIndex}).then(response => {
                        this.setPosts(response.data)
                    });
                }
            },

            deleteFromPost(index) {
                this.posts.splice(index, 1);
            },

            preloader(show) {
                if(show)
                {
                    document.getElementById("preloader").style.display = "flex";
                }
                else
                {
                    document.getElementById("preloader").style.display = "none";
                }
            },
        },
        beforeMount () {
            window.addEventListener("scroll", this.handleScroll);
        },

        beforeDestroy () {
            window.removeEventListener("scroll", this.handleScroll);
        }
    }
</script>

<style scoped>
    .boss-image {
        width: 100%;
    }
    .rounded {
        border-radius: 16px !important;
    }
</style>
