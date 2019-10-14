<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-key"></i>密码重设</h3>
            <hr>
            <alert-box v-if="errors || success" :errors.sync="errors" :success.sync="success"></alert-box>
            <form>
                <div class="form-group row">
                    <label for="old" class="col-sm-2 col-form-label"><b>原密码</b></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="old" v-model="password.old" placeholder="原密码" :disabled="submitting == true"  @focus="clearAlert">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new" class="col-sm-2 col-form-label"><b>新密码</b></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="new" v-model="password.new" placeholder="新密码" :disabled="submitting == true" @focus="clearAlert">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repeat" class="col-sm-2 col-form-label"><b>重复新密码</b></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repeat" v-model="password.repeat" placeholder="重复新密码" :disabled="submitting == true" @focus="clearAlert">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="captcha" class="col-sm-2 col-form-label"><b>验证码</b></label>
                    <div class="col-sm-10">
                        <captcha ref="captcha" :disabled="submitting == true"></captcha>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button v-if = "submitting == false" @click="submit" type="submit" class="btn btn-primary">修改</button>
                        <button v-else type="submit" class="btn btn-primary" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            正在提交
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style type="text/css">

</style>

<script>
    import AlertBox from '../../AlertBox'
    import Captcha from '../../Captcha'

    export default {
        
        components: {AlertBox, Captcha},

        data() {
            return {
                password: {
                    old: null,
                    new: null,
                    repeat: null
                },
                submitting: false,
                errors: null,
                success: null
            };
        },

        methods: {
            submit() {

                this.startSubmit();

                this.clearAlert();

                if(!this.checkInput()) return false;

                axios.post('auth/password', {
                
                    password: this.password,
                    captcha: this.getCaptcha()

                }).then(response => {

                    if(response.data.code == 201) {

                        this.showSuccess(response.data.msg);
                        this.changeUpdateState();
                    
                    } else {

                        this.showErrors(response.data.msg);
                        this.changeCaptcha();
                    }

                }).catch(error => {
                    
                    const errors = error.response.data.msg;
                   
                    if(errors){

                        this.showErrors(errors);

                    }else{

                        this.showErrors("未知错误");

                    }

                    this.changeCaptcha();
                });

            },

            checkInput() {

                if( !this.password.old ) {

                    this.showErrors('请输入原密码');
                    return false;

                }

                if( !this.password.new ) {

                    this.showErrors('请输入新密码');
                    return false;

                }

                if( !this.password.repeat) {

                    this.showErrors('请重复输入新密码');
                    return false;

                }

                if( this.password.new != this.password.repeat ) {

                    this.showErrors('两次输入的新密码不相同');
                    return false;

                }

                if( this.password.new == this.password.old ) {

                    this.showErrors('新密码与旧密码相同');
                    return false;

                }

                return true;


            },

            clearAlert() {
                this.errors = '';
                this.success = '';
            },

            startSubmit() {

                //this.errors = '';
                //this.success = '';
                this.submitting = true;

            },

            finishSubmit() {

                this.submitting = false;
            
            },

            showSuccess(msg) {

                this.success = msg;
                this.finishSubmit();

            },

            showErrors(msg) {
                
                this.errors = msg;
                this.finishSubmit();

            },

            changeUpdateState() {
                
                this.password.old = null;
                this.password.new = null;
                this.password.repeat = null;

            },

            getCaptcha() {

                return this.$refs.captcha.input;
            },

            changeCaptcha() {

                this.$refs.captcha.generate();

            }
        }    
    }
</script>
