<?php

namespace App\Http\Controllers\API;

class ResponseFromatter
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'massage' => null
        ],
        'data' => null
    ];

    public static function success($data = null, $massage = null)
    {
        self::$response['meta']['massage'] = $massage;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
    public static function error($data = null, $massage = null, $code = 400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['massage'] = $massage;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
