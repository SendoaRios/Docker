<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class hotelsController extends Controller
{
    public function show(){
        $hotels = Hotel::all();
        return view('index',['hotels'=>$hotels]);
    }


    public function update(Request $request, $id){ 
        $hotel=Hotel::all()->find($id);
        
        // if($request->input("titulo")!=""){
        //     $hotel->titulo = $request->input("titulo");
        // }
        if($request->input("estrellas")!=""){
            $hotel->estrellas = $request->input("estrellas");
        }
        if($request->file("imagen")!=null){
            $foto = $request->file('imagen');
            $nombreFoto = $foto->getClientOriginalName();
            $foto->move('imagenes/', $nombreFoto);
            $hotel->logo = $nombreFoto;
        }

        $hotel->save();
        return redirect()->back();
    }


    public function edit($id){
        $hotel = Hotel::all()->find($id);
        return view('editarhotel',['hotel'=>$hotel]);
    }

    public function delete($id){
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect()->back();
    }
}
