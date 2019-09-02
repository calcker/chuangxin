<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-key"></i> 密码设置</h3>
            <hr>
            <form>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">账号类型</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="个人" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
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
