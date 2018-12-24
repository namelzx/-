<?php /*a:5:{s:79:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/index/index.html";i:1525762167;s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/css.html";i:1531621890;s:79:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/head.html";i:1525617896;s:81:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/footer.html";i:1525762280;s:77:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/js.html";i:1525937518;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="telephone=no">

<link rel="stylesheet" href="/static/ydui/ydui.css">

<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/??sm.min.css,sm-extend.min.css">
<link rel="stylesheet" href="/static/mian.css">


<style>

    .g-block {
        background: #349fe0;
        border-radius: 30px;
        color: #fff;
        margin-top: 0;
        height: 40px;
        line-height: 40px;
        margin-bottom: 10px;
    }

</style>
</head>
<body>

<style>
    .element::-webkit-scrollbar {
        display: none
    }

    body {

    }

    .m-slider {
        height: 250px;
    }

    .slider-item img {
        height: 250px;
    }

    .p {
        position: relative;
        margin-top: -100px;
        color: #fff;
        width: 200px;
        text-align: center;
        left: 20%;
        font-size: 0.3rem;
        font-weight: 600;

    }

    /*覆盖顶部导航*/
    .hairline .g-scrollview {
        margin-top: -50px;
    }

    .icon-home:before {
        content: none;
    }

    .serach-bar .city-text {
        left: 7px;
        /*top: 0.24rem;*/
        top: 10px;
        font-weight: 500;
    }

    .m-navbar:after {
        border-bottom: none;
    }

    .serach-bar .top-search .ipt-wrap {
        padding-top: 0.12rem;
    }

    .serach-bar .top-search .ipt-search {
        margin-left: 40px;
        padding: 5px 13px 5px 0px;
        width: 60%;
        text-align: center;
    }

    .m-navbar {
        background: none;
        z-index: 2;
    }

    p .me {
        font-size: 28px;
        color: #Fff;
        float: right;
        margin-right: 8px;
    }

    .tabbar-item {
        color: #fff;

    }

    input::-webkit-input-placeholder {
        color: #8b96a6;
    }

    input::-moz-placeholder { /* Mozilla Firefox 19+ */
        color: #8b96a6;
    }

    input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color: #8b96a6;
    }

    input:-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #8b96a6;
    }

    .cityselect-title {
        margin: 0;
    }

</style>

<section class="g-flexview">
    
<header class="m-navbar">

    <!--<div class="navbar-center"><span class="navbar-title">NavBar</span></div>-->
    <div class="serach-bar">
        <div class="top-search" style="margin-top: -10px">
            <form action="#" method="get">
                <input name="city" value="101300300" type="hidden">
                <input name="source" value="10" type="hidden">
                <p class="ipt-wrap">
                    <!--<a href="/index/index/index.html" class="icon-home" style="left: 70px"><i-->
                    <!--class="iconfont">&#xe61a;</i></a>-->
                    <a class="city-text" id="J_Address2">银海区</a>
                    <input style="opacity: 0.8" type="search" ka="search-keyword" name="query" autocomplete="off"
                           class="ipt-search" value="" placeholder="目的地/关键词">
                    <!--<button type="submit" class="btn btn-search" ka="search-btn">搜索</button>-->
                    <i class="icon-close" style="display: none;"></i>
                    <a href="/index/index/index.html"><i
                            class="iconfont me">&#xe76e;</i></a>
                    <a href="/index/index/index.html"><i
                            class="iconfont me">&#xe86f;</i></a>
                </p>
            </form>
        </div>
    </div>
</header>
    <div class="g-scrollview" style="margin-top: -50px;margin-bottom: 30px">

        <div class="m-slider" data-ydui-slider="{autoplay: 3000}"><!-- 参数在这里 -->
            <div class="slider-wrapper">
                <div class="slider-item">
                    <a href="#">
                        <img src="/static/images/banner.jpg">
                        <p class="p">
                    <span>
                        TOURISM IS UP,JOBS ARE UP,
                        INDIVIDUAL INCOME IS UP
                    </span>
                        </p>
                    </a>
                </div>
                <div class="slider-item">
                    <a href="#">
                        <img src="/static/images/banner2.jpg">
                        <p class="p">
                    <span>
                        TOURISM IS UP,JOBS ARE UP,
                        INDIVIDUAL INCOME IS UP
                    </span>
                        </p>
                    </a>
                </div>

            </div>
            <!--<div class="slider-pagination"></div>&lt;!&ndash; 分页标识 &ndash;&gt;-->
        </div>


        <style>
            .main {
                margin: 10px;
                margin-top: 40px;
            }

            .main .m-grids-2 .grids-item {
                height: 120px;

            }

            .main .left img {
                height: 150%;
            }

            .main .grids-txt span {
                font-size: color: #fff;
            }

            .main .m-grids-2 .left {
                width: 35%;
            }

            .main .m-grids-2 .right {
                width: 65%;
                padding: 0;

            }

            .main .right img {
                height: 100%;
                width: 100%;
                margin-left: 2px;

            }

            .grids-txt {

                margin-top: 5px;
                margin-bottom: 10px;
            }

            .main .m-grids-2 {
                margin-top: 2px;
            }

            .m-grids-2:before, .m-grids-3:before, .m-grids-4:before, .m-grids-5:before {
                border-bottom: none;
            }

        </style>
        <div class="main">

            <div class="m-grids-2">
                <a href="<?php echo url('plane/index'); ?>" class="grids-item left"
                   style="background: #0073d0;border-radius: 5px 0 0 0;">
                    <div class="grids-txt"><span>拼单</span></div>
                    <div class="grids-icon"><img src="/static/images/ico/plane.png"></div>
                </a>
                <a href="#" class="grids-item right" style="border-radius: 0 5px 0 0;">
                    <img src="/static/images/plane.png" style="    border-radius: 0 5px 0 0;">
                </a>
            </div>
            <div class="m-grids-2">
                <a href="<?php echo url('hotel/index'); ?>" class="grids-item left" style="background: #0398d0;">
                    <div class="grids-txt"><span>酒店</span></div>
                    <div class="grids-icon"><img src="/static/images/ico/hotel.png"></div>
                </a>
                <a href="#" class="grids-item right">
                    <img src="/static/images/office.jpg">
                </a>
            </div>
            <div class="m-grids-2">
                <a href="<?php echo url('resources/index'); ?>" class="grids-item left"
                   style="background: #00c1e6;border-radius: 0 0 0 5px;">
                    <div class="grids-txt"><span>近期特价</span></div>
                    <div class="grids-icon"><img src="/static/images/ico/offer.png"></div>
                </a>
                <a href="#" class="grids-item right">
                    <img src="/static/images/offer.jpg" style="border-radius: 0 0 5px 0;">
                </a>
            </div>


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
    </div>


</section>
</body>
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
                alert("支付成功");
                YDUI.dialog.loading.open('支付成功');
                setTimeout(function () {
                    YDUI.dialog.loading.close();
                    /* 移除loading */
                    // window.location.href = "/index/index";
                }, 2000);
            } else {
                $keyboard.keyBoard('error', '对不起，您的支付密码不正确，请重新输入。');
            }
        }, 1500);
        /* 关闭键盘 */
        /* $keyboard.keyBoard('close'); */
    });
</script>



<script>
    var $target = $('#J_Address2');

    $target.citySelect({
        provance: '广西',
        city: '北海市',
        area: '银海区'
    });
    $target.on('click', function () {
        $target.citySelect('open');
    });

    $target.on('done.ydui.cityselect', function (ret) {
        $(this).text(ret.area);
    });
    $('img.lazy').lazyLoad();
</script>


</body>
</html>