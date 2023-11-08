<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class CategoryController extends Controller
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
        $list_category = CategoryModel::where('cate_name','like','%'.$key.'%')->paginate(5)->appends(['search'=>$key]);
        return view('layout_admin.pages_admin.admin_categorys.list_category',compact('list_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check_login();
        return view('layout_admin.pages_admin.admin_categorys.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new CategoryModel();
        $data['cate_name'] = $request->cate_name;
        $data['cate_des'] = $request->cate_des;
        $data['cate_position'] = $request->cate_position;
        $data['cate_status'] = $request->cate_status;
        $data->save();
        return redirect('category')->with('message','Thêm mới danh mục thành công');
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
    public function edit($cate_id)
    {
        $this->check_login();
        $edit = CategoryModel::find($cate_id);
        return view('layout_admin.pages_admin.admin_categorys.edit_category',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cate_id)
    {
        $data =  CategoryModel::findorFail( $cate_id);
        $data['cate_name'] = $request->cate_name;
        $data['cate_des'] = $request->cate_des;
        $data['cate_position'] = $request->cate_position;
        $data->save();
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cate_id)
    {
       
    }
    public function active_cate($cate_id){
        CategoryModel::where('cate_id',$cate_id)->update(['cate_status'=>1]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function unactive_cate($cate_id){
        CategoryModel::where('cate_id',$cate_id)->update(['cate_status'=>0]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function del($cate_id){
        $del=CategoryModel::where('cate_id',$cate_id)->delete();
        if( $del){
            return Redirect()->back()->with('message','Xóa danh mục thành công');
        }
        else
        {
            return Redirect()->back()->with('error','Xóa danh mục không thành công');
        }
    }
}
