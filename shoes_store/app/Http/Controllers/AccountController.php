<?php

namespace App\Http\Controllers;

use App\Models\AccountModel;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderModal;
use App\Models\ShippingModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        return view('layout_user.page_user.account_user.register',compact('list_cate','list_brand'));
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
        $user = new AccountModel();
        $user['cus_name'] = $request->cus_name;
        $user['cus_username'] = $request->cus_username;
        $user['cus_password'] = md5($request->cus_password);
        $user['cus_status'] = 1;
        $user->save();
        return back();
    }
   public function login_acc(){
    $list_cate = CategoryModel::where('cate_status','1')->get();
    $list_brand = BrandModel::where('brand_status','1')->get();
    return view('layout_user.page_user.account_user.login',compact('list_cate','list_brand'));
   }
   public function login_user(Request $request){
    $username = $request->cus_username;
    $password = md5($request->cus_password);
    $result = AccountModel::where('cus_username',$username)
    ->where('cus_password',$password)->first();
    if ($result) {
        Session::put('cus_name', $result->cus_name);
        Session::put('cus_id', $result->cus_id  );
      
        // dd(Session::get('cus_id'));
        return Redirect::to('/');
    } else {
      Session::put('message','Mật khẩu hoặc tài khoản không đúng');
        return Redirect()->back();
    }
   }
   public function payment(){
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        $shipping = ShippingModal::where('cus_id', Session::get('cus_id'))->orderBy('ship_id','desc')->get();
        $shipping_id = DB::table('tbl_shipping')->where('cus_id', Session::get('cus_id'))->orderBy('ship_id','desc')->first();
        // dd( $shipping_id);
        Session::put('shipping_id',$shipping_id->ship_id);
        return view('layout_user.page_user.payment_product.payment',compact('list_cate','list_brand','shipping_id','shipping'));
        
   }
   public function checkout_user(){
    Session::put('cus_name',null);
    Session::put('cus_id',null);
    return Redirect::to('/');
 }
 public function about_user(){
    $list_cate = CategoryModel::where('cate_status','1')->get();
    $list_brand = BrandModel::where('brand_status','1')->get();
    $history_sale = OrderModal::where('cus_id', Session::get('cus_id'))->where('order_status','1')->get();
    $user_order = OrderModal::where('cus_id', Session::get('cus_id'))->where('order_status','0')->get();
    return view('layout_user.page_user.account_user.about_user',compact('list_cate','list_brand','history_sale','user_order'));
 }
 public function show_order_user($order_id){
    $list_cate = CategoryModel::where('cate_status','1')->get();
    $list_brand = BrandModel::where('brand_status','1')->get();
      $detail_bill = DB::table('tbl_order')
      ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
      ->join('tbl_product','tbl_order_detail.product_id','=','tbl_product.product_id')
      ->select('tbl_order_detail.*','tbl_order.created_at','tbl_product.*')
      ->where('tbl_order.order_id',$order_id)
      ->get();
    //   dd($detail_bill);
    return view('layout_user.page_user.account_user.show_detail_bill_history',compact('list_cate','list_brand','detail_bill'));
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
