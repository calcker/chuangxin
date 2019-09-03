<template>
    <div class="name">
        <div v-if="updating" class="input-group">
            <input id="name" class="form-control" type="text" v-model="name" data-toggle="tooltip" data-placement="bottom" title="名字每年只能修改2次">
            <div class="input-group-append">
                <button @click="update" class="btn btn-outline-primary" type="button">提交</button>
                <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
            </div>
        </div>
        <div v-else class="input-group">
            <input id="name" class="form-control" type="text" :placeholder="value" readonly>
            <div class="input-group-append">
                <button @click="changeUpdateState" class="btn btn-primary" type="button"><i class="fas fa-pencil-alt"></i> 修改</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['value'],
        data() {
            return {
                name: 'adfa',
                updating: false
            };
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
