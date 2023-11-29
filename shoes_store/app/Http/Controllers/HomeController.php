<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ContactModal;
use App\Models\ImageProductModel;
use App\Models\NewModel;
use App\Models\ProductModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
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
        $hot_product = ProductModel::where('product_hot','1')->get();
        $brands = BrandModel::where('brand_status','1')->get();
        $news_product = ProductModel::where('status','1')->orderBy('product_id','desc')->take('4')->get();
        $all_product = ProductModel::where('status','1')->orderBy('product_id','desc')->paginate(8);
        $news = NewModel::where('new_status','1')->orderBy('new_id','desc')->paginate(4);
        return view('layout_user.page_user.home',compact('brands','news_product','all_product','news','list_cate','list_brand','hot_product'));
    }
    public function contact(){
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        return view('layout_user.page_user.contact_user.contacts',compact('list_cate','list_brand'));
    }
    public function send_contact(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;  // Assuming phone is actually the email
        $data['phone'] = $request->phone;
        $data['subject'] = $request->subject;
    
        $data_id = DB::table('tbl_contact')->insertGetId($data);
        $saveData = DB::table('tbl_contact')->where('contact_id', $data_id)->first();  // Use first() instead of get()
    
        // dd($saveData);
        Mail::send('layout_user.page_user.contact_user.email', compact('saveData'), function ($message) use ($saveData) {
            $message->to($saveData->email);
            $message->subject('Cảm ơn bạn đã liên hệ đến chúng tôi');
        });
    
        return back();
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
      // $product = DB::table('tbl_product')
        // ->join('tbl_images_product','tbl_product.product_id','=','tbl_images_product.product_id')
        // ->select('tbl_product.*','tbl_images_product.img_product')
        // ->where('tbl_product.product_id',$product_id)
        // ->get();
    public function show($product_id)
    {
        // $img_product = ImageProductModel::where('product_id',$product_id)->get();
        $product = ProductModel::find($product_id);
        $product_quantity = WarehouseModel::where('product_id',$product_id)->get();
        $data = [
            'product' => $product,
            // 'img_product' => $img_product,
            'product_quantity'=>$product_quantity
        ];
        return response()->json($data);
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
