@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
  <form action="" method="get">
    <input type="text" name="pesquisar" placeholder="Digite o nome">
    <button>Pesquisar</button>
    <a href="" type="button" class="btn btn-success float-end"> Adicionar Produto</a>
  </form>
      <div class="table-responsive small mt-4">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findProducts as $product )
              <tr>
                <td>{{ $product->nome }}</td>
                <td>{{ $product->valor }}</td>
                <td></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection