<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-info-circle"></i>个人信息</h3>
            <hr>
            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"><b>名字</b></label>
                    <div class="col-sm-10">
                        <name :value = "data.name"></name>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label"><b>性别</b></label>
                    <div class="col-sm-10">
                        <gender :value = "data.gender"></gender>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"><b>职业</b></label>
                    <div class="col-sm-10">
                        <profession :value = "data.profession"></profession>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field" class="col-sm-2 col-form-label"><b>创新领域</b></label>
                    <div class="col-sm-10">
                        <field :value = "data.field"></field>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthday" class="col-sm-2 col-form-label"><b>出生日期</b></label>
                    <div class="col-sm-10">
                        <birthday :value = "data.birthday"></birthday>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>所在地区</b></label>
                    <div class="col-sm-10">
                        <district :value = "data.district"></district>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brief" class="col-sm-2 col-form-label"><b>个人简介</b></label>
                    <div class="col-sm-10">
                        <brief :value = "data.brief"></brief>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style type="text/css">

</style>

<script>
    import Name from './Name'
    import Gender from './Gender'
    import Profession from './Profession'
    import Field from './Field'
    import Birthday from './Birthday'
    import District from './District'
    import Brief from './Brief'

    export default {
        data() {
            return {
                data: {
                    name: '',
                    gender: '',
                    birthday: '',
                    profession: '',
                    field: '',
                    district: '',
                    brief: ''
                },
                updating: {
                    username: false,
                    realname: false
                }
            };
        },

        created(){

            console.log('fasd');

            axios.post('person/info').then(response => {

                /*
                if(response.data.code == 201) {

                    const data = response.data.data;

                    this.$store.dispatch('SET_AUTH_DATA', data);
                    this.$router.push({ path: '/home' });

                } else {

                    this.errors = response.data.msg;
                    this.afterSubmit();
                }
                */


            }).catch(error => {

                /*
                this.errors = error.response.data.errors;

                if(!this.errors) this.errors = {unknown: ["未知错误"]};

                this.$store.dispatch('DEL_AUTH_DATA');

                this.afterSubmit();
                */

            });



        },

        methods: {
            update: function(item){

            },
            changeUpdateState: function(item){

                console.log(item);

                switch(item) {

                    case 'username':
                        this.updating.username = !this.updating.username;
                        break;
                    case 'realname':
                        this.updating.realname = !this.updating.realname;
                        break;


                }



            }

        },
        components: {Name, Gender, Profession, Field, Birthday, District, Brief}

    }
</script>
