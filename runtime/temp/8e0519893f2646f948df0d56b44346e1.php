<?php /*a:3:{s:86:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/user/certification.html";i:1531626111;s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/css.html";i:1531621890;s:77:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/js.html";i:1525937518;}*/ ?>
<!DOCTYPE html>
<html>
<head>

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


    <style>
        .tab-panel .m-cell .cell-item {

        }

        .job-author .info-primary p {
            overflow: inherit;
        }

        .task-item {
            margin-bottom: 10px;
            /* padding: 10px; */
        }

        .task-item .m-celltitle em {
            border-left: 3px solid #5dd5c8;
            border-radius: 37%;
            margin-right: 3px;
        }

        .task-item .m-celltitle span {
            color: black
        }

        .task-item .m-celltitle .badge {
            float: right;
        }

        .task-item .m-celltitle .span {
            color: #ff5e53;
            float: right;
            font-size: .27rem;
        }

        .tab-panel {
            background: #EAE8f3;
        }

        .certification .right {
            float: left;
        }

        .cell-left {
            width: 90%;
            display: block;
        }

        .cell-right {
            width: 5%;
            color: #fff;
            background: -webkit-linear-gradient(#fb9569, #fc7357);
        }

        .cell-left .title_name {
            font-size: .7rem;
            font-weight: 500;
            color: black;
            padding-top: 10px;
        }

        .cell-left .describe {
            border-bottom: 1px solid #f5f5f5;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #3c3535;
        }

        .cell-left .describe span {
            font-size: 13px;
        }

        .cell-left .tq {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .cell-left .tq span {
            border-radius: 10px;
            border: 1px solid #f7efed;
            background: #fbfafa;
            padding-right: 6px;
            font-size: 12px;
        }

        .cell-left .tq .iconfont {
            font-size: 13px;
            margin-left: 6px;
            padding-right: 4px;
        }

        .m-cell:after {
            border-bottom: none;
        }

        .m-cell {
            margin-bottom: .5rem;
        }

        .noauto {
            background: -webkit-linear-gradient(#afaead, #7b7776);
        }

        .ingauto {
            background: -webkit-linear-gradient(#6bdcad, #5dd5ca);
        }

        .tab-panel .tab-panel-item {
            padding-top: 0;
        }

        .mheader-title {
            font-size: .6rem;
            margin-top: .2rem;
            margin-left: .2rem;
        }

        .m-navbar {
            background: #fffbf4;
        }

        .m-grids-3 .grids-item:not(:nth-child(3n)):before {
            border-right: none;
        }

        .m-grids-3 {
            height: 80px;
        }

        .m-grids-3:before {
            border-bottom: none;
        }

        .grids-item:after {
            border-bottom: none;
        }

        .job-detail {
            margin-top: .5rem;
        }

        .grids-item {
            padding: 10px 0;
        }

        .grids-txt {
            /*color: #0894ec;*/
        }
    </style>
</head>
<body>
<div id="wrap">
    <header class="m-navbar">
        <div class="mheader-title">
            应国家法律法规要求您需要完成相应招聘资质认证,根据自身需求完成认证即可获得对应权益
        </div>
    </header>
    <div class="m-grids-3">
        <a href="#" class="grids-item">
            <div class="grids-icon"><i class="iconfont" style="color: #fc7357;">&#xe685;</i></div>
            <div class="grids-txt"><span>特权标识</span></div>
        </a>
        <a href="#" class="grids-item">
            <div class="grids-icon"><i class="iconfont">&#xe603;</i></div>
            <div class="grids-txt"><span>获得订单</span></div>
        </a>
        <a href="#" class="grids-item">
            <div class="grids-icon"><i class="iconfont" style=" color: #78e3d3;">&#xe620;</i></div>
            <div class="grids-txt"><span>发布需求</span></div>
        </a>
    </div>
    <div class="job-detail">
        <div class="tab-panel">
            <div class="tab-panel-item tab-active task-item">
                <a href="<?php echo url('user/perauth'); ?>">
                    <div class="m-cell">
                        <div class="cell-item">
                            <div class="cell-left">
                                <div class="title_name">
                                    个人身份证信息认证
                                </div>
                                <div class="describe">
                                    <span>认证个人基本信息</span>
                                </div>
                                <div class="tq">
                                    <span class=""><i style="color: #36dac8" class="iconfont">&#xe637;</i>30点信誉</span>
                                    <span class=""><i style="color:#fc7357 " class="iconfont">&#xe603;</i>企业认证</span>
                                </div>
                            </div>
                            <?php echo certification(1); ?>
                        </div>
                    </div>
                </a>
                <a href="<?php echo url('user/enterpriseauth'); ?>">
                    <div class="m-cell">
                        <div class="cell-item">
                            <div class="cell-left">
                                <div class="title_name">
                                    酒店认证
                                </div>
                                <div class="describe">
                                    <span>认证酒店信息,即可抢单</span>

                                </div>
                                <div class="tq">
                                    <span class=""><i style="color: #36dac8" class="iconfont">&#xe637;</i>100点信誉</span>
                                    <span class=""><i style="color:#fc7357 " class="iconfont">&#xe603;</i>企业认证</span>
                                </div>
                            </div>
                            <?php echo certification(1); ?>
                        </div>
                    </div>
                </a>
                <a href="javascript:(0)">
                    <div class="m-cell">
                        <div class="cell-item">
                            <div class="cell-left">
                                <div class="title_name">
                                    旅行社认证
                                </div>
                                <div class="describe">
                                    <span>认证旅行社信息,即可抢单</span>

                                </div>
                                <div class="tq">
                                    <span class=""><i style="color: #36dac8" class="iconfont">&#xe637;</i>30点经验</span>
                                    <span class=""><i style="color:#fc7357 " class="iconfont">&#xe603;</i>企业认证</span>
                                </div>
                            </div>
                            <?php echo certification(1); ?>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>
</div>

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
    $('#J_Progress').progressBar({
        type: 'circle',
        strokeWidth: 2,
        strokeColor: '#B2B2B2',
        trailWidth: 5,
        trailColor: '#FE5D51',
        fill: '#FFF',
        progress: .4
    });

    $('#J_Set').on('click', function () {
        /* 手动设置进度为80% */
        $('#J_Progress').progressBar('set', .8);
    });
</script>
</html>