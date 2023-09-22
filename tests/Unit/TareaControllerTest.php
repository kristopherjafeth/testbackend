<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tarea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Database\Factories\TareaFactory;

class TareaControllerTest extends TestCase
{

    public function testStore()
    {
        $data = [
            'descripcion' => 'Descripción',
            'nombre' => 'Nombre',
        ];

        $response = $this->post(route('tareas.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('tareas.index'));

        $this->assertDatabaseHas('tareas', $data);
    }

}
