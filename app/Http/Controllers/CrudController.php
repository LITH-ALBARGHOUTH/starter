<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function __construct()
    {

    }

    public function getoffers()
    {
        return Offer::select('id','name')->get();
    }

    // public function store()
    // {
    //     Offer::create([
    //         'name' => 'offer2',
    //         'price' => 10,
    //         'details' => 'offer2 details',
    //     ]);
    // }

    public function create(){
        return view('offers.create');
    }

    public function store(Request $request){
        //validate data before insert to database


        $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];

        


           $message = [
            'name.required' => __('messages.offer_name_require'),
            'name.max' => 'name must be less than 100 characters',
            'name.unique' => __('messages.offer_name_must_be_unique'),
            'price.required' => 'price is required',
            'details.required' => 'details is required',
            ];

        

        $validator = Validator::make($request->all(),$rules,$message);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInputs($request->all());
            }

        Offer::create([
            
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return redirect()->back()->with(['success' => 'Saved Successfuly']);
    }
}
