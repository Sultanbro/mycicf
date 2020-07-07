<template>
    <div>
        <div class="inner-wrap t-0 text-center">
            <!--div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="login">Подключиться</button>
                <button class="btn btn-primary mt-2" v-on:click="getVersion" >Версия</button>
            </div>

            <div class="form-group mt-1">
                <input type="text" v-model="sign.password">
                <button class="btn btn-primary mt-2" v-on:click="signing" >Подписать</button>

                <button class="btn btn-primary mt-2" v-on:click="getEcp" >getEcp</button>
                <button class="btn btn-primary mt-2" v-on:click="getToken" >getToken</button>
            </div-->

            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="getVersion" >Выбрать файл для подписания</button>
                <div class="mt-1 mb-1" v-if="selectedFile != ''">Выбранный файл {{ selectedFile }}</div>
                <div class="mt-1" v-if="selectedFileDir != ''">Выбранный файл сохранится сюда {{ selectedFileDir }}</div>
            </div>
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="getEcp" >Выбрать ключ для подписания</button>
                <div class="mt-2 mb-1" v-if="selectedECPFile != ''">Выбранный ключ {{ selectedECPFile }}</div>
                <div class="mt-1 mb-1">
                    <label class="mt-1 mb-1 col-md-12">Пароль для ключа</label>
                    <input class="mt-1 mb-1" placeholder="Введите пароль" type="text" v-model="sign.password">
                </div>
                <button class="btn btn-primary mt-2" v-on:click="getToken">Подписать</button>
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
                selectedECPFile: ''
            }
        },
        methods: {
            login: function () {
                axios.get('/getEDS').then((response) => {
                    console.log(response.data);
                })
                // var settings = {
                //     "url": "http://ncalayer.uchet.kz:8080/getSignToken",
                //     "method": "GET",
                //     "timeout": 0,
                //     "headers": {
                //         "Content-Type": "application/json"
                //     },
                //     "data": JSON.stringify({"company_token":"7006cebf-82b9-4dbf-9cca-7d35d2eaf763"}),
                // };
                //
                // $.ajax(settings).done(function (response) {
                //     token = JSON.parse(response).token // Получаем токен для подписания
                // });
            },
            getVersion: function () {
                this.checkModule();
            },
            checkModule(){
                var vm = this;
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
                    console.log(result);
                    if(!result.success && result.errorCode === 'MODULE_NOT_FOUND'){
                        webSocket.close();
                        vm.installModule()
                    }else{
                        webSocket.close();
                        vm.openWindow();
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    webSocket.close();
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
                        self.selectedFile = result.responseObject.path;
                        self.selectedFileDir = result.responseObject.filedir;
                        webSocket.close();
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    webSocket.close();
                    console.log(msg);
                }
            },
            getEcp(){
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
                        self.selectedECPFile = result.responseObject.path;
                        webSocket.close();
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    console.log(msg);
                    webSocket.close();
                }
            },

            signing(){
                let self = this;
                if(self.sign.token != '') {
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    webSocket.onopen = function () {
                        webSocket.send('{\n' +
                            '                    "module":"kz.uchet.signUtil.commonUtils",\n' +
                            '                    "lang":"en",\n' +
                            '                    "method":"signFileFromDiskAndSaveToDiskApi",\n' +
                            '                    "args":["'+self.sign.token+'","' + self.selectedFile + '","' + self.selectedFileDir + '","' + self.selectedECPFile + '","' + self.sign.password + '","PKCS12"]\n' +
                            '                }');
                    };

                    webSocket.onmessage = function (msg) {
                        var result = JSON.parse(msg.data);
                        if(result.code) {
                            if (result.code != 200) {
                                alert(result.message);
                                webSocket.close();
                            } else {
                                console.log(result.message);
                                webSocket.close();
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        webSocket.close();
                        console.log(msg);
                    }
                }
            },
            getToken(){
                axios.get('/getEDS').then((response) => {
                    if(response.data.success){
                        this.sign.token = response.data.result.token;
                        this.signing();
                    } else {
                        alert('Ошибка получения токена. Попробуйте чуть позже');
                    }
                });
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

    function getTok(){
        // var settings = {
        //     "url": "http://ncalayer.uchet.kz:8080/getSignToken",
        //     "method": "GET",
        //     "timeout": 0,
        //     "headers": {
        //         "Content-Type": "application/jsonp"
        //     },
        //     "dataType": "json",
        //     //"jsonp": "jsonpcallback",
        //     "data": JSON.stringify({"company_token":"7006cebf-82b9-4dbf-9cca-7d35d2eaf763"}),
        // };
        //
        // $.ajax(settings).done(function (response) {
        //     console.log(response);
        //     console.log(JSON.parse(response));
        //     //var token = JSON.parse(response).token // Получаем токен для подписания
        // });

        var settings = {
            "url": "http://ncalayer.uchet.kz:8080/getSignToken",
            "method": "POST",
            "timeout": 0,
            // "headers": {
            //     "Access-Control-Allow-Origin": "*"
            // },
            // "async": false,
            // "crossDomain": true,
            //"dataType": 'jsonp',
            "headers": {
                'X-Requested-With': 'XMLHttpRequest'
            },
            "data": JSON.stringify({"company_token":"7006cebf-82b9-4dbf-9cca-7d35d2eaf763"}),
            //"processData": true
            //data: {company_token: '7006cebf-82b9-4dbf-9cca-7d35d2eaf763'}
            //"type": 'dataType',
            //crossDomain: true,
            dataType: 'jsonp',
        };

        $.ajax(settings).done(function (response) {
            console.log(JSON.parse(response));
            token = JSON.parse(response).token // Получаем токен для подписания
        });

        // $.ajax({
        //     url: 'http://ncalayer.uchet.kz:8080/getSignToken',
        //     type: 'GET',
        //     dataType: 'jsonp',
        //     //jsonp: 'jsonpcallback',
        //     data: {
        //         company_token: '7006cebf-82b9-4dbf-9cca-7d35d2eaf763'
        //     },
        //     success: function (response) {
        //         //console.log(response);
        //     },
        //     error: function (data){
        //         console.log(data);
        //     }
        // });
    }


</script>

<style scoped>

</style>