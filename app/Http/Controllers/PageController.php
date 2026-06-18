<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('welcome');
    }

    public function about(): View
    {
        return view('about');
    }

    public function article(string $slug): View
    {
        $article = Article::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    public function solution(string $slug): View
    {
        $solution = config("kiasolar.solutions.$slug");

        abort_unless($solution, 404);

        return view('solutions.show', [
            'slug' => $slug,
            'solution' => $solution,
        ]);
    }

    public function sitemap(): Response
    {
        $urls = collect([
            url('/'),
            url('/about'),
        ])->merge(
            Schema::hasTable('articles')
                ? Article::query()
                    ->published()
                    ->pluck('slug')
                    ->map(fn ($slug) => url('/artikel/' . $slug))
                : collect()
        )->merge(
            collect(array_keys(config('kiasolar.solutions')))
                ->map(fn ($slug) => url('/layanan/' . $slug))
        );

        $xml = view('sitemap', ['urls' => $urls])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
