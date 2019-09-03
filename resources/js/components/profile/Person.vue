<template>
    <div id="app-profile">
        <topBar></topBar>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="list-group">
                        <button type="button" :class="{'active': showingComponent == 'Info'}" class="list-group-item list-group-item-action" @click="showComponent('Info')">
                            <i class="fas fa-info-circle"></i> 个人信息
                        </button>
                        <button type="button" :class="{'active': showingComponent == 'Avatar'}" class="list-group-item list-group-item-action" @click="showComponent('Avatar')">
                            <i class="fas fa-user-circle"></i> 头像设置
                        </button>
                        <button type="button" :class="{'active': showingComponent == 'Password'}" class="list-group-item list-group-item-action" @click="showComponent('Password')">
                            <i class="fas fa-key"></i> 密码修改
                        </button>
                        <button type="button" :class="{'active': showingComponent == 'Email'}" class="list-group-item list-group-item-action" @click="showComponent('Email')">
                            <i class="far fa-envelope"></i> 邮箱绑定
                        </button>
                        <button type="button" :class="{'active': showingComponent == 'Mobile'}" class="list-group-item list-group-item-action" @click="showComponent('Mobile')">
                            <i class="fas fa-mobile-alt"></i> 手机绑定
                        </button>
                    </div>
                </div>
                <div class="col-10">
                    <keep-alive>
                        <component v-bind:is="showingComponent"></component>
                    </keep-alive>
                </div>
            </div>
        </div>
    </div>
</template>

<style type="text/css">
    #app-profile .list-group i{
        width: 20px;
    }
    #app-profile .card-title i{
        width: 40px;
    }
</style>

<script>
    import TopBar from './../home/TopBar';
    import Info from './person/Info';
    import Avatar from './person/Avatar';
    import Password from './person/Password';
    import Email from './person/Email';
    import Mobile from './person/Mobile';

    export default {
        data() {
            return {
                showingComponent: 'Info'
            }
        },
        methods: {
            showComponent: function(component){
                this.showingComponent = component;
            }
        },
        components: {TopBar, Info, Avatar, Password, Email, Mobile}
    }
</script>
