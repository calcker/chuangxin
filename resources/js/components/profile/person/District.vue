<template>
    <div class="district">
        <alert-box v-if="errors || success" :errors="errors" :success="success"></alert-box>
        <div v-if="updating" class="input-group">
            <v-distpicker :province="select.province" :city="select.city" :area="select.area" @province="onChangeProvince" @city="onChangeCity" @area="onChangeArea" @selected="onSelected"></v-distpicker>
            <div class="input-group-append">
                <button @click="update" class="btn btn-outline-primary" type="button">保存</button>
                <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
            </div>
        </div>
        <div v-else class="input-group">
            <input id="birthday" class="form-control" type="text" :placeholder="district" readonly>
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
                district: this.value,
                updating: false,
                submitting: false,
                errors: '',
                success: '',
                select: {
                    province: '',
                    city: '',
                    area: ''
                }
            }
        },
        created () {
            if(!this.district) return false;

            var arr =  this.district.split(' ');
            this.select.province = arr[0];
            this.select.city = arr[1];
            this.select.area = arr[2];
        },
        methods: {
            onChangeProvince(data) {

                if(data.value != '省') this.select.province = data.value;
                this.select.city = '';
                this.select.area = '';
            },
            onChangeCity(data) {
                if(data.value != '市') this.select.city = data.value;
                this.select.area = '';
            },
            onChangeArea(data) {
                if(data.value != '区') this.select.area = data.value;
            },
            onSelected(data) {
                console.log('selected');
                /*
                if(data.province.value == '省' || !data.province.value) return false;
                if(data.city.value == '市' || !data.city.value) return false;
                if(data.area.value == '区' || !data.area.value) return false;
                this.district = data.province.value + ' ' + data.city.value + ' ' + data.area.value;
                */
            },
            getDistrict() {
                return this.select.province + ' ' + this.select.city + ' ' + this.select.area;
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
                this.finishSubmit();

            },

            checkInput() {
                //console.log(this.select);
                if(!this.select.province || this.select.province == '省') return this.showErrors('请选择省份');
                if(!this.select.city || this.select.city == '市') return this.showErrors('请选择城市');
                if(!this.select.area || this.select.area == '区') return this.showErrors('请选择区县');
                return true;
            },

        },
        components: {AlertBox, VDistpicker}
    }
</script>
