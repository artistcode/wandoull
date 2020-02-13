<?php

namespace app\task\controller;

use app\task\model\RechargeOrder;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\facade\Log;
use think\Request;

/**
 * 支付异步通知类
 * Class NotifyController
 * @package app\task\controller
 */
class NotifyController extends Controller
{
    /**
     * 支付宝异步通知
     * @param Request $request
     * @return string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function notify(Request $request)
    {
        $data = $request->param();

        Log::write("异步回调参数");
        Log::write($_POST);
        //获取配置
        $config = Config::get('config.alipay');
        require_once(__EXTEND__ . '/alipay/pagepay/service/AlipayTradeService.php');
        require_once(__EXTEND__ . '/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php');
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($data);
        if ($result) {
            if ($config['app_id'] !== $data['app_id']) {
                return "success";
            }
            $order_info = DB::name("recharge_order")->where('order_sn', $data['out_trade_no'])->find();
            if (!$order_info) {
                return "success";
            }
            if ($order_info['pay_state'] == 1) {
                return "success";
            }
            if ($data['trade_status'] == "TRADE_SUCCESS") {
                $rechargeOrder = new RechargeOrder();
                $res = $rechargeOrder->where('order_sn', $data['out_trade_no'])->update([
                    'pay_state' => 1,
                    'completion_time' => strtotime($data['gmt_payment']),
                    'pay_trans' => $data['trade_no'],
                    'return_info' => json_encode($data),
                ]);
                if ($res) {
                    $currency_proportion = Config::get('config.currency_proportion');
                    $member_info = Db::name('member')->where('member_id', $order_info['member_id'])->find();
                    $res = Db::name('member')->where('member_id', $order_info['member_id'])->update([
                        "currency" => $member_info['currency'] + $order_info['amount'] * $currency_proportion,
                        'pay_count' => $member_info['pay_count'] + 1
                    ]);
                    if ($res) {
                        $rechargeOrder->where('order_sn', $data['out_trade_no'])->update([
                            'is_recharge' => 1
                        ]);
                        //返现
                        $rechargeOrder->cashBack($order_info['id']);
                        return "success";
                    }
                }
            }
        }

    }
}