<template>
    <div class="brief">
        <alert-box v-if="errors || success" :errors.sync="errors" :success.sync="success"></alert-box>
        <div v-if="updating">
            <textarea id="brief" class="form-control mb-2" rows="10" v-model="brief" :disabled="submitting == true"></textarea>
            <div v-if="submitting" class="text-right">
                <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    正在提交...
                </button>
            </div>
            <div v-else class="text-right">
                <button @click="update" class="btn btn-outline-primary" type="button">保存</button>
                <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
            </div>
        </div>
        <div v-else>
            <textarea id="brief" class="form-control mb-2" rows="10" :placeholder="placeholder" readonly></textarea>
            <div class="text-right">
                <button @click="changeUpdateState" class="btn btn-primary" type="button">
                    <i class="fas fa-pencil-alt"></i> 编辑
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import AlertBox from '../../AlertBox'

    export default {
        props: ['value'],
        data() {
            return {
                brief: this.value,
                updating: false,
                submitting: false,
                errors: null,
                success: null
            };
        },
        computed: {
            placeholder() {

                if(!this.brief) return '未填写';

                return this.brief;

            }
        },
        methods: {
            update() {

                this.startSubmit();
                
                if(!this.checkInput()) return false;

                if(this.value == this.brief) return this.finishSubmit();
                
                axios.post('person/brief', {brief: this.brief}).then(response => {

                    if(response.data.code == 201) {

                        this.showSuccess(response.data.msg);
                        this.changeUpdateState();
                    
                    } else {

                        this.showErrors(response.data.msg);
                    }

                }).catch(error => {
                    
                    const errors = error.response.data.msg;
                   
                    if(errors){

                        this.showErrors(errors);

                    }else{

                        this.showErrors("未知错误");

                    }
                });


            },
            
            checkInput() {

                return true;
            },

            changeUpdateState() {

                this.updating = !this.updating;

            },

            startSubmit() {

                this.errors = '';
                this.success = '';
                this.submitting = true;

            },

            finishSubmit() {

                this.submitting = false;
                return false;
            
            },

            showSuccess(msg) {

                this.success = msg;
                this.finishSubmit();

            },

            showErrors(msg) {
                
                this.errors = msg;
                this.finishSubmit();

            }

        },   
        components: {AlertBox}
    }

</script>
