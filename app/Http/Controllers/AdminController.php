<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function admin()
    {
        Cart::instance('shopping')->destroy();
        Session::forget('coupon');
        Session::forget('checkout');
        // $user = auth('admin')->user();

        // List Orders
        $orders=Order::orderBy('id','DESC')->limit('5')->get();

        

        // dd($new_orders);
        // SELECT user_id, SUM(total_amount) FROM orders GROUP BY user_id HAVING SUM(total_amount) > 40
        // SELECT product_id FROM product_orders INNER JOIN orders ON product_id = orders.user_id

        //select COUNT(product_id),COUNT(order_id) from product_orders PO join orders O on (PO.order_id = O.id) join users U on (O.user_id = U.id) join products P on (PO.product_id = P.id) where `payment_status`='paid' GROUP BY(product_id)
        //select * from product_orders PO join orders O on (PO.order_id = O.id) join users U on (O.user_id = U.id) join products P on (PO.product_id = P.id) where `payment_status`='paid' GROUP BY(product_id)


        // Sales Report Annual
        $order_sales = Order::select(
            DB::raw('year(date) as year'),
            DB::raw('sum(total_amount) as total'),
        )
        ->where(DB::raw('date(date)'),'>=',Carbon::now()->subYear())
        ->where('condition','delivered')->whereYear('date', date('Y', strtotime('0 year')))
        ->groupBy('year')->get();
        $data= "";
        foreach($order_sales as $val){
            $data.=$val->total;
        }
        $chartData1 = (float) $data;

        // Annual Revenue
        $annuals_revenues = Order::sum('total_amount');

        // Income Analysis
        $sales_monthly = DB::select(DB::raw("SELECT SUM(total_amount) AS total FROM orders WHERE `condition`='delivered' AND DATE(created_at) BETWEEN CURRENT_DATE - INTERVAL 5 DAY AND CURRENT_DATE GROUP BY DATE(date) ORDER BY DATE(date)"));
        $data= "";
        foreach($sales_monthly as $val){
            $data.="$val->total,";
        }
        $chartData = (float) $data;

        //Annual Sales Graphics
        $sales_annuals = Order::select(DB::raw("YEAR(created_at) year"),DB::raw("SUM(total_amount) as sales"))->where('condition','delivered')->where('payment_status','paid')->groupBy('year')->get()->toArray();
        // dd($sales_annuals);
        $json = json_encode($sales_annuals);

        //Annual Sales Graphics
        $rev_annuals = Product::select(DB::raw("YEAR(created_at) year"),DB::raw("SUM(offer_price) as revenue"))->where('status','active')->groupBy('year')->get()->toArray();
        // dd($rev_annuals);
        $json1 = json_encode($rev_annuals);

        //Precedent month
        $sales_precedent_monthly = DB::select(DB::raw("SELECT MONTH(`created_at`) AS month, SUM(total_amount) AS total FROM orders WHERE `condition`='delivered' AND YEAR(`created_at`) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(`created_at`) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY MONTH(created_at) ORDER BY MONTH(created_at)"));
        $data= "";
        foreach($sales_precedent_monthly as $val){
            $data.="$val->total,";
        }
        $chartData2 = (float) $data;

        //Actual month
        $sales_actual_monthly = DB::select(DB::raw("SELECT MONTH(`date`) AS month, SUM(total_amount) AS total FROM orders WHERE `condition`='delivered' AND YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 0 MONTH) AND MONTH(`date`) = MONTH(CURRENT_DATE - INTERVAL 0 MONTH) GROUP BY MONTH(date) ORDER BY MONTH(date)"));
        $data= "";
        foreach($sales_actual_monthly as $val){
            $data.="$val->total,";
        }
        
        $chartData3 = (float) $data;

    

        
        //different percent 2 last month
        $percent_monthPre = null;
        if($percent_monthPre != 0){
            $percent_monthPre = ($chartData2/($chartData1)) * 100;
        }
        else{
            $percent_monthPre = 0;

        }
      

        $percent_monthAc= null;
        if($percent_monthAc != 0)
            $percent_monthAc = ($chartData3/$chartData1) * 100;
        else
            $percent_monthAc = 0;
       

        $diff_percent= null;
        if($diff_percent != 0)
            $diff_percent = $percent_monthAc-$percent_monthPre;
        else
            $diff_percent = 0;

        // dd($diff_percent);



        // Sales Income Overall
        $salesIncomeOverall  = Order::select(DB::raw('SUM(total_amount) as total'),)->where('condition','delivered')->get();
        $data= null;
        foreach($salesIncomeOverall as $val){
            $data.=$val->total;
        }
        $chartData4 = (float) $data;

        $global_week = Order::select(DB::raw('total_amount as total'))->where('condition','delivered')->where('date','>',now()->subDays(7)->endOfDay())->orderBy('date')->get();

        //count total product
        $total_productMonth = Product::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count();
        $total_product = Product::where('status','active')->count();
        
        $progressTA= null;
        if($progressTA != 0)
            $progressTA =  ($total_productMonth/$total_product)*100;
        else
            $progressTA = 0;
        
        //Last customers
        $lastCustomer=Client::where('statut','activer')->where('created_at','>',now()->subDays(30)->endOfDay())->count();
        $totalCustomer=Client::where('statut','activer')->count();
        $progressCustomer= null;
        if($progressCustomer != 0)
            $progressCustomer = ($lastCustomer/$totalCustomer)*100;
        else
            $progressCustomer = 0;
// dd($progressCustomer);
        $order_total_week = Order::where('condition','delivered')->where('created_at','>',now()->subDays(7)->endOfDay())->sum('total_amount');
        
        $total_buying = DB::select(DB::raw('SELECT sum(price * stock) as somme FROM products WHERE status="active"'));
      
        return view('backend.index',compact(
            'progressTA',
            'progressCustomer',
            'order_total_week',
            'orders',
            'total_buying',
            'annuals_revenues',
            'chartData1',
            'json',
            'chartData',
            'chartData2',
            'chartData3',
            'diff_percent',
            'chartData4',
            'total_productMonth',
            'total_product',
            'lastCustomer',
            'totalCustomer',
            'json1',
            //'global_week'
        ));
    }
}
// SELECT MONTH(`created_at`), SUM(total_amount) FROM orders WHERE `condition`='delivered' GROUP BY MONTH(created_at) ORDER BY MONTH(created_at)
