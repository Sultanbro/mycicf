<template>
    <div class="row">
        <div class="form-group col-md-12 col-lg-12 col-12 text-center">
            {{ product.name }}
        </div>

        <!--constructor-participants :participants="participants"></constructor-participants>
        <!--constructor-objects :objects="objects"></constructor-objects>
        <constructor-attributes :attributes="attributes"></constructor-attributes-->

        <constructor :items="participants" :title="participantTitle" :parent-isn="19"></constructor>
        <constructor :items="objects" :title="objecttTitle" :parent-isn="4"></constructor>
        <constructor :items="attributes" :title="attributeTitle" :parent-isn="10"></constructor>


        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "full-constructor-create",
        data() {
            return {
                ISN : null,
                participants: [],
                objects: [],
                attributes: [],
                participantTitle: 'Участники',
                objecttTitle: 'Объекты',
                attributeTitle: 'Атрибуты',
            }
        },
        props: {
            product: Object,
            participantsBase: Array,        // Данные из базы
            objectsBase: Array,
            attributesBase: Array,
        },
        created(){
            this.participants = this.participantsBase;  // Записываем данные из базы
            this.objects = this.objectsBase;
            this.attributes = this.attributesBase;
        },
        methods: {
            send(){
                this.axios.post('/calc/full-constructor', {
                    product_isn : this.product.product_isn,
                    id:this.product.id,
                    participants: this.participants,
                    objects: this.objects,
                    attr: this.attributes
                })
                    .then(response => {
                        if(response.data.success){
                            alert('Данные успешно записаны');
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
        },
        mounted(){
            //...
        },

    }
</script>

<style scoped>

</style>