@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
  <form action="" method="get">
    <input type="text" name="pesquisar" placeholder="Digite o nome">
    <button>Pesquisar</button>
    <a href=" {{ route('cadastrar.produto')}}" type="button" class="btn btn-success float-end"> Adicionar Produto</a>
  </form>
      <div class="table-responsive small mt-4">
        @if ($findProducts->isEmpty())
          <p>Não existe dados</p>
        @else
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
                  <td>{{ 'R$' . ' ' . number_format($product->valor, 2, ',', '.')}}</td>
                  <td>
                    <a href="{{ route('atualizar.produto', $product->id )}}" class="btn btn-light btn-sm">Editar</a>
                    <meta name='csrf-token' content="{{ csrf_token() }}"/>
                    <a onclick="deleteRegistroPaginacao('{{ route('produto.delete')}}', {{ $product->id }})" class="btn btn-danger btn-sm">Excluir</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
@endsection