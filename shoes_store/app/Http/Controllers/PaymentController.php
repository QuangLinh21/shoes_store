<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModal;
use App\Models\PaymentModel;
use App\Models\ShippingModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Cart;
use Faker\Provider\ar_EG\Payment;


session_start();


class PaymentController extends Controller
{
    public function check_login()
    {
       $admin_id = Session::get('admin_id');
       if ($admin_id) {
          return Redirect::to('dashboard');
       } else {
          return Redirect::to('admin')->send();
       }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PaymentModel();
        $data['cus_id'] = $request->cus_id;
        $data['cus_name'] = $request->cus_name;
        $data['cus_phone'] = $request->cus_phone;
        $data['cus_address'] = $request->cus_address;
        $data['cus_note'] = $request->cus_note;
        $data->save();
        return back();

        
    }
    public function delete_address_user($ship_id){
        ShippingModal::where('ship_id',$ship_id)->delete();
        return back();
    }
    public function payment_bill(Request $request){
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        // $data = array();
        // $data['pay_method'] = $request->ship;
        // $data['pay_status'] = 0;
        // $payment_id = DB::table('tbl_payment')->insertGetId($data);
        $data = $request->ship;

        //insert_order
        // $order = array();
        $order = new OrderModal();
        $order ['cus_id'] =Session::get('cus_id');
        $order ['ship_id'] = Session::get('shipping_id');
        $order ['pay_id'] = $data;
        $order ['order_total'] = Cart::total();
        $order ['order_status'] = 0;
        $order->save();
        $order_id = $order->id;
        // dd($order_id); 

        //$order_id = DB::table('tbl_order')->insertGetId($order);

        //insert order_detail
        $content =  Cart::content();
        foreach($content as $val){
        $order_detail = new OrderDetailModel();
        $order_detail ['order_id']= $order_id;
        $order_detail ['product_id']= $val->id;
        $order_detail ['product_name']=$val->name;
        $order_detail ['product_price']=  $val->price;
        $order_detail ['product_quantity']= $val->qty;
        $order_detail->save();
       }
       if( $data==1){
          Cart::destroy(); //reset giỏ hàng
          return view('layout_user.page_user.payment_product.ship_code',compact('list_cate','list_brand'));
        //   return back();
       }
       else{
        Cart::destroy(); //reset giỏ hàng
        return redirect('/');
       }
    }
    public function admin_payment(){
        $payment = PaymentModel::all();
        // dd( $payment);
        return view('layout_admin.pages_admin.admin_payment.list_payment',compact('payment'));
    }
    public function delete_paymethod($pay_id){
        PaymentModel::where('pay_id',$pay_id)->delete();
        return back();
    }
    public function active_paymethod($pay_id){
        PaymentModel::where('pay_id',$pay_id)->update(['pay_status'=>1]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function unactive_paymethod($pay_id){
        PaymentModel::where('pay_id',$pay_id)->update(['pay_status'=>0]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function admin_order(Request $request){
        $this->check_login();
        $key = $request->search;
          $list_order = DB::table('tbl_order')
          ->join('tbl_customer','tbl_order.cus_id','=','tbl_customer.cus_id')
          ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
          ->join('tbl_payment','tbl_order.pay_id','=','tbl_payment.pay_id')
          ->join('tbl_shipping','tbl_order.ship_id','=','tbl_shipping.ship_id')
          ->select('tbl_order_detail.*','tbl_customer.cus_name','tbl_customer.cus_id','tbl_order.order_total','tbl_order.order_id','tbl_payment.pay_method','tbl_shipping.*')
          ->orderBy('tbl_order.order_id','desc')
          ->where('tbl_shipping.cus_name','like','%'.$key.'%')->paginate(10)->appends(['search'=>$key]);
        //    dd($list_order);
          return view('layout_admin.pages_admin.admin_orders.list_bill',compact('list_order'));  
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
