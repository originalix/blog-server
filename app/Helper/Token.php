<?php

namespace App\Helper;

class Token
{
    static public function createToken($userId, $mobile, $createTime)
    {
        return hash("sha256", $userId . $mobile . $createTime);
    }
}