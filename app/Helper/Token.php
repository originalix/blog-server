<?php

namespace App\Helper;

class Token
{
    /** token 生成器
     * @param $userId 用户id
     * @param $mobile 手机号
     * @param $createTime 创建时间
     * @return string token
     */
    static public function createToken($userId, $mobile, $createTime)
    {
        return hash("sha256", $userId . $mobile . $createTime);
    }
}