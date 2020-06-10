<script>
    export default {
        name: "quotation-list",
        data(){
            return {
                sendDA: 0,
                quotationStatus: '',
                type: 0,
                contractSelected: false
            }
        },
        props:{
            pageUrl: String,
            parametres: String
        },
        methods:{
            filter(){
                window.location.href = this.pageUrl+'?DA='+this.sendDA+'&status='+this.quotationStatus+'&type='+this.type;
            }
        },
        created(){
            let param = JSON.parse(this.parametres);
            if(Object.keys(param).length > 0){
                this.sendDA = param.DA == null ? 0 : param.DA;
                this.quotationStatus = param.status == null ? '' : param.status;
                this.type = param.type == null ? 0 : param.type;
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
