<template>
    <span class="settings">
        <button type="button" class="btn btn-outline-secondary" @click="showModal"><i class="fas fa-cog" aria-hidden="true"></i> 设置</button>
        <div class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-cog" aria-hidden="true"></i> 设置</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-8 text-left">
                                    <div class="custom-control custom-switch">
                                        <input id="public" type="checkbox" class="custom-control-input" v-model="public">
                                        <label class="custom-control-label" for="public">公开作品</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input id="top" type="checkbox" class="custom-control-input" v-model="top">
                                        <label class="custom-control-label" for="top">作品置顶</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input id="remarkable" type="checkbox" class="custom-control-input" v-model="remarkable">
                                        <label class="custom-control-label" for="remarkable">允许评论</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input id="payable" type="checkbox" class="custom-control-input" v-model="payable">
                                        <label class="custom-control-label" for="payable">付费观看</label>
                                    </div>
                                    <div v-if="payable" class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">¥</span>
                                        </div>
                                        <input id="money" type="text" class="form-control" placeholder="请输入金额 ( 单位: 元 )" v-model="money">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<style type="text/css">
    .settings .modal .custom-control{

        min-height: 2.5rem;

    }
</style>

<script>

    export default {

        data: function() {
            return {
                public: true,
                top: false,
                remarkable: false,
                payable: false,
                money: ''
            }
        },

        watch: {

            payable: function(){

            } 
        },

        methods: {

            showModal: function(){

                $('.settings .modal').modal('show');

            }
        }
    }
</script>
