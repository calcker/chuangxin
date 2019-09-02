<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-info-circle"></i>基本信息</h3>
            <hr>
            <form>
                <div class="form-group row">
                    <label for="account" class="col-sm-2 col-form-label"><b>账号类型</b></label>
                    <div class="col-sm-10">
                        <input id="account" class="form-control" type="text" placeholder="个人账号" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>用户名</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="username" class="form-control" type="text" placeholder="Password" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="changeUsername"><i class="fas fa-pencil-alt"></i> 修改</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>真实姓名</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="username" class="form-control" type="text" placeholder="Password" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="changeUsername"><i class="fas fa-pencil-alt"></i> 修改</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>性别</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="username" class="form-control" type="text" placeholder="Password" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="changeUsername"><i class="fas fa-pencil-alt"></i> 修改</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>生日</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="username" class="form-control" type="text" placeholder="Password" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="changeUsername"><i class="fas fa-pencil-alt"></i> 修改</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"><b>创新领域</b></label>
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
                    <label for="username" class="col-sm-2 col-form-label"><b>所在城市</b></label>
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
    export default {
        data() {
            return {
                info: {
                    username: '未知',
                    realname: '未填写',
                    gender: '未填写',
                    birthday: '未填写',
                    field: '未填写',
                    city: '未填写',
                    brief: '未填写'
                }
            };
        }
    }
</script>
