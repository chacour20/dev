@extends('layout.master')
@section('contenu')
<main class="container">
    <div class="bg-light p-5 rounded">
        <div class="col-xl-6 col-md-8 d-flex flex-column mx-auto">
            <div class="text-center mb-3">
                <h3 style="font-weight: bold">Modifier le  produit</h3>
            </div>
            <form action="{{route('product.update',$product->id)}}" method="POST">
                @csrf
                <div class=" mt-2 mb-3">
                  <label for="exampleInputEmail1" class="form-label" style="font-weight: bold" >Nom du Produit</label>
                  <span style="font-weight: bold; color:red">*</span>
                  <input type="text" class="form-control" value="{{$product->name}}" name="name"  placeholder="Nom du Produit" required>
                 
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label" style="font-weight: bold">Prix du Produit</label>
                  <span style="font-weight: bold; color:red">*</span>
                  <input type="number" class="form-control" value="{{$product->priceHt}}" name="priceHt" placeholder="Prix du Produit" required>
                </div>
                
               
                <button type="submit" class="btn btn-primary">Modifier</button>
              </form>
        </div>
       
    </div>
</main>
@endsection