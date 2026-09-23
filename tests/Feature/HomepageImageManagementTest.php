<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HomepageImageManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_manage_homepage_images_from_the_cms(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->get(route('admin.homepage-images.edit'))
            ->assertOk()
            ->assertSee('Semua gambar homepage dalam satu tempat')
            ->assertSee('Tentang kami — gambar kiri');

        $this->actingAs($admin)
            ->put(route('admin.homepage-images.update'), [
                'key' => 'home_about_image_left',
                'image' => UploadedFile::fake()->image('tentang-kami.jpg', 1200, 900),
            ])
            ->assertRedirect();

        $path = SiteSetting::query()->where('key', 'home_about_image_left')->value('value');

        $this->assertNotNull($path);
        Storage::disk('public')->assertExists($path);

        $this->get('/')
            ->assertOk()
            ->assertSee(Storage::url($path), false);

        $this->actingAs($admin)
            ->put(route('admin.homepage-images.update'), [
                'key' => 'home_about_image_left',
                'remove' => '1',
            ])
            ->assertRedirect();

        Storage::disk('public')->assertMissing($path);
        $this->assertDatabaseHas('site_settings', [
            'key' => 'home_about_image_left',
            'value' => null,
        ]);
    }

    public function test_non_admin_cannot_open_homepage_image_manager(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get(route('admin.homepage-images.edit'))
            ->assertForbidden();
    }
}
