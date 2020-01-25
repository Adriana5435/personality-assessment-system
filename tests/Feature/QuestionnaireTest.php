<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionnaireTest extends TestCase
{
    use RefreshDatabase;
    //admin

    /** @test */
    public function a_user_can_add_a_questionnaire()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $user->admin = true;

        $response = $this->actingAs($user)
            ->post(route('questionnaire.store'), [
                'title' => 'Sample Questionnaire',
                'description' => 'This is a sample questionnaire description.',
                'price' => 1000,
            ]);

        $response->assertRedirect(route('questionnaire.index'));
        $this->assertDatabaseHas('questionnaires', [
            'title' => 'Sample Questionnaire',
            'description' => 'This is a sample questionnaire description.',
            'price' => 1000,
        ]);
    }
}
