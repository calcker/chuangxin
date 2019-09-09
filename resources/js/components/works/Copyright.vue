<template>
    <span class="copyright">
        <button type="button" class="btn btn-outline-secondary" @click="showModal"><i class="far fa-copyright"></i> 原创声明</button>
        <div class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="far fa-copyright" aria-hidden="true"></i> 原创声明</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <p>
                                        本人郑重声明所提交的作品, 是本人独立研究与创作的成果, 未照搬和抄袭他人作品。如此作品牵涉到任何法律法规问题，本人将承担全部后果。
                                    </p>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="copyright">
                                        <label class="form-check-label" for="copyright">本人同意以上声明</label>
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

            this.$modal = $('.copyright .modal');
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
