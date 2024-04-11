@extends('layout.master')
@section('contenu')
<main class="container">
    <div class="bg-light p-5 rounded">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('product.new')}}">Enregister un produit</a>
        </div>
        <table class="table">
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
                <th scope="row">1</th>
                <td>{{$index->name}}</td>
                <td>{{$index->priceHt}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('product.edit',$index->id)}}">Edit</a>
                    <a class="btn btn-danger" href="">Supprimer</a>
                </td>
              </tr>
                 
            @endforeach
            </tbody>
          </table>
    </div>
</main>
@endsection