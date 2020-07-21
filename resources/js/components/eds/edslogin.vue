<template>
    <div>
        <!--div class="inner-wrap t-0 text-center">
            <div class="mt-1 mb-1">Какое действие желаете выполнить?</div>
            <button class="btn btn-primary mt-2" v-on:click="showView = 'sign',clearData()">Подписать</button>
            <button class="btn btn-primary mt-2" v-on:click="showView = 'check',clearData()">Проверить</button>
        </div-->

        <!--div class="inner-wrap t-0 text-center" v-if="showView == 'sign'">
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="connectSocket" >Выбрать файл для подписания</button>
                <div class="mt-1 mb-1" v-if="selectedFile != ''">Выбранный файл {{ selectedFile }}</div>
                <div class="mt-1" v-if="selectedFileDir != ''">Выбранный файл сохранится сюда {{ selectedFileDir }}</div>
            </div>
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="getKey" >Выбрать ключ для подписания</button>
                <div class="mt-2 mb-1" v-if="selectedECPFile != ''">Выбранный ключ {{ selectedECPFile }}</div>
                <div class="mt-1 mb-1">
                    <label class="mt-1 mb-1 col-md-12">Пароль для ключа</label>
                    <input class="mt-1 mb-1" placeholder="Введите пароль" type="text" v-model="sign.password">
                </div>
                <button class="btn btn-primary mt-2" v-on:click="getToken">Подписать</button>
                <div class="mt-2 mb-1" v-if="signedFile != ''">Подписанный файл находится здесь: {{ signedFile }}</div>
            </div>
        </div-->

        <div class="inner-wrap t-0 text-center" v-if="showView == 'check'">
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="connectSocket">Выберите файл для проверки</button>
                <div class="mt-2 mb-1" v-if="selectedFile != ''">Выбранный для проверки файл {{ selectedFile }}</div>
                <div>
                    <button class="btn btn-primary mt-2" v-on:click="checkSignedFile">Показать информацию о подписях</button>
                </div>

                <div class="mt-2 mb-1" v-if="signedFileInfo.length > 0">
                    <div class="info" v-for="info,index in signedFileInfo">
                        <div>Подписант №{{ index+1 }}</div>
                        <div>ИИН: {{ info.iin }}</div>
                        <div>ФИО: {{ info.name }}</div>
                        <div>Дата подписания: {{ info.tspDate }}</div>
                        <div>Период действия ключа: {{ info.certificateValidityPeriod }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="inner-wrap t-0 text-center" v-if="showView == 'sign'">
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="getKey" >Выбрать ключ для подписания</button>
                <div class="mt-2 mb-1" v-if="selectedECPFile != ''">Выбранный ключ {{ selectedECPFile }}</div>
                <div class="mt-1 mb-1">
                    <label class="mt-1 mb-1 col-md-12">Пароль от ключа</label>
                    <input class="form-control mt-1 mb-1" placeholder="Введите пароль" type="text" v-model="sign.password" style="width: 150px;margin: 0 auto;">
                </div>
                <!--button class="btn btn-primary mt-2" v-on:click="getToken">Подписать</button-->
            </div>
        </div>
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
                signedFileInfo: []
            }
        },
        props: {
            showView: String,
        },
        methods: {
            connectSocket(){
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
                            vm.openWindow();
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
            openWindow(){
                this.signedFileInfo = [];
                let self = this;
                var webSocket = new WebSocket('wss://127.0.0.1:13579');
                webSocket.onopen = function () {
                    webSocket.send('{\n' +
                        '                    "module":"kz.uchet.signUtil.commonUtils",\n' +
                        '                    "method":"getFilePath",\n' +
                        '                    "args":["all",""]\n' +
                        '                }');
                };
                webSocket.onmessage = function(msg) {
                    var result = JSON.parse(msg.data);
                    console.log(result)
                    if(result.code == '200' || result.code == 200) {
                        self.selectedFile = result.responseObject.path != undefined ? result.responseObject.path : '';
                        self.selectedFileDir = result.responseObject.filedir != undefined ? result.responseObject.filedir+'\\' : '';
                        //webSocket.close();
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    //webSocket.close();
                    console.log(msg);
                }
            },
            getKey(){
                this.signedFile = '';
                let self = this;
                var webSocket = new WebSocket('wss://127.0.0.1:13579');
                webSocket.onopen = function () {
                    webSocket.send('{\n' +
                        '                    "module":"kz.uchet.signUtil.commonUtils",\n' +
                        '                    "method":"getFilePath",\n' +
                        '                    "args":["all",""]\n' +
                        '                }');
                };
                webSocket.onmessage = function(msg) {
                    var result = JSON.parse(msg.data);
                    //console.log(result)
                    if(result.code == '200' || result.code == 200) {
                        self.selectedECPFile = result.responseObject.path != undefined ? result.responseObject.path : '';
                        //webSocket.close();
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    console.log(msg);
                    //webSocket.close();
                }
            },

            signing(type, solution){
                let self = this;

                if(this.selectedECPFile == '' || this.sign.password == ''){
                    alert('Укажите пожалуйста данные ЭЦП ключа');
                    return false;
                }

                if(self.sign.token != '') {
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    webSocket.onopen = function () {

                        // var responseObj = {
                        //     module: 'kz.uchet.signUtil.commonUtils',
                        //     lang: 'en',
                        //     method: 'signFileFromDiskAndSaveToDiskApi',
                        //     args: [
                        //         self.sign.token,
                        //         self.selectedFile,
                        //         self.selectedFileDir,
                        //         self.selectedECPFile,
                        //         self.sign.password,
                        //         'PKCS12'
                        //     ]
                        // };


                        var responseObj = {
                            module: 'kz.uchet.signUtil.commonUtils',
                            lang: 'en',
                            method: 'signFileAndReturnBase64Api',
                            args: [
                                self.sign.token,
                                self.base64String,
                                self.selectedECPFile,
                                self.sign.password,
                                'PKCS12'
                            ]
                        };


                        webSocket.send(JSON.stringify(responseObj));
                    };

                    webSocket.onmessage = function (msg) {
                        var result = JSON.parse(msg.data);
                        if(result.code) {
                            if (result.code == 200) {
                                self.signedFile = result.responseObject;
                                //alert('ЭЦП успешно подписан.Можно продолжать');
                                //alert(result.message);
                                //webSocket.close();
                                if(type == 'coordination' && solution != undefined){
                                    self.$parent.sendSolution(solution);
                                }
                            } else {
                                alert(result.message);
                                //webSocket.close();
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        //webSocket.close();
                        console.log(msg);
                    }
                }
            },
            getToken(type,solution){
                this.signedFile = '';
                axios.get('/getEDS').then((response) => {
                    if(response.data.success){
                        this.sign.token = response.data.result.token;
                        this.signing(type,solution);     // подписываем
                    } else {
                        alert('Ошибка получения токена. Попробуйте чуть позже');
                    }
                });
            },
            checkSignedFile(){
                this.signedFileInfo = [];
                let self = this;
                if(self.selectedFile != '') {
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    webSocket.onopen = function () {
                        var responseObj = {
                            module: 'kz.uchet.signUtil.commonUtils',
                            lang: 'en',
                            method: 'checkCMS',
                            args: [self.selectedFile]
                        };
                        webSocket.send(JSON.stringify(responseObj));
                    };

                    webSocket.onmessage = function (msg) {
                        var result = JSON.parse(msg.data);
                        if(result.code) {
                            if (result.code == 200) {
                                if(result.responseObjects.length > 0) {
                                    self.signedFileInfo = result.responseObjects;
                                    //webSocket.close();
                                }
                            } else {
                                alert(result.message);
                                //webSocket.close();
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        //webSocket.close();
                        console.log(msg);
                    }
                } else {
                    alert('Выберите пожалуйста файл');
                }
            },
            clearData(){
                this.sign.token = '';
                // this.selectedFile = '';
                // this.selectedFileDir = '';
                this.selectedECPFile = '';
                this.sign.password = '';
                this.signedFile = '';
                this.signedFileInfo = [];
            }
        },

        // created: function() {
        //     var message = {
        //         module: "kz.gov.pki.ncalayerservices.accessory",
        //         method: "installBundle",
        //         symname: "kz.uchet.signUtil"
        //     };
        //
        //     let websocket = new WebSocket('wss://127.0.0.1:13579');
        //     var readyState = websocket.readyState;
        //     websocket.onopen = function() {
        //         // console.log('WS подключенно');
        //         // console.log(readyState);
        //         console.log(websocket.send(message));
        //     };
        //     websocket.onclose = function(eventclose) {
        //         console.log(eventclose)
        //     }
        //     websocket.onmessage = function(msg) {
        //         console.log(msg)
        //     }
        //     websocket.onerror = function(msg) {
        //         console.log(msg)
        //     }
        // },
    }
</script>

<style scoped>

</style>