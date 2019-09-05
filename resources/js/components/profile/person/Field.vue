<template>
    <div class="field">
        <div v-if="updating" class="input-group">
            <select class="custom-select">
                <option selected>选择大类...</option>
                <option value="science"><i class="fas fa-venus"></i> 科学</option>
                <option value="engineering"><i class="fas fa-mars"></i> 工程</option>
                <option value="art"><i class="fas fa-mars"></i> 艺术</option>
                <option value="literature"><i class="fas fa-mars"></i> 文学</option>
                <option value="business"><i class="fas fa-mars"></i> 商业</option>
            </select>
            <select class="custom-select">
                <option selected>选择小类...</option>
                <option value="female"><i class="fas fa-venus"></i> 女</option>
                <option value="male"><i class="fas fa-mars"></i> 男</option>
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
        props: ['value'],
        data() {
            return {
                time: null,
                name: this.value,
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
