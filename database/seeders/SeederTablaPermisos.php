<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Spatie

use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            //tabal roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabal pacientes
            'ver-paciente',
            'crear-paciente',
            'editar-paciente',
            'borrar-paciente',
            //tabal citas
            'ver-cita',
            'crear-cita',
            'editar-cita',
            'borrar-cita',
            //tabal fisioterapeutas
            'ver-fisioterapeuta',
            'crear-fisioterapeuta',
            'editar-fisioterapeuta',
            'borrar-fisioterapeuta',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
