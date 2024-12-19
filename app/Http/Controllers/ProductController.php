<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getList()
    {
        $sales = Sale::all();

        return response()->json(['sales' => $sales], 200);
    }

    public function create_api(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'nullable|string',
            'price' => 'nullable|string',
        ]);
        $product = Sale::create([
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        return response()->json(['product' => $product], 201);
    }

    public function updateSale(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'nullable|string',
            'price' => 'nullable|string',
        ]);

        $sale = Sale::findOrFail($id);

        $sale->update([
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        return response()->json(['sale' => $sale], 200);
    }

    public function deleteSale($id)
    {
        $sale = Sale::findOrFail($id);

        $sale->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
    

    public function __construct()
    {
        // Apply the middleware to the index method
        $this->middleware('checkPermission', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       dd('Test');
        $products = Product::latest()->paginate(5);
  
        return view('test/index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'payin_amount' => 'required',
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('test.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        return view('test.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $product=Product::findOrFail($id);
        return view('test.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'payin_amount' => 'required',
        ]);
  
        $product=Product::findOrFail($id);
        $product->update($request->all());
  
        return redirect()->route('test.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('test.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('test.index')->with('error', 'Failed to delete product');
        }
    }




    // Sale_ListController:-)
    public function sale_index()
    {
        $sales = Sale::latest()->paginate(5);
  
        return view('test/sale/index',compact('sales'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function sale_create()
    {
        return view('test/sale/create');
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sale_store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            
        ]);
  
        Sale::create($request->all());
   
        return redirect()->route('sale.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function sale_show(Sale $sale, $id)
    {
        $sale = Sale::findOrFail($id);
        return view('test/sale/show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function sale_edit(Sale $sale, $id)
    {
        $sale = Sale::findOrFail($id);
        return view('test/sale/edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $product
     * @return \Illuminate\Http\Response
     */
    public function sale_update(Request $request, Sale $sale, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
  
        $sale=Sale::findOrFail($id);
        $sale->update($request->all());
  
        return redirect()->route('sale.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */

    public function sale_destroy($id){
        try {
            $sale = Sale::findOrFail($id);
            $sale->delete();
            return redirect()->route('sale.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('sale.index')->with('error', 'Failed to delete product');
        }
    }




    //Contact Controller:
    // public function sale_index()
    // {
    //     $sales = Sale::latest()->paginate(5);
  
    //     return view('test/sale/index',compact('sales'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    // public function sale_create()
    // {
    //     return view('test/sale/create');
    // } 

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sale_store(Request $request)
    // {
    //     $request->validate([
    //         'product_name' => 'required',
    //         'quantity' => 'required',
    //         'price' => 'required',
            
    //     ]);
  
    //     Sale::create($request->all());
   
    //     return redirect()->route('sale.index')->with('success','Product created successfully.');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Sale  $sale
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sale_show(Sale $sale, $id)
    // {
    //     $sale = Sale::findOrFail($id);
    //     return view('test/sale/show',compact('sale'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Sale  $sale
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sale_edit(Sale $sale, $id)
    // {
    //     $sale = Sale::findOrFail($id);
    //     return view('test/sale/edit',compact('sale'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Sale  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sale_update(Request $request, Sale $sale, $id)
    // {
    //     $request->validate([
    //         'product_name' => 'required',
    //         'quantity' => 'required',
    //         'price' => 'required',
    //     ]);
  
    //     $sale=Sale::findOrFail($id);
    //     $sale->update($request->all());
  
    //     return redirect()->route('sale.index')->with('success','Product updated successfully');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Sale  $sale
    //  * @return \Illuminate\Http\Response
    //  */

    // public function sale_destroy($id){
    //     try {
    //         $sale = Sale::findOrFail($id);
    //         $sale->delete();
    //         return redirect()->route('sale.index')->with('success', 'Product deleted successfully');
    //     } catch (\Exception $e) {
    //         return redirect()->route('sale.index')->with('error', 'Failed to delete product');
    //     }
    // }

}
