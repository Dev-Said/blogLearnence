<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function changeLocale(string $locale)
    {
        if (! in_array($locale, ['en', 'fr'])) {
            abort(400);
        }
    
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
