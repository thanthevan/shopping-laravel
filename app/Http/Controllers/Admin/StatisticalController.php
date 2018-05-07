<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class StatisticalController extends Controller
{
    public function index()
    {
    	
    	return view('admin.statistical.index');
    }


   
    public function revenueView()
    {
      return view('admin.statistical.tkdt');
    }
public function exportExecl($start,$end,$type)
{
  
             if($start=='' || $end=='')
             {
              $start=date('Y/m/d');
              $end = date('Y/m/d');
             }else{
                $start=date('Y/m/d', strtotime($start));
                $end = date('Y/m/d', strtotime($end));
             }
      
      

            switch ($type) {
        case 1:
           
          $products = Product::whereBetween('created',[$start,$end])->get();
         
        
    Excel::create('san pham nhap', function($excel) use(  $products) {
    $excel->sheet('Sheet 1', function($sheet) use(  $products) {
        $sheet->fromArray(  $products);
    });
})->export('xls');
          break;
        case 2:
          $idpd = OrderDetail::select('product_id')->join('order', 'order.id', '=', 'orderdetail.order_id')->where('order.status','=',1)->get();
          $id =array();
             foreach ($idpd as $value) {
                array_push($id, $value->product_id);
              }
             
            
              $products =Product::whereIn('id',$id)->get();
                Excel::create('san pham xuat', function($excel) use($products) {
    $excel->sheet('Sheet 1', function($sheet) use(  $products) {
        $sheet->fromArray(  $products);
    });
})->export('xls');
          break;

        case 3:
      
          $orders = Order::where('status','=',0)->get();
                
              Excel::create('hoa don cho thanh toan', function($excel) use( $orders) {
    $excel->sheet('Sheet 1', function($sheet) use(   $orders) {
        $sheet->fromArray( $orders);
    });
})->export('xls');
          break;
        case 4:
          $orders = Order::where('status','=',1)->get();
             Excel::create('hoa don da thanh toan', function($excel) use( $orders) {
    $excel->sheet('Sheet 1', function($sheet) use(   $orders) {
        $sheet->fromArray( $orders);
    });
})->export('xls');
          break;
        case 5:
          $orders = Order::where('status','=',2)->get();
           Excel::create('hoa don da huy', function($excel) use( $orders) {
    $excel->sheet('Sheet 1', function($sheet) use(   $orders) {
        $sheet->fromArray( $orders);
    });
})->export('xls');
          break;
        default:
          # code...
          break;
      }
 
}
    public function filters($start,$end,$tp)
    {  $type=$tp;
             if($start=='' || $end=='')
             {
             	$start=date('Y/m/d');
             	$end = date('Y/m/d');
             }else{
             	  $start=date('Y/m/d', strtotime($start));
    	$end = date('Y/m/d', strtotime($end));
             }
      
    	

    	    	switch ($type) {
    		case 1:
    		    $count = Product::whereBetween('created',[$start,$end])->count();
    			$products = Product::whereBetween('created',[$start,$end])->paginate(8);
    			return view('admin.statistical.spn',compact('products','count','type'));
    			break;
    		case 2:
    			$idpd = OrderDetail::select('product_id')->join('order', 'order.id', '=', 'orderdetail.order_id')->where('order.status','=',1)->get();
    			$id =array();
             foreach ($idpd as $value) {
                array_push($id, $value->product_id);
              }
             
             $count = Product::whereIn('id',$id)->count();
              $products =Product::whereIn('id',$id)->paginate(8);
              return view('admin.statistical.spn',compact('products','type','count'));
    			break;

    		case 3:
    	
    			$orders = Order::where('status','=',0)->paginate(8);
                  $count = Order::where('status','=',0)->count();
    			 return view('admin.statistical.od',compact('orders','type','count'));
    			break;
    		case 4:
    			$orders = Order::where('status','=',1)->paginate(8);
    			 $count = Order::where('status','=',1)->count();
    			return view('admin.statistical.od',compact('orders','type','count'));
    			break;
    		case 5:
    			$orders = Order::where('status','=',2)->paginate(8);
    			 $count = Order::where('status','=',2)->count();
    			return view('admin.statistical.od',compact('orders','type','count'));
    			break;
    		default:
    			# code...
    			break;
    	}
    }


    public function revenueData(Request $request)
    {
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $type = $request->type;
      $year = (int)$request->year1;
      if($year==null)
        $year=2018;
      $month =$request->month;
      if($type == 'year'){
     
          // doanh thu
         $data = Order::select(DB::raw('DATE_FORMAT(created, "%m") as month'),DB::raw('SUM(total) as total'))->where('status','=',1)->groupBy(DB::raw('DATE_FORMAT(created, "%m")'))->where(DB::raw('DATE_FORMAT(created,"%Y")'),'=',$year)->get();
         //san pham ban chay
         $max =  DB::table('orderdetail')->selectRaw('product_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(10)->get();
         $id =array();
         foreach ($max as $value) {
             array_push($id, $value->product_id);
            }
      
        $products = Product::whereIn('id', $id )->get();
         // danh muc san pham ban chay
      $datamonth = array('01'=>null,'02'=>null,'03'=>null,'04'=>null,'05'=>null,'06'=>null,'07'=>null,'08'=>null,'09'=>null,'010'=>null,'011'=>null,'012'=>null);
        

       foreach ($data as  $value) {
           $datamonth[$value->month] =  $value->total;
       }
     
       
         return view('admin.statistical.dt',compact('datamonth','type','year','products'));

        }elseif($type =='month')
        {
          $month = (int)$request->month;
          $year = (int)$request->year2;

         
                 $max =  DB::table('orderdetail')->selectRaw('product_id')->join('order','order.id','=','orderdetail.order_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(10)->where(DB::raw('DATE_FORMAT(order.created,"%m")'),'=',$month )->where(DB::raw('DATE_FORMAT(order.created,"%Y")'),'=', $year)->get();
         $id =array();
         foreach ($max as $value) {
             array_push($id, $value->product_id);
            }
      
        $products = Product::whereIn('id', $id )->get();
                 $tuan1 = Order::select('total')->where('status','=',1)->where(DB::raw('DATE_FORMAT(created,"%m")'),'=',$month )->where(DB::raw('DATE_FORMAT(created,"%Y")'),'=', $year)->whereBetween(DB::raw('DATE_FORMAT(created,"%d")'),[1,7])->get();
                

                 $tuan2 = Order::select('total')->where('status','=',1)->where(DB::raw('DATE_FORMAT(created,"%m")'),'=',$month )->where(DB::raw('DATE_FORMAT(created,"%Y")'),'=', $year)->whereBetween(DB::raw('DATE_FORMAT(created,"%d")'),[8,14])->get();
               

                 $tuan3 =  Order::select('total')->where('status','=',1)->where(DB::raw('DATE_FORMAT(created,"%m")'),'=',$month )->where(DB::raw('DATE_FORMAT(created,"%Y")'),'=', $year)->whereBetween(DB::raw('DATE_FORMAT(created,"%d")'),[15,22])->get();

                 $tuan4 =   Order::select('total')->where('status','=',1)->where(DB::raw('DATE_FORMAT(created,"%m")'),'=',$month )->where(DB::raw('DATE_FORMAT(created,"%Y")'),'=', $year)->whereBetween(DB::raw('DATE_FORMAT(created,"%d")'),[23,31])->get();
               
              
                $total_t1 = 0;
                $total_t2 = 0;
                $total_t3 = 0;
                $total_t4 = 0;

                foreach ($tuan1 as  $value) {
                   $total_t1+=$value->total;
                }
                foreach ($tuan2 as  $value) {
                   $total_t2+=$value->total;
                }
                foreach ($tuan3 as  $value) {
                   $total_t3+=$value->total;
                }
                foreach ($tuan4 as  $value) {
                   $total_t4+=$value->total;
                }
              if( $total_t1==0)
              {
                $total_t1=null;
              }
              if( $total_t2==0)
              {
                $total_t2=null;
              }
              if( $total_t3==0)
              {
                $total_t3=null;
              }
              if( $total_t4==0)
              {
                $total_t4=null;
              }
          $datamonth=['01'=>$total_t1,'02'=>$total_t2,'03'=>$total_t3,'04'=>$total_t4];

          return view('admin.statistical.dt',compact('datamonth','type','year','month','products'));
              
             
        }
    }
   

    


}
