<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-mobile-alt"></i>手机绑定</h3>
            <hr>
            <form>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">账号类型</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
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
