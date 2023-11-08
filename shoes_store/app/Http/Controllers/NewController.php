<?php

namespace App\Http\Controllers;

use App\Models\NewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Session;
// session_start();
class NewController extends Controller
{
    // public function check_login()
    // {
    //    $id_admin = Session::get('id_admin');
    //   if ($id_admin) {
    //       return Redirect::to('admin');
    //    } else {
    //      return Redirect::to('dashboard')->send();
    //   }
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->check_login();
        $key = $request->search;
        $list_new = NewModel::where('new_title','like','%'.$key.'%')->paginate(5)->appends(['search'=>$key]);
        return view('layout_admin.pages_admin.admin_news.list_news',compact('list_new'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.pages_admin.admin_news.add_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new NewModel();
        $data['new_title'] = $request->new_title;
        $data['new_des'] = $request->new_des;
        $data['new_content'] = $request->new_content;
        $data['new_img']=request('new_img');
        if($request->hasFile('new_img')){
            $file = $request->file('new_img');
            //dặt tên cho file img1
            $filename = time().'_'.$file->getClientOriginalName();
            //định nghĩa dẫn ssex upload lên
            $path_upload = 'uploads/news/';
            $request->file('new_img')->move($path_upload,$filename);
            $data -> new_img = $path_upload.$filename;
        }
        $data['new_status'] = $request->new_status;
        $data->save();
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($new_id)
    {
        $new = NewModel::find($new_id);
        return view('layout_admin.pages_admin.admin_news.edit_new',compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $new_id)
    {
        $data = NewModel::findorFail($new_id);
        $data['new_title'] = $request->new_title;
        $data['new_des'] = $request->new_des;
        $data['new_content'] = $request->new_content;
        if($request->hasFile('new_img')){ //kiểm tra img có đc chọn
            @unlink(public_path($data->img)); //xóa file cũ
            // get new_image
            $file = $request->file('new_img');
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            $path_upload = 'uploads/news/';
             // Thực hiện upload file
             $request->file('new_img')->move($path_upload,$filename);
             $data->new_img = $path_upload.$filename;
    
             $data->new_img = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
           }
        $data->save();
        return Redirect('news');
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
    public function active_cate($new_id){
        NewModel::where('new_id',$new_id)->update(['new_status'=>1]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function unactive_cate($new_id){
        NewModel::where('new_id',$new_id)->update(['new_status'=>0]);
         return Redirect()->back()->with('message','Cập nhật trạng thái thành công')->with('error','Cập nhật trạng thái không thành công !');
     }
     public function del($new_id){
        $delete = NewModel::where('new_id',$new_id)->delete();
        if( $delete){
            return Redirect()->back()->with('message','Xóa danh mục thành công');
        }
        else
        {
            return Redirect()->back()->with('error','Xóa danh mục không thành công');
        }
    }
}
