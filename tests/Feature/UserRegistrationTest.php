<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test user registration form is accessible.
     *
     * @return void
     */
    public function test_registration_form_is_accessible()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    /**
     * Test user can register with valid information.
     *
     * @return void
     */
    public function test_user_can_register_with_valid_information()
    {
        Storage::fake('public'); // Fake the public disk for avatar uploads

        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123', // Use a strong password here
            'password_confirmation' => 'password123',
            'gender' => '1', // Example gender value
            'avatar' => UploadedFile::fake()->image('avatar.jpg'), // Example avatar upload
        ];

        $response = $this->post(route('register'), $user);

        $response->assertRedirect(route('front.user.dashboard'));
        $this->assertDatabaseHas('users', ['email' => $user['email']]);
    }

    /**
     * Test user registration with invalid information.
     *
     * @return void
     */
    public function test_user_registration_with_invalid_information()
    {
        $response = $this->post(route('register'), []);

        $response->assertSessionHasErrors(['name', 'email', 'password', 'gender', 'avatar']);
    }
}
