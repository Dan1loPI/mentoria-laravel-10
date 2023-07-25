<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function __construct(Product $product)
   {
      $this->product = $product;
   }

   public function index(Request $request)
   {
      $pesquisar = $request->pesquisar;
      $findProducts = $this->product->getProductPesquisarIndex(search: $pesquisar ?? '');
   
        return view('pages.products.paginacao', compact('findProducts'));
   }

   public function delete(Request $request){

   }
}
