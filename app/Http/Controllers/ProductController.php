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
            
            $product = Product::latest()->paginate(10);
                return view('welcome', compact('product'))
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
        try
        {
            $validation=Validator::make($request->all(),[
            'name' => 'required|max:255',
            'priceHt' => 'required|numeric',
            ]);

           
            if($validation->fails())
            {
                $errors = $validation->errors();
                $errorMessages = '';
                foreach ($errors->all() as $message) {
                    $errorMessages .= $message . '<br>'; 
                }

                return back()->withInput()->with('error', $errorMessages);

            }

            $product = Product::create($request->all());
            
            return redirect()->route('product.index')->with('message', 'Produit ajouté avec succès');

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->withInput()->with('error', 'Une erreur est survenue lors de l\'enregistrement');

        }
       
    }

    
}