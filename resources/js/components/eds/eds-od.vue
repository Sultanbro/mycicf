<template>
    <div>
        <div class="inner-wrap t-0 text-center" v-if="showView == 'sign'">
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="connectSocket()">Чекнуть</button>
            </div>
            <p v-for="(item,index) in info">
                {{ parseInt(index)+1 }}. РВ исн: {{ item.rv_isn }}. Номер убытка : {{ item.claim_id }}
                <span class="text-success" v-if="item.confirmed == 1">прошел проверку</span>
                <span class="text-danger" v-if="item.iin_fail == 1">не совпадает ИИН</span>
            </p>
        </div>
        <div v-show="loading" class="text-center"><img src="/images/loading.gif"></div>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        name: "eds-od",
        data() {
            return {
                confirmed: false,
                loading: false,
                seenmoney: false,
                ws: null,
                onlinePlayers: 0,
                human: {
                    pathToFile: '',
                    pathDir: '',
                },
                sign: {
                    password: '',
                    token: null,
                },
                selectedFile: '',
                selectedFileDir: '',
                base64String: 'dGVzdA==',
                selectedECPFile: '',
                signedFile:'',
                signedFileInfo: [],
                edsConfirmed: false,
                hasConfirmed: false,
            }
        },
        props: {
            showView: String,
            doc_row_list_inner_other: Object,
            info: Array,
            classIsn: Number,
            emplIsn: Number
        },
        methods: {
            connectSocket(check){
                var vm = this;
                this.signedFile = '';
                var webSocket = new WebSocket('wss://127.0.0.1:13579');
                webSocket.onopen = function () {
                    webSocket.send('{\n' +
                        '    module: "kz.uchet.signUtil.commonUtils", \n' +
                        '    method: "getVersion", \n' +
                        '    args: [""]\n' +
                        '}');
                };
                webSocket.onmessage = function(msg) {
                    var result = JSON.parse(msg.data);
                    if(!result.success && result.errorCode === 'MODULE_NOT_FOUND'){
                        vm.installModule()
                    }else{
                        if(result.code == 200) {
                            if(check != undefined) {
                                //vm.openWindow();
                                vm.checkSigns();
                            } else {
                                vm.checkSigns();
                                //vm.getKey();
                            }
                        }
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    if(msg.type == 'error') {
                        alert("Убедитесь пожалуйста что у Вас установлена программа NCLayer и она запущена. Программу можно скачать по адресу https://pki.gov.kz/ncalayer/");
                    }
                }
            },
            installModule: function(){
                var webSocket = new WebSocket('wss://127.0.0.1:13579');
                webSocket.onopen = function () {
                    webSocket.send('{\n' +
                        '    module: "kz.gov.pki.ncalayerservices.accessory", \n' +
                        '    method: "installBundle", \n' +
                        '    symname: "kz.uchet.signUtil" \n' +
                        '}');
                };
                webSocket.onmessage = function(msg) {
                    // console.log(msg)
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    //console.log(msg);
                }
            },
            getEdsInfo(docIsn,doc_index){    // docIsn - isn документа
                    let self = this;
                    self.hasConfirmed = false;
                    self.signedFileInfo = [];
                    axios.post("/eds-by-isn", {
                        refISN: docIsn,
                        type: 'D',
                        edsType: 'cms'
                    }).then((response) => {
                        if (response.data.success) {
                            var obj = response.data.result;
                            if (obj.length > 0) {
                                for (let index in obj) {
                                    this.checkSignedFile(obj[index].filepath, docIsn, obj[index].docISN, doc_index, obj[index]);     // Проверить подписанные файлы  obj[index].docISN
                                }
                            } else {
                               //...
                            }
                        } else {
                            alert(response.data.error);
                            return false;
                        }
                    });
            },
            checkSignedFile(url,refIsn,docISN, doc_index,rv_data){        // Посмотреть подписанный файл
                let self = this;
                //self.loader(true);
                if(url != ''){
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    //self.loader(true);
                    webSocket.onopen = function () {
                        var responseObj = {
                            module: 'kz.uchet.signUtil.commonUtils',
                            lang: 'en',
                            method: 'checkCMS',
                            args: [url]
                        };
                        webSocket.send(JSON.stringify(responseObj));
                    };
                    webSocket.onmessage = function (msg) {
                        var result = JSON.parse(msg.data);
                        if(result.code) {
                            if (result.code == 200) {
                                if(result.responseObjects.length > 0) {
                                    self.signedFileInfo = result.responseObjects;
                                    if(result.responseObjects[0].iin == self.info[doc_index].iin) {
                                        self.sendEdsInfoToKias(refIsn,docISN,doc_index); // Записываем в киас данные из подписанного файла
                                    } else {
                                        self.info[doc_index].iin_fail = 1;
                                        self.getOrSetDoc(doc_index);
                                    }
                                }
                            } else {
                                alert(result.message);
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        alert("Убедитесь пожалуйста что у Вас установлена программа NCLayer и она запущена. Программу можно скачать по адресу https://pki.gov.kz/ncalayer/");
                    }
                } else {
                    alert('Выберите пожалуйста файл');
                }
            },
            sendEdsInfoToKias(refIsn,docIsn,doc_index){ // docIsn - isn документа, self.isn - это исн котировки
                let self = this;
                let obj = self.signedFileInfo;
                this.loader(true);
                for (let index in obj) {
                    axios.post("/save_eds_info", {
                        data: obj[index],
                        isn: docIsn,
                        refIsn: refIsn    //self.isn
                    }).then((response) => {
                        if (response.data.success) {
                            self.info[doc_index].confirmed = 1;
                            self.hasConfirmed = true;
                            self.getOrSetDoc(doc_index);
                        } else {
                            self.getOrSetDoc(doc_index);
                        }
                    });
                }
            },
            clearData(){
                this.sign.token = '';
                this.selectedECPFile = '';
                this.sign.password = '';
                this.signedFile = '';
                this.signedFileInfo = [];
            },
            loader(show){
                this.loading = show;
            },
            getOrSetDoc(index){
                if(!this.info[index].iin_fail) {
                    console.log(this.info[index]);
                    axios.post("/get_or_set_doc", {
                        data: this.info[index]
                    }).then((response) => {
                        if (response.data.success) {
                            this.loader(false);
                            this.checkContinue(index+1);
                        } else {
                            alert(response.data.error);
                            this.checkContinue(index+1);
                            this.loader(false);
                        }
                    });
                } else {
                    axios.post("/save_fail_status", {
                        data: this.info[index],
                    }).then((response) => {
                        if (response.data.success) {
                            this.checkContinue(index+1);
                        } else {
                            this.checkContinue(index+1);
                        }
                    });
                }
            },
            saveDocument(index){
                this.loader(true);
                axios.post("/save_document", {
                    classISN: this.classIsn,
                    data: this.info[index],
                    emplISN: this.emplIsn
                }).then((response) => {
                    if (response.data.success) {
                        this.checkContinue(index+1);
                    } else {
                        this.loader(false);
                    }
                });
            },

            saveFailStatus(){

            },
            checkSigns(){
                this.loader(true);
                if(this.info.length > 0) {
                    this.getEdsInfo(this.info[0].rv_isn,0);
                }
            },
            checkContinue(index){
                if(index < this.info.length) {
                    this.getEdsInfo(this.info[index].rv_isn,index);
                } else {
                    this.loader(false);
                }
            }
        },

        created: function() {
            //...
        },
        watch: {
            'info': function(){
                console.log('this changed');
            }
        }


    }
</script>

<style scoped>

</style>