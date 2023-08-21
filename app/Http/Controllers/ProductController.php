<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormRequestProduct;
use App\Models\Componentes;
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
         $componentes = new Componentes();
         $data['valor'] = $componentes->formatacaoDinheiroDecimal($data['valor']);
         Product::create($data);

         return redirect()->route('produto.index');
      }

      return view('pages.products.create');
   }

   public function atualizaProduto(FormRequestProduct $request, $id){
     
      if ($request->method() == "PUT"){
        // Atualiza Produto
        $data = $request->all();
        $componentes = new Componentes();
        $data['valor'] = $componentes->formatacaoDinheiroDecimal($data['valor']);
        
        $findRegistro = Product::find($id);

        $findRegistro->update($data);

        return redirect()->route('produto.index');
      }

      $findProducts = Product::where('id', '=', $id)->first();

      return view('pages.products.atualiza', compact('findProducts'));
   }
}
