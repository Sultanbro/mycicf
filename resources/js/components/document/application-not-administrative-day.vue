<template>
    <div id="application-not-administrative-day">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto mt-3">

                    <form @submit.prevent="addWallPost">
                        <div class="form-group">
                            <label for="wall">Стена</label>
                            <textarea @click="resizeWall" v-model="wallPost.text" placeholder="Что нового?" class="form-control" :rows="wallRows"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Опубликовать</button>
                        </div>
                    </form>
<!--                    <form @submit.prevent="addWallPost">-->
<!--                        <div class="form-group">-->
<!--                            <label for="wall">Стена</label>-->
<!--                            <textarea @click="resizeWall" v-model="wallPost.text" placeholder="Что нового?"-->
<!--                                      class="form-control" id="wall" :rows="wallRows"></textarea>-->
<!--                            <button type="submit" class="btn btn-primary mt-2">Опубликовать</button>-->
<!--                        </div>-->
<!--                    </form>-->
                    <transition-group name="fade">
                        <div v-for="wallPost in wallPosts" :key="wallPost.id" class="card mt-3">
                            <div class="card-body">

                                <div class="wall">
                                    {{ wallPost.text }}
                                    <div>
                                        <i @click="editWallPost(wallPost)" class="fas fa-edit"></i>
                                        <i @click="deleteWallPost(wallPost.id)" class="fa fa-times"></i>
                                    </div>
                                </div>

                                <div v-if="editPost === wallPost" class="mt-2">
                                    <textarea v-model="editText" class="form-control"
                                      id="wall" rows="3"></textarea>
                                    <button @click="editWallPostSubmit"
                                            class="btn btn-primary mt-2">Отредактировать</button>
                                </div>

                            </div>
                        </div>
                    </transition-group>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "application-not-administrative-day",
        props: {
          results: Object
        },
        data() {
          return {
              wallRows: 1,
              wallCount: 0,
              wallPosts: [],
              wallPost: {
                  text: ''
              },
              editPost: {},
              editText: ''
          }
        },
        methods: {
            resizeWall() {
                this.wallRows = 3
            },
            addWallPost() {
                if (this.wallPost.text) {
                    this.wallCount++

                    // Добавить запись
                    this.wallPosts.unshift({
                        id: this.wallCount,
                        text: this.wallPost.text
                    })

                    this.wallPost.text = ''

                }
            },
            addW() {
              if(this.wallPost.text) {
                  this.wallCount++

                  this.wallPosts.unshift({
                      id: this.wallCount,
                      text: this.wallPost.text
                  })

                  this.wallPost.text = ''
              }
            },
            deleteWallPost(id) {
                // Находим в массиве по id
                const post_id = this.wallPosts.findIndex(post => post.id === id)

                if (post_id !== -1) {
                    this.wallPosts.splice(post_id, 1)
                }

            },
            deleted() {
                const post_id = this.wallPosts.findIndex(post => post.id === id)
                if(post_id !== -1){
                    this.wallPosts.splice(post_id, 1)
                }
            },
            editWallPost(post) {
                this.editPost = post
                this.editText = post.text
            },
            editWallPostSubmit() {
                this.editPost.text = this.editText
                this.editPost = null
            }
        }
    }
</script>


<style>
    /*.fa {*/
    /*    color: #b4b4b4;*/
    /*    cursor: pointer;*/
    /*}*/

    .fas.fa-edit:hover {
        color: #5f9fe9;
    }

    .fa.fa-times:hover {
        color: #e95f5f;
    }

    .wall {
        display: flex;
        justify-content: space-between;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
