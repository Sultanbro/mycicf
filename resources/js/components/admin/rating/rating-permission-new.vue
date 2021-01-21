<template>
    <div>
        <form action="">
            <label>Пользователь : </label>
            <treeselect v-model="user" :multiple="false" :options="userList" />
            <label>Роль : </label>
            <select class="form-control" id="exampleFormControlSelect1" v-model="role">
                <option v-for="roleItem in roleList" :value="roleItem.id">{{roleItem.name}}</option>
            </select>
            <label>Будет видеть этот департамент : </label>
            <treeselect v-model="dept_isn" :multiple="false" :options="userList" />
            <div class="form-group">
                <button class="btn btn-info btn-sm mt-2" type="button" @click="submitRole">Применить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "rating-permission-new",
        data() {
            return {
                user: 0,
                role: 0,
                dept_isn: 0,
                userList : null,
                roleList : null,
            }
        },
        mounted() {
            this.getUserList();
            this.getRoleList();
        },
        methods: {
            getUserList() {
                this.axios.post('/getFullBranch', {}).then((response) => {
                    this.userList = response.data.result;
                });
            },
            getRoleList() {
                this.axios.post('/rating/getKurators', {})
                    .then(response => {
                        if(response.data.success){
                            this.roleList = response.data.data;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            submitRole() {
                if(this.role === 0){
                    alert('role');
                }

                if(this.user === 0){
                    alert('user');
                }

                this.axios.post('/rating/setNewUser', {user: this.user, role: this.role, dept_isn: this.dept_isn})
                    .then(response => {
                        if(response.data.success){
                            location.href = '/';
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        },
    }
</script>

<style>
</style>
