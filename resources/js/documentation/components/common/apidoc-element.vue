<template>
    <div>
        <div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Заголовок</span>
                </div>
                <input type="text"
                       class="form-control"
                       :class="isTouched && activeField === 'title' && doc.title === '' ? 'is-invalid' : ''"
                       @focus="activeField = 'title', isTouched = false"
                       @blur="isTouched = true"
                       v-model="doc.title"
                       required>
                <div class="invalid-feedback">Необходимо заполнить данное поле</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "apidoc-element",
        data() {
            return {
                activeField: '',
                isTouched: false,
                isFocused: false,
            }
        },
        props: {
            doc: Object
        }
    }
</script>

<style scoped>

</style>
