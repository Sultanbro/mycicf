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
                <button class="btn btn-primary mt-2" v-on:click="connectSocket('check')">Выберите файл для проверки</button>
                <div class="mt-2 mb-1" v-if="selectedFile != ''">Выбранный для проверки файл {{ selectedFile }}</div>
                <div>
                    <button class="btn btn-primary mt-2" v-on:click="checkSignedFilessss">Показать информацию о подписях</button>
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
                <button class="btn btn-primary mt-2" v-on:click="connectSocket()" >Выбрать ключ для подписания</button>
                <div class="mt-2 mb-1" v-if="selectedECPFile != ''">Выбранный ключ {{ selectedECPFile }}</div>
                <div class="mt-1 mb-1">
                    <label class="mt-1 mb-1 col-md-12">Пароль от ключа</label>
                    <input class="form-control mt-1 mb-1" placeholder="Введите пароль" type="password" v-model="sign.password" style="width: 150px;margin: 0 auto;">
                </div>
                <button class="btn btn-primary mt-2" v-on:click="getToken">Подписать</button>
            </div>
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
            sendSolution: Function,
            showView: String,
            doc_row_list_inner_other: Object,
            coordination: Object,
            doc_row_error: String
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
                                vm.openWindow();
                            } else {
                                vm.getKey();
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
                    self.loader(false);
                    return false;
                }

                if(self.sign.token != '') {
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    webSocket.onopen = function () {
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
                                // --------------------------------
                                let curr_isn = self.coordination.ISN;   //self.doc_row_list_inner_other[1][i].ISN;
                                self.axios.post("/coordinationSaveAttachment", {
                                    isn: curr_isn,  //self.doc_row_list_inner_other[1][i].ISN,
                                    //isn: self.$parent.coordination.ISN,
                                    //id: self.$parent.coordination.ID,
                                    requestType: 'D',
                                    fileType: 'base64',
                                    file: self.signedFile,
                                    fileExt: 'sig',
                                }).then((response) => {
                                    if (!response.data.success) {
                                        alert(response.data.error);
                                        self.loader(false);
                                    } else {
                                        self.getEdsInfo(response.data.result,curr_isn);
                                    }
                                });
                                // for(var i = 0;Object.keys(self.doc_row_list_inner_other[1]).length > i;i++){
                                //     let curr_isn = self.doc_row_list_inner_other[1][i].ISN;
                                //     self.axios.post("/coordinationSaveAttachment", {
                                //         isn: curr_isn,  //self.doc_row_list_inner_other[1][i].ISN,
                                //         //isn: self.$parent.coordination.ISN,
                                //         //id: self.$parent.coordination.ID,
                                //         requestType: 'A',
                                //         fileType: 'base64',
                                //         file: self.signedFile,
                                //         fileExt: 'sig',
                                //     }).then((response) => {
                                //         if (!response.data.success) {
                                //             alert(response.data.error);
                                //         } else {
                                //             self.getEdsInfo(response.data.result,curr_isn);
                                //         }
                                //     });
                                // }
                                //---------------------------------
                                // this.axios.post("/coordinationSaveAttachment", {
                                //     isn: self.$parent.coordination.ISN,
                                //     id: self.$parent.coordination.ID,
                                //     requestType: 'D',
                                //     fileType: 'base64',
                                //     file: self.signedFile,
                                //     fileExt: 'sig',
                                // }).then((response) => {
                                //     if (!response.data.success) {
                                //         alert(response.data.error);
                                //     } else {
                                //         self.getEdsInfo(response.data.result);
                                //     }
                                // });
                                // if(type == 'coordination' && solution != undefined){
                                //     self.$parent.sendSolution(solution);
                                // }
                            } else {
                                alert(result.message);
                                self.loader(false);
                                //webSocket.close();
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        //webSocket.close();
                        self.loader(false);
                        console.log(msg);
                    }
                }
            },
            getEdsInfo(docIsn,agreementISN){    // docIsn - isn документа
                let self = this;
                self.signedFileInfo = [];
                self.loader(true);
                axios.post("/eds-by-isn", {
                    isn: docIsn
                }).then((response) => {
                    if(response.data.success) {
                        var obj = response.data.result;
                        if(obj.length > 0){
                            for(let index in obj) {
                                this.checkSignedFile(obj[index].filepath,obj[index].docISN,agreementISN);     // Проверить подписанные файлы
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
            getToken(type,solution){
                if(this.doc_row_error != ''){
                    alert(this.doc_row_error);
                } else {
                    this.loader(true);
                    this.signedFile = '';
                    axios.get('/getEDS').then((response) => {
                        if (response.data.success) {
                            this.sign.token = response.data.result.token;
                            this.signing(type, solution);     // подписываем
                        } else {
                            alert('Ошибка получения токена. Попробуйте чуть позже');
                            this.loader(false);
                        }
                    });
                }
            },
            checkSignedFilessss(){
                this.signedFileInfo = [];
                let self = this;
                if(self.selectedFile != '') {
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    self.loader(true);
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
                                    self.loader(false);
                                }
                            } else {
                                alert(result.message);
                                self.loader(false);
                                //webSocket.close();
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        //webSocket.close();
                        this.loader(false);
                        console.log(msg);
                    }
                } else {
                    alert('Выберите пожалуйста файл');
                }
            },
            checkSignedFile(url,toKias,agreementISN,edsType){        // Посмотреть подписанный файл
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
                                    //if(self.signedFileInfo.length > 0) {
                                    //    self.signedFileInfo.push(result.responseObjects[0]);
                                    //} else {
                                        self.signedFileInfo = result.responseObjects;
                                    //}
                                    if(toKias != undefined){    // Если нужно записать данные в киас, toKias - это isn документа
                                        self.sendEdsInfoToKias(toKias,agreementISN,edsType); // Записываем в киас данные из подписанного файла
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
            sendEdsInfoToKias(docIsn,agreementISN,edsType){ // docIsn - isn документа, self.isn - это исн котировки
                let self = this;
                let obj = self.signedFileInfo;
                self.loader(true);
                for (let index in obj) {
                    axios.post("/save_eds_info", {
                        data: obj[index],
                        isn: docIsn,
                        refIsn: agreementISN    //self.isn
                    }).then((response) => {
                        if (response.data.success) {
                            //if(type == 'coordination' && solution != undefined){
                                //self.$parent.sendSolution(1);
                            //}
                            if(edsType != 'cms') {
                                if(self.coordination.RefAgrISN != 0 && self.coordination.RefAgrISN != undefined){
                                    //self.sendCmsInfo(self.coordination.RefAgrISN);
                                    console.log('1');
                                    let self = this;
                                    self.loader(true);
                                    let agrIsn = self.coordination.RefAgrISN;
                                    axios.post("/eds-by-isn", {
                                        isn: '',
                                        refISN: agrIsn,
                                        type: 'A',
                                        edsType: 'cms'
                                    }).then((response) => {
                                        if (response.data.success) {
                                            var obj = response.data.result;
                                            if (obj.length > 0) {
                                                for (let index in obj) {
                                                    this.checkSignedFile(obj[index].filepath, obj[index].docISN, agrIsn, 'cms');     // Проверить подписанные файлы
                                                }
                                            } else {
                                                self.loader(false);
                                            }
                                        } else {
                                            alert(response.data.error);
                                            self.loader(false);
                                        }
                                    });
                                } else {
                                    if(Object.keys(self.doc_row_list_inner_other).length > 0) {
                                        for (var i = 0; Object.keys(self.doc_row_list_inner_other[1]).length > i; i++) {
                                            if (self.doc_row_list_inner_other[1][i].ISN != undefined) {
                                                //self.sendCmsInfo(self.doc_row_list_inner_other[1][i].ISN);
                                                console.log('2');
                                                let self = this;
                                                self.loader(true);
                                                let agrIsn = self.doc_row_list_inner_other[1][i].ISN;
                                                axios.post("/eds-by-isn", {
                                                    isn: '',
                                                    refISN: agrIsn,
                                                    type: 'A',
                                                    edsType: 'cms'
                                                }).then((response) => {
                                                    if (response.data.success) {
                                                        var obj = response.data.result;
                                                        if (obj.length > 0) {
                                                            for (let index in obj) {
                                                                this.checkSignedFile(obj[index].filepath, obj[index].docISN, agrIsn, 'cms');     // Проверить подписанные файлы
                                                            }
                                                        } else {
                                                            self.loader(false);
                                                        }
                                                    } else {
                                                        alert(response.data.error);
                                                        self.loader(false);
                                                    }
                                                });
                                            }
                                        }
                                    } else {
                                        self.sendSolution(1);
                                        self.loader(false);
                                    }
                                }
                                this.edsConfirmed = true;
                                self.loader(false);
                            } else {
                                this.edsConfirmed = true;
                                self.loader(false);
                            }



                            // if(edsType != 'cms') {
                            //     axios.post("/eds-by-isn", {
                            //         isn: '',
                            //         refISN: agreementISN,
                            //         type: 'A',
                            //         edsType: 'cms'
                            //     }).then((response) => {
                            //         if (response.data.success) {
                            //             var obj = response.data.result;
                            //             if (obj.length > 0) {
                            //                 for (let index in obj) {
                            //                     this.checkSignedFile(obj[index][0], docIsn, agreementISN, 'cms');     // Проверить подписанные файлы
                            //                 }
                            //             }
                            //             self.loader(false);
                            //         } else {
                            //             alert(response.data.error);
                            //             self.loader(false);
                            //         }
                            //     });
                            // }





                            //self.loader(false);
                        } else {
                            alert(response.data.error);
                        }
                    });
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
            },
            loader(show){
                this.loading = show;
            },

            // sendCmsInfo(agrIsn){
            //     let self = this;
            //     axios.post("/eds-by-isn", {
            //         isn: '',
            //         refISN: agrIsn,
            //         type: 'A',
            //         edsType: 'cms'
            //     }).then((response) => {
            //         if (response.data.success) {
            //             var obj = response.data.result;
            //             if (obj.length > 0) {
            //                 for (let index in obj) {
            //                     this.checkSignedFile(obj[index].filepath, obj[index].docISN, agrIsn, 'cms');     // Проверить подписанные файлы
            //                 }
            //             }
            //             self.loader(false);
            //         } else {
            //             alert(response.data.error);
            //             self.loader(false);
            //         }
            //     });
            // }
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