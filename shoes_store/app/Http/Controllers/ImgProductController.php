<?php

namespace App\Http\Controllers;

use App\Models\ImageProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class ImgProductController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_product)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ImageProductModel();
        $data['product_id'] = $request->product_id;
        $data['img_product'] = $request->img_product;
        if ($request->hasFile('img_product')) {
            $file = $request->file('img_product');
            //dặt tên cho file img1
            $filename = time() . '_' . $file->getClientOriginalName();
            //định nghĩa dẫn ssex upload lên
            $path_upload = 'uploads/products/';
            $request->file('img_product')->move($path_upload, $filename);
            $data->img_product = $path_upload . $filename;
        }
        $data['img_position'] = $request->img_position;
        $data['img_status'] = $request->img_status;
        $data->save();
        return redirect()->back()->with('message', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $this->check_login();
        $id_product = $product_id;
        $img_product = DB::table('tbl_images_product')
            ->join('tbl_product', 'tbl_images_product.product_id', '=', 'tbl_product.product_id')
            ->select('tbl_images_product.*', 'tbl_product.product_id')
            ->where('tbl_images_product.product_id', $product_id)
            // ->orderBy('img_pro_id ','desc')
            ->paginate(5);
        return view('layout_admin.pages_admin.admin_product.img_products.list_imgproduct', compact('img_product', 'id_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $this->check_login();
        $id_product = $id_product;
        return view('layout_admin.pages_admin.admin_product.img_products.add_image', compact('id_product'));
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
    public function del($img_pro_id)
    {
        $delete = ImageProductModel::where('img_pro_id', $img_pro_id)->delete();
        if ($delete) {
            return Redirect()->back()->with('message', 'Xóa danh mục thành công');
        } else {
            return Redirect()->back()->with('error', 'Xóa danh mục không thành công');
        }
    }
    public function active_cate($img_pro_id)
    {
        ImageProductModel::where('img_pro_id', $img_pro_id)->update(['img_status' => 1]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }
    public function unactive_cate($img_pro_id)
    {
        ImageProductModel::where('img_pro_id', $img_pro_id)->update(['img_status' => 0]);
        return Redirect()->back()->with('message', 'Cập nhật trạng thái thành công')->with('error', 'Cập nhật trạng thái không thành công !');
    }
}
