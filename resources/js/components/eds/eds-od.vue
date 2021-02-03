<template>
    <div>
        <div class="inner-wrap t-0 text-center" v-if="showView == 'sign'">
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="connectSocket()">Чекнуть</button>
            </div>
            <p v-for="(item,index) in info">
                {{ parseInt(index)+1 }}. РВ isn: {{ item.rv_isn }}
                <span class="text-success" v-if="item.confirmed == 1">прошел проверку</span>
                <span class="text-danger" v-if="item.confirmed == 0">не проверен</span>
            </p>
        </div>
        <div v-show="loading" class="text-center"><img src="/images/loading.gif"></div>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        name: "edslogin",
        data() {
            return {
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
                edsConfirmed: false
            }
        },
        props: {
            showView: String,
            doc_row_list_inner_other: Object,
            info: Object
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
                                vm.checknut();
                            } else {
                                vm.checknut();
                                //vm.getKey();
                            }
                        }
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    //webSocket.close();
                    console.log(msg);
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
                    console.log(msg);
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    console.log(msg);
                }
            },
            getEdsInfo(docIsn,doc_index){    // docIsn - isn документа
                let self = this;
                self.signedFileInfo = [];
                self.loader(true);
                axios.post("/eds-by-isn", {
                    refISN: docIsn,
                    type: 'D',
                    edsType: 'cms'
                }).then((response) => {
                    if(response.data.success) {
                        var obj = response.data.result;
                        if(obj.length > 0){
                            for(let index in obj) {
                                this.checkSignedFile(obj[index].filepath,docIsn,obj[index].docISN, doc_index,obj[index]);     // Проверить подписанные файлы  obj[index].docISN
                            }
                        } else {
                            self.loader(false);
                        }
                    } else {
                        alert(response.data.error);
                        self.loader(false);
                    }
                });
            },
            checkSignedFile(url,refIsn,docISN, doc_index,rv_data){        // Посмотреть подписанный файл
                let self = this;
                self.loader(true);
                if(url != ''){
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    self.loader(true);
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
                                    //console.log(self.signedFileInfo[0].iin);
                                    console.log(self.signedFileInfo[0].iin+'='+self.info[doc_index].iin);
                                    if(self.signedFileInfo[0].iin == self.info[doc_index].iin) {
                                        self.sendEdsInfoToKias(refIsn,docISN,doc_index); // Записываем в киас данные из подписанного файла
                                    } else {
                                        self.loader(false);
                                    }
                                }
                            } else {
                                alert(result.message);
                                self.loader(false);
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        self.loader(false);
                        alert("Убедитесь пожалуйста что у Вас установлена программа NCLayer и она запущена. Программу можно скачать по адресу https://pki.gov.kz/ncalayer/");
                    }
                } else {
                    alert('Выберите пожалуйста файл');
                }
            },
            sendEdsInfoToKias(refIsn,docIsn,doc_index){ // docIsn - isn документа, self.isn - это исн котировки
                let self = this;
                let obj = self.signedFileInfo;
                self.loader(true);
                for (let index in obj) {
                    axios.post("/save_eds_info", {
                        data: obj[index],
                        isn: docIsn,
                        refIsn: refIsn    //self.isn
                    }).then((response) => {
                        if (response.data.success) {
                            let self = this;
                            self.loader(false);
                            console.log('signed success');
                            this.info[doc_index].confirmed = 1;
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
            checknut(){
                if(Object.keys(this.info).length > 0) {
                    for(let i = 0; Object.keys(this.info).length > i; i++){
                        this.getEdsInfo(this.info[i].rv_isn,i);
                    }
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