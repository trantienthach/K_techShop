<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CateModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $result = ProductModel::orderBy('prod_name','DESC')->search()->paginate(2);
        if($filler = request()->filler){
            $result = ProductModel::orderBy('prod_name','DESC')->where('prod_is_status',$filler)->search()->paginate(2);
        }
        return view('product.index',compact('result'));
    }
    public function add() {
        $categories = CateModel::all();
        return view('product.add',compact('categories'));
    }
    public function update($id) {
        $result['info'] = ProductModel::all();
        $categories = CateModel::all();
        $ProdId = ProductModel::find($id);
        return view('product.update',compact('result','ProdId','categories'));
    }
    public function delete($id) {
        ProductModel::find($id)->delete();
        return redirect()->route('manager.product.index')->with('success','Bạn đã xoá thành công');
    }
    public function store_add(Request $request) {
        $validator = Validator::make($request->all(), [
            'prod_name'         => 'required|unique:products',
            'prod_meta_title'         => 'required',
            'prod_short_desc'         => 'required',
            'prod_meta_desc'            =>'required',
            'prod_meta_seourl'            =>'required',
            'prod_price_current'            =>'required',
            'prod_cate_id'            =>'required',
            'prod_img' => 'required|mimes:jpg,jpeg,png,gif|max:10000'
        ], [
            'prod_name.unique'       =>  'Danh mục đã tồn tại',
            'prod_name.required'     => 'Vui lòng nhập tên sản phẩm',
            'prod_meta_title.required'     => 'Vui lòng nhập tiêu đề sản phẩm',
            'prod_short_desc.required'     => 'Vui lòng nhập mô tả ngắn sản phẩm',
            'prod_meta_desc.required'     => 'Vui lòng nhập mô tả đường dẫn sản phẩm',
            'prod_meta_seourl.required'     => 'Vui lòng nhập đường dẫn sản phẩm',
            'prod_price_current.required'     => 'Vui lòng nhập giá sản phẩm',
            'prod_cate_id.required'     => 'Vui lòng chọn danh mục cho sản phẩm',
            'prod_img.required'  => 'Vui lòng thêm ảnh sản phẩm',
            'prod_img.mimes'     => 'Kiểm tra lại đuôi file',
            'prod_img.image'     =>'File không phải hình ảnh'

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('prod_img')) {
            $file = $request->file('prod_img');
            $destination_Path = public_path('public/prod_img');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move($destination_Path,$file_name);
            $thumbnail = 'public/prod_img/'.$file_name;
        }else {
            $file_name = 'no_name.jpg';
        } 
        $prod_manager = new ProductModel();
        if($request->prod_is_status) {
            $prod_manager->prod_is_status = $request->prod_is_status;
        }
        else {
            $prod_manager->prod_is_status = "off";
        }
        $prod_manager->prod_name = $request->prod_name;
        $prod_manager->prod_meta_title = $request->prod_meta_title;
        if($request->prod_meta_keywords){
            $prod_manager->prod_meta_keywords = $request->prod_meta_keywords;
        }
        else  $prod_manager->prod_meta_keywords = "Không có từ khoá";
        $prod_manager->prod_short_desc = $request->prod_short_desc;
        $prod_manager->prod_meta_desc = $request->prod_meta_desc;
        $prod_manager->prod_meta_seourl = $request->prod_meta_seourl;
        $prod_manager->prod_price_current = $request->prod_price_current;
        $prod_manager->prod_price_old = $request->prod_price_old;
        $prod_manager->prod_cate_id = $request->prod_cate_id;
        $prod_manager->prod_img = $thumbnail;
        $prod_manager->new = $request->new;

        $prod_manager->save();
        return redirect()->route('manager.product.index')->with('success','Bạn đã thêm sản phẩm thành công');

    }


    public function update_store(Request $request,$id) {
        // $validator = Validator::make($request->all(), [
        //     'prod_name'         => 'required|unique:products',
        //     'prod_meta_title'         => 'required',
        //     'prod_short_desc'         => 'required',
        //     'prod_content_main_desc'            =>'required',
        //     'prod_meta_desc'            =>'required',
        //     'prod_meta_seourl'            =>'required',
        //     'prod_price_current'            =>'required',
        //     'prod_cate_id'            =>'required',
        //     'prod_img' => 'mimes:jpg,jpeg,png,gif|max:10000'
        // ], [
        //     'prod_name.unique'       =>  'Danh mục đã tồn tại',
        //     'prod_name.required'     => 'Vui lòng nhập tên sản phẩm',
        //     'prod_meta_title.required'     => 'Vui lòng nhập tiêu đề sản phẩm',
        //     'prod_short_desc.required'     => 'Vui lòng nhập mô tả ngắn sản phẩm',
        //     'prod_content_main_desc.required'     => 'Vui lòng nhập mô tả chính sản phẩm',
        //     'prod_meta_desc.required'     => 'Vui lòng nhập mô tả đường dẫn sản phẩm',
        //     'prod_meta_seourl.required'     => 'Vui lòng nhập đường dẫn sản phẩm',
        //     'prod_price_current.required'     => 'Vui lòng nhập giá sản phẩm',
        //     'prod_cate_id.required'     => 'Vui lòng chọn danh mục cho sản phẩm',
        //     'prod_img.mimes'     => 'Kiểm tra lại đuôi file',
        //     'prod_img.image'     =>'File không phải hình ảnh'

        // ]);
        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // if($request->hasFile('prod_img')) {
        //     $file = $request->file('prod_img');
        //     $destination_Path = public_path('public/prod_img');
        //     $file_name = time().'_'.$file->getClientOriginalName();
        //     $file->move($destination_Path,$file_name);
        //     $thumbnail = 'public/prod_img/'.$file_name;
        // }else {
        //     $file_name = 'no_name.jpg';
        // } 
        $prod_manager = ProductModel::find($id);

        if($request->prod_is_status) {
            $prod_manager->prod_is_status = $request->prod_is_status;
        }
        else {
            $prod_manager->prod_is_status = "off";
        }
        $prod_manager->prod_name = $request->prod_name;
        $prod_manager->prod_meta_title = $request->prod_meta_title;
        if($request->prod_meta_keywords){
            $prod_manager->prod_meta_keywords = $request->prod_meta_keywords;
        }
        else  $prod_manager->prod_meta_keywords = "Không có từ khoá";
        $prod_manager->prod_short_desc = $request->prod_short_desc;
        $prod_manager->prod_content_main_desc = $request->prod_content_main_desc;
        $prod_manager->prod_meta_desc = $request->prod_meta_desc;
        $prod_manager->prod_meta_seourl = $request->prod_meta_seourl;
        $prod_manager->prod_price_current = $request->prod_price_current;
        $prod_manager->prod_price_old = $request->prod_price_old;
        $prod_manager->prod_cate_id = $request->prod_cate_id;
        $prod_manager->new = $request->new;
        $prod_manager->save();
        return redirect()->route('manager.product.index')->with('success','Bạn đã thêm sản phẩm thành công');
    }

}
