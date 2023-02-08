<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlateController extends Controller
{
    //
    public function index(){
        return view('plates.index', [
            'plates' => Plate::all()
        ]);
    }

    public function create(){
        return view('plates.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title'=>['required', Rule::unique('plates','title')],
            'category'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('img')){
            $formFields['img']= $request->file('img')->store('plates','public');
        }
        Plate::create($formFields);
        
        return redirect('/')->with('message', 'Plate created successfully');
    }

    public function edit(Plate $plate){
        return view('plates.edit', ['plate' => $plate]);
    }

    public function update(Request $request, Plate $plate){
        $formFields = $request->validate([
            'title'=>['required'],
            'category'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('img')){
            $formFields['img']= $request->file('img')->store('plates','public');
        }
        $plate->update($formFields);
        
        return redirect('/')->with('message', 'Plate updated successfully');
    }

    public function destroy(Plate $plate){
        $plate->delete();
        return redirect('/')->with('message', 'Plate deleted successfully');
    }
}
