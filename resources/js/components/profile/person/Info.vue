<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-info-circle"></i>个人信息</h3>
            <hr>
            <alert-box v-if="errors" :errors="errors"></alert-box>
            <div v-if="loaded" class="info">
                <form>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><b>名字</b></label>
                        <div class="col-sm-10">
                            <name :value="info.name"></name>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label"><b>性别</b></label>
                        <div class="col-sm-10">
                            <gender :value="info.gender"></gender>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><b>职业</b></label>
                        <div class="col-sm-10">
                            <profession :value="info.profession"></profession>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field" class="col-sm-2 col-form-label"><b>创新领域</b></label>
                        <div class="col-sm-10">
                            <field :value="info.field"></field>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label"><b>出生日期</b></label>
                        <div class="col-sm-10">
                            <birthday :value="info.birthday"></birthday>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label"><b>所在地区</b></label>
                        <div class="col-sm-10">
                            <district :value="info.district"></district>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="brief" class="col-sm-2 col-form-label"><b>个人简介</b></label>
                        <div class="col-sm-10">
                            <brief :value="info.brief"></brief>
                        </div>
                    </div>
                </form>
            </div>
            <div v-else class="text-center">
                <div class="spinner-border m-5" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style type="text/css">

</style>

<script>
    import AlertBox from '../../AlertBox'
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
                info: {
                    name: '',
                    gender: '',
                    profession: '',
                    field: '',
                    birthday: '',
                    district: '',
                    brief: ''
                },
                updating: {
                    username: false,
                    realname: false
                },
                loaded: false,
                errors: ''
            };
        },

        created(){

            axios.post('person/info').then(response => {

                if(response.data.code == 201) {

                    const data = response.data.data;

                    this.info.name = data.name;
                    this.info.gender = data.gender;
                    this.info.profession = data.profession;
                    this.info.field = data.field;
                    this.info.birthday = data.birthday;
                    this.info.brief = data.brief;

                    if(data.district){
                        this.info.district = $.parseJSON(data.district);    
                    }else{
                        this.info.district = {
                            province: '',
                            city: '',
                            area: ''
                        }
                    }

                    this.changeLoadedState();
                
                } else {

                    this.errors = response.data.msg;
                }

            }).catch(error => {
                
                this.errors = error.response.data.msg;

                if(!this.errors) this.errors = {unknown: ["未知错误"]};

            });

        },

        methods: {

            changeLoadedState() {

                this.loaded = true;
            }

        },
        components: {AlertBox, Name, Gender, Profession, Field, Birthday, District, Brief}

    }
</script>
