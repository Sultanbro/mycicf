<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="travellerListModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content products-margin modal-lg-custom modal-custom-border-top">
                <div>
                    <div class="bg-blue-standart modal-custom-border-top">
                        <div class="border-bottom-white">
                            <div class="pl-5 pt-4 pb-1 pr-5">
                                <div @click="close"
                                     class="color-white-standart vertical-middle pt-3 pb-3 inline pointer">
                                    <i class="fas fa-chevron-circle-left"></i>
                                    <span class="pl-1">НАЗАД</span>
                                </div>
                                <div class="pt-2 pb-1 bold">
                                    <i class="far fa-file-alt"></i>
                                    <span class="ml-2">Список командируемых</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-8">
                        <div class="row col-md-12" v-if="addTravellerBool">
                            <div class="col-md-2">№</div>
                            <div class="col-md-8">ФИО работника</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row col-md-12 pt-2" v-if="addTravellerBool" v-for="(res, index) in travellersList" :key="index">
                            <div class="col-md-2 pl-2">{{ index+1 }}</div>
                            <div class="col-md-8 pl-2"><treeselect v-model="res.valn1" placeholder="Не выбрано"
                                                                  :multiple="false" :options="userList" :disable-branch-nodes="true" :disabled="loading || res.isn == '1' && travellersListCheckBool"/></div>
                            <div class="pl-3">
                                <button class="btn btn-primary" @click="deleteTraveller(res)">Удалить</button>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-md-8"><treeselect v-model="travellersList" placeholder="Не выбрано"-->
<!--                                                      :multiple="true" :options="userList" :disable-branch-nodes="true"/></div>-->
                    <div class="row pt-5 pl-3">
                        <div class="pl-3">
                            <button class="btn btn-primary" @click="addTraveller">Добавить командируемого</button>
                        </div>
                        <div class="pl-3">
                            <button class="btn btn-success" @click="saveTraveller">Сохранить</button>
                        </div>
                        <div v-show="loading" class="loading-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "traveller-list-modal",
    props: {
        results: {},
        travellersDocIsn: '',
        userList: Array,
    },
    data() {
        return {
            showTravellers: false,
            travellersList: [],
            travellersListClassIsn: '1043001',
            traveller: false,
            isn: '0',
            delete: '0',
            showTravellerId: false,
            travellersListCheck: [],
            travellersListCheckBool: false,
            modalHide: '',
            index: '',
            // indexList: index === '' || index === undefined ? '' : index+1,
            travellers: [],
            editMode: false,
            addTravellerBool: false,
            loading: false,
            travellersListIsn: [],
        }
    },
    methods: {
        getDatePicker() {
            const vm = this;
            vm.document.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        getBranchData() {
            this.axios.post('/getSearchBranch', {}).then(response => {
                this.options = response.data.result;
            })
        },
        getCounterpartyType() {
            this.axios.post('/document/getCounterpartyType', {}).then((response) => {
                this.counterpartyType = response.data.counterpartyType;
            });
        },
        getUserList() {
            let data = {sz:true}
            this.axios.post('/full/getFullBranch', data).then((response) => {
                this.userList = response.data.result;
                this.isLoading = false;
            });
        },
        deleteTraveller(res){
            for(let i=0; i<this.travellersList.length; i++){
                if(this.travellersList[0].valn1 == '' && this.travellersList[0].isn == '0'){
                    this.travellersList = []
                    this.$parent.$refs.modalTravellerList.click()
                }
                if(this.travellersList[i].valn1 == undefined && this.travellersList[i].isn == '0' || this.travellersList[i].valn1 == '' && this.travellersList[i].isn == '0'){
                    delete this.travellersList[i]
                    this.travellersList.splice(i, 1)
                    this.addTravellerBool = false
                    this.addTravellerBool = true
                    if(this.travellersList.length == 0){
                        this.travellersList = []
                        this.$parent.$refs.modalTravellerList.click()
                    }
                }
            }
            this.travellersListCheck[0] = res
            let data = {
                results: this.results,
                travellersDocIsn: this.travellersDocIsn,
                travellersList: this.travellersList,
                travellersListCheck: res,
                travellersListCheckBool: this.travellersListCheckBool,
                travellersListClassIsn: this.travellersListClassIsn
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.loading = false;
                        this.results.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        for (let i=0; i<this.travellersList.length; i++){
                            if(res == this.travellersList[i]){
                                delete this.travellersList[i]
                                this.travellersList.splice(i, 1)
                            }
                        }
                        this.travellersListCheckBool = response.data.travellersListCheckBool
                        this.travellersListCheck = []
                        alert('Успешно удалено!')
                    } else {
                        this.addChange = false;
                        this.loading = false;
                        alert(response.data.error);
                    }
                    this.loading = false;
                })
                .catch(function (error) {
                    // alert(response.data.error);
                });
        },
        saveTraveller() {
            for(let i=0; i<this.travellersList.length; i++){
                if(this.travellersList[0].valn1 == '' && this.travellersList[0].isn == '0'){
                    this.travellersList = []
                    this.$parent.$refs.modalTravellerList.click()
                }
                if(this.travellersList[i].valn1 == undefined && this.travellersList[i].isn == '0' || this.travellersList[i].valn1 == '' && this.travellersList[i].isn == '0'){
                    delete this.travellersList[i]
                    this.travellersList.splice(i, 1)
                    this.addTravellerBool = false
                    this.addTravellerBool = true
                    if(this.travellersList.length == 0){
                        this.travellersList = []
                        this.$parent.$refs.modalTravellerList.click()
                    }
                }
            }
            this.loading = true;
            let data = {
                results: this.results,
                travellersDocIsn: this.travellersDocIsn,
                travellersList: this.travellersList,
                travellersListCheck: this.travellersListCheck,
                travellersListCheckBool: this.travellersListCheckBool,
                travellersListClassIsn: this.travellersListClassIsn
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.loading = false;
                        this.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        this.results.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        this.results.stage = response.data.stage;
                        for (let i=0; i<this.travellersList.length; i++){
                            this.travellersList[i].isn = '1'
                        }
                        this.travellersListCheckBool = response.data.travellersListCheckBool
                        let dat = {
                            docisn: this.travellersDocIsn,
                            isn: this.travellersListClassIsn,
                        }
                        this.axios.post('/document/travellersList', dat).then((response) => {
                            for(let i=0; i<this.travellersList.length; i++){
                                this.travellersList[i].isn = response.data.docrows[i].isn
                            }
                            alert('Успешно сохранено!')
                            this.loading = false;
                        })
                    } else {
                        this.loading = false;
                        alert(response.data.error);
                    }
                    this.loading = false;
                })
                .catch(function (error) {
                    // alert(response.data.error);
                });
        },
        addTraveller(){
            let i = this.travellersList.length ? this.travellersList.length : 0
            this.travellersList[i] = {
                isn: "0",
                valn1: '',
                delete: '0',
            }
            this.addTravellerBool = true
            this.addTravellerBool = false
            this.addTravellerBool = true

        },
        close() {
            this.$parent.$refs.modalTravellerList.click()
        },
        preloader(show){
            if(show){
                document.getElementById('preloader').style.display = 'flex';
                this.modalHide = 'z-index:0;';
            } else {
                document.getElementById('preloader').style.display = 'none';
                this.modalHide = 'z-index:1050;';
            }
        }
    },
}
</script>

<style scoped>

</style>
