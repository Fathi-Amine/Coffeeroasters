<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    //
    public function index(){
        return view('plates.index', [
            'plates' => Plate::all()
        ]);
    }
}
