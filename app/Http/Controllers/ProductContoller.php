<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.list',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->save();
        if($request->TotalImages>0){
            for($i=0; $i<$request->TotalImages; $i++){
                if ($request->hasFile('images'.$i)) 
                {
                    $file = $request->file('images'.$i);
                    $name = $file->getClientOriginalName();
                    $path = $file->storeAs('uploads', $name, 'public');
                    $insert[$i]['name'] = $name;
                    $insert[$i]['path'] = 'storage/'.$path;
                    $insert[$i]['product_id'] = $product->id;
                }
            }
        Image::insert($insert);
        }        
        return redirect()->route('products.index')->withSuccess('Ürün güncelleme işleme başarılı');
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
        $product = Product::find($id) ?? abort(404,'Ürün bulunamadı');
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit',compact('product','categories','brands'));

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
        $product = Product::find($id) ?? abort(404,'Ürün bulunamadı');
        Product::where('id',$id)->update($request->except(['_method','_token']));
        return redirect()->route('products.index')->withSuccess('Ürün güncelleme işleme başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id) ?? abort(404,'Ürün bulunamadı');
        $product->delete();
        return redirect()->route('products.index')->withSuccess('Ürün silme işleme başarılı');
    }
}
