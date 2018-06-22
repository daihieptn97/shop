<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\UserOrder;
use App\Order;
use Carbon\Carbon;


class Dashboard extends Controller
{
    public function index()
    {
        /**
         * get value : total income month, total order month,total pending bill , total order today
         * @author  name :  Hiep
         * @return Array ['totalIncomeMonth', 'totalOrderMonth','totalPendingBill', 'totalOrderToday']
        **/
    	$currenYear  = date('Y'); 
    	$currenMoth  = date('m'); 
    	$currenDay  = date('d');

    	

        $totalIncomeMonth = $this->getCountOfDate('SUM(user_order.payment)', [ date('Y-m') . '-01' ,date('Y-m') . '-31' ] );

        $totalOrderMonth = $this->getCountOfDate('COUNT(user_order.id)', [ date('Y-m') . '-01' ,date('Y-m') . '-31' ] );


        $totalOrderToday = $this->getCountOfDate('SUM(user_order.count)', [ date('Y-m') . '-01' ,date('Y-m') . '-31' ] );


        // $totalOrderToday =  $this->getCountOfDate('COUNT(user_order.count)', [ date('Y-m-d') .' 00-00-00' , date('Y-m-d').' 23-59-59'] );

 
    	$totalPendingBill = Order::select(DB::raw('COUNT(orders.status) AS pending_bill'))
    						->where('orders.status', '=', '0')
    						->get()
    						->toArray()[0]['pending_bill'];

         
        $statisticalProduct = $this->getStatistical('SUM(user_order.count)');
        $statisticalOrder = $this->getStatistical('COUNT(user_order.count)');


    	return view('admin.dashboard', compact(
    								'totalIncomeMonth', 
    								'totalOrderMonth',
    								'totalPendingBill',
    								'totalOrderToday',
                                    'statisticalProduct',
                                    'statisticalOrder'
    								)
    				);
    }

    private function getStatistical($patten)
    {
        $res = UserOrder::select(DB::raw( $patten . ' AS count_order_year, MONTH(orders.updated_at) AS monthOrder'))
        ->join('orders', 'user_order.order_id' ,'=', 'orders.id')
        ->whereRaw((' YEAR(orders.updated_at) = YEAR(now()) AND orders.status = 1 ' ))
        // ->where(['orders.status' => 1 ,'YEAR(orders.updated_at)' =>  'YEAR(now())'])
        ->groupBy(DB::raw('YEAR(orders.updated_at), MONTH(orders.updated_at)'))
        ->get()
        ->toArray();

        return  $res;
    }

    private function getCountOfDate($patten, $time)
    {
        /**
         * get get total bill in time
         * @author  name :  Hiep
         * @param  $patten (string)  : SUM, COUNT, .. . 
         * @param  $time (array)  : $time time start and time end  
         * @example $time : [ date('Y-m-d') .' 00-00-00' , date('Y-m-d').' 23-59-59']
         * @return $value (interger) : number
        **/

        // select COUNT(user_order.payment) AS res from `user_order` join `orders` on `user_order`.`order_id` = `orders`.`id` where `user_order`.`updated_at` between '2018-06-01 00-00-00' AND '2018-06-31 00-00-00' and `orders`.`status` = 1 AND YEAR(orders.updated_at) = YEAR(now())
        $value =  UserOrder::select(DB::raw($patten . 'AS res'))
                        ->join('orders', 'user_order.order_id' ,'=', 'orders.id')
                        ->whereBetween('user_order.updated_at', $time)
                        ->where('orders.statuss', '=', '1')
                        ->get()
                        ->toArray()[0]['res'];
        return $value;
    }

    private function percentageCalculation($now, $old)
    {
        // (thang nay - thang truoc) / thang truoc * 100
        /**
         * percentage Calculation recipe  : (($now - $old) / $old ) * 100;
         * @author  name :  Hiep
         * @param  $now (int)  : number month now
         * @param  $old (int)  : number month old
         * @return $percentage (interger) : percentage Calculation 
        **/

        $percentage = (($now - $old) / $old ) * 100;
        return $percentage;
    }

    // public function getStatistical()
    // {
       
    //     $res = UserOrder::select(DB::raw('SUM(user_order.count) AS count_order_year, MONTH(orders.updated_at) AS monthOrder'))
    //     ->join('orders', 'user_order.order_id' ,'=', 'orders.id')
    //     ->whereRaw((' YEAR(orders.updated_at) = YEAR(now()) AND orders.status = 1 ' ))
    //     // ->where(['orders.status' => 1 ,'YEAR(orders.updated_at)' =>  'YEAR(now())'])
    //     ->groupBy(DB::raw('YEAR(orders.updated_at), MONTH(orders.updated_at)'))
    //     ->get()
    //     ->toArray();
    // }
}
