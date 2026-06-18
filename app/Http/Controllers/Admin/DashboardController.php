<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\HeroSlide;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'articleCount' => Article::query()->count(),
            'publishedArticleCount' => Article::query()->where('is_published', true)->count(),
            'heroSlideCount' => HeroSlide::query()->count(),
            'activeHeroSlideCount' => HeroSlide::query()->where('is_active', true)->count(),
        ]);
    }
}
