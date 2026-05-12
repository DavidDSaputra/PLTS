<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/layanan/{slug}', function (string $slug) {
    $solution = config("kiasolar.solutions.$slug");

    abort_unless($solution, 404);

    return view('solutions.show', [
        'slug' => $slug,
        'solution' => $solution,
    ]);
});

Route::get('/sitemap.xml', function () {
    $urls = collect([
        url('/'),
        url('/about'),
    ])->merge(
        collect(array_keys(config('kiasolar.solutions')))
            ->map(fn ($slug) => url('/layanan/' . $slug))
    );

    $xml = view('sitemap', ['urls' => $urls])->render();

    return response($xml, 200)->header('Content-Type', 'application/xml');
});
