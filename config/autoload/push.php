<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
return [
    'APP' => [
        'DATA_UPDATE' => 1, // 数据更新
        'PLAY' => 2, // 播放
        'PAUSE' => 3, // 暂停
        'REBOOT' => 4, // 重启
        'SCREEN' => 5, // 截屏
        'TURNTABLE' => 6, // 转盘
        'UPGRADE' => 7, // 检查app更新
        'LOG' => 8, // 上传日志
        'CHECK_MACHINE_STATUS' => 9, // 检查设备状态
        'CHECK_PROGRAM_STATUS' => 10, // 检查节目状态
        'UNBIND' => 11, // 解绑设备
        'BULLET_CHAT' => 12, // 弹幕更新
        'GET_SETTING' => 13, // 获取配置
        'BIND' => 14, // 绑定成功
        'KDS_DATA_UPDATE' => 15, // kds数据更新
        'CAMERA_DATA_UPDATE' => 16, // 摄像头配置数据更新
        'AR_CODE_UPDATE' => 17, // 二维码数据更新
        'JS_SETTING_UPDATE' => 18, // js配置更新
        'KRY_ASSESS' => 19, // 客如云估清
    ],
    'STICKER' => [
        'DATA_UPDATE' => 1, // 数据更新
        'EXPIRATION_UPDATE' => 2, // 数据更新
        'RECORD_UPDATE' => 3, // 记录列表数据更新
        'RESTART' => 4, // 远程重启应用
        'CHECK_UPDATE' => 5, // 检查应用更新
        'UPLOAD_LOG' => 6, // 上传日志
        'UNBIND' => 7, // 解绑
        'STORE_INFO_UPDATE' => 8, // 门店信息更新
        'LOG_OUT' => 16, // 退出登录
        'MATERIAL_COUNT_UPDATE' => 18, // 打印份数更新
        'CMD_ACCOUNT_UNDOCK' => 19, // 当前账号被移出设备所属管辖范围
        'CMD_ACCOUNT_LOGOUT' => 20, // 当前账号被注销
        'CMD_ACCOUNT_DISABLE' => 21, // 当前账号被禁用
        'CMD_ACCOUNT_NO_PERMISSION' => 22, // 当前账号无登录杈限
    ],
    'USER' => [
        'LOG_OUT' => 16, // 退出登录
        'CMD_ACCOUNT_UNDOCK' => 19, // 当前账号被移出设备所属管辖范围
        'CMD_ACCOUNT_LOGOUT' => 20, // 当前账号被注销
        'CMD_ACCOUNT_DISABLE' => 21, // 当前账号被禁用
        'CMD_ACCOUNT_NO_PERMISSION' => 22, // 当前账号无登录杈限
    ],
];
