<?php

namespace app\task\model;

use app\home\model\Member;
use think\Db;
use think\facade\Config;
use think\Model;

class RechargeOrder extends Model
{


    /**
     * 充值,上级返现
     * @param $recharge_order_id
     */
    public function cashBack($recharge_order_id)
    {

        $rechargeOrder = new self();
        $recharge_order_info = $rechargeOrder
            ->where('id', $recharge_order_id)
            ->where('pay_state', 1)
            ->find();
        if (!$recharge_order_info) {
            return false;
        }

        $memberModel = new Member();
        $member_info = $memberModel->where('member_id', $recharge_order_info['member_id'])->find();
        if ($member_info['subordinate_member_id'] > 0) {
            $cash_back_proportion = Config::get('config.cash_back_proportion');
            $save_data = [
                'cash_back' => $cash_back_proportion * $recharge_order_info['amount'],
                'source_member_id' => $recharge_order_info['member_id'],
                'member_id' => $member_info['subordinate_member_id'],
                'recharge_order_id' => $recharge_order_info['id'],
            ];
            $res_id = DB::name('cash_back_log')->insertGetId($save_data);
            if ($res_id) {
                $member_info = $memberModel->where('member_id', $member_info['subordinate_member_id'])->find();
                if (!$member_info) {
                    return false;
                }
                $memberModel->where('member_id', $member_info['member_id'])->update([
                    'brokerage_price' => $member_info['brokerage_price'] + $save_data['cash_back']
                ]);
            }
        }
    }


}
