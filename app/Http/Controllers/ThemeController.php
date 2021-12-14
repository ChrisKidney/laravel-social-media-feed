<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('set');
        $this->middleware('isthememanager')->except('set');
    }

    public function index()
    {
        $themes = Theme::all();

        return view('theme.index', compact(['themes']));
    }

    public function create()
    {
        return view('theme.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'cdn_url' => 'required|active_url',
        ]);

        $theme = Theme::create([
            'name' => $data['name'],
            'cdn_url' => $data['cdn_url'],
            'created_by' => Auth::id()
        ]);

        return redirect('/themes')->with('status', 'Theme Created')->with('status_type', 'success');
    }


    public function show(Theme $theme)
    {
        return view('theme.show', compact(['theme']));
    }

    public function edit(Theme $theme)
    {
        return view('theme.edit', compact(['theme']));
    }

    public function update(Theme $theme)
    {
        $data = request()->validate([
            'name' => 'required',
            'cdn_url' => 'required|active_url',
        ]);

        $theme->update([
            'name' => $data['name'],
            'cdn_url' => $data['cdn_url'],
            'updated_by' =>  Auth::id()]
        );

        return redirect('/themes/'.$theme->id)->with('status', 'Theme Edited')->with('status_type', 'success');
    }

    public function destroy(Theme $theme)
    {
        $theme->update(['deleted_by' => Auth::id()]);
        $theme->delete();

        return redirect('/themes')->with('status', 'Theme Deleted')->with('status_type', 'danger');
    }

    public function set()
    {
        $id = request()->get('themeSelect');

        $cookie = cookie('themeId', $id);

        return redirect()->back()->withCookie($cookie);
    }
}
