<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
return [
    'sms_template' => [
        // 注册短信
        'SMS_138063216' => [
            'content' => '本次验证码是${sixcode}，3分钟内有效，请勿泄露于他人！',
            'template' => 'SMS_138063216',
        ],
        'SMS_150866073' => [
            'content' => '为确保门店屏幕正常播放，请联网打开盒司令。如有升级提示，请及时升级到最新版本。技术咨询:15021130521/15050585723',
            'template' => 'SMS_150866073',
        ],
        'SMS_144456597' => [
            'content' => '管理员${name}正在生成代号${value}的序列号，本次操作的确认码为${code}！',
            'template' => 'SMS_144456597',
            'sign_name' => '盒司令',
        ],
        'SMS_160572753' => [
            'content' => '您的盒司令账号当前${setting}了安全验证功能，如非本人操作，请及时登录平台重置该功能，并修改账号密码谨防被盗。',
            'template' => 'SMS_160572753',
            'sign_name' => '盒司令',
        ],
        'SMS_160685240' => [
            'content' => '《用户协议》已经发布，请确保您已仔细阅读并同意协议条款，如非本人操作，请及时登录平台修改操作，并重置账号密码谨防被盗。',
            'template' => 'SMS_160685240',
            'sign_name' => '盒司令',
        ],
        'SMS_164266653' => [
            'content' => '验证码：${code}，您正在使用换绑手机功能，该验证码仅用于身份验证，3分钟内有效，请勿泄露于他人！',
            'template' => 'SMS_164266653',
            'sign_name' => '盒司令',
        ],
        'SMS_164266657' => [
            'content' => '验证码：${code}，您正在使用换绑手机功能，3分钟内有效，请勿泄露于他人！',
            'template' => 'SMS_164266657',
            'sign_name' => '盒司令',
        ],
        'SMS_169111455' => [
            'content' => '您的设备可绑定数量已经不足5台，请及时充值！',
            'template' => 'SMS_169111455',
            'sign_name' => '盒司令',
        ],
        'SMS_172208871' => [
            'content' => '请给客户回电，手机号：${name}',
            'template' => 'SMS_172208871',
            'sign_name' => '盒司令',
        ],
        'SMS_172741332' => [
            'content' => '您正在使用订单弹幕功能，饿了么授权将于${day}日后到期，请及时在应用市场“重新授权”，以免功能下线',
            'template' => 'SMS_172741332',
            'sign_name' => '盒司令',
        ],
        'SMS_187950492' => [
            'content' => '您有${num}个门店已过期${time}天，请您尽快登录盒司令小程序或PC网站续费。',
            'template' => 'SMS_187950492',
            'sign_name' => '盒司令',
        ],
        'SMS_187950452' => [
            'content' => '您有${num}台设备已过期${time}天，请您尽快登录盒司令小程序或PC网站续费。',
            'template' => 'SMS_187950452',
            'sign_name' => '盒司令',
        ],
        'SMS_187935491' => [
            'content' => '您有${num}个门店已过期，请您尽快登录盒司令小程序或PC网站续费。',
            'template' => 'SMS_187935491',
            'sign_name' => '盒司令',
        ],
        'SMS_187940669' => [
            'content' => '您有${num}台设备已过期，请您尽快登录盒司令小程序或PC网站续费。',
            'template' => 'SMS_187940669',
            'sign_name' => '盒司令',
        ],
        'SMS_187935458' => [
            'content' => '您有${num}个门店还有${time}天即将到期，请您尽快登录盒司令小程序或PC网站续费',
            'template' => 'SMS_187935458',
            'sign_name' => '盒司令',
        ],
        'SMS_187930454' => [
            'content' => '您有${num}台设备还有${time}天即将到期，请您尽快登录盒司令小程序或PC网站续费。',
            'template' => 'SMS_187930454',
            'sign_name' => '盒司令',
        ],
        'SMS_188631899' => [
            'content' => '有${type}即将到期，请您尽快登陆盒司令微信小程序续费。',
            'template' => 'SMS_188631899',
            'sign_name' => '盒司令',
        ],
    ],
];
