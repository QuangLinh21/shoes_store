<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Models\AdminModel;
use App\Models\OrderModal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class AdminController extends Controller
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
        $this->check_login();
        return view('dashboard');
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
        //
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
    public function admin(){
        return view('layout_admin.common_page.login_admin');
    }
    
    public function admin_login(AdminLoginRequest $request){
        $username = $request->username;
        $password = $request->password;
        $result = DB::table('tbl_admin')->where('admin_email',$username)->where('admin_password',$password)->first();
        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }
        else{
            // Session::put('message','Mật khẩu hoặc tài khoản không đúng');
            return redirect()->back();
        }
    }
    public function logout_admin(){
        // $this->check_login();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return view('layout_admin.common_page.login_admin');
     }
     public function admin_bill(Request $request)
    {
        $this->check_login();
        $key = $request->search;
        $list_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.cus_id', '=', 'tbl_customer.cus_id')
            ->join('tbl_order_detail', 'tbl_order.order_id', '=', 'tbl_order_detail.order_id')
            ->join('tbl_payment', 'tbl_order.pay_id', '=', 'tbl_payment.pay_id')
            ->join('tbl_shipping', 'tbl_order.ship_id', '=', 'tbl_shipping.ship_id')
            ->select('tbl_order_detail.*', 'tbl_customer.cus_name', 'tbl_customer.cus_id', 'tbl_order.order_total', 'tbl_order.order_id', 'tbl_payment.pay_method', 'tbl_shipping.*')
            ->orderBy('tbl_order.order_id', 'desc')
            ->where('tbl_shipping.cus_name', 'like', '%' . $key . '%')->paginate(15)->appends(['search' => $key]);
        //    dd($list_order);
        return view('layout_user.page_user.admin_order.list_bill',compact('list_order'));
    }
    public function bill_detail($order_id){
        $this->check_login();
      $detail_address = DB::table('tbl_order')
    //   ->join('tbl_customer','tbl_order.cus_id','=','tbl_customer.cus_id')
      ->join('tbl_payment','tbl_order.pay_id','=','tbl_payment.pay_id')
      ->join('tbl_shipping','tbl_order.ship_id','=','tbl_shipping.ship_id')
      ->select('tbl_shipping.*','tbl_order.order_total','tbl_order.order_status','tbl_order.order_id','tbl_payment.pay_method')
      ->where('tbl_order.order_id',$order_id)
      ->first();
    //   dd($detail_address);
      $detail_bill = DB::table('tbl_order')
      ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
      ->select('tbl_order_detail.*','tbl_order.created_at')
      ->where('tbl_order.order_id',$order_id)
      ->get();
    //   dd($detail_bill);
      return view('layout_user.page_user.admin_order.bill_detail',compact('detail_bill','detail_address'));
    }
    public function remove_order($order_id){
        OrderModal::where('order_id',$order_id)->delete();
        return back()->with('message','Xóa danh mục thành công');
    }
}
