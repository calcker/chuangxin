<template>
    <div class="birthday">
        <alert-box v-if="errors || success" :errors.sync="errors" :success.sync="success"></alert-box>
        <div v-if="updating" class="input-group">
            <date-picker v-model="birthday" valueType="format" format="YYYY-MM-DD" :default-value="defaultVal" :not-after="notAfter" :not-before="notBefore"></date-picker>
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
            <input id="birthday" class="form-control" type="text" :placeholder="placeholder" readonly>
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
                errors: null,
                success: null,
                defaultVal: '1990-01-01',
                notBefore: '1900-01-01',
                notAfter: new Date()
            };
        },
        computed: {
            placeholder() {

                if( !this.birthday ) return '未填写';

                var date = new Date(this.birthday),
                    year = date.getFullYear(),
                    month = date.getMonth() + 1,
                    day = date.getDate();

                return year + ' 年 ' + month + ' 月 ' + day + ' 日 ';
            }
        },
        methods: {
            update() {

                this.startSubmit();

                console.log(this.birthday);

                if(!this.checkInput()) return false;

                if(this.value == this.birthday) return this.finishSubmit();

                axios.post('person/birthday', {birthday: this.birthday}).then(response => {

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
        components: {
            AlertBox, DatePicker
        }
    }
</script>
