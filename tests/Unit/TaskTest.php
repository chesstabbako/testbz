<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{

    public function task_store(): void
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
    public function task_list(): void
    {

        $response = $this->get('/api/tasks');

        $response->assertJsonMissing(["data" => ["*" =>  ["name", "complete"]]])
            ->assertStatus(200);

    }

     /**
     * @test
     */
    public function task_update(): void
    {

        $response = $this->put('/api/tasks/2', [
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
    public function task_delete(): void
    {

        $response = $this->json('DELETE', '/api/tasks/2');

        $response->assertStatus(204);

        $this->assertDatabaseHas('tasks', ['id' => '2']);
    }
}
