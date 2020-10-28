<template>
    <div onscroll="bottomOfWindow" class="mt-3">
        <div class="mb-3">
            <div>
                <div>
                    <img src="" alt="">
                </div>
                <div>
                    <p></p>
                </div>
            </div>
        </div>
        <div>
            <div v-for="(post, index) in posts" v-if="post.pinned === 0">
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
                this.axios.post("boss-says/getBossPosts", {lastIndex: this.lastIndex}).then(response => {
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

                    if(data.pinned === 1){
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
                    this.axios.post("boss-says/getBossPosts", {lastIndex: this.lastIndex}).then(response => {
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

</style>
