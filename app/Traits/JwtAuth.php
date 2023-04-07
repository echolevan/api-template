<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
namespace App\Traits;

trait JwtAuth
{
    // 头部
    private static $header = [
        'alg' => 'HS256', // 生成signature的算法
        'typ' => 'JWT',  // 类型
    ];

    /**
     * 获取jwt token.
     * jwt载荷  格式如下非必须
     * [
     * 'iss'=>'jwt_admin', //该JWT的签发者
     * 'iat'=>time(), //签发时间
     * 'exp'=>time()+7200, //过期时间
     * 'nbf'=>time()+60, //该时间之前不接收处理该Token
     * 'sub'=>'www.mano100.cn', //面向的用户
     * 'jti'=>md5(uniqId('JWT').time()) //该Token唯一标识
     * ].
     * @param mixed $userId
     * @return string
     */
    public static function getToken($userId)
    {
        $payload = [
            'iss' => 'jwt_admin',
            'iat' => time(),
            'exp' => time() + 7200,
            'nbf' => time(),
            'sub' => $userId,
            'jti' => md5(uniqid('JWT') . time()),
            'role' => 'user',
        ];
        $base64header = self::base64UrlEncode(json_encode(self::$header, JSON_UNESCAPED_UNICODE));
        $base64payload = self::base64UrlEncode(json_encode($payload, JSON_UNESCAPED_UNICODE));
        return $base64header . '.' . $base64payload . '.' . self::signature($base64header . '.' . $base64payload, self::$header['alg']);
    }

    /**
     * base64UrlEncode https://jwt.io/ 中base64UrlEncode解码实现.
     * @param string $input 需要解码的字符串
     * @return bool|string
     */
    private static function base64UrlDecode(string $input)
    {
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $addLen = 4 - $remainder;
            $input .= str_repeat('=', $addLen);
        }
        return base64_decode(strtr($input, '-_', '+/'));
    }

    /**
     * HMAC SHA256签名  https://jwt.io/ 中HMAC SHA256签名实现.
     * @param string $input 为base64UrlEncode(header).".".base64UrlEncode(payload)
     * @param string $alg 算法方式
     * @return string
     */
    private static function signature(string $input, string $alg = 'HS256')
    {
        $key = env('JWT_SECRET');
        $alg_config = [
            'HS256' => 'sha256',
        ];
        return self::base64UrlEncode(hash_hmac($alg_config[$alg], $input, $key, true));
    }

    /**
     * base64UrlEncode  https://jwt.io/ 中base64UrlEncode编码实现.
     * @param string $input 需要编码的字符串
     */
    private static function base64UrlEncode(string $input): string
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }
}
