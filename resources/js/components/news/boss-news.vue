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
                    <p>Путь в тысячи ли начинается с первого шага. Становление пути Бейбита Турысбекова как лидера началось с самого образования финансовой группы Centras в 2004 году, в которой в течение четырех лет успешно руководил в качестве финансового директора в АО «Сентрас Секьюритис».</p>
                    <p>С 2008 года является членом Совета директоров АО «Сентрас Иншуранс». Не известна точная дата, когда Бейбит Абдиманапович получил лаконичное и звонкое обращение «шеф», но, примерно, это  началось в это время.</p>
                    <p>Он занял должность Управляющего директора в ТОО «Сентрас Капитал», являющейся Холдинговой компанией Группы. В 2011 г был назначен Председателем Правления АО «СК «Сентрас Иншуранс» и проработал на данной должности до 2015 года включительно. С 2015 года является членом Совета директоров компаний АО «СК «Коммеск-Өмір». Успешно курировал многие инновационные проекты по разным направлениям Группы. С 15 декабря 2017 года - повторно назначен на должность Председателя Правления АО «СК «Сентрас Иншуранс».</p>
                    <p>Чем занимался шеф до работы в группе Centras? История гласит, что до присоединения к команде специалистов Группе Компаний Centras с 1995 по 1997 гг, он работал в Национальном Банке РК в Отделе реформ бухучета и отчетности. С 1997 – 2004 гг. занимал руководящие позиции в таких финансовых институтах как ОАО «Казкоммерцбанк» и АО «Казкоммерц Секьюритиз». Шеф имеет большой управленческий опыт, обширные знания и высокую квалификацию в разных областях финансового сектора. Сильные качества сделали нашего шефа тем человеком, который вдохновляет и мотивирует людей, помогая реализовать свой собственный потенциал в стенах компании Centras Insurance.</p>
                </div>
            </div>
        </div>
        <div>
            <div v-for="(post, index) in posts" v-if="post.pinned === 0" class="mb-3 rounded">
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
