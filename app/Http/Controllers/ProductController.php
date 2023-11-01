<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProduct;
use App\Models\ProductImage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_data = Product::where('is_active',1)->with('category')->latest('id')->select('id', 'category_id', 'title', 'slug', 'price', 'product_stock', 'alert_quantiry', 'product_img', 'product_rating', 'updated_at')->paginate();

        return view('backend.product.index', compact('product_data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_data = category::select(['id','title'])->get();
        return view('backend.product.create', compact('category_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

    // dd($request->all());

     $products = Product::create([

            'category_id' => $request->category_id,
            'title' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'price' => $request->product_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_id' => $request->product_code,
            'product_stock' => $request->stock_quantiry,
            'alert_quantiry' => $request->alert_quantity,
            'additional_info' =>$request->additional_info,

        ]);

        $this->img_upload($request,$products->id);
        $this->multiple_img_upload($request, $products->id);

        Toastr::success('successfully added new product');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product_update = Product::whereSlug($slug)->first();
        $categories = category::select(['id','title'])->get();
        return view('backend.product.edit', compact('product_update','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct $request, string $slug)
    {
        $update_product = Product::whereSlug($slug)->first();

        $update_product->update([

            'category_id' => $request->category_id,
            'title' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'price' => $request->product_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_id' => $request->product_code,
            'product_stock' => $request->stock_quantiry,
            'alert_quantiry' => $request->alert_quantity,
            'additional_info' =>$request->additional_info,

        ]);

        $this->img_upload($request,$update_product->id);
        $this->multiple_img_upload($request, $update_product->id);
        Toastr::success('successfully update the product');
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {

        $product = Product::whereSlug($slug)->first();
        $product->delete();

        return redirect()->route('products.index');

    }



    public function img_upload($request, $item_id){

        $product_data =  Product::findorFail($item_id);

        // dd($product_data);

      if ($request->hasFile('product_img')) {

        //   if ($product_data->product_img != 'default-client.jpg') {

        //       $imgLoadPath = 'public/assets/uploads/products/';
        //       $old_path = $imgLoadPath.$product_data->product_img;

        //       unlink(base_path($old_path));
        //   }


          $photo_path = 'public/assets/uploads/products/';
          $upload_path = $request->file('product_img');
          $img_name = $product_data->id.'.'.$upload_path->getClientOriginalExtension();
          $new_photo_path = $photo_path.$img_name;

          Image::make($upload_path)->resize(300,300)->save(base_path($new_photo_path),40); //40 mean jpg exten convert

          $check = $product_data->update([

              'product_img' => $img_name,

          ]);

      }


      }


      public function multiple_img_upload($request, $product_id){


        if($request->hasFile('multiple_product_img')){

            $multiple_images =  ProductImage::where('product_id',$product_id)->get();

            foreach ($multiple_images as $value) {

                if ($multiple_images->product_multiple_img_name != 'default-img.jpg') {

                    $file_location = 'public/assets/uploads/products/multiple_photo';
                    $old_img = $file_location.$value->product_multiple_img_name;

                    unlink(base_path($old_img));

                }

                // delete old value from table
                $multiple_images->delete();
        }


        // assign a flag variable
        $flag = 1;


        foreach ($request->file('multiple_product_img') as $value) {

            $file_location = 'public/assets/uploads/products/';
            $new_img_name = $product_id.'-'.$flag.'.'.$value->getClientOriginalExtension();
            $new_file_loaction = $file_location.$new_img_name;

            Image::make($value)->resize(600,622)->save(base_path($new_file_loaction), 40);

            ProductImage::create([

                'product_id' => $product_id,
                'product_multiple_img_name' => $new_img_name,

            ]);

            $flag++;


        }



      }


    }
}
