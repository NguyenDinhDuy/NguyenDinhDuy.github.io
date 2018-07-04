<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Category;
use App\Color;
use App\Size;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\ProdSpecifi;
use Session;
use DB;
use App\Image;

class ProductController extends Controller
{
    public function getProduct()
    {
//        $data['productlist'] = DB::table('products')->
//        join('categories', 'products.prod_cate', '=', 'categories.cate_id')->orderby('prod_id', 'desc')->paginate(5);
        $data['productlist'] = DB::table('products')->orderby('prod_id', 'desc')->paginate(5);
        return view('backend.product', $data);
    }

    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request)
    {
        $product = new Product;
        $filename = $request->img->getClientOriginalName();
        $product->prod_name = $request->name;
        $product->prod_code = $request->code;
        $product->prod_slug = str_slug($request->name);
        $product->prod_thumbnail = $filename;
        $product->prod_price = $request->price;
        $product->promotion_price = $request->promotion;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $request->img->storeAs('avatar', $filename);

        //Thêm sản phẩm con
        $child = count($request->color);
        for ($i = 0; $i < $child; $i++) {

            $prodspecifi = new ProdSpecifi;
            $filename1 = $request->imgspe[$i]->getClientOriginalName();
            $prodspecifi->product_id = $product->prod_id;
            $prodspecifi->prod_color_id = $request->color[$i];
            $prodspecifi->prod_size_id = $request->size[$i];
            $prodspecifi->quantity = $request->quanti[$i];
            $prodspecifi->image = $filename1;
            $prodspecifi->save();
            $request->imgspe[$i]->storeAs('avatar', $filename1);
        }

        //Thêm nhiều ảnh
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $image->storeAs('avatar', $filenameWithExt);
                $image = new Image;
                $image->product_id = $product->prod_id;
                $image->path = $filenameWithExt;
                $image->save();

            }
        }

        return redirect()->intended('admin/product')->with('message', 'Thêm mới sản phẩm thành công');
    }

    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['catelist'] = Category::all();
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        $data['images'] = DB::table('images')->where('product_id', $id)->get();
        $data['productspecifi'] = DB::table('prod_specifi')->where('product_id', $id)->get();
        return view('backend.editproduct', $data);
    }


    public function postEditProduct(EditProductRequest $request, $id)
    {
        $product = new Product;

        $arr['prod_name'] = $request->name;
        $arr['prod_code'] = $request->code;
        $arr['prod_slug'] = str_slug($request->name);
        $arr['prod_price'] = $request->price;
        $arr['promotion_price'] = $request->promotion;
        $arr['prod_description'] = $request->description;
        $arr['prod_cate'] = $request->cate;
        $arr['prod_featured'] = $request->featured;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $arr['prod_thumbnail'] = $img;
            $request->img->storeAs('avatar', $img);
        }

        //them moi
//        $numberimg = count($request->imagedetail);
//        for ($j = 0; $j < $numberimg; $j++) {
//            $imgdetail = new Image;
//            $arr2['path'] = $request->imgOld[$j];
//            if ($request->hasFile('imagedetail.' . $j)) {
//                $imgdt = $request->imagedetail[$j]->getClientOriginalName();
//                $arr2['path'] = $imgdt;
//                $request->imagedetail[$j]->storeAs('avatar', $imgdt);
//            }
//            $imgdetail->where('product_id', $id)->update($arr2);
//        }

        $child2 = count($request->image1);
        for ($k = 0; $k < $child2; $k++) {
            $imgdetail = new Image;
            $filename = $request->image1[$k]->getClientOriginalName();
            $imgdetail->product_id = $id;
            $imgdetail->path = $filename;
            $imgdetail->save();
            $request->image1[$k]->storeAs('avatar', $filename);
        }


        //sửa sản phẩm con
        $child = count($request->color);
        for ($i = 0; $i < $child; $i++) {

            $prodspecifi = new ProdSpecifi;
            $arr1['prod_color_id'] = $request->color[$i];
            $arr1['prod_size_id'] = $request->size[$i];
            $arr1['quantity'] = $request->quanti[$i];
            $arr1['image'] = $request->imageOld[$i];

            if ($request->hasFile('imgspe.' . $i)) {
                $img1 = $request->imgspe[$i]->getClientOriginalName();
                $arr1['image'] = $img1;
                $request->imgspe[$i]->storeAs('avatar', $img1);
            }

            $prodspecifi->where([['product_id', $id], ['prod_color_id', $request->colorOld[$i]], ['prod_size_id', $request->sizeOld[$i]]])
                ->update($arr1);
        }

        // thêm mới sản phẩm con
        $child1 = count($request->color1);
        for ($i = 0; $i < $child1; $i++) {
            $prodspecifi = new ProdSpecifi;
            $filename = $request->imgspe1[$i]->getClientOriginalName();
            $prodspecifi->product_id = $id;
            $prodspecifi->prod_color_id = $request->color1[$i];
            $prodspecifi->prod_size_id = $request->size1[$i];
            $prodspecifi->quantity = $request->quanti1[$i];
            $prodspecifi->image = $filename;
            $prodspecifi->save();
            $request->imgspe1[$i]->storeAs('avatar', $filename);
        }

        $product->where('prod_id', $id)->update($arr);
        return redirect('admin/product')->with('message', 'Sửa thông tin sản phẩm thành công');
    }

    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        return back()->with('message', 'Xóa sản phẩm thành công');
    }

    public function deleteImg($id)
    {
        Image::find($id)->delete();
        return back();
    }

    public function filter($id)
    {
        $data['productlist'] = Product::where('prod_cate', $id)->orderby('prod_id', 'desc')->paginate(5);
        return view('backend.product', $data);

    }

    public function searchprod(Request $request)
    {
        $value = $request->search;
        $value = str_replace(' ', '%', $value);
        $data['productlist'] = DB::table('products')->where('prod_name', 'like', '%' . $value . '%')
            ->orWhere('prod_code', 'like', '%' . $value . '%')
            ->orderBy('prod_id', 'asc')->paginate(6);

        return view('backend.product', $data);
    }
}