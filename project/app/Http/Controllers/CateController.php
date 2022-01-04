<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CateController extends Controller
{
    public function index(Request $request) {
        $result = CateModel::orderBy('cateprod_name','DESC')->search()->paginate(3);
        $prodCount = ProductModel::where('prod_cate_id')->count(); 
        if($filler = request()->filler){
            $result = CateModel::orderBy('cateprod_name','DESC')->where('cateprod_is_status',$filler)->search()->paginate(2);
        }
        return view('cate.index',compact('result','prodCount'));
    }

    public function add() {
        return view('cate.add');
    }
    
    public function update($id) {
        $result['info'] = CateModel::all();
        $cateId = CateModel::find($id);

        return view('cate.update',compact('result','cateId'));
    }
    
    public function delete($id) {
        // return $id;
        CateModel::find($id)->delete();
        return redirect()->route('manager.cate.index')->with('success','Bạn đã xoá thành công');
    }

   public function store_add(Request $request) {
        $validator = Validator::make($request->all(), [
            'cateprod_name'         => 'required|unique:categories',
            'cateprod_meta_title'         => 'required',
            'cateprod_meta_desc'         => 'required',
            'cateprod_meta_url'            =>'required',
            'cateprod_icon' => 'required|mimes:jpg,jpeg,png,gif|max:10000'
        ], [
            'cateprod_name.unique'       =>  'Danh mục đã tồn tại',
            'cateprod_name.required'     => 'Vui lòng nhập tên danh mục',
            'cateprod_meta_title.required'     => 'Vui lòng nhập tiêu đề danh mục',
            'cateprod_meta_desc.required'     => 'Vui lòng nhập mô tả danh mục',
            'cateprod_meta_url.required'     => 'Vui lòng nhập đường dẫn danh mục',
            'cateprod_icon.required'  => 'Vui lòng thêm ảnh danh mục',
            'cateprod_icon.mimes'     => 'Kiểm tra lại đuôi file',
            'cateprod_icon.image'     =>'File không phải hình ảnh'

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('cateprod_icon')) {
            $file = $request->file('cateprod_icon');
            $destination_Path = public_path('public/cateprod_icon');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move($destination_Path,$file_name);
            $thumbnail = 'public/cateprod_icon/'.$file_name;
        }else {
            $file_name = 'no_name.jpg';
        } 
        $cate_manager = new CateModel();
        if($request->cateprod_is_status) {
            $cate_manager->cateprod_is_status = $request->cateprod_is_status;
        }
        else {
            $cate_manager->cateprod_is_status = "off";
        }
        $cate_manager->cateprod_name = $request->cateprod_name;
        $cate_manager->cateprod_meta_title = $request->cateprod_meta_title;
        if($request->cateprod_meta_keywords){
            $cate_manager->cateprod_meta_keywords = $request->cateprod_meta_keywords;
        }
        else  $cate_manager->cateprod_meta_keywords = "Không có từ khoa";
        $cate_manager->cateprod_meta_desc = $request->cateprod_meta_desc;
        $cate_manager->cateprod_meta_url = $request->cateprod_meta_url;
        $cate_manager->cateprod_icon = $thumbnail;
        $cate_manager->save();
        return redirect()->route('manager.cate.index')->with('success','Bạn đã thêm danh mục thành công');

    }

    public function update_store(Request $request,$id) {
        
        $validator = Validator::make($request->all(), [
            'cateprod_name'         => 'required',
            'cateprod_meta_title'         => 'required',
            'cateprod_meta_desc'         => 'required',
            'cateprod_meta_url'            =>'required',
            'cateprod_icon' => 'mimes:jpg,jpeg,png,gif|max:10000'
        ], [
            'cateprod_name.required'     => 'Vui lòng nhập tên danh mục',
            'cateprod_meta_title.required'     => 'Vui lòng nhập tiêu đề danh mục',
            'cateprod_meta_desc.required'     => 'Vui lòng nhập mô tả danh mục',
            'cateprod_meta_url.required'     => 'Vui lòng nhập đường dẫn danh mục',
            'cateprod_icon.mimes'     => 'Kiểm tra lại đuôi file',
            'cateprod_icon.image'     =>'File không phải hình ảnh'

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('cateprod_icon')) {
            $file = $request->file('cateprod_icon');
            $destination_Path = public_path('public/cateprod_icon');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move($destination_Path,$file_name);
            $thumbnail = 'public/cateprod_icon/'.$file_name;
        }else {
            $file_name = 'no_name.jpg';
        } 
        $cate_manager = CateModel::find($id);
        $cate_manager->cateprod_name = $request->cateprod_name;
        $cate_manager->cateprod_meta_title = $request->cateprod_meta_title;
        $cate_manager->cateprod_meta_keywords = $request->cateprod_meta_keywords;
        $cate_manager->cateprod_meta_desc = $request->cateprod_meta_desc;
        $cate_manager->cateprod_meta_url = $request->cateprod_meta_url;
        if($request->cateprod_is_status) {
            $cate_manager->cateprod_is_status = $request->cateprod_is_status;
        }
        else {
            $cate_manager->cateprod_is_status = "off";
        }

 
        $cate_manager->save();
        return redirect()->route('manager.cate.index')->with('success','Bạn đã cập nhật danh mục thành công');

    }


}
