<template>
    <div id="app-new-works">
        <topBar></topBar>
        <div class="main container">
            <div class="card">
                <div class="works card-body">
                    <input type="text" class="title form-control" name="title" placeholder="新作品标题">
                    <textarea class="brief form-control" rows="2" placeholder="作品简介（选填）"></textarea>
                    <div class="options row">
                        <div class="col-md-4">
                            <select class="selectpicker" title="选择分类...">
                                <option data-icon="fas fa-microscope" value="science">科学</option>
                                <option data-icon="fas fa-rocket" value="engineering">工程</option>
                                <option data-icon="fas fa-palette" value="art">艺术</option>
                                <option data-icon="fas fa-leaf" value="philosophy">哲学</option>
                                <option data-icon="fas fa-laptop-code" value="it">IT</option>
                                <option data-icon="fas fa-syringe" value="medicine">医药</option>
                                <option data-icon="fas fa-dollar-sign" value="business">商业</option>
                                <option data-icon="fas fa-drafting-compass" value="design">设计</option>
                                <option data-icon="fas fa-book-open" value="literature">文学</option>
                                <option data-icon="fas fa-music" value="music">音乐</option>
                                <option data-icon="fas fa-film" value="film">影视</option>
                                <option data-icon="fas fa-fish" value="comic">动漫</option>
                                <option data-icon="fas fa-gamepad" value="entertainment">娱乐</option>
                                <option data-icon="fas fa-graduation-cap" value="education">教育</option>
                                <option data-icon="fas fa-skiing" value="sport">体育</option>
                                <option data-icon="fas fa-robot" value="product">产品</option>
                                <option data-icon="fas fa-people-carry" value="service">服务</option>
                                <option data-icon="fas fa-blog" value="blog">博客</option>
                            </select>
                        </div>
                        <div class="col-md-8 text-right">
                            <button type="button" class="submit btn btn-primary">提交作品&nbsp;&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <editor :init="init" v-model="data"></editor>
                </div>
            </div>
        </div>
    </div>
</template>

<style type="text/css">
    #app-new-works {

        background-color: #eee;

    }

    #app-new-works .main  a{
        text-decoration: none;
    }

    #app-new-works .main  > .card{
        padding: 20px 80px;
    }

    #app-new-works .works .title, .works .brief{
        box-shadow: none;
        border-radius: 0;
        outline: none;
        resize:none;
        transition: none;
    }

    #app-new-works .works .title:focus, .works .brief:focus{
        box-shadow: none;
    }

    #app-new-works .works .title{
        display: block;
        font: 34px/50px STHeiti,'Microsoft YaHei';
        margin-top: 20px;
        overflow: auto;
        resize: none;
        height: 80px;
        padding: 28px 0 10px;
        outline: none;
        border: none;
        border-bottom: .5px solid #ddd;
        color: #444;
    }
    #app-new-works .works .brief{
        display: block;
        margin: 0 auto;
        padding: 10px 0 30px;
        border: none;
        border-bottom: .5px solid #ddd;
        outline: none;
        font-size: 16px;
    }
    #app-new-works .works .options{
        margin-top: 20px;
        margin-bottom: 20px;
    }

    #app-new-works .works .settings .icon{
        
        font-size: 20px;
        line-height: 34px;
        color: #444;
        margin-right: 20px;
    }

    .checkbox-custom {
        position: relative;
        padding: 0 15px 0 25px;
        margin-bottom: 7px;
        margin-top: 0;
        display: inline-block;
    }
        

</style>

<script>
    import TopBar from './../home/TopBar'
    import tinymce from 'tinymce/tinymce';
    import 'tinymce/themes/silver/theme.min.js';
    import 'tinymce/skins/ui/oxide/skin.min.css';
    //import './tinymce/langs/zh_CN.js';
    import Editor from '@tinymce/tinymce-vue';

    export default {
        data() {
            return {
                data: '',
                init: {
                    menubar: false,

                }
            };
        },
        components: {TopBar, Editor}
    }
</script>
