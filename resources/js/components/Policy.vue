<template>
    <div id="app-policy">
        <topBarUnLogin></topBarUnLogin>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">创新之城用户相关协议和隐私政策</div>
                        <div class="card-body">
                            I'm an example component.
                            <button class="btn btn-lg btn-primary" v-on:click="back">返回</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TopBarUnLogin  from './TopBarUnLogin'
    export default {
        methods: {
            back: function() {
                this.$router.go(-1);
            }
        },
        components: {TopBarUnLogin}
    }
</script>
