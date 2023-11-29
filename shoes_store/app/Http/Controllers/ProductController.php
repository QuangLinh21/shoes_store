<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ImageProductModel;
use App\Models\ProductModel;
use App\Models\WarehouseModel;
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
        $data['img_main'] = $request->img_product;
        if ($request->hasFile('img_main')) {
            $file = $request->file('img_main');
            //dặt tên cho file img1
            $filename = time() . '_' . $file->getClientOriginalName();
            //định nghĩa dẫn ssex upload lên
            $path_upload = 'uploads/products/';
            $request->file('img_main')->move($path_upload, $filename);
            $product->img_main = $path_upload . $filename;
        }
        $data['img_main2'] = $request->img_main2;
        if ($request->hasFile('img_main2')) {
            $file = $request->file('img_main2');
            //dặt tên cho file img1
            $filename = time() . '_' . $file->getClientOriginalName();
            //định nghĩa dẫn ssex upload lên
            $path_upload = 'uploads/products/';
            $request->file('img_main2')->move($path_upload, $filename);
            $product->img_main2 = $path_upload . $filename;
        }
        $product['product_hot'] = 0;
        $product['status'] = $request->status;
        $product->save();
        $qroduct_quantity = new WarehouseModel();
        $qroduct_quantity['product_id'] = $product->product_id;
        $qroduct_quantity['quantity'] = $request->quantity;
        $qroduct_quantity['status'] = 0;
        $qroduct_quantity->save();

        if ($product) {
            return redirect()->back()->with('message', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới không thành công');
        }

    }
    public function search(Request $request){
        $key_word = $request->keyword;
        $list_cate = CategoryModel::where('cate_status','1')->get();
        $list_brand = BrandModel::where('brand_status','1')->get();
        $result = ProductModel::where('product_name','like','%'.$key_word.'%')->paginate(6);
        return view('layout_user.common_page.search_result',compact('list_cate','list_brand','result'));
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
        if($request->hasFile('img_main')){ //kiểm tra img có đc chọn
            @unlink(public_path($data->img)); //xóa file cũ
            // get new_image
            $file = $request->file('img_main');
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            $path_upload = 'uploads/products/';
             // Thực hiện upload file
             $request->file('img_main')->move($path_upload,$filename);
             $data->img_main = $path_upload.$filename;
    
             $data->img_main = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
           }
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
    public function active_hot($product_id)
    {
        ProductModel::where('product_id', $product_id)->update(['product_hot' => 1]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }
    public function unactive_hot($product_id)
    {
        ProductModel::where('product_id', $product_id)->update(['product_hot' => 0]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }

    public function quantity_product(Request $request){
        $this->check_login();
        $key = $request->search;
        $quantity = DB::table('tbl_product')
        ->join('tbl_warehouse','tbl_product.product_id','=','tbl_warehouse.product_id')
        ->select('tbl_warehouse.*','tbl_product.product_name')
        ->where('tbl_product.product_name','like','%'.$key.'%')->paginate(20)->appends(['search'=>$key]);
       // $quantity = WarehouseModel::where('product_id','like','%'.$key.'%')->paginate(20)->appends(['search'=>$key]);
        return view('layout_admin.pages_admin.admin_warehouse.quantity_product',compact('quantity'));
    }
    public function add_quantity(){
        $product = ProductModel::get();
        return view('layout_admin.pages_admin.admin_warehouse.add_quantity',compact('product'));
    }
    public function plus_product($kho_id){
        $product = DB::table('tbl_product')
        ->join('tbl_warehouse','tbl_product.product_id','=','tbl_warehouse.product_id')
        ->select('tbl_warehouse.*','tbl_product.product_name')
        ->where('kho_id',$kho_id)->first();
        // dd($product);
        return view('layout_admin.pages_admin.admin_warehouse.add_quantity',compact('product'));
    }
    public function plus_kho_product(Request $request,$kho_id){
       try {
        $data_qty = $request->quantity;
        $update_product = DB::table('tbl_warehouse')->where('kho_id', $kho_id)
        ->update(['quantity' => DB::raw('quantity + ' . $data_qty)]);
        return back()->with('message','Thêm mới thành công');
       } catch (\Throwable $th) {
        return back()->with('error','Thêm mới không thành công'.$th);
       }
    }
    public function update_kho_product(Request $request){
       try {
        $data = new WarehouseModel();
        $data['product_id']=$request->product_id;
        $data['quantity']=$request->quantity;
        $data['status'] = 0;
        $data->save();
        return back()->with('message','Thêm mới thành công');
       } catch (\Throwable $th) {
        return back()->with('error','Thêm mới không thành công'.$th);
       }
    }
}
