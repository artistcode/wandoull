<?php

return [
    'alipay' => [
        'use_sandbox' => true,// 是否使用沙盒模式
        "partner" => "2088102176025688",
        'app_id' => '2016091700531736',
        'sign_type' => 'RSA2',// RSA  RSA2\
        'charset' => strtoupper('utf-8'),
        // ！！！注意：如果是文件方式，文件中只保留字符串，不要留下 -----BEGIN PUBLIC KEY----- 这种标记
        // 可以填写文件路径，或者密钥字符串  当前字符串是 rsa2 的支付宝公钥(开放平台获取)
        'ali_public_key' =>
            'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApYJCkh34W9gS2K8AV5CELRVyeHnev+fp0MK52KYbdyT5YnrbBd8zPduisdt0lK0MeKKWATembOxCo0sv521verlJbKcIGYKTu5NVSVLCMZsx+Yg7Zng6bHlI+6jrpMY8eupeF4BFTJxcam6w3rwkuXjXr95ZPIAUC2v6qIa1xI2Xgg4IYHstHCFMhNQr68GVL6Db2QX3dYW4/WIdFWliLpJr6qOGpnupdSd6v2z1FX4lRIs0UgqOPM3sGVIhs/cxy5T5WZsvaGVTNa1hyhTEzX0AkUOofFU/qFLM+IRcQnR5I9to2QQPxfuzrPTzpkbiqBCg1N5H2aHfXJa8HxGLZwIDAQAB',
        // ！！！注意：如果是文件方式，文件中只保留字符串，不要留下 -----BEGIN RSA PRIVATE KEY----- 这种标记
        // 可以填写文件路径，或者密钥字符串  我的沙箱模式，rsa与rsa2的私钥相同，为了方便测试
        'rsa_private_key' =>
            'MIIEogIBAAKCAQEAthHy6DkBqp9o9eFUEopMTSZ11m1gH/S5tdGiFiOydAAWIFjlZOjusPB9otPQKObruI3WIsi5xNJJge1lyqPcA66Zj6ALiUajRD6wnt3cSBl7IrozAq4RClJOFvtz/MFLN0AYlCzNSvfSfRQms2X3m2Ld1Agk3PeEijZzPDUVHgghFP+utZYmk7XKkJV+H5U9bfMeVzmjLKkX0ZlJOnZelxUMzvmfg19dY7umr8JzZ1tZP+SIPm6i0mVhb+tUiXqf1Lau9PMEokJ9fzNCIo84dGmK1zi22jUelb2zcEI5mn3vr3ixIp7O1mkZvNYLm6tmqPG9raNoCxs3aFRcRVn1iQIDAQABAoIBAAXx+BiVI/TKV8cPoIsqcOtkAh0KXUUt3JKPUdefOsiG6DIONQ9ie8jTUYbrm7R6NeBE4WUpYMeIhlXzxosjZp/IJ8OE2luVLueflGzbmcHQ8zBjHB9OR8gqf9pIQ7VRKn+XXDYacGmuRfVHnyvkfH1acRvnWCzO+Ej7FjA1G4drdmn23PPVSOjOReanyutJ//XlwUlhF/xIuWmUQKCoMNAV6G4iYXKDovhkwZupt1lEW0pBIxDnrHhDcRqnzhk2kiFRW0dabLxFsIMUO7jSFkxUAcZyCOaWbpLR2je3QCt5gPvQTRQxcgeodBfd5QtFrCdSNLMfJfmLs5AYzXjUPcECgYEA5FEVoHVVxBP5pUUdHxvCKQ1je25RkRuXmEoIKbNYMgZMYf1IqLtC9uQKw2aFQt5/MuHnHMje15ArjkJYgrZU65+UJ6h0g83fOJP3njI+ua7hiznKLLkRXWUBzS5ABgNVw1PyA9O8WhCtjxnmz6lMuiPSdyyNupziyFjUMYmAfj0CgYEAzCVgYDsy5dZxLNb9r4N5sGHKlwz89iYJo57QgBOzSq2lrLpjBI0gDQPKfNYADykxvE4l70hBJ54b/niXCTWjoRSocD7kagRtOVfDrdx6tYK+S+HhdXqzKspIdKoln+KPebe5Sq1TmIc62oIoi7eq0yj3jpmBsDfy6wRzicLSdT0CgYAOQXHUPv9H6udfhl03IAiTf56CinTVVp+0horT77rGBNaoF6R9xJN9zudNJA2WC0Zt6uT/Sxt+4iWWEFZucuwCekhJ4Z7EzAnwAm0nl4OLHHxAsS8Kc9O9vRzLruOYfITSWV93FbVg+kGb+cYLmUqNJMdzYXjH+hu+3q0BGtDHEQKBgEB0fJ1lk4hl0I3rw2UrCbza43AVtbiyAdEbT5FgpvcpJGoI30KMnFX/oGsR1irzQrTFp8yI76lmjkgmIunRebxeHWBzOwMOKr40K6A1QLkWcqbaxqik+PTFsWLEZeS5T7uKeoJNf1tlNvvOpKaYcuMAyEjJxtywjY4OdbxFOtWxAoGAcxRi6WKDvVU/d5M0rED7VH2mtORLcQ6gGrOadY5DlhNy4a99e9sktoXLG8v4xoiO7ZYWp+n4x85VJK/R6USmwfW30tmiJxcbbaapgNne4FZlz9znY0UcGv1FTYzNbKdPWNWdyYQY3LEtlFUh9QGX/8JLCm4zCKVyjdGYN0Wbnhk=',

        'limit_pay' => [
            //'balance',// 余额
            //'moneyFund',// 余额宝
            //'debitCardExpress',// 	借记卡快捷
            //'creditCard',//信用卡
            //'creditCardExpress',// 信用卡快捷
            //'creditCardCartoon',//信用卡卡通
            //'credit_group',// 信用支付类型（包含信用卡卡通、信用卡快捷、花呗、花呗分期）
        ],// 用户不可用指定渠道支付当有多个渠道时用“,”分隔

        // 与业务相关参数
        'notify_url' => 'http://' . $_SERVER['HTTP_HOST'] . '/task/pay/notify',
        'return_url' => 'http://' . $_SERVER['HTTP_HOST'] . '/task/pay/callback',
        'gatewayUrl' => 'https://openapi.alipaydev.com/gateway.do',
        'return_raw' => false,// 在处理回调时，是否直接返回原始数据，默认为 true
    ],
    'wechat' => [
        'use_sandbox' => true,// 是否使用 微信支付仿真测试系统

        'app_id' => 'wxxxxxx',  // 公众账号ID
        'mch_id' => 'xxxxx',// 商户id
        'md5_key' => 'xxxxxxx',// md5 秘钥
        'app_cert_pem' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'wx' . DIRECTORY_SEPARATOR . 'pem' . DIRECTORY_SEPARATOR . 'weixin_app_cert.pem',
        'app_key_pem' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'wx' . DIRECTORY_SEPARATOR . 'pem' . DIRECTORY_SEPARATOR . 'weixin_app_key.pem',
        'sign_type' => 'MD5',// MD5  HMAC-SHA256
        'limit_pay' => [
            //'no_credit',
        ],// 指定不能使用信用卡支付   不传入，则均可使用
        'fee_type' => 'CNY',// 货币类型  当前仅支持该字段

        'notify_url' => 'https://helei112g.github.io/v1/notify/wx',

        'redirect_url' => 'https://helei112g.github.io/',// 如果是h5支付，可以设置该值，返回到指定页面

        'return_raw' => false,// 在处理回调时，是否直接返回原始数据，默认为true
    ]
];