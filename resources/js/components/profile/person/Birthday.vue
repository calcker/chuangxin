<template>
    <div class="birthday">
        <alert-box v-if="errors || success" :errors="errors" :success="success"></alert-box>
        <div v-if="updating" class="input-group">
            <date-picker v-model="birthday" format="YYYY-MM-DD" :default-value="defaultVal" :not-after="notAfter" :not-before="notBefore"></date-picker>
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
            <input id="birthday" class="form-control" type="text" :placeholder="birthday" readonly>
            <div class="input-group-append">
                <button @click="changeUpdateState" class="btn btn-primary" type="button"><i class="fas fa-pencil-alt"></i> 编辑</button>
            </div>
        </div>
    </div>
</template>

<script>
    import AlertBox from '../../AlertBox'
    import DatePicker from 'vue2-datepicker'

    export default {
        props: ['value'],
        data() {
            return {
                birthday: this.value,
                updating: false,
                submitting: false,
                errors: '',
                success: '',
                defaultVal: '1990-01-01',
                notBefore: '1900-01-01',
                notAfter: new Date()
            };
        },
        methods: {
            update() {

                this.startSubmit();

                if(this.value == this.birthday) return this.finishSubmit();

                axios.post('person/birthday', {birthday: this.birthday}).then(response => {

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
        components: {
            AlertBox, DatePicker
        }
    }
</script>
