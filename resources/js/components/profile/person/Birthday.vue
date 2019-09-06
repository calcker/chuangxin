<template>
    <div class="birthday">
        <div v-if="updating" class="input-group">
            <date-picker v-model="birthday" :default-value="defaultVal" :not-after="notAfter" :not-before="notBefore"></date-picker>
            <div class="input-group-append">
                <button @click="update" class="btn btn-outline-primary" type="button">保存</button>
                <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
            </div>
        </div>
        <div v-else class="input-group">
            <input id="birthday" class="form-control" type="text" :placeholder="value" readonly>
            <div class="input-group-append">
                <button @click="changeUpdateState" class="btn btn-primary" type="button"><i class="fas fa-pencil-alt"></i> 编辑</button>
            </div>
        </div>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'

    export default {
        props: ['value'],
        data() {
            return {
                birthday: '',
                initVal: this.value,
                updating: false,
                defaultVal: '1990-01-01',
                notBefore: '1900-01-01',
                notAfter: new Date()
            };
        },
        methods: {
            update: function(){
                console.log('ffa');

            },
            changeUpdateState: function(){

                this.updating = !this.updating;

            }

        },
        components: {
            DatePicker
        }
    }
</script>
