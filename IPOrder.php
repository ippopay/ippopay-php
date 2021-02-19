<?php

namespace Ippopay\IPOrder;
use Requests;

class IPOrder
{
    protected static $publickey = null;

    protected static $secretkey = null;

    private static $attributes = array();

    private static $headers = array();

    protected static $orderId = null;

    public function __construct($publickey, $secretkey)
    {
        self::$publickey = $publickey;
        self::$secretkey = $secretkey;
    }

    public static function getPublicKey()
    {
        return self::$publickey;
    }

    public static function getSecretKey()
    {
        return self::$secretkey;
    }

    public static function createOrder($attributes = array())
    {
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::post('https://'.self::$publickey.':'.self::$secretkey.'@api.ippopay.com/v1/order/create', $headers, json_encode($attributes));
        return $response->body;
    }

    public static function orderDetails($orderId)
    {
        $response = Requests::get('https://'.self::$publickey.':'.self::$secretkey.'@api.ippopay.com/v1/order/'.$orderId.'/transaction');
        return $response->body;
    }
}
