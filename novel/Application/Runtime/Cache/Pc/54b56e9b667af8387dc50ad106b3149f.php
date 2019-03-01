<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <!-- 插件样式引入 -->
    <link rel="stylesheet" href="/Statics/Pc/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Statics/Pc/plugins/font-awesome/css/font-awesome.css">

    <!-- 插件重写样式、公共样式及页面主要样式引入 -->
    <link rel="stylesheet" href="/Statics/Pc/css/plugins.reset.css">
    <link rel="stylesheet" href="/Statics/Pc/css/common.css">
    <link rel="stylesheet" href="/Statics/Pc/css/swiper.min.css">
    <link rel="stylesheet" href="/Statics/Pc/css/icon.css">
    <link rel="stylesheet" href="/Statics/Pc/css/main.css">
    <style>
        #J_rightBarList dl{
            background:#fff;
            position:fixed;
            bottom:80px;
            right:20px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="top-nav">
        <div class="container cf">
            <div class="row">
                <div class="login-box text-right">
                    <a href="<?php echo U('Index/index');?>">
                        <span class="pull-left"></span>
                    </a>
                    <?php if(!empty($_SESSION['user'])): ?><div class="sign-in">
                            <span>你好，</span><a class="black" id="user-name" href="<?php echo U('Pc/PersonSetting/index');?>" target="_blank"><?php echo ($_SESSION['user']['name']); ?></a><em>|</em><a class="black" id="msg-btn" href="//me.qidian.com/msg/systems.aspx?page=1" target="_blank" data-eid="qd_A09">消息<cite id="msg-box">(<i class="black" id="messageCount">0</i>)</cite></a><em>|</em><a id="exit-btn" href="<?php echo U('Pc/Login/logout');?>" data-eid="qd_A10">退出</a>
                        </div>
                        <?php else: ?>
                        <div class="sign-out">
                            <a id="login-btn" class="black" href="<?php echo U('Pc/Login/index');?>" target="_blank">登录</a>
                            <em>|</em>
                            <a id="reg-btn" href="<?php echo U('Pc/Register/index');?>" target="_blank">注册</a>
                        </div><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrapper container center-block">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo">
                    <a href="<?php echo U('Index/index');?>">
                        <img src="/Statics/Pc/images/logo.png" alt="" style="width:200px;height:auto;">
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="search-wrapper center-block">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="请输入小说或作者名称" id="s-box">
                        <span class="input-group-btn">
                    <button class="btn btn-default red-btn" type="button"><i class="fa fa-search" id="search-btn"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-right">
                <div class="book-shelf">
                    <a href="<?php echo U('Pc/BookCase/index');?>"  target="_blank">
                        <em class="fa fa-book"></em>
                        <i>我的书架</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav-wrapper">
        <div class="main-nav container">
            <div class="row">
                <ul>
                    <li class="first">
                        <span><i class="fa fa-bars"></i>作品分类</span>
                    </li>
                    <li class="nav-li">
                        <a href="<?php echo U('Pc/List/index');?>">全部作品</a>
                    </li>
                    <li class="nav-li" data-nav="1">
                        <a href="<?php echo U('Pc/List/index');?>/status/2/nav/1">完本</a>
                    </li>
                    <li class="nav-li" data-nav="2">
                        <a href="<?php echo U('Pc/List/index');?>/type/1/nav/2">男生</a>
                    </li>
                    <li class="nav-li" data-nav="3">
                        <a href="<?php echo U('Pc/List/index');?>/type/2/nav/3">女生</a>
                    </li>
                    <li class="nav-li">
                        <a href="<?php echo U('Pc/BookManage/index');?>" target="_blank">作家专区</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="focus-wrapper container">
        <div class="row">
            <div class="classify-list pull-left so-awesome" id="classify-list">
                <dl>
                    <?php if(is_array($bookClassList)): $i = 0; $__LIST__ = $bookClassList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
                            <a href="<?php echo U('Pc/List/index/class_id');?>/<?php echo ($vo["id"]); ?>" target="_blank">
                                <cite>
                                    <em class="<?php echo ($vo["icon"]); ?>"></em>
                                    <span class="info">
                                    <i><?php echo ($vo["name"]); ?></i>
                                    <b><?php echo ($vo["count"]); ?></b>
                                </span>
                                </cite>
                            </a>
                        </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </div>
            <div class="focus-box pull-left">
                <div id="myFocus">
                    <div class="loading"><img src="/Statics/Pc/images/loading.gif" alt="请稍候..."/></div>
                    <div class="pic">
                        <ul>
                            <li><a href="javascript:"><img src="/Statics/Pc/images/mapper01.jpg" alt=""/></a></li>
                            <li><a href="javascript:"><img src="/Statics/Pc/images/mapper02.jpg" alt=""/></a></li>
                            <li><a href="javascript:"><img src="/Statics/Pc/images/mapper03.jpg" alt=""/></a></li>
                            <li><a href="javascript:"><img src="/Statics/Pc/images/mapper04.jpg" alt=""/></a></li>
                            <li><a href="javascript:"><img src="/Statics/Pc/images/mapper05.jpg" alt=""/></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hot-work-wrapper container cf">
        <div class="row">
            <div class="hot-work-box pull-left">
                <h3 class="wrapper-title lang">热门作品</h3>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php if(is_array($hotList)): $i = 0; $__LIST__ = $hotList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                                <div class="hot-work-info">
                                    <div class="hot-work-slide">
                                        <div class="three-slide-wrapper">
                                            <a href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($vo["id"])); ?>" target="_blank">
                                                <img class="lazy" src="/Upload/<?php echo ($vo["img"]); ?>" alt="<?php echo ($vo["name"]); ?>" style="display: inline;">
                                            </a>
                                        </div>
                                        <div class="info-text">
                                            <h3>
                                                <a href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($vo["id"])); ?>" target="_blank"><?php echo ($vo["name"]); ?></a>
                                            </h3>
                                            <p class="author">
                                                <a href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($vo["id"])); ?>" target="_blank"><?php echo ($vo["username"]); ?></a>
                                            </p>
                                            <p class="total"><b><?php echo ($vo["collection"]); ?></b><span>人气</span></p>
                                            <p class="intro"><?php echo (subtext($vo["intro"],66)); ?></p>
                                            <a class="read-btn" href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($vo["id"])); ?>" target="_blank">书籍详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="hot-classify-wrapper pull-left">
                <ul>
                    <?php if(is_array($bookList)): $i = 0; $__LIST__ = $bookList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($key == 3): ?><li class="mr0">
                            <?php elseif($key == 4 || $key == 5): ?>
                            <li class="mb0">
                            <?php elseif($key == 6): ?>
                            <li class="erciyuan mb0">
                            <?php else: ?>
                            <li><?php endif; ?>
                        <h3 class="wrapper-title lang">
                            <?php echo ($v['bookClass'][0]); ?>
                            <noempty name="v['bookClass'][1]">
                                <i>·</i><?php echo ($v['bookClass'][1]); ?>
                            </noempty>
                        </h3>
                        <dl class="hot-book-list">
                            <?php if(is_array($v['book'])): $i = 0; $__LIST__ = $v['book'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><dd>
                                    <a class="classify" href="<?php echo U('Pc/List/index/class_id');?>/<?php echo ($vv["class_id"]); ?>" target="_blank">
                                        <em>「</em><?php echo ($vv["class_name"]); ?><em>」</em>
                                    </a>
                                    <a class="name" href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($vv["id"])); ?>" target="_blank" title="<?php echo ($vv["name"]); ?>"><?php echo ($vv["word"]); ?></a>
                                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="mr0 mb0">
                        <div class="book-wrapper bd cf">
                            <div class="book-info pull-left">
                                <span class="tag"><?php echo ($collectionList[0]['username']); ?></span>
                                <h4>
                                    <a href="javascript:" target="_blank"><?php echo ($collectionList[0]['name']); ?></a>
                                </h4>
                                <p class="digital">
                                    <em><?php echo (number_format($collectionList[0]['collection'], 0)); ?></em>人气
                                </p>
                                <p class="desc"><?php echo (subtext($collectionList[0]['intro'],13)); ?></p>
                            </div>
                            <div class="book-cover">
                                <a class="link" href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($collectionList[0]['id'])); ?>" target="_blank">
                                    <img src="/Upload/<?php echo ($collectionList[0]['img']); ?>" alt="<?php echo ($collectionList[0]['name']); ?>">
                                </a>
                                <span></span>
                            </div>
                        </div>
                        <div class="book-wrapper bd0">
                            <div class="book-info pull-left">
                                <span class="tag"><?php echo ($collectionList[1]['username']); ?></span>
                                <h4>
                                    <a href="javascript:" target="_blank"><?php echo ($collectionList[1]['name']); ?></a>
                                </h4>
                                <p class="digital">
                                    <em><?php echo (number_format($collectionList[1]['collection'], 0)); ?></em>人气
                                </p>
                                <p class="desc"><?php echo (subtext($collectionList[1]['intro'],13)); ?></p>
                            </div>
                            <div class="book-cover">
                                <a class="link" href="<?php echo U('Pc/Book/index/id');?>/<?php echo (base64_encode($collectionList[1]['id'])); ?>" target="_blank">
                                    <img src="/Upload/<?php echo ($collectionList[1]['img']); ?>" alt="<?php echo ($collectionList[1]['name']); ?>">
                                </a>
                                <span></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="site-map">
                    <ul>
                        <li><a href="javascript:">系统简介</a></li>
                        <li><a href="javascript:">广告服务</a></li>
                        <li><a href="javascript:">试用洽谈</a></li>
                        <li><a href="javascript:">网站地图</a></li>
                        <li><a href="javascript:">联系方式</a></li>
                        <li><a href="javascript:">关于我们</a></li>
                    </ul>
                </div>
                <div class="copyright">
                    Copyright © 2017 <a href="javascript:">Gallonce</a> , Inc. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="right-bar-list" id="J_rightBarList">
    <dl>
        <dd id="J_comment">
            <a href="javascript:">
                <i class="fa fa-commenting"></i>
                <span>留言</span>
            </a>
        </dd>
        <dd class="backTop" id="J_goTop">
            <a href="javascript:">
                <i class="fa fa-chevron-up"></i>
            </a>
        </dd>
    </dl>
</div>
<div id="J_commentWrapper">
    <div class="comment-text-wrap">
        <input type="text" placeholder="请输入联系姓名" style="margin-right:13px;" id="usernameText">
        <input type="text" placeholder="请输入联系电话" id="telText">

        <div class="count-text" style="margin-top:13px;">
            <span class="count"><em id="J_commentCounter">0</em>/200</span>
            <textarea id="messageText" placeholder="请点击输入留言内容"></textarea>
        </div>
        <p><a class="red-btn" id="message" href="javascript:">发表留言</a></p>
    </div>
</div>
<script src="/Statics/Pc/plugins/jquery/jquery.min.js"></script>
<script src="/Statics/Pc/plugins/layui/layui.all.js"></script>
<script src="/Statics/Pc/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/Statics/Pc/plugins/myFocus/myfocus-2.0.1.min.js"></script>
<script src="/Statics/Pc/js/swiper.min.js"></script>
<script src="/Statics/Pc/js/common.js"></script>
<script src="/Statics/Pc/js/main.js"></script>
<script src="/Statics/Pc/js/chapter.js"></script>
<!--js脚本-->
    <script type="text/javascript">
        (function () {
            myFocus.set({
                id: 'myFocus',//ID
                pattern: 'mF_fancy'//Style
            });
            //swiper轮播
            var mySwiper = new Swiper('.swiper-container', {
                autoplay: 3000,//可选选项，自动滑动
                loop : true,
                autoplayDisableOnInteraction : false
            });
            //搜索
            $('#search-btn').click(function(){
                var name = $('#s-box').val();
                if(name==""){
                    window.open('/Pc/Search/index');
                }else{
                    window.open('/Pc/Search/index/name/'+name);
                }
            });
            //我的消息
            function message(){
                $.ajax({
                    url:"<?php echo U('Pc/Base/myMessage');?>",
                    type:"post",
                    dataType:"json",
                    success:function(data){
                        if(data.status==1){
                            $('#messageCount').html(data.data);
                        }
                    }
                });
            }
            message();
            setInterval(function(){
                message();
            },10000);

            //发表留言
            $('#message').click(function(){
               var user_name = $('#usernameText').val();
               var tel = $('#telText').val();
               var content = $('#messageText').val();
               var  tel_reg =/^1[3|4|5|6|7|8|9][0-9]{9}$/;
               if(user_name==''){
                   layer.msg('请输入联系姓名');
                   return false;
               }
               if(tel==''){
                   layer.msg('请输入联系电话');
                   return false;
               }
               if(!tel_reg.test(tel)){
                   layer.msg('联系电话格式输入不正确');
                   return false;
               }
               if(content==''){
                   layer.msg('请输入留言内容');
                   return false;
               }

               $.ajax({
                   url:"<?php echo U('pc/index/message');?>" ,
                   type:"post",
                   dataType:"json",
                   data:{
                       content:content,
                       user_name:user_name,
                       tel:tel
                   },
                   success:function(data){
                        if(data.status==1){
                            layer.msg('留言成功', {icon: 1,time:2000},function(){
                                window.location.reload();
                            });
                        }
                   }

               });
            });

        })();
    </script>
<!--js脚本-->
</body>
</html>