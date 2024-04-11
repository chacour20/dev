@extends('layout.master')
@section('contenu')
<main class="container">
    <div class="bg-light p-5 rounded">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('product.new')}}">Enregister un produit</a>
        </div>

        <div class="text-center mb-3">
          <h3>Liste des produits</h3>
        </div>
        <table class="table table-hover mt-3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du Produit</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($product as $index)
            
              <tr>
                <th scope="row">
                    {{  $loop->index + 1 }}
                </th>
                <td>{{$index->name}}</td>
                <td>{{$index->priceHt}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('product.edit',$index->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{route('product.delete',$index->id)}}">Supprimer</a>
                </td>
              </tr>
                 
            @endforeach
            </tbody>
            {{$product->links()}}
          </table>
    </div>
</main>
@endsection