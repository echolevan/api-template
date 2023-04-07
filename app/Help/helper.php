<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
use Carbon\Carbon;

/*
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
if (! function_exists('blank')) {
    /**
     * Determine if the given value is "blank".
     *
     * @param mixed $value
     */
    function blank($value): bool
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
}

if (! function_exists('filled')) {
    /**
     * Determine if a value is "filled".
     *
     * @param mixed $value
     */
    function filled($value): bool
    {
        return ! blank($value);
    }
}

if (! function_exists('camelize')) {
    /**
     * @param mixed $words
     * @return string
     *                下划线转驼峰
     */
    function camelize($words, string $separator = '_'): string
    {
        $words = $separator . str_replace($separator, ' ', strtolower($words));
        return ltrim(str_replace(' ', '', ucwords($words)), $separator);
    }
}

if (! function_exists('unCamelize')) {
    /**
     * @param mixed $camelCaps
     * @return string
     *                驼峰命名转下划线命名
     */
    function unCamelize($camelCaps, string $separator = '_'): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1' . $separator . '$2', $camelCaps));
    }
}

if (! function_exists('getParam')) {
    /**
     * @param mixed $value
     * @param null|mixed $default
     * @return mixed
     */
    function getParam($value, $default = null)
    {
        return filled($value) ? $value : $default;
    }
}

if (! function_exists('getMachineLastDay')) {
    /**
     * @param mixed $end_at
     * @return int
     *             CreateTime: 2018/10/24 10:27 AM
     *             Description: 获取设备剩余天数
     */
    function getMachineLastDay($end_at)
    {
        return \Carbon\Carbon::parse(date('Y-m-d') . ' 23:59:59')->diffInDays($end_at, false);
    }
}

if (! function_exists('getUpdateActArray')) {
    function getUpdateActArray($arr, $value): array
    {
        $new_arr = [];
        foreach ($arr as $v) {
            $new_arr[$v] = $value;
        }
        unset($arr, $value);
        return $new_arr;
    }
}

if (! function_exists('str_random')) {
    function str_random($length = 16): string
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            try {
                $bytes = random_bytes($size);
            } catch (Exception $e) {
                $bytes = 0;
            }

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}

if (! function_exists('base64_urlSafeEncode')) {
    function base64_urlSafeEncode($data)
    {
        $find = ['+', '/'];
        $replace = ['-', '_'];
        return str_replace($find, $replace, base64_encode($data));
    }
}

if (! function_exists('getLinkageCode')) {
    function getLinkageCode($linkage_data, $same_store_data): array
    {
        $temp = [];
        foreach ($linkage_data as $code) {
            if (in_array($code, $same_store_data)) {
                $temp[] = $code;
            }
        }
        return $temp;
    }
}

if (! function_exists('getMinTimeForWeek')) {
    function getMinTimeForWeek($min)
    {
        foreach ($min as &$m) {
            foreach ($m['times'] as &$v) {
                $v = Carbon::parse($v['start_time_at'])->diffInMinutes('00:00:00') . '_' . Carbon::parse($v['end_time_at'])->diffInMinutes('00:00:00');
            }
            unset($v);
        }
        unset($m);
        return $min;
    }
}

if (! function_exists('getMinTimeForDay')) {
    function getMinTimeForDay($min)
    {
        foreach ($min as &$m) {
            $m = Carbon::parse($m['start_time_at'])->diffInMinutes('00:00:00') . '_' . Carbon::parse($m['end_time_at'])->diffInMinutes('00:00:00');
        }
        unset($m);
        return $min;
    }
}

if (! function_exists('get_file_url')) {
    /**
     * @param mixed $url
     * @return string
     *                CreateTime: 2019-05-05 10:31
     *                Description: 获取文件的url
     */
    function get_file_url($url): string
    {
        return substr($url, 0, 4) == 'http' ? $url : env('QINIU_DOMAIN_URL') . $url;
    }
}

if (! function_exists('uuid')) {
    function uuid(): string
    {
        $chars = md5(uniqid((string) mt_rand(), true));
        return substr($chars, 0, 8) . '-'
            . substr($chars, 8, 4) . '-'
            . substr($chars, 12, 4) . '-'
            . substr($chars, 16, 4);
    }
}

if (! function_exists('getSelectOptions')) {
    function getSelectOptions(object $c, string $label, string $value): object
    {
        return $c->map(function ($i) use ($label, $value) {
            return [
                'label' => $i->{$label},
                'value' => $i->{$value},
            ];
        });
    }
}

if (! function_exists('getDays')) {
    function getDays(string $newTime, string $oldTime): int
    {
        $newTime = Carbon::parse($newTime)->toDateString() . '23:59:59';
        $oldTime = Carbon::parse($oldTime)->toDateString() . '00:00:00';
        if ($newTime > $oldTime) {
            return Carbon::parse($newTime)->diffInDays(Carbon::parse($oldTime)) + 1;
        }
        return -Carbon::parse($newTime)->diffInDays(Carbon::parse($oldTime));
    }
}

if (! function_exists('getLastDate')) {
    function getLastDate(int $nums): array
    {
        $res = [];
        $ranges = range(0, $nums - 1);
        foreach ($ranges as $range) {
            $res[] = date('Y-m-d', strtotime('-' . $range . ' day'));
        }
        return $res;
    }
}

if (! function_exists('getLastMonth')) {
    function getLastMonth(int $nums): array
    {
        $res = [];
        $ranges = range(0, $nums - 1);
        foreach ($ranges as $range) {
            $res[] = date('Y-m', strtotime('-' . $range . ' month'));
        }
        return $res;
    }
}


if (!function_exists('collect_to_array')) {

    function collect_to_array($obj): array
    {
        if (is_array($obj)) {
            return $obj;
        }

        $temp = [];
        foreach ($obj as $k => $v) {
            $temp[$k] = $v;
        }

        return $temp;
    }


}

