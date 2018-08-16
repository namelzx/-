<?php /*a:3:{s:79:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/hotel/index.html";i:1531375029;s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/css.html";i:1531621890;s:77:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/js.html";i:1525937518;}*/ ?>
<!DOCTYPE html>
<html lang="en">
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
    body {
        background: url("/static/images/hotebody.jpg") top center no-repeat;

        background-size: cover;
    }

    .main {
        margin: 20px;
        margin-top: 180px;
        border-radius: 10px;
        background: #fff;
    }

    .main .m-cell {
        border-radius: 15px;
    }

    .m-cell:after {
        border-bottom: none;
    }

    .content .row {
        text-align: center;
    }

    p {
        margin: 0;
    }

    .g-time {
        width: 33.3333%;
        float: left;
        position: relative;
        z-index: 0;
        padding: .32rem 0;

        text-align: center;
    }

    .g-span {

        border: none;
        /*width: 80%;*/
    }

    .grids-txt {
        padding-top: 10px;
    }

    .J_Input {
        width: 30%;
    }

    .price {
        border: none;
        border-bottom: 1px solid #d8d8d8;
        text-align: center;
    }

    .rig {

        padding-right: 60px;
    }

    .tab-nav-item.tab-active {
        color: #349fe0;
    }

    .myCheck + label {
        background-color: white;
        border-radius: 5px;
        border: 1px solid #d3d3d3;
        width: 19px;
        height: 19px;
        display: inline-block;
        text-align: center;
        vertical-align: middle;
        line-height: 20px;
    }

    .myCheck:checked + label:after {
        content: "\2713";
        /* background: #349fe0; */
        color: #fff;
    }

</style>
<body>

<div class="g-scrollview">
    <div class="main">

        <div class="m-tab" data-ydui-tab><!-- 这里添加data-ydui-tab就可以啦 -->
            <ul class="tab-nav">
                <li class="tab-nav-item tab-active"><a href="javascript:;">团队房</a></li>
                <li class="tab-nav-item"><a href="javascript:;">会议房</a></li>

            </ul>
            <div class="tab-panel">
                <div class="tab-panel-item tab-active">
                    <div class="m-cell">
                        <div class="cell-item ">
                            <a href="#" class="grids-item g-time">
                                <div class="grids-txt"><span>入住</span></div>
                                <div class="grids-txt"><input type="text" class="g-span" id="my-input"
                                                              placeholder="入住时间">
                                </div>
                            </a>
                            <a href="#" class="grids-item" style="line-height: 4;text-align: center">
                                <span class="badge badge-hollow">共1晚</span>
                            </a>
                            <a href="#" class="grids-item g-time">
                                <div class="grids-txt"><span>离店</span></div>
                                <div class="grids-txt">
                                    <input type="text" class="g-span" id="my-inputone" placeholder="离开时间">
                                </div>
                            </a>
                        </div>

                        <div class="cell-item g-title">
                            <div class=" "><input type="text" class="cell-input" placeholder="关键词/品牌/位置/酒店名"
                                                  autocomplete="off">
                            </div>
                        </div>

                        <div class="cell-item">
                            <div class="cell-left" style="width: 100%">
                                <div class="cell-item">
                                    <div class="cell-left">区域：</div>
                                    <div class="cell-right"><a href="#" id="J_Address2">请选择</a></div>
                                </div>
                            </div>

                        </div>
                        <div class="cell-item">
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">星级：</div>
                                    <div class="cell-right">
                                        <input type="text" class="g-span" id='picker'/>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">价位：</div>
                                    <div class="cell-right rig">
                                        <input type="text" class="J_Input price" value="1" placeholder=""/>
                                        <span>至</span>
                                        <input type="text" class="J_Input price" value="1" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell-item">
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">房型：</div>
                                    <div class="cell-right">
                                        <input type="text" class="g-span" id='bed'/>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">房量：</div>
                                    <div class="cell-right"><input type="number" pattern="[0-9]*" class="cell-input"
                                                                   placeholder="请输入" style="    width: 70%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="cell-item">
                            <a href="<?php echo url('hotel/hotellist'); ?>" class="btn-block g-block">发布</a>
                        </div>
                    </div>
                </div>
                <div class="tab-panel-item">

                    <div class="m-cell">
                        <div class="cell-item ">
                            <a href="#" class="grids-item g-time">
                                <div class="grids-txt"><span>入住</span></div>
                                <div class="grids-txt"><input type="text" class="g-span" id="my-meeting"
                                                              placeholder="入住时间">
                                </div>
                            </a>
                            <a href="#" class="grids-item" style="line-height: 4;text-align: center">
                                <span class="badge badge-hollow">共1晚</span>
                            </a>
                            <a href="#" class="grids-item g-time">
                                <div class="grids-txt"><span>离店</span></div>
                                <div class="grids-txt">
                                    <input type="text" class="g-span" id="my-meetingone" placeholder="离开时间">
                                </div>
                            </a>
                        </div>

                        <div class="cell-item g-title">
                            <div class=" "><input type="text" class="cell-input" placeholder="关键词/品牌/位置/酒店名"
                                                  autocomplete="off">
                            </div>
                        </div>

                        <div class="cell-item">
                            <div class="cell-left" style="width: 100%">
                                <div class="cell-item">
                                    <div class="cell-left">区域：</div>
                                    <div class="cell-right"><a href="#" id="J_Address1">请选择</a></div>
                                </div>
                            </div>

                        </div>
                        <div class="cell-item">
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">星级：</div>
                                    <div class="cell-right">
                                        <input type="text" class="g-span" id='meetingpicker'/>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">价位：</div>
                                    <div class="cell-right rig">
                                        <input type="text" class="J_Input price" value="1" placeholder=""/>
                                        <span>至</span>
                                        <input type="text" class="J_Input price" value="1" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell-item">
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">房型：</div>
                                    <div class="cell-right">
                                        <input type="text" class="g-span" id='meetingbed'/>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-left" style="width: 50%">
                                <div class="cell-item">
                                    <div class="cell-left">房量：</div>
                                    <div class="cell-right"><input type="number" pattern="[0-9]*" class="cell-input"
                                                                   placeholder="请输入" style="    width: 70%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="cell-item g-title">
                            <div class="cell-left" style="width: 100%">
                                <div class="cell-item">
                                    <div class="cell-left">会场使用时间：</div>
                                    <div class="cell-right"><input type="text" class="g-span" id="my-use"
                                                                   placeholder="入住时间"></div>
                                </div>
                            </div>

                        </div>
                        <div class="cell-item g-title">
                            <div class="cell-left" style="width: 100%">
                                <div class="cell-item">
                                    <div class="cell-left">会场桌型：</div>
                                    <div class="cell-right"><a href="#">请选择</a></div>
                                </div>
                            </div>

                        </div>

                        <div class="cell-item g-title">
                            <div class="cell-left" style="width: 100%">
                                <div class="cell-item">
                                    <div class="cell-left">用餐方式：</div>
                                    <div class="cell-right">

                                        <input type="checkbox" id="zz" class="myCheck">
                                        <label for="zz"></label>
                                        <span>自助</span>


                                        <input type="checkbox" id="yz" class="myCheck">
                                        <label for="yz"></label>
                                        <span>圆桌</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="cell-item g-title">


                        </div>
                        <div class="cell-item g-title">
                            <div class="cell-left" style="width: 100%">
                                <div class="cell-item">
                                    <div class="cell-left">其他需求：</div>
                                    <div class="cell-right">
                                        <input type="checkbox" id="hf" class="myCheck">
                                        <label for="hf"></label>
                                        <span>横幅</span>

                                        <input type="checkbox" id="jj" class="myCheck">
                                        <label for="jj"></label>
                                        <span>接机</span>
                                        <input type="checkbox" id="pw" class="myCheck">
                                        <label for="pw"></label>
                                        <span>票务</span>

                                        <input type="checkbox" id="sp" class="myCheck">
                                        <label for="sp"></label>
                                        <span>水牌</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="cell-item g-title" style="border-bottom: none">
                            <div class="cell-left">
                                <div class="cell-item">
                                    <div class="cell-left">工作人员用房：</div>
                                    <textarea class="cell-textarea" placeholder="" style="border: none"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="cell-item">
                            <a href="<?php echo url('hotel/hotellist'); ?>" class="btn-block g-block">发布</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>
</body>


<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/??sm.min.js,sm-extend.min.js'
        charset='utf-8'></script>
<script>
    <!--团队房-->
    $("#my-input").calendar({
        value: ['2015-12-05']
    });
    $("#my-inputone").calendar({
        value: ['2015-12-05']
    });


    $("#picker").picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-left">按钮</button>\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">选择酒店星级</h1>\
  </header>',
        cols: [
            {
                textAlign: 'center',
                values: ['1星级', '2星级', '3星级', '4星级', '5星级']
            }
        ]
    });


    $("#bed").picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-left">按钮</button>\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">房型</h1>\
  </header>',
        cols: [
            {
                textAlign: 'center',
                values: ['大床房', '大床房', '亲子房', '三人间', '套房']
            }
        ]
    });
    //    会议房
    $("#my-meeting").calendar({
        value: ['2015-12-05']
    });
    $("#my-meetingone").calendar({
        value: ['2015-12-05']
    });

    $("#my-use").calendar({
        value: ['2015-12-05']
    });


    $("#meetingpicker").picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-left">按钮</button>\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">选择酒店星级</h1>\
  </header>',
        cols: [
            {
                textAlign: 'center',
                values: ['1星级', '2星级', '3星级', '4星级', '5星级']
            }
        ]
    });


    $("#meetingbed").picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-left">按钮</button>\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">房型</h1>\
  </header>',
        cols: [
            {
                textAlign: 'center',
                values: ['大床房', '大床房', '亲子房', '三人间', '套房']
            }
        ]
    });
</script>
<!--<link rel="stylesheet" href="/static/ydui/ydui.js">-->
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


<script src="http://static.ydcss.com/uploads/ydui/ydui.citys.js"></script>

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


    var $target = $('#J_Address1');
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
</script>
</html>