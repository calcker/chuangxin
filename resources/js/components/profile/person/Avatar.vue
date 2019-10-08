<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-user-circle"></i>头像设置</h3>
            <hr>
            <loading v-if="status == 'loading'"></loading>
            <alert-box v-if="errors || success" :errors.sync="errors" :success.sync="success"></alert-box>
            <div v-if="status == 'load-success'" class="avatar-setting text-center">
                <p><img :src="src"></p>
                <button id="pick-avatar" type="button" class="btn btn-primary"><i class="fas fa-crop-alt"></i> 选择图片</button>
                <avatar-cropper @uploaded="handleUploaded" trigger="#pick-avatar" :upload-url="uploadURL" :upload-form-data="uploadData" :cropper-options="cropperOptions" :output-options="outputOptions"/>
            </div>
        </div>
    </div>
</template>

<style type="text/css">
.avatar-setting {
    padding-top: 100px;
}

.avatar-setting #pick-avatar {
    margin-top: 30px;
}

</style>

<script>
    import Loading from '../../Loading'
    import AlertBox from '../../AlertBox'
    import AvatarCropper from 'vue-avatar-cropper'
    import { mapGetters } from 'vuex'

    export default {
        components: { AlertBox, Loading, AvatarCropper },

        data() {
            return {
                status: 'loading', //'loading', 'load-success', 'load-failure',
                token: null,
                uploadURL: null,
                downloadURL: null,
                userKey: null,
                cropperOptions: {
                    aspectRatio: 1,
                    autoCropArea: 1,
                    viewMode: 1,
                    movable: true,
                    zoomable: true
                },
                outputOptions: {
                    width: 128,
                    height: 128
                },
                rand: this.random(),
                errors: null,
                success: null
            }
        },

        computed: {
            ...mapGetters([
                'userInfo'
            ]),

            src() {
                return this.downloadURL + '/' + this.userKey + '?' + this.rand;
            },

            uploadData() {
                return {
                    token: this.token,
                    key: this.userKey
                }
            }
        },

        created() {

            this.userKey = this.userInfo.key;

            axios.post('upload/avatar').then(response => {
                
                if(response.data.code == 201) {

                    this.token = response.data.data.token;
                    this.uploadURL = response.data.data.uploadURL;
                    this.downloadURL = response.data.data.downloadURL;
                    this.status = 'load-success';

                } else {

                    this.loadFailure();

                }
                

            }).catch(error => {
                
                this.loadFailure();
                
            });

        },

        methods: {
            
            handleUploaded(resp) {
                this.rand = this.random();
            },

            random() {

                return Math.floor(Math.random()*10000);

            },

            loadFailure() {

                this.status = 'load-failure';
                this.errors = '加载失败';

            }
        }
    }
</script>
