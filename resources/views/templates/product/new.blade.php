@extends('layout.master')
@section('contenu')
<main class="container">
    <div class="bg-light p-5 rounded">
        <div class="col-xl-6 col-md-8 d-flex flex-column mx-auto">
            <div class="text-center mb-3">
                <h3 style="font-weight: bold">Ajouter un nouveau produit</h3>
            </div>
            <form action="{{route('product.store')}}" method="POST">
                @csrf
                <div class=" mt-2 mb-3">
                  <label for="exampleInputEmail1" class="form-label" style="font-weight: bold" >Nom du Produit</label>
                  <span style="font-weight: bold; color:red">*</span>
                  <input type="text" class="form-control" name="name"  placeholder="Entrer le Nom du Produit" required>
                 
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label" style="font-weight: bold">Prix du Produit</label>
                  <span style="font-weight: bold; color:red">*</span>
                  <input type="number" class="form-control" name="priceHt" placeholder="Entrer le Prix du Produit" required>
                </div>
                
               
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </form>
        </div>
       
    </div>
</main>
@endsection