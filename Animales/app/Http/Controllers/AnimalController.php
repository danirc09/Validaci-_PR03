<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animales=DB::table('tbl_animales')->join('tbl_chip','tbl_animales.id','=','tbl_chip.id_animal')->select('*')->get();
        return view('index', compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }

    public function crearAnimal(){
        return view('crearAnimal');
    }

    public function crearAnimalPost(Request $request){
        $datos = $request->except('_token');
        $request->validate([
            'nombre_animal'=>'required|string|max:45',
            'peso_animal'=>'required|string|max:45',
            'num_serie'=>'required|string|max:4|min:4',
        ]);

        try{
            DB::beginTransaction();
            DB::table('tbl_animales')->insert(["nombre_animal"=>$datos['nombre_animal'],"peso_animal"=>$datos['peso_animal']]);
            $id = DB::getPdo()->lastInsertId();
            DB::table('tbl_chip')->insert(["num_serie"=>$datos['num_serie'],"id_animal"=>$id]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('index');
    }

    public function eliminarAnimal($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_chip')->where('id_animal', '=', $id)->delete();
            DB::table('tbl_animales')->where('id', '=', $id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('index');
    }

    public function leercontroller(Request $request){
        $datos=DB::select('select * from tbl_animales
        INNER JOIN tbl_chip ON tbl_animales.id = tbl_chip.id_animal
        where nombre_animal like ?', ['%'.$request->input('filtrocontrolador').'%']);        
        return response()->json($datos);
    }

}
