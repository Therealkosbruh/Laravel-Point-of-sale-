<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Type;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::all();
        $types = Type::all();

        if ($request->has('supplier_id')) {
            session(['supplier_id' => $request->supplier_id]);
        }
        if ($request->has('type_id')) {
            session(['type_id' => $request->type_id]);
        }
        if ($request->has('price')) {
            session(['price' => $request->price]);
        }

        $query = $this->filtration();

        $search = $request->sewarch;
        $products = $query->where("name","LIKE","%".$search."%")->orderby("name")->paginate(6);
        return view("Product/index", compact("products", "suppliers", "types"));
    }

private function filtration()
{
    $query = Product::query();
        if (session()->has('supplier_id') && session('supplier_id') != '') 
        {
            $query->where('supplier_id', session('supplier_id'));
        }
    
        if (session()->has('type_id') && session('type_id') != '')
        {
            $query->where('type_id', session('type_id'));
        }
    
        if (session()->has('price') && session('price') != '') 
        {
            if (session('price') == 'low')
            {
                $query->orderBy('price', 'asc');
            } 
            elseif (session('price') == 'high')
            {
                $query->orderBy('price', 'desc');
            }
        }
        return $query;
}
 
public function create()
{
    //
}

public function store(Request $request)
{
    //
}

public function show(Product $product)
{
    return view("Product/show", compact("product"));
}

public function edit(string $id)
{
    //
}

public function update(Request $request, string $id)
{
    //
}

public function destroy(string $id)
{
    //
}
}
