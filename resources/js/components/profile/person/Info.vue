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
                    <label for="birthday" class="col-sm-2 col-form-label"><b>出生日期</b></label>
                    <div class="col-sm-10">
                        <birthday :value = "data.birthday"></birthday>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>从事领域</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="username" class="form-control" type="text" placeholder="Password" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="changeUserField"><i class="fas fa-info-circle"></i> 修改</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>居住地区</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="username" class="form-control" type="text" placeholder="Password" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="changeUserField"><i class="fas fa-info-circle"></i> 修改</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>个人简介</b></label>
                    <div class="col-sm-10">
                        <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="10" readonly></textarea>
                        <div class="text-right">
                            <button class="btn btn-outline-primary" type="button" id="changeUserField"><i class="fas fa-info-circle"></i> 修改</button>
                        </div>
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
    import Birthday from './Birthday'

    export default {
        data() {
            return {
                data: {
                    name: '未知',
                    realname: '未填写',
                    gender: '未填写',
                    birthday: '未填写',
                    field: '未填写',
                    city: '未填写',
                    brief: '未填写'
                },
                updating: {
                    username: false,
                    realname: false
                }
            };
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
        components: {Name, Gender, Birthday}

    }
</script>
