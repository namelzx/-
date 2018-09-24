<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/22
 * Time: 上午12:11
 */

namespace app\validate;


class CertificationValidate extends ValidateBase
{
    protected $rule = [
        'user_id|用户'=>'require',
        'IdCard|身份证图片' => 'require',
        'IdCardmuber|身份证号码' => 'require|idCard',
        'License|营业执照' => 'require',
        'Licensemuber|营业执照号码' => 'require',
        'BusLicense|经营许可证' => 'require',
        'BusLicensemuber|经营许可证号码' => 'require'
    ];
    protected $message = [
        'user_id'=>'已掉线,退出重新登录',
        'IdCard.require' => '身份证图片必须',
        'IdCardmuber.idCard' => '身份证号码18位',
        'License.require' => '营业执照必须',
        'Licensemuber.require' => '营业执照号必须-',
        'BusLicense.require' => '经营许可证',
        'BusLicensemuber.require' => '经营许可证号码必须',
    ];

}