<template>
    <div>
        <div class="inner-wrap t-0">
            <div class="form-group mt-1">
                <button class="btn btn-primary mt-2" v-on:click="login">Подключиться</button>
                <button class="btn btn-primary mt-2" v-on:click="getVersion" >Версия</button>
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
            }
        },
        methods: {
            login: function () {
                // axios.get('/getEDS').then((response) => {
                //     console.log(response.data);
                // })
                var settings = {
                    "url": "http://ncalayer.uchet.kz:8080/getSignToken",
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({"company_token":"7006cebf-82b9-4dbf-9cca-7d35d2eaf763"}),
                };

                $.ajax(settings).done(function (response) {
                    token = JSON.parse(response).token // Получаем токен для подписания
                });
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
                        vm.installModule()
                    }else{
                        vm.openWindow();
                    }
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    console.log(msg);
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
                var webSocket = new WebSocket('wss://127.0.0.1:13579');
                webSocket.onopen = function () {
                    webSocket.send('{\n' +
                        '                    "module":"kz.uchet.signUtil.commonUtils",\n' +
                        '                    "method":"getFilePath",\n' +
                        '                    "args":["all",""]\n' +
                        '                }');
                };
                webSocket.onmessage = function(msg) {
                    // console.log(msg)
                    console.log(msg);
                }
                webSocket.onerror = function(msg) {
                    // TODO PUSH ERROR
                    console.log(msg);
                }
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