<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class habitacionesController extends Controller
{
    public function mostrarhabitaciones($id){
        $habitaciones = DB::table('habitaciones')
        ->where('hotel', '=', $id)
        ->get();
        return view('habitaciones',['habitaciones'=>$habitaciones,'idhotel'=>$id]);
    }

    public function eliminarhabitacion($id){
        $habitacion = Habitacion::find($id);
        $habitacion->delete();
        return redirect()->back();
    }

    public function crearhabitacion(Request $request, $id){ 
        $habitacion=Habitacion::all();

        $rules = [
			'nombre' => 'required|string|min:3|max:255',
            'estado' => 'required|string|min:3|max:255',
            'plazas' => 'required|string|min:3|max:255',
            'foto' => 'required|string|min:3|max:255',
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('')
			->withInput()
            ->withErrors($validator);
            
		}
		else{
            $data = $request->input();
			try{
				$habitacion = new Habitacion;
                $habitacion->nombre = $data['nombre'];
				$habitacion->estado = $data['estado'];
                $habitacion->plazas = $data['plazas'];
                $habitacion->hotel = $id;

                $foto = $request->file('foto');
                $nombreFoto = $foto->getClientOriginalName();
                $foto->move('imagenes/', $nombreFoto);
                $habitacion->foto = $nombreFoto;

				$habitacion->save();
				return redirect()->back();
			}
			catch(Exception $e){
				return redirect('habitaciones')->with('failed',"operation failed");
			}

        }

    }
}
