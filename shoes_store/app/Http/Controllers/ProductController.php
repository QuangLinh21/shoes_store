<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ImageProductModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class ProductController extends Controller
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
    public function index(Request $request)
    {
        $this->check_login();
        $key = $request->search;
        $list_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.cate_id','=','tbl_category.cate_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->select('tbl_product.*','tbl_category.cate_name','tbl_brand.brand_name')
        ->orderBy('product_id','desc')
        ->where('product_name','like','%'.$key.'%')->paginate(5)->appends(['search'=>$key]);
        // $list_product = ProductModel::where('product_name','like','%'.$key.'%')->paginate(5)->appends(['search'=>$key]);
        return view('layout_admin.pages_admin.admin_product.list_product',compact('list_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check_login();
        $category = CategoryModel::where('cate_status',1)->get();
        $brand = BrandModel::where('brand_status',1)->get();
        return view('layout_admin.pages_admin.admin_product.add_product',compact('category','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new ProductModel();
        $product['cate_id'] = $request->cate_id;
        $product['brand_id'] = $request->brand_id;
        $product['product_name'] = $request->product_name;
        $product['product_des'] = $request->product_des;
        $product['product_price'] = $request->product_price;
        $product['status'] = $request->status;
        $product->save();

        $img_product = new ImageProductModel();
        $img_product['product_id'] = $product->product_id;
        $img_product['img_product']=request('img_product');
        if($request->hasFile('img_product')){
            $file = $request->file('img_product');
            //dặt tên cho file img1
            $filename = time().'_'.$file->getClientOriginalName();
            //định nghĩa dẫn ssex upload lên
            $path_upload = 'uploads/products/';
            $request->file('img_product')->move($path_upload,$filename);
            $img_product ->img_product = $path_upload.$filename;
        }
        $img_product['img_status'] = 1;
        $img_product->save();

        if ($product && $img_product) {
            return redirect()->back()->with('message', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới không thành công');
        }

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
    public function edit($product_id)
    {
        $this->check_login();
        $category = CategoryModel::where('cate_status',1)->get();
        $brand = BrandModel::where('brand_status',1)->get();
        $product = ProductModel::find($product_id);
        return view('layout_admin.pages_admin.admin_product.edit_product',compact('category','brand','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $data = ProductModel::findorFail($product_id);
        $data['cate_id']=$request->cate_id;
        $data['brand_id']=$request->brand_id;
        $data['product_name']=$request->product_name;
        $data['product_des']=$request->product_des;
        $data['product_price']=$request->product_price;
        $data->save();
        return redirect('product');
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
    public function active_cate($product_id)
    {
        ProductModel::where('product_id', $product_id)->update(['status' => 1]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }
    public function unactive_cate($product_id)
    {
        ProductModel::where('product_id', $product_id)->update(['status' => 0]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }
    public function del($product_id){
        $delete =ProductModel::where('product_id',$product_id)->delete();
        if( $delete){
            return Redirect()->back()->with('message','Xóa danh mục thành công');
        }
        else
        {
            return Redirect()->back()->with('error','Xóa danh mục không thành công');
        }
    }
}