<template>
    <div class="field">
        <div v-if="updating" class="input-group">
            <select class="custom-select" v-model="selected">
                <option selected>请选择...</option>
                <option v-for="field in fields">
                    {{field.name}}
                </option>
            </select>
            <select class="custom-select">
                <option selected>请选择...</option>
                <option v-for="item in items">
                    {{item.name}}
                </option>
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
                updating: false,
                selected: null,
                fields: [
                    {
                        name: '工程技术类',
                        items: [
                            {name: '互联网'},
                            {name: '软件'},
                            {name: '硬件'},
                            {name: '人工智能'},
                        ],
                    },
                    {
                        name: '社会服务类',
                        items: [
                            {name: '餐饮'},
                            {name: '旅游'},
                            {name: '金融'},
                            {name: '医疗'},
                        ],
                    },
                    {
                        name: '自然科学类',
                        items: [
                            {name: '数学'},
                            {name: '力学'},
                            {name: '物理'},
                            {name: '化学'},
                        ],
                    },
                    {
                        name: '人文科学类',
                        items: [
                            {name: '经济'},
                            {name: '管理'},
                            {name: '法律'},
                            {name: '心理'},
                        ],
                    },
                ]
            };
        },
        computed:{
            items: function() {
                for (var i = 0; i < this.fields.length; i++) {
                    if (this.fields[i].name === this.selected) {

                        return this.fields[i].items;
                    }
                }
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
