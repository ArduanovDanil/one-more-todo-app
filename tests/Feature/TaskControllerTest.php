<?php

namespace Tests\Feature;

use Database\Factories\TaskFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $task = Task::factory()->raw();

        // $response = $this->postJson('/api/v1/tasks', [
        //     'title' => 'Test title 22',
        //     'description' => 'Test description',
        //     'status' => 'Test status',
        // ]);

        $response = $this->postJson('/api/v1/tasks', $task);

        $response->assertStatus(201);

    }

}
