<?php

namespace app\home\controller;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use app\home\model\Member;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;

class FreeController extends CommonController
{
    // 登录
    public function login()
    {
        $userInfo['username'] = $this->request->post('username');
        $userInfo['password'] = $this->request->post('password');
        if ($this->request->isAjax()) {
            $member = new  Member();
            if ($member->checkMember($userInfo['username'], $userInfo['password'])) {
                return json(['code' => 0, 'msg' => '登录成功']);
            } else {
                return json(['code' => 500, 'msg' => '登录失败']);
            }

        }
        return $this->fetch();
    }

    // 注册

    public function register()
    {
        if ($this->request->isAjax()) {
            $response = ['code'=>0,'msg'=>'验证成功'];
            $data['phone'] = $this->request->post('phone');
            $data['pwd'] =  $this->request->post('pwd');


              /*  $code = md5(config('sms_salt').$this->request->post('code').$data['phone']);
                if($code != cookie('sms_code')){
                    $response['msg']  = '验证码错误';
                    $response['code']= 500;
                    return  $response;
                }*/
            $rule = [
                'phone'=>"require|mobile|unique:member"
                ,'pwd' => 'require|confirm:repassword'
            ];
            $message = [
                'phone.mobile'=>"手机号码格式错误"
                ,'phone.require'=>"手机号必填"
                ,'phone.unique'=>"手机好已经被注册"
                ,'pwd.require'=>"密码必填"
                ,'pwd.confirm'=>"两次密码不一致"
            ];
             $validate = new Validate($rule,$message);
             if (!$validate->check($_POST)){
                 // 验证失败
                 $response['code']= 500;
                 $response['msg'] = $validate->getError();
             }else{
                $subordinate_member_id = session("subordinate_member_id");
                if ($subordinate_member_id){
                    $member_info = Db::name('member')->where('member_id', $subordinate_member_id)->find();
                    if ($member_info){
                        $data['subordinate_member_id'] = $subordinate_member_id;
                    }
                }
                 // 验证成功
                 $add_status = (new Member())->save($data);
                 if ($add_status){
                     $response['code']= 0;
                     $response['msg'] ='注册成功';
                     //注册成功清除验证码
                     cookie('sms_code',null);
                 }else{
                     $response['code'] = 500;
                     $response['msg'] = '系统繁忙！稍后再试';
                 }

             }

            return $response;
        }
        return $this->fetch();
    }
    public function sendAliDaYuAuthCode()
    {
        $phoneNumber = input('post.phone');
        if (empty($phoneNumber))
        {
            return  '手机号不能为空';
        }

        $accessKeyId = 'LTAI4Fu2aShN6rsJVWHYdwjA';
        $accessSecret = 'zQv5pEhlexzvWKuKNAh6Q54qC33Dcj'; //注意不要有空格
        $signName = '豌豆电商'; //配置签名
        $templateCode = 'SMS_178535223';//配置短信模板编号
        //TODO 随机生成一个6位数
        $authCodeMT = mt_rand(100000, 999999);
        //TODO 短信模板变量替换JSON串,友情提示:如果JSON中需要带换行符,请参照标准的JSON协议。
        $jsonTemplateParam = json_encode(['code' => $authCodeMT]);
        AlibabaCloud::accessKeyClient($accessKeyId, $accessSecret)
            ->regionId('cn-hangzhou')
            ->asGlobalClient();
        try {
            $result = AlibabaCloud::rpcRequest()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->options([
                    'query' => [
                        'RegionId' => 'cn-hangzhou',
                        'PhoneNumbers' => $phoneNumber,//目标手机号
                        'SignName' => $signName,
                        'TemplateCode' => $templateCode,
                        'TemplateParam' => $jsonTemplateParam,
                    ],
                ])
                ->request();
            $opRes = $result->toArray();
            //print_r($opRes);
            //var_dump(config('sms_salt').$authCodeMT);
            if ($opRes && $opRes['Code'] == "OK") {
                //进行Cookie保存
                cookie("sms_code",md5(config('sms_salt').$authCodeMT.$_POST['phone']));
            }
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }
    }

    public function  console(){
        return $this->fetch();
    }
}
