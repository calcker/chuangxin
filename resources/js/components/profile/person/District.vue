<template>
    <div class="district">
        <alert-box v-if="errors || success" :errors.sync="errors" :success.sync="success"></alert-box>
        <div v-if="updating" class="input-group">
            <v-distpicker :province="district.province" :city="district.city" :area="district.area" @province="onChangeProvince" @city="onChangeCity" @area="onChangeArea"></v-distpicker>
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
            <input id="district" class="form-control" type="text" :placeholder="placeholder" readonly>
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
                errors: null,
                success: null
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
                this.errors = '';
                this.success = '';
            },
            onChangeCity(data) {
                this.district.city = ( data.value != '市' ) ? data.value : '';
                this.district.area = '';
                this.errors = '';
                this.success = '';
            },
            onChangeArea(data) {
                this.district.area = ( data.value != '区' ) ? data.value : '';
                this.errors = '';
                this.success = '';
            },
            update() {
                this.startSubmit();
                
                if(!this.checkInput()) return false;

                if(this.compare(this.value, this.district)) return this.finishSubmit();
                
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

                        this.showErrors("未知错误");

                    }
                });

            },

            checkInput() {
                if(!this.district.province || this.district.province == '' || this.district.province == '省') {
                    this.showErrors('请选择省份');
                    return false;
                }
                if(!this.district.city || this.district.city == '' || this.district.city == '市') {
                    this.showErrors('请选择城市');
                    return false;
                }
                if(!this.district.area || this.district.area == '' || this.district.area == '区') {
                    this.showErrors('请选择区县');
                    return false;
                }
                return true;
            },
            
            compare(district_1, district_2) {

                if(district_1.province != district_2.province) return false;
                if(district_1.city != district_2.city) return false;
                if(district_1.area != district_2.area) return false;

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
        components: {AlertBox, VDistpicker}
    }
</script>
