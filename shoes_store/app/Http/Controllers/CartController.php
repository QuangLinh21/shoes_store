<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
   
    }
    public function show_cart(){
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        return view('layout_user.page_user.cart_product.show_cart',compact('list_cate','list_brand'));
    }
    public function add_to_cart(Request $request){
        $product_id = $request->product_id;
        $quantity = $request->qty;
        $size = $request->size;
        // dd( $product_id, $quantity,$size);
        // dd($product_id, $quantity);
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        $get_product = ProductModel::where('product_id',$product_id)->first();
        // dd($get_product);
        $data['id'] =  $get_product->product_id;
        $data['qty'] =  $quantity;
        $data['name'] =  $get_product->product_name;
        $data['price'] =  $get_product->product_price;
        $data['weight'] =  0;
        $data['options']['images'] =  $get_product->img_main;
        $data['options']['size'] =  $size;
        // dd($data);
        Cart::add($data);
        Cart::setGlobalTax(10);
        return view('layout_user.page_user.cart_product.show_cart',compact('list_cate','list_brand'));
    }
    public function update_cart_qty(Request $request,$rowId){
        // $rowId = $request->rowId_cart;
        $qty = $request->cart_qty;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }
    public function update_size(Request $request){
        $rowId = $request->rowId_cart;
        $size = $request->cart_size;
        Cart::update($rowId, ['options'  => ['size' => $size]]);
        return redirect()->back();
    }
    public function delete_cart_item($rowId){
        Cart::update($rowId,0);
        return redirect()->back();
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
}
