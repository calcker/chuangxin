<template>
    <div class="district">
        <alert-box v-if="errors || success" :errors="errors" :success="success"></alert-box>
        <div v-if="updating" class="input-group">
            <v-distpicker :province="district.province" :city="district.city" :area="district.area" @province="onChangeProvince" @city="onChangeCity" @area="onChangeArea"></v-distpicker>
            <div class="input-group-append">
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
    import VDistpicker from 'v-distpicker'

    export default {
        props: ['value'],
        data () {
            return {
                district: {
                    province: this.value.province,
                    city: this.value.city,
                    area: this.value.area
                },
                updating: false,
                submitting: false,
                errors: '',
                success: ''         
            }
        },
        computed: {
            placeholder() {

                if( !this.district.province || !this.district.city || !this.district.area) return '未填写';

                return this.district.province + ' ' + this.district.city + ' ' + this.district.area;
            }
        },
        methods: {
            onChangeProvince(data) {
                this.district.province = ( data.value != '省' ) ? data.value : '';
                this.district.city = '';
                this.district.area = '';
            },
            onChangeCity(data) {
                this.district.city = ( data.value != '市' ) ? data.value : '';
                this.district.area = '';
            },
            onChangeArea(data) {
                this.district.area = ( data.value != '区' ) ? data.value : '';
            },
            checkInput() {
                console.log(this.district);
                if(!this.district.province || this.district.province == '' || this.district.province == '省') {
                    console.log(this.district.province);
                    return this.showErrors('请选择省份');
                }
                if(!this.district.city || this.district.city == '' || this.district.city == '市') {
                    console.log(this.district.city);
                    return this.showErrors('请选择城市');
                }
                if(!this.district.area || this.district.area == '' || this.district.area == '区') {
                    console.log(this.district.area);
                    return this.showErrors('请选择区县');
                }
                return true;
            },
            update() {

                this.startSubmit();
                if(!this.checkInput()) return this.finishSubmit();
                if(this.value == this.district) return this.finishSubmit();
                axios.post('person/district', {ditrict: this.district}).then(response => {

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
                console.log(this.errors);
                this.finishSubmit();
                return false;

            }

        },
        components: {AlertBox, VDistpicker}
    }
</script>
