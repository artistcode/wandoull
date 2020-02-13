<?php

return [
    'alipay'=>[
        'use_sandbox'               => true,// 是否使用沙盒模式

        'app_id'                    => '2088102176025688',
        'sign_type'                 => 'RSA2',// RSA  RSA2\
        'charset'=>strtoupper('utf-8'),
        // ！！！注意：如果是文件方式，文件中只保留字符串，不要留下 -----BEGIN PUBLIC KEY----- 这种标记
        // 可以填写文件路径，或者密钥字符串  当前字符串是 rsa2 的支付宝公钥(开放平台获取)
        'ali_public_key'            =>
            'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAw2OtuE38iaOi5tipt/6YUtLUiHMQ7XSDN6UIx2oZlmdGBusKkol4l/QwNG4UMyfduCG8TymLq9WPn2IMxx/6EHzW+vlGEQ2WTJ9zNq0mWAU/PnUQ1JpknaTa2B+OeP6qNx/N5c8OBgEcESp+SXj44qkFJaNeF3lZ8nD6AIHP2auGU3PbYD9KTnldJAU5/iERr0bxO+6w7YllVJZbEEcnAVn4Lfhmucr3AJ8zzrgLcXtGwIqRvhK/z1WyNGFB2fy4istik3gu/HWkDXJ92ZreONEmLgIzLwdLTu/TqAi5a6oQ5IZvJ35F+ZohjMez6nrEuvE0tQWRr2QWV6N75uIXEwIDAQAB',
        // ！！！注意：如果是文件方式，文件中只保留字符串，不要留下 -----BEGIN RSA PRIVATE KEY----- 这种标记
        // 可以填写文件路径，或者密钥字符串  我的沙箱模式，rsa与rsa2的私钥相同，为了方便测试
        'rsa_private_key'           =>
            'MIIEowIBAAKCAQEAw2OtuE38iaOi5tipt/6YUtLUiHMQ7XSDN6UIx2oZlmdGBusKkol4l/QwNG4UMyfduCG8TymLq9WPn2IMxx/6EHzW+vlGEQ2WTJ9zNq0mWAU/PnUQ1JpknaTa2B+OeP6qNx/N5c8OBgEcESp+SXj44qkFJaNeF3lZ8nD6AIHP2auGU3PbYD9KTnldJAU5/iERr0bxO+6w7YllVJZbEEcnAVn4Lfhmucr3AJ8zzrgLcXtGwIqRvhK/z1WyNGFB2fy4istik3gu/HWkDXJ92ZreONEmLgIzLwdLTu/TqAi5a6oQ5IZvJ35F+ZohjMez6nrEuvE0tQWRr2QWV6N75uIXEwIDAQABAoIBADIaz6OhrA8HvXCBQxSB30Ht+r56825RII0WbyfkF2ewWA7SG0X0ps4gunPXfqqXoI3laMrMFpscCtaOaERv+MpdmSuG3ObmmxJPGVZ+FIUh41P65TP/26lpaw1dGkYA2FmGeGBkNm5nvnDQes4QjZJiUYWTXT+byOsY+aNDpq9kj3vMQO5TQtbdEDzoYlcsAukcdUY3uodVct02Z5nBz8mRWnXgVJJ3H2eIaW290aiah1W9069hsYNzQgZ3QOWxq4GGoAlywA4rpWFTk5uHmP+rbqh2HAYulajJcTMMwVLVvIUpLevvE/azvH5/c4UdxfK4ofnKZYFJ+7wk2143UeECgYEA+q1D+rkJRR4XnrsJFO9ufsJQMA17DSYhvmRnQ99nqUbiJhK38YPcwUvsQXeEJxndzmU0pkM18F8ItYT+3ZIg4jA47VtP1QZt6+8N+hHJcrvAHPpH2Uf8HTsxM5zSl5jcJNWKNvPOl79PNAV0fCDfS0hBj4JvlSCZZmY+53CBo/sCgYEAx4nbuKS1vlrxfijBLOTNaaDHnnDSAopSgZPinDr/FzENWBL70AvNN8R7m2PrDvy794POazuoD6wvDDI2n24NuKHEfRQLU1YH6KpliU7xnRjj2dSDHDSwwujkxJg8bsj6eOLQqwoGYuu6Kz9tglujaN4JehUuYn/fHSi9RZoSVckCgYEArKHYN/loDeZsY87wsS82zCrraDxQarzA7kpc51waGnSLV6b6cGPcCm5L1MYHB5qDqxj9iiatJc18xO1DS7nP1ZVaDvQcZVsZJisqV/YZ4l60LgCarGMrl8Hk32N3kBkgOmmo1rFOrCh+1hePodBNlp27MKamS2/41JFDbsWHMjMCgYBTp8RqgQOBLveYANYcUECeTD3ke0BQuFUm5i1XepR/0Jzbk/nmm0wKWWHJH/bobaUQfD4KTxSCnZmL73FfHfC6u3d5SPIGmkbukKHJE0PQrSK5rJLbPGvvC1z93yVW/QOlstHxI17SEioW/5yVzn2P9abbfA3aVenge7f+ej29oQKBgCgVabPKnMiKGp0njzxjRZymdkbj/LN4jCkSg0lHs22ODFcTyhRHdEUE8D4S8spfYesEa7/ZTurx8BUIbJR95GVCNZl1UMocxZznVmxZk/i1uakm1lef5hC8SZf2Tc9C7ZDA48xOaRGOLtovd0WUvenYhIoVj17x2Qj5Rq1UibnG',

        'limit_pay'                 => [
            //'balance',// 余额
            //'moneyFund',// 余额宝
            //'debitCardExpress',// 	借记卡快捷
            //'creditCard',//信用卡
            //'creditCardExpress',// 信用卡快捷
            //'creditCardCartoon',//信用卡卡通
            //'credit_group',// 信用支付类型（包含信用卡卡通、信用卡快捷、花呗、花呗分期）
        ],// 用户不可用指定渠道支付当有多个渠道时用“,”分隔

        // 与业务相关参数
        'notify_url'                => 'http://'.$_SERVER['HTTP_HOST'].'/task/pay/notify',
        'return_url'                => 'http://'.$_SERVER['HTTP_HOST'].'/task/pay/callback',
        'gatewayUrl'                =>'https://openapi.alipaydev.com/gateway.do',
        'return_raw'                => false,// 在处理回调时，是否直接返回原始数据，默认为 true
    ],
    'wechat'=>[
        'use_sandbox'       => true,// 是否使用 微信支付仿真测试系统

        'app_id'            => 'wxxxxxx',  // 公众账号ID
        'mch_id'            => 'xxxxx',// 商户id
        'md5_key'           => 'xxxxxxx',// md5 秘钥
        'app_cert_pem'      => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'wx' . DIRECTORY_SEPARATOR .  'pem' . DIRECTORY_SEPARATOR . 'weixin_app_cert.pem',
        'app_key_pem'       => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'wx' . DIRECTORY_SEPARATOR .  'pem' . DIRECTORY_SEPARATOR . 'weixin_app_key.pem',
        'sign_type'         => 'MD5',// MD5  HMAC-SHA256
        'limit_pay'         => [
            //'no_credit',
        ],// 指定不能使用信用卡支付   不传入，则均可使用
        'fee_type'          => 'CNY',// 货币类型  当前仅支持该字段

        'notify_url'        => 'https://helei112g.github.io/v1/notify/wx',

        'redirect_url'      => 'https://helei112g.github.io/',// 如果是h5支付，可以设置该值，返回到指定页面

        'return_raw'        => false,// 在处理回调时，是否直接返回原始数据，默认为true
    ]
];