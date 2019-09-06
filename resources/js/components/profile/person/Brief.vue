<template>
    <div v-if="updating" class="brief">
        <textarea id="brief" class="form-control mb-2" rows="10"></textarea>
        <div class="text-right">
            <button @click="update" class="btn btn-outline-primary" type="button">保存</button>
            <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
        </div>
    </div>
    <div v-else class="brief">
        <textarea id="brief" class="form-control mb-2" rows="10" readonly></textarea>
        <div class="text-right">
            <button @click="changeUpdateState" class="btn btn-primary" type="button">
                <i class="fas fa-pencil-alt"></i> 编辑
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['value'],
        data() {
            return {
                brief: this.value,
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
