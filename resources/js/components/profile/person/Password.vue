<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-key"></i>密码设置</h3>
            <hr>
            <form>
                <div class="form-group row">
                    <label for="oldPassword" class="col-sm-2 col-form-label">旧密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="oldPassword" placeholder="旧密码">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newPassword" class="col-sm-2 col-form-label">新密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="newPassword" placeholder="新密码">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repeatPassword" class="col-sm-2 col-form-label">重复新密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repeatPassword" placeholder="重复新密码">
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
                data: ''
            };
        }
    }
</script>
