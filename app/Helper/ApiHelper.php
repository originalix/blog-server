<?php

namespace App\Helper;

class ApiHelper
{
  /**
   * 请求成功时的json返回格式
   * @param  array  $data    [数据]
   * @param  string  $message [返回信息]
   * @param  integer $code    [状态码]
   * @return [type]           [Response]
   */
  static public function responseForSuccess($data, $dataName, $code = 200)
  {
     return \Response::json([
      'code' => $code,
      $dataName => $data
      ]);
  }

  /**
   * 请求失败时的json返回个事
   * @param  string  $message [返回信息]
   * @param  integer $code    [状态码]
   * @return [type]           [Response]
   */
  static public function responseForError($message = '', $code = 418)
  {
     return \Response::json([
      'code' => $code,
      'message' => $message
      ]);
  }
}