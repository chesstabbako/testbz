<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{

    public function task_store()
    {

        $response = $this->post('/api/tasks', [
            "name" => "Book 5"
        ]);

        $response->assertJsonStructure(["name", "complete"])
            ->assertJson(["name" => "Book 5"])
            ->assertStatus(201);

        /* $this->assertDatabaseHas('tasks', ['name' => 'Book 5', "complete" => 0]); */
    }

    /**
     * @test
     */
    public function task_list()
    {

        $response = $this->get('/api/tasks');

        $response->assertJsonMissing(["data" => ["*" =>  ["name", "complete"]]])
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function task_update()
    {

        $task= Task::inRandomOrder()->first();

        $response = $this->put('/api/tasks'.$task->id, [
            "name" => "Book updated test"
        ]);

        $response->assertJsonStructure(["name", "complete"])
            ->assertJson(["name" => "Book updated test"])
            ->assertStatus(200);

        $this->assertDatabaseHas('tasks', ['name' => 'Book updated test', "complete" => 0]);
    }

    /**
     * @test
     */
    public function task_delete()
    {

        $task= Task::inRandomOrder()->first();

        $response = $this->delete('/api/tasks/'.$task->id);

        $response->assertStatus(204);

        $this->assertDatabaseHas('tasks', ['id' => $task->id]);
    }
}
