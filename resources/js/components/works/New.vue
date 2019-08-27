<template>
    <div id="app-new-works">
        <topBar></topBar>
        <div class="main container">
            <div class="card">
                <div class="works card-body">
                    <input type="text" class="title form-control" name="title" placeholder="新作品标题">
                    <textarea class="brief form-control" rows="2" placeholder="作品简介（选填）"></textarea>
                    <div class="options row">
                        <div class="col-md-6">
                            <form class="form-inline">
                                <div class="form-group">
                                    <select class="selectpicker" title="选择分类...">
                                        <option data-icon="fas fa-bookmark" value="science">科学</option>
                                        <option data-icon="fas fa-bookmark" value="engineering">工程</option>
                                        <option data-icon="fas fa-bookmark" value="art">艺术</option>
                                        <option data-icon="fas fa-bookmark" value="philosophy">哲学</option>
                                        <option data-icon="fas fa-bookmark" value="it">IT</option>
                                        <option data-icon="fas fa-bookmark" value="medicine">医药</option>
                                        <option data-icon="fas fa-bookmark" value="business">商业</option>
                                        <option data-icon="fas fa-bookmark" value="design">设计</option>
                                        <option data-icon="fas fa-bookmark" value="literature">文学</option>
                                        <option data-icon="fas fa-bookmark" value="music">音乐</option>
                                        <option data-icon="fas fa-bookmark" value="film">影视</option>
                                        <option data-icon="fas fa-bookmark" value="comic">动漫</option>
                                        <option data-icon="fas fa-bookmark" value="entertainment">娱乐</option>
                                        <option data-icon="fas fa-bookmark" value="education">教育</option>
                                        <option data-icon="fas fa-bookmark" value="sport">体育</option>
                                        <option data-icon="fas fa-bookmark" value="product">产品</option>
                                        <option data-icon="fas fa-bookmark" value="service">服务</option>
                                        <option data-icon="fas fa-bookmark" value="blog">博客</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker">
                                        <option data-icon="fas fa-bookmark" value="science">开启评论</option>
                                        <option data-icon="fas fa-bookmark" value="engineering">关闭评论</option>
                                    </select>
                                </div>
                            </form>
                            <!--
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" id="RememberMe">
                                <label for="RememberMe">允许评论</label>
                            </div>
                        -->
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="submit btn btn-primary">发表作品&nbsp;&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
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

    .checkbox-custom {
    position: relative;
    padding: 0 15px 0 25px;
    margin-bottom: 7px;
    margin-top: 0;
    display: inline-block;
}
/*
将初始的checkbox的样式改变
*/
.checkbox-custom input[type="checkbox"] {
    opacity: 0;/*将初始的checkbox隐藏起来*/
    position: absolute;
    cursor: pointer;
    z-index: 2;
    margin: -6px 0 0 0;
    top: 50%;
    left: 3px;
}
/*
设计新的checkbox，位置
*/
.checkbox-custom label:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    margin-top: -9px;
    width: 19px;
    height: 18px;
    display: inline-block;
    border-radius: 2px;
    border: 1px solid #bbb;
    background: #fff;
}
/*
点击初始的checkbox，将新的checkbox关联起来
*/
.checkbox-custom input[type="checkbox"]:checked +label:after {
    position: absolute;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    content: "\e013";
    top: 42%;
    left: 3px;
    margin-top: -5px;
    font-size: 11px;
    line-height: 1;
    width: 16px;
    height: 16px;
    color: #333;
}
.checkbox-custom label {
    cursor: pointer;
    line-height: 1.2;
    font-weight: normal;/*改变了rememberme的字体*/
    margin-bottom: 0;
    text-align: left;
}
    

        

</style>

<script>
    import TopBar from './../home/TopBar'

    export default {
        components: {TopBar}
    }
</script>
