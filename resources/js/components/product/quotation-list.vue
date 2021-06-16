<script>
    export default {
        name: "quotation-list",
        data(){
            return {
                sendDA: 0,
                quotationStatus: '',
                type: 0,
                contractSelected: false,
                nshb: 1,
            }
        },
        props:{
            pageUrl: String,
            parametres: String
        },
        methods:{
            filter(){
                window.location.href = this.pageUrl+'?DA='+this.sendDA+'&status='+this.quotationStatus+'&type='+this.type+'&nshb='+this.nshb+'&isBitrix='+window.bitrixData.isBitrix;
            },
            checkStatus(id,isn,quotation_type){
                let url = quotation_type == 'express' ? '/express/updateDocumentStatus' : '/full/updateFullStatus';
                this.preloader(true);
                this.axios.post(url, {
                    id: id,
                    isn: isn
                })
                .then(response => {
                    if(response.data.success){
                        window.location.reload();
                    }else{
                        alert(response.data.error);
                        this.preloader(false);
                    }
                })
                .catch(error => {
                    alert(error);
                    this.preloader(false);
                });
            },
            preloader(show) {
                if(show){
                    document.getElementById("preloader").style.display = "flex";
                } else {
                    document.getElementById("preloader").style.display = "none";
                }
            },
        },
        created(){
            let param = JSON.parse(this.parametres);
            if(Object.keys(param).length > 0){
                this.sendDA = param.DA == null ? 0 : param.DA;
                this.quotationStatus = param.status == null ? '' : param.status;
                this.type = param.type == null ? 0 : param.type;
                this.nshb = param.nshb == null ? 0 : param.nshb;
            }
        },
        watch: {
            type(val,oldVal){
                this.contractSelected = val == 1 ? true : false;
                this.quotationStatus = val == 1 ? '' : this.quotationStatus;
            }
        }
    }
</script>
