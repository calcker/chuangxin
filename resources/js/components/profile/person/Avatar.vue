<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mt-3 mb-3"><i class="fas fa-user-circle"></i>头像设置</h3>
            <hr>
            <div class="text-center">
                <img v-if="userAvatar" :src="userAvatar">
                <button id="pick-avatar" type="button" class="btn btn-primary"><i class="fas fa-crop-alt"></i> 选择图片</button>
                <avatar-cropper @uploaded="handleUploaded" trigger="#pick-avatar" upload-url="/files/upload" />
            </div>
        </div>
    </div>
</template>

<style type="text/css">

</style>

<script>
    import AvatarCropper from "vue-avatar-cropper"

    export default {
        components: { AvatarCropper },
        data() {
            return {
                userAvatar: undefined,
            }
        },
        methods: {
            handleUploaded(resp) {
                this.userAvatar = resp.relative_url;
            }
        }
    }
</script>
