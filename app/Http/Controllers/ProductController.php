<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
        public function index()

    {

        $products = Product::latest()->paginate(5);


        return view('main.products.index',compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('main.products.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',

            'description' => 'required',

            'image' => 'required',

        ]);
$product = Product::create(array_merge($request->all()));
if ($request->hasFile('image')) {
      $file=$request->file('image');
        $fileName= time().'.'.$file->getClientOriginalExtension();
        $request->image->move('images/products/',$fileName);
        $product->update(['image' => $fileName]);
}

        //  // File Upload
        // if($request->hasFile('image')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     //Get just ext
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }


        // Create Product
        // $product = new Product;
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->image = $fileNameToStore;
        // $product->save();


        return redirect('main/products')
                ->with('success', 'Product Created Successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        return view('main.products.show',compact('product'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)

    {

        return view('main.products.edit',compact('product'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

         request()->validate([

            'name' => 'required',

            'description' => 'required',

            'image' => 'required',

        ]);


        $product->update($request->all());


        return redirect('main/products')
                ->with('success', 'Product Updated Successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        $product->delete();


        return redirect('main/products')
                ->with('success', 'Product Deleted Successfully');

    }
}
