<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    function create(Request $request){
        $name=$request->name;
        $major=Major::create(['name'=>$name]);
        return response(['major'=>$major]);
    }
    function delete(Major $major){
        $status=$major->delete();
        return response(['status'=>$status]);
    }
    function show(){
        $majors=Major::all();
        return response(['majors'=>$majors]);
    }
}
