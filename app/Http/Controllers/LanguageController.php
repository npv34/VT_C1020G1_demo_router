<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLocale(Request $request): \Illuminate\Http\RedirectResponse
    {
        session()->put('locale', $request->language);
        return back();
    }
}
