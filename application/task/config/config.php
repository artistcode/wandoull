<?php
/**
 * 支付配置
 */
return [
    'currency_proportion' => 1,  //1元=1流量币
    "cash_back_proportion" => 0.08, //返现 8%


    "alipay" =>[
        //应用ID,您的APPID。
        'app_id' => "2021001107673645",
        //商户私钥
        'merchant_private_key' =>
            "MIIEogIBAAKCAQEAoyLwUoc8bxGQ2lYPyVh+fKwSw9UlzE7QQBHofZH64DL2tOMp/HPkn4Q4N2AqpMpkVr/XksRx2/ARbOP5xI385dxyJ0nFOAt2qJRRRxNHibDwn5sJX8fS6xTDhGuE1fTwVABte9nrwaQ9zSXhaudO9pgsKuFHsGyTiYDpEMoJr6l9ZcEUBa86KWKUF7GqeGKQiqw5Ol+dC9fd+CdiX5jZD8UYnjLMAZRJEgzakBQ07No42xEzZdiTsSPzOxczZfg3N8kWtqy/wau6VR7Dflly8AlCOp6AFvKoH3tqVcRHdIjWAuT/EJHyUCRup0UyoOIQCQR/xPr3WKQbF6djezsi2wIDAQABAoIBAAJD4+5hbldkeQxvEX0MO4VjpkcN2J6DoaSiGwZTVpZyXraYSOb2fQAyB83NCgqLvOTveQDStXoGVVebusYd6psOeo9NGO30SsuAc7h27hFdYZn1vyWTUrxs52IZVBjcc9HWx65mkj14GFuW4RBo8dG+vy5BPouWll3camAPTh8gR619rtlzPKf4kK1sgBYuWu/U38BCcyrl82LQhGuKrkLdCmlw3gseUrghoDmEgM9gHZ1bcPRnYf+0RaN8GubWJN6xFR5zPT1BZ2elO8TCtMZVZe+KEaetN516dpjmSybj3zr9Mtw12D4/DcR/iymO992fSoG3Kc/mCYRmiOXAxYECgYEA1H7ggSptvdvowU3JOQG/n6LYM622kgUiL05xgUlCKSF3/aiGWPxWymgtWWwMDuYoa1Mx2gY6yQM5SECGg3ZPFe893Jk/w9iplU9HNkOuiiehynxE/kBhV1r2jonv0jIeK6Wah2dJmVVrvdL7d4CLT7ahEn+dmBt9SMEKPlNe/CECgYEAxIkYvdxbVkQhTpJwLTFOyygFprUdG4atKapM4aIgKrbL5w/B+X6qsSxOznaI5nt2cogjVyqiLfXbqVv5OqSJJGyQ6Bny+qVPmlGeU9eCh7d59YK1cZfemJbsXNHEsJDl2WI74Zp0qxlNOR0P3/NKiQRrRHpYcPHM9slgk+oQH3sCgYAXFR0wCrrXB99VuCxmi+ET5y2TF4igffxDpULBJ4MPUrplDHxjiC2pWP2sHAeHSssTNXtR0qFqGnaLea7i8uQOXumaX+9ER/HL7UuwAlQgX8O8ahlYgQfR5Gip/SPW8mjClv+dO8QL6vKEMTnttkHry8vdZY1p63qFf6qsMIQ94QKBgAYvAhZHLqCCOEIOnXTujjoaIkNig23wSNZ8wzp+LWDqq3OzrTi6YYh9imU4mYoW7F0iJ2qAruWfTLABctADiUUaHV0QI/L67IxAcSjWKQc4IKA24pqWWqyWYw1wlC2yAWlbi+LHR1By1Vksruku8HNrLizTZKD5GqfRIjbFMIitAoGAAJvWCSnbE6mHvpUU22ohJnvAnFqeF1Vju5xYJnPEDPmO5+4n9jmpvlmuKIF/ZAKm+OEx8GABiRCvKG5azixxTwDohwoQKWfs6pUF/bLIo0MorLCpBf8Ut7KvGkqqRpD4hHu9X2wFQFyyRM5rg1hxl+HKhqFsWx9zmo9nkIwN58k=",
        //异步通知地址
        'notify_url' => "http://".$_SERVER['HTTP_HOST']."/task/notify/notify",

        //同步跳转
        'return_url' => "http://".$_SERVER['HTTP_HOST']."/task/pay/return_url",
        //编码格式
        'charset' => "UTF-8",
        //签名方式
        'sign_type' => "RSA2",
        //支付宝网关
        //'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvSEUNBnjwp2baeNtkQXQB2+5cfcu85cxodIymCpjGfwXef0s7dxr9vXMiwTB1NlsXZ07O5ariP6jkJ4cLVn3ZzCOdCxCUG2PIThicOo6nTyPhII6BdUtPDR7jhOHPP0PySbPcQeyKbTHJJgV2XqzC5TZt+P6ud0lX6HboySmQ9TXTajJfeswChWlRFJ13uOSZvyGQv/xy+C0S6dIZLZrQOHKNFyVTklkLWOH2Lf1dB+VEezjvKSw4Lpz+Q7ttBGg51UnZCne3zJ8N/QDxAgQ/6BQeeSvFwW3wZx4LzouCG4uQbqKD1hO+y6z+AHJ02bdzAlCAPHeNAYyDuBDcijJ1QIDAQAB",
    ]
];