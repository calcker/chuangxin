<template>
    <span class="album">
        <select class="selectpicker" title="选择专辑..." v-model="selected"></select>
        <div class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">专辑管理</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col align-self-center">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id=""><i class="fas fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="请输入新专辑名称...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">添加专辑</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>专辑名称</th>
                                            <th>作品数</th>
                                            <th>设置</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="album in albums">
                                            <td><i class="fas fa-bookmark" aria-hidden="true"></i></td>
                                            <td>{{ album.name }}</td>
                                            <td>{{ album.works_count }}</td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a class="update" role="button" data-toggle="popover" :data-album-name="album.name" :data-album-key="album.key">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="delete" role="button" data-toggle="popover" @click="showDeletePopover">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<style type="text/css">
    
    .album .update, .album .delete{

        cursor: pointer;

    }

</style>

<script>

    export default {
        data: function() {
            return {
                loading: null,
                selected: '',
                albums: [],
                $selectpicker: null,
                $modal: null
            }
        },

        created() {

            this.getAlbums();

        },
        
        mounted() {
            
            this.$selectpicker = $('.album .selectpicker');
            this.$modal = $('.album .modal');
        },

        watch: {

            selected: function() {
                
                if(this.selected == -1){

                    this.showAlbumsModal();

                }


                this.initUpdatePopover();

            },

            albums: function() {

                this.fillAlbums();

                
                this.initUpdatePopover();
                this.initDeletePopover();
                
            }

        },

        methods: {

            getAlbums: function(){

                axios.post('/albums/my').then(response => {

                    if(response.data.code == 201) {

                        this.albums = response.data.data;

                    } else {

                        console.log(response.data.msg);
                        
                    }

                }).catch(error => {
                            
                    console.log(error);

                });

            },

            fillAlbums: function(){

                var latest = null,
                    _this = this;

                this.$selectpicker.empty();
                
                $.each(this.albums, function(i, album){
        
                    _this.$selectpicker.prepend('<option data-icon="fas fa-bookmark" data-subtext="(' + album.works_count + ')" value="' + album.key + '">' + album.name + '</option>');
            
                    latest = album.key;
        
                });

                this.$selectpicker.append('<option data-divider="true"></option><option data-icon="fas fa-plus" value="-1">新增专辑</option>').val(latest);

                this.$selectpicker.selectpicker('refresh');
                this.$selectpicker.selectpicker('render');

            },



            showAlbumsModal: function(){

                this.$modal.modal('show');
                
            },

            initUpdatePopover: function(){

                var options =  {
                    trigger: 'click',
                    placement: 'top',
                    title: '修改专辑名称',
                    sanitize: false,
                    container: 'body',
                    html: true,
                    content:    '<form>'                                                                       +
                                    '<div class="form-group">'                                                 +
                                        '<input type="text" class="form-control" placeholder="输入新名称...">'  +
                                    '</div>'                                                                   +
                                    '<div class="form-group text-right">'                                      +
                                        '<button class="confirm btn btn-primary btn-sm">提交</button>'         +
                                        '<button class="cancel btn btn-secondary btn-sm">取消</button>'        +
                                    '</div>'                                                                   +
                                '</form>',
                    template:   '<div class="updatePopover popover" role="tooltip">'                       +
                                    '<div class="arrow"></div>'                                            +
                                    '<h3 class="popover-header"></h3>'                                     +
                                    '<div class="popover-body"></div>'                                     +
                                '</div>'
                };

                $('.album .update').popover(options);

                $('.album .update').on('shown.bs.popover', function (e) {

                    console.log(e);
                    
                    alert("当显示时警告消息");
                });



            },

            initDeletePopover: function(){


            },

            showUpdatePopover: function(e){

                var key  = $(e.currentTarget).attr('data-album-key'),
                    name = $(e.currentTarget).attr('data-album-name'),
                    $popover = $('.updatePopover'),
                    $input   = $popover.find('input'),
                    $confirm = $popover.find('.confirm'),
                    $cancel  = $popover.find('.cancel');

                console.log($popover);

                $input.val(name).focus();

                $confirm.click(function(){
                    var $popover = $('.updatePopover');

                    console.log($popover);


                });

                $cancel.click(function(){
                    $popover.popover('hide');
                });

                //console.log($(e.currentTarget).attr('data-album-key'));




                //console.log('fsdaf');

            },

            showDeletePopover: function(){


            }

        }
    }
</script>
