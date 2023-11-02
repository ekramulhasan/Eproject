<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $testimonial_data = Testimonial::latest('id')->select(['id', 'client_name', 'client_slug' ,'client_designation', 'client_msg', 'client_img', 'updated_at'])->paginate();
      return view('backend.testimonial.indext',compact('testimonial_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'client_name' => 'bail|required|string|max:255',
            'client_designation' => 'bail|required|string|max:255',
            'client_msg' => 'bail|required|string',
            'client_img' => 'nullable|image'

        ]);

        $testimonial = Testimonial::create([

            'client_name' => $request->client_name,
            'client_slug' => Str::slug($request->client_name),
            'client_designation' => $request->client_designation,
            'client_msg' => $request->client_msg

        ]);

        $this->img_upload($request, $testimonial->id);

        Toastr::success('successfully added new testimonial');
        return redirect()->route('testimonial.index');

        // dd($request);
        // return $request;


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
    public function edit(string $id)
    {
       $testimonial_data = Testimonial::find($id);
       return view('backend.testimonial.edit',compact('testimonial_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $update_testimonial = Testimonial::find($id);

        $request->validate([

            'client_name' => 'bail|required|string|max:255',
            'client_designation' => 'bail|required|string|max:255',
            'client_msg' => 'bail|required|string',
            'client_img' => 'nullable|image'

        ]);

        $update_testimonial->update([

            'client_name' => $request->client_name,
            'client_slug' => Str::slug($request->client_name),
            'client_designation' => $request->client_designation,
            'client_msg' => $request->client_msg

        ]);

        $this->img_upload($request, $update_testimonial->id);

        Toastr::success('successfully update testimonial');
        return redirect()->route('testimonial.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            Testimonial::find($id)->delete();
            Toastr::success('successfully delete testimonial');
            return redirect()->route('testimonial.index');

    }


    public function img_upload($request, $item_id){

      $client_data =  Testimonial::findorFail($item_id);

    //   dd($client_data);

    if ($request->hasFile('client_img')) {

        if ($client_data->client_img != 'default-client.jpg') {

            $imgLoadPath = 'public/uploads/testimonial/';
            $old_path = $imgLoadPath.$client_data->client_img;

            unlink(base_path($old_path));
        }


        $photo_path = 'public/assets/uploads/testimonial/';
        $upload_path = $request->file('client_img');
        $img_name = $client_data->id.'.'.$upload_path->getClientOriginalExtension();
        $new_photo_path = $photo_path.$img_name;

        Image::make($upload_path)->resize(300,300)->save(base_path($new_photo_path),40); //40 mean jpg exten convert

        $check = $client_data->update([

            'client_img' => $img_name,

        ]);

    }


    }
}
