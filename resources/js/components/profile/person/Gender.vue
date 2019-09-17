<template>
    <div class="gender">
        <alert-box v-if="errors || success" :errors="errors" :success="success"></alert-box>
        <div v-if="updating" class="input-group">
            <select class="custom-select" v-model="gender" :disabled="submitting == true">
                <option value="male">男</option>
                <option value="female">女</option>
            </select>
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
            <input id="gender" class="form-control" type="text" :placeholder="lang" readonly>
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
                gender: this.value,
                updating: false,
                submitting: false,
                errors: '',
                success: ''
            };
        },
        computed: {
            lang() {

                if(this.gender == 'male'){

                    return '男';

                }else if(this.gender == 'female'){

                    return '女';
                }

            }
        },
        methods: {
            update() {

                this.startSubmit();

                if(this.value == this.name) return this.finishSubmit();

                axios.post('person/gender', {gender: this.gender}).then(response => {

                    if(response.data.code == 201) {

                        this.showSuccess(response.data.msg);
                    
                    } else {

                        this.showErrors(response.data.msg);
                    }

                }).catch(error => {
                    
                    const errors = error.response.data.msg;
                   
                    if(errors){

                        this.showErrors(errors);

                    }else{

                        this.showErrors({unknown: ["未知错误"]});

                    }
                });


            },

            changeUpdateState() {

                this.updating = !this.updating;

                return false;

            },

            startSubmit() {

                this.errors = '';
                this.success = '';
                this.submitting = true;

            },

            finishSubmit() {

                this.changeUpdateState();
                this.submitting = false;
                return false;
            
            },

            showSuccess(msg) {

                this.success = msg;
                this.finishSubmit();

            },

            showErrors(errors) {

                this.errors = errors;
                this.finishSubmit();

            }

        },
        components: {AlertBox}
    }
</script>
