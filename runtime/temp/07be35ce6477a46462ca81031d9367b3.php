<?php /*a:4:{s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/shop/view/index/index.html";i:1525765179;s:77:"/Applications/XAMPP/xamppfiles/htdocs/l/application/shop/view/public/css.html";i:1525762505;s:80:"/Applications/XAMPP/xamppfiles/htdocs/l/application/shop/view/public/footer.html";i:1525762516;s:76:"/Applications/XAMPP/xamppfiles/htdocs/l/application/shop/view/public/js.html";i:1525762488;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的生活</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">


    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="stylesheet" href="/static/ydui/ydui.css">

<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/??sm.min.css,sm-extend.min.css">
<link rel="stylesheet" href="/static/mian.css">


<style>

</style>
    <style>
        .slider-item img {
            height: 150px;
        }

    </style>
</head>
<body>
<section class="g-flexview">
    <div class="m-slider" data-ydui-slider="{autoplay: 3000}"><!-- 参数在这里 -->
        <div class="slider-wrapper">
            <div class="slider-item">
                <a href="#">
                    <img src="/static/images/01.png">
                </a>
            </div>
        </div>
        <!--<div class="slider-pagination"></div>&lt;!&ndash; 分页标识 &ndash;&gt;-->
    </div>
    <div class="m-celltitle">推荐</div>
    <div class="m-cell">
        <a class="cell-item" href="javascript:;">
            <div class="cell-left"><i class="cell-icon icon-order"></i>我的订单</div>
            <div class="cell-right cell-arrow">查看全部订单</div>
        </a>
        <a class="cell-item" href="javascript:;">
            <div class="cell-left"><i class="cell-icon icon-like-outline"></i>我的收藏</div>
            <div class="cell-right cell-arrow"></div>
        </a>
    </div>

    <footer class="m-tabbar tabbar-fixed" style=" background: #339ddc;">
    <a href="<?php echo url('index/index'); ?>" class="tabbar-item ">
            <span class="tabbar-icon">
               <i class="iconfont ">&#xe62a;</i>
            </span>
        <span class="tabbar-txt">首页</span>
    </a>

    <a href="<?php echo url('user/index'); ?>" class="tabbar-item">
            <span class="tabbar-icon">
             <i
                     class="iconfont ">&#xe629;</i>
            </span>
        <span class="tabbar-txt">个人中心</span>
    </a>
</footer>
</section>


<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- 引入YDUI脚本 -->
<script src="/static/ydui/js/ydui.js"></script>

<script src="http://static.ydcss.com/uploads/ydui/ydui.citys.js"></script>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>

<script>


    //    支付弹窗
    var $keyboard = $('#J_KeyBoard');

    /* 初始化参数 */
    $keyboard.keyBoard({
        disorder: false, /* 是否打乱数字顺序 */
        title: '安全键盘' /* 显示标题 */
    });

    /* 打开键盘 */
    $('.J_OpenKeyBoard').on('click', function () {
        $keyboard.keyBoard('open');
    });

    /* 六位密码输入完毕后执行 */
    $keyboard.on('done.ydui.keyboard', function (ret) {
        console.log('输入的密码是：' + ret.password);
        YDUI.dialog.loading.open('验证支付密码');
        setTimeout(function () {
            /* 显示错误信息 */
            YDUI.dialog.loading.close();
            if (ret.password == '123456') {

                YDUI.dialog.loading.open('支付成功');
                setTimeout(function () {
                    YDUI.dialog.loading.close();
                    /* 移除loading */
                    window.location.href = "/index/index";
                }, 2000);
            } else {
                $keyboard.keyBoard('error', '对不起，您的支付密码不正确，请重新输入。');
            }

        }, 1500);

        /* 关闭键盘 */
        /* $keyboard.keyBoard('close'); */
    });

</script>


</body>
</html>