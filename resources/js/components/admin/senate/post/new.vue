<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="postText">Пост</label>
            <textarea class="form-control" v-model="postText" id="postText"></textarea>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="postText">Опрос</label>
            <br>
            <input type="checkbox" class="flipswitch" v-model="poll"/>

        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-if="poll">
            <label for="postText">Вопрос</label>
            <input class="form-control" type="text" v-model="question" id="question">
        </div>

        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-if="poll">
            <label for="postText">Ответы : </label>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-for="(answer,index) in answers" v-if="poll">
            <div class="input-group mb-3">
                <input type="text" class="form-control" v-model="answers[index]" :placeholder="`Ответ ${index+1}`" :aria-label="`Ответ ${index+1}`" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" @click="remove(index)" v-if="answers.length > 2" type="button">-</button>
                </div>
            </div>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-if="poll">
            <input type="button" value="+" class="btn btn-outline-success col-2 offset-5" @click="add">
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "post-new",
        data() {
            return {
                poll: false,
                postText : "",
                question : "",
                answers : ["", ""],
            }
        },
        methods : {
            add(){
                this.answers.push("");
            },
            remove(index){
                this.answers.splice(index, 1);
            },
            send(){
                this.axios.post('/senate/new/post', this.getFormData())
                    .then(response => {
                        if(response.data.success){
                            location.href = '/';
                        }else{
                            alert(response.data.errorText);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getFormData(){
                var form = new FormData();
                form.append('postText', this.postText);
                form.append('poll', this.poll ? 1 : 0);
                if(this.poll){
                    form.append('question', this.question);
                    this.answers.forEach(answer => {
                        form.append('answers[]', answer)
                    });
                }
                return form;
            }

        }
    }
</script>

<style scoped>
    .flipswitch {
        position: relative;
        background: white;
        width: 120px;
        height: 40px;
        -webkit-appearance: initial;
        border-radius: 3px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline: none;
        font-size: 14px;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #ddd;
    }

    .flipswitch:after {
        position: absolute;
        top: 5%;
        display: block;
        line-height: 32px;
        width: 45%;
        height: 90%;
        background: #fff;
        box-sizing: border-box;
        text-align: center;
        transition: all 0.3s ease-in 0s;
        color: black;
        border: #888 1px solid;
        border-radius: 3px;
    }

    .flipswitch:after {
        left: 2%;
        content: "OFF";
    }

    .flipswitch:checked:after {
        left: 53%;
        content: "ON";
    }

    /* Put your css in here */
    .input-bar {
        display: table;
        width: 100%;
    }

    .input-bar-item {
        display: table-cell;
    }

    .input-bar-item > button {
        margin-left: 5px;
    }

    .width100 {
        width: 100%;
    }
</style>