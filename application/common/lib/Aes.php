<?php

namespace app\common\lib;

/**
 * aes 加密 解密类库
 * @by singwa
 * Class Aes
 * @package app\common\lib
 */
class Aes
{


    public  $method = 'DES-ECB'; //加密方法
    private $key = null;
    public  $options = 0; //数据格式选项（可选）
    public $iv = ''; //加密初始化向量（可选）


    /**
     *
     * @param $key 		密钥
     * @return String
     */
    public function __construct()
    {
        // 需要小伙伴在配置文件app.php中定义aeskey
        $this->key = config('app.aeskey');
    }

    /**
     * 加密
     * @param String input 加密的字符串
     * @param String key   解密的key
     * @return HexString
     */
    public function encrypt($input = '')
    {
        $data = openssl_encrypt($input, $this->method, $this->key, $this->options,$this->iv);
        // $data  = openssl_encrypt($input, 'DES-ECB', $this->key, 0);
        // $data = base64_encode($data);

        return $data;
    }
    /**
     * 解密
     * @param String input 解密的字符串
     * @param String key   解密的key
     * @return String
     */
    public function decrypt($sStr)
    {
        $decrypted =  openssl_decrypt($sStr, $this->method, $this->key, $this->options,$this->iv);
        return $decrypted;
    }
}
