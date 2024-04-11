<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //

    public function index()
    {
        try
        {
            
            $product = Product::paginate(10);
                return view('templates.product.index', compact('product'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $error= "Une erreur inattendue s'est produite." ;
            \Log::error($ex->getMessage());
            return back()->with('error', $error)->withInput();
        }
    }

    public function new(){
        return view('templates.product.new');
    }



    public function store(Request $request)
{
    try {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'priceHt' => 'required|numeric',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errorMessages = '';
            foreach ($errors->all() as $message) {
                $errorMessages .= $message . '<br>';
            }

            return back()->withInput()->with('error', $errorMessages);
        }

        // Définir la date de création
        $request->merge(['creationDate' => now()]);
        
        // Créer le produit
        $product = Product::create($request->all());

        return redirect()->route('product.index')->with('message', 'Produit ajouté avec succès');

    } catch (\Illuminate\Database\QueryException $ex) {
        dd($ex);
        return back()->withInput()->with('error', 'Une erreur est survenue lors de l\'enregistrement');
    }
}



    public function edit($id)
    {
        try{
       $product = Product::find($id);
        return view('templates.product.edit', compact('product'));
    }
        catch(\Illuminate\Database\QueryException $ex){
        
            $error= "Une erreur inattendue s'est produite." ;
            \Log::error($ex->getMessage());
            return back()->with('error', $error);
        }
    }




    public function update(Request $request, $id)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'priceHt' => 'required|numeric',
            ]);
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errorMessages = '';
                foreach ($errors->all() as $message) {
                    $errorMessages .= $message . '<br>';
                }
    
                return back()->withInput()->with('error', $errorMessages);
            }
    
            $product = Product::findOrFail($id);
            $product->fill($request->all());
    
            // Mettre à jour la date de modification
            $product->dateUpdate = now();
    
            $product->save();
    
            return redirect()->route('product.index')->with('message', 'Produit modifié avec succès');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de l\'enregistrement');
        }
    }


    public function destroy(string $id)
    {
        try
        {
            $product = Product::find($id);
           
            $product->delete();
            return redirect()->route('product.index')->with('message', 'Produit supprimé avec succès');
           
        } catch(\Illuminate\Database\QueryException $ex){
            return back()->withInput()->with('error', 'Une erreur est survenue lors de l\'enregistrement');
        }
    }

    
    
}