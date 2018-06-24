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

    	

        $totalIncomeMonth = $this->getCountOfDate('SUM(user_order.payment)', [ Carbon::now()->startOfMonth() ,Carbon::now()->endOfMonth()] );

        $totalOrderMonth = $this->getCountOfDate('COUNT(user_order.id)', [ Carbon::now()->startOfMonth() ,Carbon::now()->endOfMonth()] );


        $totalProductMonth = $this->getCountOfDate('SUM(user_order.count)', [ Carbon::now()->startOfMonth() ,Carbon::now()->endOfMonth()] );

 
    	$totalPendingBill = Order::select(DB::raw('COUNT(orders.status) AS pending_bill'))
    						->where('orders.status', '=', '0')
    						->get()
    						->toArray()[0]['pending_bill'];

         
        $statisticalProduct = $this->getStatistical('SUM(user_order.count)', 'MONTH');
        $statisticalOrder = $this->getStatistical('COUNT(user_order.count)', 'MONTH');


        $statisticalProductYear = $this->getStatistical('SUM(user_order.count)', 'YEAR');
        $statisticalOderYear = $this->getStatistical('COUNT(user_order.count)', 'YEAR');


    	return view('admin.dashboard', compact(
    								'totalIncomeMonth', 
    								'totalOrderMonth',
    								'totalPendingBill',
    								'totalProductMonth',
                                    'statisticalProduct',
                                    'statisticalOrder',
                                    'statisticalProductYear',
                                    'statisticalOderYear'
    								)
    				);
    }

    private function getStatistical($patten,$dateSelect )
    {

        /**
         * Statistical number product and order help paint chart 
         * sql  : select SUM(user_order.count) AS count_order_year, MONTH(orders.updated_at) AS monthOrder from `user_order` inner join `orders` on `user_order`.`order_id` = `orders`.`id` where  YEAR(orders.updated_at) = YEAR(now()) AND orders.status = 1  group by YEAR(orders.updated_at), MONTH(orders.updated_at)
         * @author  name :  Hiep
         * @param $patten(string) :  string sql (ex : SUM(user_order.count) )
         * @param $dateSelect (String) :  what is the group by ? i'm use YEAR or MONTH   
         * @return Array value include : time of statistical and quantity 
        **/

        $grBy = ', MONTH(orders.updated_at)';
        $wBy = 'YEAR(orders.updated_at) = YEAR(now())  AND'; 
        if($dateSelect == 'YEAR'){
            $grBy =  '';
            $wBy = '';
        }

        $res = UserOrder::select(DB::raw( $patten . ' AS count_order_year, '. $dateSelect .'(orders.updated_at) AS label'))
        ->join('orders', 'user_order.order_id' ,'=', 'orders.id')
        ->whereRaw( $wBy .' orders.status = 1 ')
        ->groupBy(DB::raw('YEAR(orders.updated_at)' . $grBy ))
        ->get()
        ->toArray();

        return  $res;
    }

    private function getCountOfDate($patten, $time)
    {
        /**
         * get get total bill in time
         * sql example : select COUNT(user_order.payment) AS res from `user_order` join `orders` on `user_order`.`order_id` = `orders`.`id` where `user_order`.`updated_at` between '2018-06-01 00-00-00' AND '2018-06-31 00-00-00' and `orders`.`status` = 1 AND YEAR(orders.updated_at) = YEAR(now())
         * @author  name :  Hiep
         * @param  $patten (string)  : SUM, COUNT, .. . 
         * @param  $time (array)  : $time time start and time end  
         * @example $time : [ date('Y-m-d') .' 00-00-00' , date('Y-m-d').' 23-59-59']
         * @return $value (interger) : number
        **/

        $value =  UserOrder::select(DB::raw($patten . 'AS res'))
                        ->join('orders', 'user_order.order_id' ,'=', 'orders.id')
                        ->whereBetween('user_order.updated_at', $time)
                        ->where('orders.status', '=', '1')
                        ->get()
                        ->toArray()[0]['res'];
        return $value;
    }

}
