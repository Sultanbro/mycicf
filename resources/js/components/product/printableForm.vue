<template>
    <div class="col-12 mt-2 mb-2 ml-0 text-center">
        <button class="btn btn-outline-info" @click="getPrintableFormList" v-if="Object.keys(printableForms).length == 0">
            Печатная форма
        </button>

        <div v-if="Object.keys(printableForms).length > 0" class="d-flex align-items-center mb-2 col-12">
            <label class="bold mb-0 mr-2">Вид формы: </label>
            <select class="custom-select w-auto" @change="changeSelect($event)">
                <option value="">Выбрать форму</option>
                <option v-for="pForm in printableForms"
                        :data-classid="pForm.ClassID"
                        :value="pForm.TemplateISN">{{pForm.Remark}}</option>
            </select>
        </div>
        <button v-if="Object.keys(printableForms).length > 0" class="btn btn-outline-info" @click="downloadPrintableForm">
            Скачать форму
        </button>
    </div>
</template>

<script>
    export default {
        name: "printable-form",
        data() {
            return {
                printableForms: [],
                documentUrl: null
            }
        },
        props: {
            contract_number: String,
            preloader: Function
        },
        methods: {
            changeSelect(e,index) {
                if(e.target.options.selectedIndex > -1) {
                    let classId = e.target.options[e.target.options.selectedIndex].dataset.classid;
                    let templateIsn = e.target.options[e.target.options.selectedIndex].value;
                    this.documentUrl = "https://"+window.location.hostname+"/full/getPrintableForm?contract_number="+this.contract_number+"&temp="+templateIsn+"&classisn="+classId;
                }
            },
            getPrintableFormList(){
                this.preloader(true);
                this.axios.post('/full/getPrintableFormList',
                    {
                        contract_number: this.contract_number
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.printableForms = response.data.printableForms['row'];
                        } else {
                            alert(response.data.error)
                        }
                        this.preloader(false);
                    })
                    .catch(error => {
                        alert(error)
                        this.preloader(false);
                    });
            },
            downloadPrintableForm(temp,formIsn){
                if(this.documentUrl == null) {
                    alert('Выберите пожалуйста форму');
                } else {
                    let newwindow = window.open(this.documentUrl);
                    newwindow.focus();
                    newwindow.onblur = function () {
                        newwindow.close();
                    };
                }
            },
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
