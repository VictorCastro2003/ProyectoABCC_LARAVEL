<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Alumno extends Model{
        use HasFactory;

     protected $fillable = [
    'numControl',
    'nombre',
    'primerAp',
    'segundoAp',
    'fechaNac',
    'semestre',
    'carrera'
];
        public $timestamps = false;
    
    }

?>
