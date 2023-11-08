<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class BrandController extends Controller
{
    //  public function check_login()
    //  {
    //     $id_admin = Session::get('id_admin');
    //    if ($id_admin) {
    //        return Redirect::to('admin');
    //     } else {
    //       return Redirect::to('dashboard')->send();
    //    }
    //  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->check_login();
        $key = $request->search;
        $list_brand = BrandModel::where('brand_name','like','%'.$key.'%')->paginate(5)->appends(['search'=>$key]);
        return view('layout_admin.pages_admin.admin_brands.list_brand',compact('list_brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.pages_admin.admin_brands.add_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new BrandModel();
        $data['brand_name'] = $request->brand_name;
        $data['brand_des'] = $request->brand_des;
        $data['brand_position'] = $request->brand_position;
        $data['brand_status'] = $request->brand_status;
        $data['brand_img']=request('brand_img');
        if($request->hasFile('brand_img')){
            $file = $request->file('brand_img');
            //dặt tên cho file img1
            $filename = time().'_'.$file->getClientOriginalName();
            //định nghĩa dẫn ssex upload lên
            $path_upload = 'uploads/brands/';
            $request->file('brand_img')->move($path_upload,$filename);
            $data -> brand_img = $path_upload.$filename;
        }
        $data->save();
        return redirect('brand');
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
    public function edit($brand_id)
    {
        // $this->check_login();
        $edit = BrandModel::find($brand_id);
        return view('layout_admin.pages_admin.admin_brands.edit_brand',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand_id)
    {
        $data = BrandModel::findorFail( $brand_id);
        $data['brand_name'] = $request->brand_name;
        $data['brand_des'] = $request->brand_des;
        $data['brand_position'] = $request->brand_position;
        if($request->hasFile('brand_img')){ //kiểm tra img có đc chọn
            @unlink(public_path($data->img)); //xóa file cũ
            // get new_image
            $file = $request->file('brand_img');
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            $path_upload = 'uploads/brands/';
             // Thực hiện upload file
             $request->file('brand_img')->move($path_upload,$filename);
             $data->brand_img = $path_upload.$filename;
    
             $data->brand_img = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
           }
        $data->save();
        return redirect('brand');
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
    public function delete_brand($brand_id){
        $delete = DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        if( $delete){
            return Redirect()->back()->with('message','Xóa danh mục thành công');
        }
        else
        {
            return Redirect()->back()->with('error','Xóa danh mục không thành công');
        }
    }
    public function active_brand($brand_id){
        BrandModel::where('brand_id',$brand_id)->update(['brand_status'=>1]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function unactive_brand($brand_id){
        BrandModel::where('brand_id',$brand_id)->update(['brand_status'=>0]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
}
