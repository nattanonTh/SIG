<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use ImageSeeder;
use Tests\TestCase;

class UploadImage extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function overviewPage()
    {
        $this->seed(ImageSeeder::class);
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('600,000 B');

    }

    /** @test */
    public function uploadImage(Type $var = null)
    {
        $this->seed(ImageSeeder::class);
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->json('POST', '/gallery/upload', [
            'file' => $file
        ]);
        // Assert the file was stored...
        Storage::disk('local')->assertExists('/uploads/' . $file->hashName());
        // remove file
        Storage::disk('local')->delete('/uploads/' . $file->hashName());

    }
}
