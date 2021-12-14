<?php

namespace App\Http\ViewComposers;

use App\Theme;
use Illuminate\Contracts\View\View;

class AppComposer {

    protected $themes;

    public function __construct(Theme $themes)
    {
        $this->themes = $themes::all();
    }

    public function compose(View $view)
    {
        $themeId = request()->cookie('themeId');
        $view->with('themes', $this->themes)->with('themeId', $themeId);
    }

}
