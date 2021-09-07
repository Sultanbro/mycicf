<template>
    <form @submit.prevent="onSubmit">
        <input
            type="text"
            id="new-todo-input"
            name="new-todo"
            autocomplete="off"
            v-model.lazy.trim="program"

        />
        <button type="submit">
            Add
        </button>
    </form>
</template>

<script>
export default {
    methods: {
        onSubmit() {
            if(this.program === "") {
                return
            }
            this.$emit('added', this.program)
            this.program =  ""

        },
    },

    data() {
       return {
           // Study Program
           program: '',
       }
    },





}
</script>


<style>
form {
    width: 300px;
    background-color: black;
}

input, textarea {
    margin-top: 10px;
}


label {
    margin-top: 10px;
    padding-left: 30px;
}
</style>
