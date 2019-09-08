<template>
    <div class="district">
        <div v-if="updating" class="input-group">
            <select class="custom-select">
                <option value='' disabled selected style='display:none;'>Please Choose</option>
            </select>
            <select class="custom-select">
                <option value='' disabled selected style='display:none;'>Please Choose</option>
            </select>
            <select class="custom-select">
                <option value='' disabled selected style='display:none;'>Please Choose</option>
            </select>
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
    export default {
        data () {
            return {
                name: this.value,
                updating: false,
                value: null,
                selected: null
            }
        },
        methods: {
            update: function(){
                console.log('ffa');

            },
            changeUpdateState: function(){

                this.updating = !this.updating;

            }

        }
    }
</script>
