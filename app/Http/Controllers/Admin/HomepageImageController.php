<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\SiteSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HomepageImageController extends Controller
{
    public function edit(): View
    {
        $images = collect(config('homepage_media.images'))
            ->map(function (array $definition, string $key): array {
                $storedValue = SiteSettings::get($key);
                $defaultUrl = str_starts_with($definition['default'], 'http')
                    ? $definition['default']
                    : asset($definition['default']);

                return [
                    ...$definition,
                    'key' => $key,
                    'stored_value' => $storedValue,
                    'url' => SiteSettings::mediaUrl($storedValue, $defaultUrl),
                    'custom_url' => str_starts_with((string) $storedValue, 'http') ? $storedValue : null,
                    'is_custom' => filled($storedValue),
                ];
            })
            ->groupBy('group');

        return view('admin.homepage-images.edit', compact('images'));
    }

    public function update(Request $request): RedirectResponse
    {
        $keys = array_keys(config('homepage_media.images'));

        $data = $request->validate([
            'key' => ['required', 'string', Rule::in($keys)],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:6144'],
            'image_url' => ['nullable', 'url:http,https', 'max:1500'],
            'remove' => ['nullable', 'boolean'],
        ]);

        $key = $data['key'];
        $currentValue = SiteSettings::get($key);

        if ($request->boolean('remove')) {
            $this->deleteStoredFile($currentValue);
            SiteSettings::putMany([$key => null]);

            return back()->with('status', 'Gambar dikembalikan ke bawaan website.');
        }

        if ($request->hasFile('image')) {
            $this->deleteStoredFile($currentValue);
            $path = $request->file('image')->store('homepage-images', 'public');
            SiteSettings::putMany([$key => $path]);

            return back()->with('status', 'Gambar homepage berhasil diperbarui.');
        }

        if (filled($data['image_url'] ?? null)) {
            $this->deleteStoredFile($currentValue);
            SiteSettings::putMany([$key => $data['image_url']]);

            return back()->with('status', 'URL gambar homepage berhasil diperbarui.');
        }

        return back()->with('status', 'Tidak ada perubahan gambar yang dipilih.');
    }

    private function deleteStoredFile(?string $value): void
    {
        if (blank($value) || str_starts_with($value, 'http')) {
            return;
        }

        Storage::disk('public')->delete($value);
    }
}
