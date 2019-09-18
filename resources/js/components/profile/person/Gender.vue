<template>
    <div class="gender">
        <alert-box v-if="errors || success" :errors="errors" :success="success"></alert-box>
        <div v-if="updating" class="input-group">
            <select class="custom-select" v-model="gender" :disabled="submitting == true">
                <option disabled selected style='display:none;'>请选择...</option>
                <option v-for="option in options" :value="option.value">
                    {{option.text}}
                </option>
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
                success: '',
                options: [
                    {text: '男', value: 1},
                    {text: '女', value: 2}
                ]
            };
        },
        computed: {
            lang() {

                if(this.gender == 1){

                    return '男';

                }else if(this.gender == 2){

                    return '女';
                }

            }
        },
        methods: {
            update() {

                this.startSubmit();

                if(this.value == this.gender) return this.finishSubmit();

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
