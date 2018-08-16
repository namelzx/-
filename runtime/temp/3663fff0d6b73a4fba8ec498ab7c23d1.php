<?php /*a:1:{s:83:"/Applications/XAMPP/xamppfiles/htdocs/l/application/index/view/hotel/hotellist.html";i:1523347474;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="/static/ydui/ydui.css">

    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/??sm.min.css,sm-extend.min.css">
</head>
<style>
    body {
        background: url("/static/images/background.jpg") top center no-repeat;

        background-size: cover;
    }

    .headDiv {
        position: fixed;
        /*固定定位*/
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        height: 120px;
        /*border: 1px solid blue;*/
    }

    .list-theme4 {
        border-radius: 15px;
        margin: 10px;

    }

    .serach-bar {
        margin-top: 0;
    }

    .list-item {
        margin: 10px;
    }

    .list-img img {
        height: 130px;
    }

    .list-mes {
        margin-left: 15px;
    }

    .list-mes .list-title {
        font-size: 0.3rem;
        /*color: transparent;*/
    }

    .list-price {
        font-size: 13px;
        color: #525252;
    }

    .list-theme4 .m-grids-2 a {
        border-radius: 20px;
        width: 1.3rem;
        color: black;
        background: #fff;
        border: 1px solid #35a0e1;

    }

    .m-grids-2:before, .m-grids-3:before, .m-grids-4:before, .m-grids-5:before {
        border-bottom: none;
    }

    .list-theme4 .m-grids-2 .abackground {
        background: #35a0e1;
        color: #fff;
        margin-left: 0.5rem;
    }

    .btn {
        height: .5rem;
        line-height: .5rem;
        padding: 0 .2rem;
        border-radius: 3px;
    }

    .serach-bar .iconfont {
        display: block;
        position: absolute;
        left: 0px;
        line-height: 29px;
    }

    .main {

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
        width: 80%;
    }

    .grids-txt {
        padding-top: 10px;
    }

    .g-block {
        background: #349fe0;
        border-radius: 30px;
        color: #fff;
        margin-top: 0;
        height: 40px;
        line-height: 40px;
        margin-bottom: 10px;

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

        padding-right: 40px;
    }

    /*图片模糊*/
    /*.list-img {*/
    /*filter: url(blur.svg#blur); !* FireFox, Chrome, Opera *!*/

    /*-webkit-filter: blur(10px); !* Chrome, Opera *!*/
    /*-moz-filter: blur(10px);*/
    /*-ms-filter: blur(10px);*/
    /*filter: blur(10px);*/

    /*filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius=10, MakeShadow=false); !* IE6~IE9 *!*/
    /*}*/

    /*.blurry {*/

    /*color: transparent;*/
    /*text-shadow: 0 0 15px #666;*/
    /*transition: text-shadow 2s cubic-bezier(0, 1, 0, 1);*/
    /*-webkit-transition: text-shadow 2s cubic-bezier(0, 1, 0, 1);*/
    /*-moz-transition: text-shadow 2s cubic-bezier(0, 1, 0, 1);*/
    /*-o-transition: text-shadow 2s cubic-bezier(0, 1, 0, 1);*/
    /*}*/

    /*.blurry:hover {*/
    /*text-shadow: 0 0 0 #666;*/
    /*}*/

    .pr {
        color: red;
        font-size: 20px;
        font-weight: 800;
    }

    .cell-item:not(:last-child):after {
        border-bottom: none;
    }

    .list-theme4 .cell-item {
        padding-left: 0;
    }

    .list-theme4 .list-item .list-mes .list-mes-item {
        padding-top: 0;
    }

    .list-price > em {
        font-size: 14px;
    }

    .list-theme4 .list-mes-item a {
        border-radius: 20px;
        width: auto;
        color: black;
        background: #fff;
        font-size: 13px;
        border: 1px solid #35a0e1;
        padding-left: 15px;
        padding-right: 15px;

    }
    .conte{
        margin-top: 250px;
    }
</style>
<body>


<section class="g-scrollview">


    <div class="main headDiv">
        <div class="m-cell">

            <div class="cell-item ">
                <a href="#" class="grids-item g-time">
                    <div class="grids-txt"><span>入住</span></div>
                    <div class="grids-txt"><input type="text" class="g-span" id="my-input" placeholder="2018年4月29日">
                    </div>
                </a>
                <a href="#" class="grids-item" style="line-height: 4;text-align: center">
                    <span class="badge badge-hollow">共1晚</span>
                </a>
                <a href="#" class="grids-item g-time">
                    <div class="grids-txt"><span>离店</span></div>
                    <div class="grids-txt">
                        <input type="text" class="g-span" id="my-inputone" placeholder="2018年4月30日">
                    </div>
                </a>
            </div>
            <!--<div class="cell-item g-title">-->
            <!--<div class=" "><input type="text" class="cell-input" placeholder="关键词/品牌/位置/酒店名" autocomplete="off">-->
            <!--</div>-->
            <!--</div>-->

            <div class="cell-item">
                <div class="cell-left" style="width: 100%">
                    <div class="cell-item">
                        <div class="cell-left">区域：</div>
                        <div class="cell-right"><a href="#" id="J_Address2">北部湾广场</a></div>
                    </div>
                </div>

            </div>
            <div class="cell-item">
                <div class="cell-left" style="width: 50%">
                    <div class="cell-item">
                        <div class="cell-left">星级：</div>
                        <div class="cell-right">
                            <input type="text" class="g-span" value="3星级" id='picker'/>
                        </div>
                    </div>
                </div>
                <div class="cell-left" style="width: 50%">
                    <div class="cell-item">
                        <div class="cell-left">价位：</div>
                        <div class="cell-right rig">
                            <input type="text" class="J_Input price" value="100" placeholder=""/>
                            <span>至</span>
                            <input type="text" class="J_Input price" value="200" placeholder=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell-item">
                <div class="cell-left" style="width: 50%">
                    <div class="cell-item">
                        <div class="cell-left">房型：</div>
                        <div class="cell-right">
                            <input type="text" value="大床房" class="g-span" id='bed'/>
                        </div>
                    </div>
                </div>
                <div class="cell-left" style="width: 50%">
                    <div class="cell-item">
                        <div class="cell-left">房量：</div>
                        <div class="cell-right"><input type="number" pattern="[0-9]*" class="cell-input"
                                                       placeholder="100" style="    width: 70%;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="conte">
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


    </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>
        <article class="m-list list-theme4">
            <div href="javascript:;" class="list-item">
                <div class="list-img">
                    <img src="/static/images/offer.jpg"
                         data-url="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_180x180.jpg">
                </div>
                <div class="list-mes">
                    <h3 class="list-title">艾欧尼亚钻石酒店</h3>
                    <div class="list-mes-item">
                        <div>
                            <span class="list-price" style="color: #0894ec"><em style="font-weight: 800">5.0</em>分<em
                                    style="padding-left: 10px">十分满意</em><em style="padding-left: 10px;color: #989191">已完成208笔交易</em></span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: -5px;">
                        <div style="float: left">
                            <span class="list-price"><em>大床房</em>|<em>北部湾广场</em></span>
                        </div>
                        <div style="float: right">
                            <span class="list-price"><em class="pr" style="font-size: 17px">69</em>元</span>
                        </div>

                    </div>
                    <div class="list-mes-item" style=" margin-top: 10px;">

                        <a href="tel:18677947067">
                            咨询
                        </a>


                        <a href="<?php echo url('fillinfo'); ?>" style="background: #0894ec; color: #fff">
                            下单
                        </a>


                    </div>


                </div>

            </div>


        </article>

    </div>

</section>

<div style="margin-top: 100px">

</div>

</body>

</html>