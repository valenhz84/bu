<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
            'fullname' => 'Administrador de sistema',
            'shortname' => 'admin',
            'description' => 'Los superusuarios tienen todos los privilegios sobre el sistema',
            'level' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'fullname' => 'Jefe de área',
            'shortname' => 'visor',
            'description' => 'Los jefes de área pueden asignar tareas',
            'level' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'fullname' => 'Programador',
            'shortname' => 'programador',
            'description' => 'Los programadores pueden registrar tareas',
            'level' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'fullname' => 'Corrector de estilo',
            'shortname' => 'corrector',
            'description' => 'Los correctores de estilo pueden registrar tareas',
            'level' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'fullname' => 'Asesores pedagógicos',
            'shortname' => 'pedagogo',
            'description' => 'Los asesores pedagógicos pueden registrar tareas',
            'level' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'fullname' => 'Usuario invitado',
            'shortname' => 'invitado',
            'description' => 'Los invitados pueden registrar tareas',
            'level' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
        ]);
    }
}
