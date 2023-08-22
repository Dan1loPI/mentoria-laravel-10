<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Componentes;


class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
   {
      $this->cliente = $cliente;
   }

   public function index(Request $request)
   {
      $pesquisar = $request->pesquisar;
      $findProducts = $this->cliente->getProductPesquisarIndex(search: $pesquisar ?? '');
   
        return view('pages.clientes.paginacao', compact('findProducts'));
   }

   public function delete(Request $request)
   {
      $id = $request->id;
      $buscarRegistro = Cliente::find($id);
      $buscarRegistro->delete();
      return response()->json(['success' => true]);
   } 

   public function cadastrarCliente(Request $request){
      if ($request->method() == "POST"){
         // Criar  Produto
         $data = $request->all();
         $componentes = new Componentes();
         $data['valor'] = $componentes->formatacaoDinheiroDecimal($data['valor']);
         Cliente::create($data);

         Toastr::success('Gravado com sucesso');
         return redirect()->route('produto.index');
      }

      return view('pages.clientes.create');
   }

   public function atualizaCliente(Request $request, $id){
     
      if ($request->method() == "PUT"){
        // Atualiza Produto
        $data = $request->all();
        $componentes = new Componentes();
        $data['valor'] = $componentes->formatacaoDinheiroDecimal($data['valor']);
        
        $findRegistro = Cliente::find($id);

        $findRegistro->update($data);

        return redirect()->route('clientes.index');
      }

      $findProducts = Cliente::where('id', '=', $id)->first();

      return view('pages.clientes.atualiza', compact('findProducts'));
   }
}
