<?php /*a:4:{s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/user/index.html";i:1531215167;s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/css.html";i:1531621890;s:81:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/footer.html";i:1525762280;s:77:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/js.html";i:1525937518;}*/ ?>
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

<style>
    .ios .g-scrollview {
        margin-top: 0;
    }

    .header {
        background: #349fe0;
        height: 130px;
        background: linear-gradient(to bottom, #79b3f2, #78cee0);
        text-align: center;
        font-family: Arial;

    }

    .header img {
        border-radius: 100%;
        height: 60px;
        margin: auto;
    }

    .header a {
        font-size: .7rem;
        color: #fff;
    }

    .header span {
        display: block;
        color: #fff;
        font-size: .4rem;
    }

    /*设置m-grids-3*/
    .m-grids-3 .grids-item:not(:nth-child(3n)):before {
        content: '';
        position: absolute;
        z-index: 0;
        top: 10%;
        right: 0;
        height: 80%;
        border-right: 1px solid #D9D9D9;
        -webkit-transform: scaleX(0.5);
        transform: scaleX(0.5);
        -webkit-transform-origin: 100% 0;
        transform-origin: 100% 0;
    }

    .m-grids-3 {
        margin-top: 3px;
    }

    .m-grids-3 .grids-item .record {
        color: black;
        font-size: 1rem;

    }

    .m-grids-3 .grids-item {
        padding: 0;
    }

    .m-grids-3 .grids-txt span {
        color: #b4b4b4;
        font-size: .34rem;
    }

    .m-grids-3:before, .m-cell:after {
        border-bottom: none;
    }

    .m-grids-3 .grids-txt {
        margin-bottom: 10px;
    }

    .m-cell {
        margin-top: 3px;
    }

    .m-cell .iconfont {
        font-size: 21px;
        color: #A6A5A5;
    }

    .btn-hotel {
        background: #fc6f4c;
        color: #fff;
    }

    .btn-block {
        margin-top: 0;
        text-align: center;
        position: relative;
        border: none;
        pointer-events: auto;
        width: 100%;
        display: block;
        font-size: 15px;
        height: 40px;
        line-height: 40px;
        margin-top: 25px;
        border-radius: 3px;
    }

    .cell-arrow span {
        color: #fc6f4c;
        background: #fff;

    }

    .badge:after {
        border: 1px solid #fc6c38;
    }

    .cell-arrow span .iconfont {
        font-size: 15px;
        color: #fc6f4c;
    }
</style>
<body>
<section class="g-flexview">
    <div class="g-scrollview" style="margin-bottom: 50px">
        <div class="header">
            <img src=" <?php echo htmlentities($wx_user['headimgurl']); ?>">
            <a href="#">编辑信息>></a>
            <span>普卡</span>
        </div>
        <div class="m-grids-3">
            <a href="#" class="grids-item">
                <div class="grids-icon"><span class="record">433</span></div>
                <div class="grids-txt"><span>平台信用</span></div>
            </a>
            <a href="#" class="grids-item">
                <div class="grids-icon"><span class="record">43</span></div>
                <div class="grids-txt"><span>发布记录</span></div>
            </a>
            <a href="#" class="grids-item">
                <div class="grids-icon"><span class="record">19</span></div>
                <div class="grids-txt"><span>成交记录</span></div>
            </a>
        </div>
        <!--列表-->
        <div class="m-cell">
            <a class="cell-item" href="<?php echo url('user/certification'); ?>">
                <div class="cell-left"><i class="iconfont">&#xe6ac;</i>认证与特权</div>
                <div class="cell-right cell-arrow"><span class="badge badge-hollow">已完成认证<i
                        class="iconfont">&#xe63f;</i></span></div>
            </a>
            <a class="cell-item" href="javascript:;">
                <div class="cell-left "><i class="iconfont">&#xe7b6;;</i>发布记录</div>
                <div class="cell-right cell-arrow"></div>
            </a>
            <a class="cell-item" href="javascript:;">
                <div class="cell-left "><i class="iconfont">&#xe686;</i>完成的订单</div>
                <div class="cell-right cell-arrow"></div>
            </a>
            <a class="cell-item" href="javascript:;">
                <div class="cell-left "><i class="iconfont">&#xe632;</i>角色切换</div>
                <div class="cell-right cell-arrow"></div>
            </a>
            <a class="cell-item" href="javascript:;">
                <div class="cell-left "><i class="iconfont">&#xe632;</i>邀请好友</div>
                <div class="cell-right cell-arrow"></div>
            </a>
            <a class="cell-item" href="javascript:;">
                <div class="cell-left "><i class="iconfont">&#xe62c;</i>意见反馈</div>
                <div class="cell-right cell-arrow"></div>
            </a>
            <a class="cell-item" href="javascript:;">
                <div class="cell-left "><i class="iconfont">&#xe651;</i>服务协议</div>
                <div class="cell-right cell-arrow"></div>
            </a>
        </div>
        <div class="m-cell">
            <a class="cell-item" href="javascript:;">
                <div class="cell-left"><i class="iconfont">&#xe605;</i>设置</div>
                <div class="cell-right cell-arrow"></div>
            </a>

        </div>
        <div class="m-cell" style="    margin-right: 10%;
    margin-left: 10%;">
            <input type="submit" id="J_Loading" class="btn-block btn-hotel" value="转换资源端"/>
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

    !function (win, $) {

        var dialog = win.YDUI.dialog;
        /* 加载中提示框 */
        $('#J_Loading').on('click', function () {
            dialog.loading.open('前往酒店端');
            setTimeout(function () {
                dialog.loading.close();
                /* 移除loading */
                window.location.href = "<?php echo url('/shop/index/index'); ?>";
            }, 2000);
        });
        /* 顶部提示框 */
        $('#J_Notify').on('click', function () {
            dialog.notify('5秒后自动消失，点我也可以消失！', 5000, function () {
                console.log('我走咯！');
            });
        });
    }(window, jQuery);
</script>

</body>
</html>