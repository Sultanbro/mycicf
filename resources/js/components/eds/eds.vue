<template>
    <div>
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
                <button class="btn btn-primary mt-2" v-on:click="getToken()">Подписать</button>
            </div>
        </div>
        <div v-show="loading" class="text-center"><img src="/images/loading.gif"></div>
    </div>
</template>

<script>
    // const getBase64FromUrl = async (url) => {
    //     const data = await fetch(url);
    //     const blob = await data.blob();
    //     return new Promise((resolve) => {
    //         const reader = new FileReader();
    //         reader.readAsDataURL(blob);
    //         reader.onloadend = function() {
    //             const base64data = reader.result;
    //             //resolve(base64data);
    //             console.log(base64data);
    //         }
    //     });
    // };
    const axios = require('axios');
    export default {
        name: "eds",
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
            coordination: Object
        },
        created(){
            //var url = "\\192.168.1.36\FILESKIAS$\D\33\877\D33877881\3860618.sig";
        },
        methods: {
            convertFileToBase64(url){
                var xhr = new XMLHttpRequest();
                xhr.open("GET", url, true);
                xhr.responseType = "blob";
                xhr.onload = function (e) {
                    console.log(this.response);
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var res = event.target.result;
                        console.log(res)
                    }
                    var file = this.response;
                    reader.readAsDataURL(file)
                };
                xhr.send()
            },
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
            getToken(signedBase64, agreementISN){
                this.loader(true);
                this.signedFile = '';
                axios.get('/getEDS').then((response) => {
                    if(response.data.success){
                        this.sign.token = response.data.result.token;
                        this.signing(signedBase64, agreementISN);     // подписываем
                    } else {
                        alert('Ошибка получения токена. Попробуйте чуть позже');
                        this.loader(false);
                    }
                });
            },
            signing(signedBase64, agreementISN){    // Подписание ЛС. Если signedBase64 != undefined значит его подписывают во второй раз
                let self = this;
                if(this.selectedECPFile == '' || this.sign.password == ''){
                    alert('Укажите пожалуйста данные ЭЦП ключа');
                    self.loader(false);
                    return false;
                }
                let base64 = signedBase64 != undefined ? signedBase64 : self.base64String;

                if(self.sign.token != '') {
                    var webSocket = new WebSocket('wss://127.0.0.1:13579');
                    webSocket.onopen = function () {
                        var responseObj = {
                            module: 'kz.uchet.signUtil.commonUtils',
                            lang: 'en',
                            method: 'signFileAndReturnBase64Api',
                            args: [
                                self.sign.token,
                                base64,
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
                                let curr_isn = self.coordination.ISN;   //self.doc_row_list_inner_other[1][i].ISN;
                                let ref_isn = agreementISN != undefined ? agreementISN : '';
                                let ext = agreementISN != undefined ? 'cms' : 'sig';
                                let requestType = agreementISN != undefined ? 'A' : 'D';
                                self.axios.post("/coordinationSaveAttachment", {
                                    isn: curr_isn,  //self.doc_row_list_inner_other[1][i].ISN,
                                    refISN: ref_isn,
                                    //isn: self.$parent.coordination.ISN,
                                    //id: self.$parent.coordination.ID,
                                    requestType: requestType,
                                    fileType: 'base64',
                                    file: self.signedFile,
                                    fileExt: ext,
                                }).then((response) => {
                                    if (!response.data.success) {
                                        alert(response.data.error);
                                        self.loader(false);
                                    } else {
                                        if(signedBase64 == undefined) {
                                            self.getSignedFile(response.data.result, curr_isn, agreementISN);     // Если подписание прошло и в киасе записалось
                                        }
                                    }
                                });
                            } else {
                                alert(result.message);
                                self.loader(false);
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        self.loader(false);
                        console.log(msg);
                    }
                }
            },
            getSignedFile(docIsn, coordinationISN, agreementISN){    // docIsn - isn документа   Берем подписанный файл из киаса
                let self = this;
                self.signedFileInfo = [];
                self.loader(true);
                axios.post("/eds-by-isn", {
                    isn: docIsn,
                    refISN: agreementISN != undefined ? agreementISN : '',
                }).then((response) => {
                    if(response.data.success) {
                        var obj = response.data.result;
                        if(obj.length > 0){
                            for(let index in obj) {
                                this.checkSignedFile(obj[index].filepath,obj[index].signedBase64,obj[index].docISN,agreementISN);     // Проверить подписанные файлы (вытаскиваем данные подписи)
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
            checkSignedFile(url,signedBase64,toKias,agreementISN,edsType){        // Посмотреть подписанный файл (достаем данные подписи)
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

                                    //console.log(self.convertFileToBase64(signedBase64));

                                    if(toKias != undefined){    // Если нужно записать данные в киас, toKias - это isn документа
                                        self.sendEdsInfoToKias(toKias,signedBase64, agreementISN,edsType); // Записываем в киас данные из подписанного файла
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
                                    self.loader(false);
                                }
                            } else {
                                alert(result.message);
                                self.loader(false);
                            }
                        }
                    }
                    webSocket.onerror = function (msg) {
                        // TODO PUSH ERROR
                        this.loader(false);
                        console.log(msg);
                    }
                } else {
                    alert('Выберите пожалуйста файл');
                }
            },
            sendEdsInfoToKias(docIsn, signedBase64, agreementISN, edsType){ // docIsn - isn документа, self.isn - это исн котировки
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
                            if(edsType != 'cms') {
                                if(self.coordination.RefAgrISN != 0 && self.coordination.RefAgrISN != undefined){   // Если договор один (если одна привязка)
                                    //self.sendCmsInfo(self.coordination.RefAgrISN);
                                    console.log('1');
                                    let self = this;
                                    self.loader(true);
                                    let agrIsn = self.coordination.RefAgrISN;
                                    axios.post("/eds-by-isn", {                     // Берем подписанный файл из киаса
                                        isn: '',
                                        refISN: agrIsn,
                                        type: 'A',
                                        edsType: 'cms'
                                    }).then((response) => {
                                        if (response.data.success) {
                                            var obj = response.data.result;
                                            if (obj.length > 0) {
                                                for (let index in obj) {
                                                    this.checkSignedFile(obj[index].filepath, obj[index].signedBase64, obj[index].docISN, agrIsn, 'cms');     // Проверить подписанные файлы
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
                                    if(Object.keys(self.doc_row_list_inner_other).length > 0) {     // Если договоров больше одного
                                        for (var i = 0; Object.keys(self.doc_row_list_inner_other[1]).length > i; i++) {
                                            if (self.doc_row_list_inner_other[1][i].ISN != undefined) {
                                                //self.sendCmsInfo(self.doc_row_list_inner_other[1][i].ISN);
                                                console.log('2');
                                                let self = this;
                                                self.loader(true);
                                                let agrIsn = self.doc_row_list_inner_other[1][i].ISN;
                                                axios.post("/eds-by-isn", {                                 // Берем подписанный файл из киаса
                                                    isn: '',
                                                    refISN: agrIsn,
                                                    type: 'A',
                                                    edsType: 'cms'
                                                }).then((response) => {
                                                    if (response.data.success) {
                                                        var obj = response.data.result;
                                                        if (obj.length > 0) {
                                                            for (let index in obj) {
                                                                this.checkSignedFile(obj[index].filepath, obj[index].signedBase64, obj[index].docISN, agrIsn, 'cms');     // Проверить подписанные файлы
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
                                if(agreementISN != undefined && agreementISN != null) {
                                    self.getToken(signedBase64,agreementISN);
                                }
                                this.edsConfirmed = true;
                                self.loader(false);
                            }
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
        },
    }
</script>

<style scoped>

</style>