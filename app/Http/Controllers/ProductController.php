<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormRequestProduct;
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

   public function delete(Request $request)
   {
      $id = $request->id;
      $buscarRegistro = Product::find($id);
      $buscarRegistro->delete();
      return response()->json(['success' => true]);
   } 

   public function cadastrarProduto(FormRequestProduct $request){
      if ($request->method() == "POST"){
         // Criar  Produto
         $data = $request->all();
         Product::create($data);

         return redirect()->route('produto.index');
      }

      return view('pages.products.create');
   }
}
