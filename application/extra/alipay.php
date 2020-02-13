<?php
/**
 * 支付宝支付
 */

return [
        //应用ID,您的APPID。
        'app_id' => "2016101200665852",

        //商户私钥, 请把生成的私钥文件中字符串拷贝在此
        'merchant_private_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqw6IMOgyeZdCgfLM4jUDITgY+O75qh3v1hUznaV4o63EclBmPCQ8fePsBLogkANfohzDGK1YU4HNbLe8Fw9qXJSUWMw80xO8Ea8o6osmH2uBkX+II+IqypCETr8ssmpLPuXxDNnNZDaYK9OX+elEUfREXFMdZeSmyxpInwQnk401yFqDvkbAhtzaID4ymg9W24iLeC0x24YVpzMcRJDae5UsgGxODTeci/fDGkMd+/+jzj0q5uNvwf1NjBzRomYxDvJuHFR3PqVETmSzVCQz2U0CO/ui4PE/dj0Xmhc20TK9zhjNzfU0vT1s3+Rtic4ngKE8GC/3yFBlTasnl/QJsQIDAQAB",

        //异步通知地址
        'notify_url' => "",

        //同步跳转
        'return_url' => "",

        //编码格式
        'charset' => "UTF-8",

        //签名方式
        'sign_type'=>"RSA2",
        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "",
];
