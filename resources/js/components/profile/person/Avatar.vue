<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-user-circle"></i>头像设置</h3>
            <hr>
            <loading v-if="status == 'loading'"></loading>
            <div v-if="status == 'loading-success'" class="avatar-setting text-center">
                <p><img :src="src"></p>
                <button id="pick-avatar" type="button" class="btn btn-primary"><i class="fas fa-crop-alt"></i> 选择图片</button>
                <avatar-cropper @uploaded="handleUploaded" trigger="#pick-avatar" :upload-url="uploadURL" :upload-form-data="uploadData" :cropper-options="cropperOptions" :output-options="outputOptions"/>
            </div>
            <div v-if="status == 'loading-failure'" class="text-center">
                <p>加载失败！</p>
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
    import AvatarCropper from 'vue-avatar-cropper'
    import { mapGetters } from 'vuex'

    export default {
        components: { Loading, AvatarCropper },

        data() {
            return {
                status: 'loading', //'loading', 'loading-success', 'loading-failure',
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
                rand: this.random()
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
                    this.status = 'loading-success';

                
                } else {

                    this.status = 'loading-failure';
                }
                

            }).catch(error => {
                
                const errors = error.response.data.msg;

                console.log(errors);

                this.status = 'loading-failure';
               
            });

        },

        methods: {
            
            handleUploaded(resp) {
                this.rand = this.random();
            },

            random() {

                return Math.floor(Math.random()*10000);

            }
        }
    }
</script>
