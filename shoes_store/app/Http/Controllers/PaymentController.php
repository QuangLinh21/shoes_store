<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModal;
use App\Models\PaymentModel;
use App\Models\ProductModel;
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
    public function delete_address_user($ship_id)
    {
        ShippingModal::where('ship_id', $ship_id)->delete();
        return back();
    }
    public function payment_bill(Request $request)
    {
        $list_cate = CategoryModel::where('cate_status', '1')->get();
        $list_brand = BrandModel::where('brand_status', '1')->get();
        $data = $request->ship;
        $order = new OrderModal();
        $order['cus_id'] = Session::get('cus_id');
        $order['ship_id'] = Session::get('shipping_id');
        $order['pay_id'] = $data;
        $order['order_total'] = Cart::total();
        $order['order_status'] = 0;
        $order->save();
        $order_id = $order->id;
        // dd($order_id); 
        //$order_id = DB::table('tbl_order')->insertGetId($order);
        //insert order_detail
        $content =  Cart::content();
        foreach ($content as $val) {
            $order_detail = new OrderDetailModel();
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $val->id;
            $order_detail['product_name'] = $val->name;
            $order_detail['product_price'] =  $val->price;
            $order_detail['size'] = $val->options->size;
            $order_detail['product_quantity'] = $val->qty;
            $order_detail->save();
            
            $update_product_id = $val->id;
            $update_product_qty = $val->qty;
            $update_product = DB::table('tbl_warehouse')->where('product_id', $update_product_id)
                ->update(['quantity' => DB::raw('quantity - ' . $update_product_qty)]);
        }
       

        if ($data == 1) {
            Cart::destroy(); //reset giỏ hàng
            return view('layout_user.page_user.payment_product.ship_code', compact('list_cate', 'list_brand'));
            //   return back();
        } else {
            Cart::destroy(); //reset giỏ hàng
            return redirect('/');
        }
    }
    public function admin_payment()
    {
        $payment = PaymentModel::all();
        // dd( $payment);
        return view('layout_admin.pages_admin.admin_payment.list_payment', compact('payment'));
    }

    public function payment_vnpay(Request $request)
    {
        $data = $request->all();
        $tatol_cart = ($data['total_vnpay']);
        $parts = explode('.', $tatol_cart);
        $result_total =intval(str_replace(',', '', $parts[0])) ;
        // dd($result_total);
        $code_cart = rand(00,9999);
         $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/";
        //$vnp_Returnurl = "http://127.0.0.1:8000/payment";
        $vnp_Returnurl = route('vnpay_callback');
        $vnp_TmnCode = "NEOHV8Y9"; //Mã website tại VNPAY 
        $vnp_HashSecret = "LJCMBDTNVTXNIDBMPHWICWSKCPFJDTDQ"; //Chuỗi bí mật

        $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng test";
        $vnp_OrderType = "billpayment";
        $vnp_Amount =  $result_total*100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function vnpay_callback(Request $request){
        // dd('abc');
    $vnp_ResponseCode = $request->get('vnp_ResponseCode');
    $vnp_TxnRef = $request->get('vnp_TxnRef');
    // dd( $vnp_ResponseCode ,$vnp_TxnRef );
    if ($vnp_ResponseCode == '00') {
        $list_cate = CategoryModel::where('cate_status', '1')->get();
        $list_brand = BrandModel::where('brand_status', '1')->get();
        //$data = $request->ship;
        $order = new OrderModal();
        $order['order_id'] = $vnp_TxnRef;
        $order['cus_id'] = Session::get('cus_id');
        $order['ship_id'] = Session::get('shipping_id');
        $order['pay_id'] = 2;
        $order['order_total'] = Cart::total();
        $order['order_status'] = 1;
        $order->save();
        $order_id = $order->id;
        // dd($order_id); 
        //$order_id = DB::table('tbl_order')->insertGetId($order);
        //insert order_detail
        $content =  Cart::content();
        foreach ($content as $val) {
            $order_detail = new OrderDetailModel();
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $val->id;
            $order_detail['product_name'] = $val->name;
            $order_detail['product_price'] =  $val->price;
            $order_detail['size'] = $val->options->size;
            $order_detail['product_quantity'] = $val->qty;
            $order_detail->save();
            
            $update_product_id = $val->id;
            $update_product_qty = $val->qty;
            $update_product = DB::table('tbl_warehouse')->where('product_id', $update_product_id)
                ->update(['quantity' => DB::raw('quantity - ' . $update_product_qty)]);
                Cart::destroy(); //reset giỏ hàng
                return view('layout_user.page_user.payment_product.ship_code', compact('list_cate', 'list_brand'));
     
        }
    } else {
        // Thanh toán thất bại
        // Xử lý các bước khác nếu cần thiết
    }

    // Trả về phản hồi cho VNPAY (nếu cần)
    // ...
}
    public function delete_paymethod($pay_id)
    {
        PaymentModel::where('pay_id', $pay_id)->delete();
        return back();
    }
    public function active_paymethod($pay_id)
    {
        PaymentModel::where('pay_id', $pay_id)->update(['pay_status' => 1]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }
    public function unactive_paymethod($pay_id)
    {
        PaymentModel::where('pay_id', $pay_id)->update(['pay_status' => 0]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
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
