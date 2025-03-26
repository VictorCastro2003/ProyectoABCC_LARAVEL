<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->date('Fecha_Nac')->nullable()->change();
        });
    }
    
    public function down(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->timestamp('Fecha_Nac')->nullable()->change();
        });
    }
    
};
