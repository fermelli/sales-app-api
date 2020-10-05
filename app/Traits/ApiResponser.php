<?php

namespace App\Traits;

trait ApiResponser
{

  /**
   * API success response
   *
   * @param  mixed  $data
   * @param  String  $keyData
   * @param  String  $message
   * @param  Int  $code
   * @return \Illuminate\Http\Response
   */
  protected function successResponse($data, $keyData = 'data', $message = 'Successful operation.', $code = 200)
  {
    return response()->json([
      'message' => $message,
      $keyData  => $data,
    ], $code);
  }

  protected function errorResponse($message = null, $code)
  {
    return response()->json([
      'status' => 'Error',
      'message' => $message,
      'data' => null
    ], $code);
  }
}
