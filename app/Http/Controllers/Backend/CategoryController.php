<?php

namespace App\Http\Controllers\Backend;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::latest('id')->select(['id','title', 'slug', 'created_at'])->paginate();
        return view('backend.category.indext', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([

            'new_category' => 'bail|required|string|unique:categories,title',

        ]);

        category::create([

            'title' => $request->new_category,
            'slug' =>Str::slug($request->new_category),
            // 'isActive' => $request->filled('is_active')
        ]);

        Toastr::success('successfully added new category');
        return redirect()->route('category.index');

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
        $category_update = category::findOrFail($id);

        return $category_update;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
