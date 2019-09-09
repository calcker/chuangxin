<template>
    <div class="settings">
        <button type="button" class="btn btn-outline-secondary"  @click="showModal"><i class="fas fa-cog" aria-hidden="true"></i> 设置</button>
        <div class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">><i class="fas fa-cog" aria-hidden="true"></i> 设置</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col align-self-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                         <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                                    </div>
                                </div>
                            </div>
                        <!--
                        <div class="row" style="margin-top:30px;">
                            <div class="col-md-12">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="open">公开</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="open" data-on-text="是" data-off-text="否" data-size="small" data-handle-width="40" checked>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="remarkable">允许评论</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="remarkable" data-on-text="是" data-off-text="否" data-size="small" data-handle-width="40" checked>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="top">置顶</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="top" data-on-text="是" data-off-text="否" data-size="small" data-handle-width="40">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="pay">付费观看</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="pay" data-on-text="是" data-off-text="否" data-size="small" data-handle-width="40">
                                        </div>
                                    </div>
                                    <div class="form-group money" style="display:none;">
                                        <label class="col-sm-4 control-label" for="money">¥</label>
                                        <div class="col-sm-8">
                                            <ul class="list-inline">
                                                <li style="width:50px;padding-right:0;">
                                                    <input type="text" name="yuan" value="00" class="form-control" maxlength="2" min="0" max="99">
                                                </li>
                                                <li style="padding:0;">
                                                    <h3 style="margin:0;">.</h3>
                                                </li>
                                                <li style="width:50px;padding-left:0;">
                                                    <input type="text" name="fen" value="00" class="form-control" maxlength="2" min="0" max="99">
                                                </li>
                                                <li style="padding:0;">
                                                    <h5>元</h5>
                                                </li>
                                            </ul>
                                            <p>输入金额 ( 0 ~ 99.99元 ) </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style type="text/css">

</style>

<script>

    export default {

        data: function() {
            return {
                showed: false,
                selected: '',
                $modal: null
            }
        },

        created() {

            //this.getAlbums();

        },

        mounted() {

            this.$modal = $('.settings .modal');
        },

        watch: {

            selected: function() {

                if(this.selected == -1){

                    this.showModal();

                }

            }
        },

        methods: {

            showModal: function(){

                this.$modal.modal('show');

                this.showed = true;
            }
        }
    }
</script>
