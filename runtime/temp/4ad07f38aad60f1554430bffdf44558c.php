<?php /*a:3:{s:87:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/user/enterprissauth.html";i:1531640407;s:78:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/css.html";i:1531621890;s:77:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/public/js.html";i:1525937518;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
    <!--<script src=""></script>-->
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <link rel="stylesheet" href="/static/weui/lib/weui.css"/>

</head>

<body>
<style>

    .fill-wrapper h2 {
        color: #403d3d;
        font-size: .6rem;
        line-height: 2.8125rem;
        padding: 0 1.125rem;
        margin: 0;
        border-bottom: 1px solid #f1f1f1;
    }

    input::-webkit-input-placeholder {
        /* placeholder颜色  */
        color: #adadad;
        /* placeholder字体大小  */
        font-size: .6rem;
        /* placeholder位置  */
        font-weight: 800;
    }

    .cityselect-content {
        /*padding-top: 115px;*/
    }

    .cell-left {
        width: 20%;
        color: #505050;
        font-size: .7rem;
    }
</style>

<section class="g-scrollview fill-wrapper">

    <form id="form">
        <!--<div class="m-celltitle">用户信息 【必填项】</div>-->

        <h2 id="top-desc" class="" style="">根据国家实名制要求, 请准确提供身份证信息</h2>
        <div class="m-cell">

            <div class="cell-item">
                <div class="cell-left">酒店名称</div>
                <div class="cell-right"><input type="text" id="qiyeming" class="cell-input" value=""
                                               name="qiyeming"
                                               placeholder="必填项" autocomplete="off"/></div>
            </div>

            <div class="cell-item">
                <div class="cell-left">联系人</div>
                <div class="cell-right"><input type="text" id="contact" class="cell-input" value=""
                                               name="contact"
                                               placeholder="必填项" autocomplete="off"/></div>
            </div>

            <div class="cell-item">
                <div class="cell-left">手机号</div>
                <div class="cell-right">
                    <input type="text" class="cell-input" id="phone" value="" name="phone"
                           placeholder="必填项"
                           autocomplete="off"/>
                    <a href="javascript:;" class="btn btn-warning" id="getCode">获取短信验证码</a>
                </div>

            </div>
            <div class="cell-item">
                <div class="cell-left">验证码</div>
                <div class="cell-right">
                    <input type="text" class="cell-input" id="phone_code" name="phone_code" placeholder="请输入短信验证码"
                           autocomplete="off"/>
                </div>
            </div>

            <div class="cell-item">
                <div class="cell-left">营业执照</div>
                <div class="cell-right" style="padding-right: 60%;
    margin-top: 10px;">
                    <div class="weui-uploader__input-box" id="test1">
                        <img class="layui-upload-img" id="demo1" style="width: 77px;height: 77px;">
                        <p id="demoText"></p>
                        <input name="licenece_logo"  style="display: none" id="images_url" value="">
                    </div>
                </div>
            </div>

            <div class="cell-item">
                <div class="cell-left">酒店地址</div>
                <div class="cell-right">
                    <input type="text" class="cell-input" id="J_Address" value="" name="city"
                           placeholder="点击选择区域"
                           autocomplete="off"/>
                </div>
            </div>
            <div class="cell-item">
                <div class="cell-right">
                    <textarea class="cell-textarea" name="area" placeholder="街道/镇+村/小区/写字楼+门牌号"></textarea>
                </div>
            </div>

        </div>
    </form>
    <div class="c">
        <style>
            .c .m-cell:after {
                border-bottom: none;
            }
        </style>
        <div class="m-cell" style="background: #EAE8f3">

            <a href="#" id="subm" class="btn-block g-block">提交</a>

        </div>

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


<script src="/static/layui/layui.js"></script>

<script>
    layui.use('upload', function(){
        var $ = layui.jquery
            ,upload = layui.upload;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: '/commonly/Images/upload'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.state < 0){
                    return layer.msg('上传失败');
                }
                $('#images_url').val(res.path);
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });



    });
</script>

<script>
    var $address = $('#J_Address');

    $address.citySelect();

    $address.on('click', function () {
        $address.citySelect('open');
    });

    $address.on('done.ydui.cityselect', function (ret) {
        /* 省：ret.provance */
        /* 市：ret.city */
        /* 县：ret.area */
        $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
    });
    $('#subm').on('click', function () {

        //用户名不可为空
        var name = $("#qiyeming").val();
        if (name.length == 0) {
            YDUI.dialog.toast('别漏了名字！', 'none', 1000);
            $('#name').focus();
            return false;
        }

        //电话号码格式验证
        if (!$("#phone").val().match(/^1[3|4|5|7|8][0-9]{9}$/)) {
            YDUI.dialog.toast('请输入正确的手机号码！', 'none', 1000);

            $("#phone").focus();
            return false;
        }
        var data = $('form').serializeArray();
        postdata = {};
        for (x in data) {
            postdata[data[x].name] = data[x].value;
        }

        //
        url = "<?php echo url('user/enterprissauth'); ?>"
        $.post(url, postdata, function (res) {
            console.log(res);
            // YDUI.dialog.toast(res.msg, 'success', 1000);

        });

    })
</script>
</html>