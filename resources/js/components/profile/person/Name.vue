<template>
    <div class="name">
        <alert-box v-if="errors" :errors="errors"></alert-box>
        <alert-box v-if="success" :success="errors"></alert-box>
        <div v-if="updating" class="input-group">
            <input id="name" class="form-control" type="text" v-model="name" data-toggle="tooltip" data-placement="bottom" title="一年只能修改两次" :disabled="submitting == true">
            <div v-if="submitting" class="input-group-append">
                <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    正在提交...
                </button>
            </div>
            <div v-else class="input-group-append">
                <button @click="update" class="btn btn-outline-primary" type="button">保存</button>
                <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
            </div>
        </div>
        <div v-else class="input-group">
            <input id="name" class="form-control" type="text" :placeholder="value" readonly>
            <div class="input-group-append">
                <button @click="changeUpdateState" class="btn btn-primary" type="button"><i class="fas fa-pencil-alt"></i> 编辑</button>
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
                name: this.value,
                updating: false,
                submitting: false,
                errors: '',
                success: ''
            };
        },
        methods: {
            update() {

                this.startSubmit();

                if(this.value != this.name) return this.finishSubmit();

                axios.post('person/name', {name: this.name}).then(response => {

                    if(response.data.code == 201) {

                        const data = response.data.data;

                        this.info.name = data.name;
                    
                        this.showSuccess();
                    
                    } else {

                        this.showErrors(response.data.msg);
                    }

                }).catch(error => {
                    
                    const errors = error.response.data.msg;
                   
                    if(errors){

                        this.showErrors(error.response.data.msg);

                    }else{

                        this.showErrors({unknown: ["未知错误"]});

                    }
                });

                this.finishSubmit();

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

            showSuccess() {

                this.success = '修改成功';

            },

            showErrors(errors) {

                this.errors = errors;

            }



        },
        components: {AlertBox}
    }
</script>
