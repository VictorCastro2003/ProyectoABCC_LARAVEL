<?php

    namespace App\Http\Controllers;

    use App\Models\Alumno;
    use Illuminate\Http\Request;

    class AlumnoController extends Controller{

        //--------ALTAS----------------
        public function create(){
            return view('insertar');
        }

        public function store(Request $request){
         /*   $request->validate([
                'caja_num_control'=>'required',
                'caja_nombre'=>'required',
                'caja_primer_ap'=>'required',
            ]);*/

            Alumno::create($request->post());
            return redirect()->route('alumnos.index')->with('exito','Agregado Correctamente!!!!!');
        }

        //--------BAJAS----------------


        public function destroy(Alumno $alumno){
            $alumno->delete();
            return redirect()->route('alumnos.index')->with('exito','Eliminado Correctamente!!!!!');
        }

   //--------CAMBIOS----------------
   public function edit (Alumno $alumno){
    return view('alumno.editar', compact('alumno'));

   }

        public function update (Request $request, Alumno $alumno){
            $request->validate([
                'caja_num_control'=>'required',
                'caja_nombre'=>'required',
                'caja_primer_ap'=>'required',
            ]);

            $alumno->fill($request->post());
            $alumno->save();

            return redirect()->route('alumnos.index')->with('exito','Modificado Correctamente!!!!!');
        }


        //--------CONSULTAS----------------

        public function index(){
            $alumnos=Alumno::latest()->paginate(5);
            return view('index',compact('alumnos'));
        }
        
        public function show(Alumno $alumno){
            return view ('alumnos.mostrar',compact('alumno'));

        }
        
    }


?>