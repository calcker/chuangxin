<template>
    <div class="field">
        <alert-box v-if="errors || success" :errors.sync="errors" :success.sync="success"></alert-box>
        <div v-if="updating">
            <tags :tags.sync="selected" :deletable="deletable"></tags>
            <div class="input-group">
                <select class="custom-select" v-model="sort">
                    <option disabled selected style='display:none;'>请选择...</option>
                    <option v-for="field in fields">
                        {{field.name}}
                    </option>
                </select>
                <select class="custom-select" v-model="item">
                    <option disabled selected style='display:none;'>请选择...</option>
                    <option v-for="item in items">
                        {{item.name}}
                    </option>
                </select>
                <div class="input-group-append">
                    <button @click="update" class="btn btn-outline-primary" type="button">保存</button>
                    <button @click="changeUpdateState" class="btn btn-outline-secondary" type="button">取消</button>
                </div>
            </div>
        </div>
        <div v-else class="input-group">
            <input id="field" class="form-control" type="text" :placeholder="placeholder" readonly>
            <div class="input-group-append">
                <button @click="changeUpdateState" class="btn btn-primary" type="button"><i class="fas fa-pencil-alt"></i> 编辑</button>
            </div>
        </div>
    </div>
</template>

<script>
    import AlertBox from '../../AlertBox'
    import Tags from '../../Tags'

    export default {
        props: ['value'],
        data() {
            return {
                selected: null,
                deletable: true,
                sort: null,
                item: null,
                updating: false,
                submitting: false,
                errors: null,
                success: null,
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
        created() {

            if(this.value) {

                this.selected = this.value.split(' ');


            } else{

                this.selected = new Array();

            }

        },
        computed: {
            placeholder() {

                if( this.selected.length == 0 ) return '未填写';

                return this.selected.join(', ');
               
            },
            items() {
                for (var i = 0; i < this.fields.length; i++) {
                    if (this.fields[i].name === this.sort) {

                        return this.fields[i].items;
                    }
                }
            }
        },
        
        watch: {
            item(val) {

                if(this.item){

                    if( this.selected.indexOf(this.item, this.selected) < 0 ) this.selected.push(val);

                }

                this.sort = '';
                this.item = '';

            }
        },
        methods: {
            update() {
                console.log('ffa');

            },
            changeUpdateState() {

                this.updating = !this.updating;

            }

        },
        components: {AlertBox, Tags}
    }
</script>
