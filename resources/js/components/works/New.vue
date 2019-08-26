<template>
    <div id="app-new-works">
        <topBar></topBar>
        <div class="main container">
            <div class="card">
                <div class="works card-body">
                    <input type="text" class="title form-control" name="title" placeholder="新作品标题">
                    <textarea class="brief form-control" rows="2" placeholder="作品简介（选填）"></textarea>
                    <div class="options row">
                        <div class="col-md-3">
                            <album></album>
                        </div>
                        <div class="col-md-4 offset-md-5">
                            <div class="btn-toolbar">
                                <div class="btn-group">
                                    <button type="button" class="cover btn btn-default"><i class="fa fa-image" aria-hidden="true"></i> 封面</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="settings btn btn-default"><i class="fa fa-cog" aria-hidden="true"></i> 设置</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="submit btn btn-primary">发布作品&nbsp;&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="editor"></div>
                    <!--
                    <div class="editor" style="margin-top:40px;"></div>
                    <style type="text/css">.fr-toolbar{border-top:0;}</style>
                    -->
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
        

</style>

<script>
    import TopBar from './../home/TopBar'
    import Album from './Album'

    export default {
        components: {TopBar, Album}
    }
</script>
