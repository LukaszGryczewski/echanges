<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    public function setLocale($locale) {
        if (! in_array($locale, ['en', 'fr', 'nl'])) {
            $locale = 'fr';
        }
        App::setLocale($locale);
        session()->put('locale', $locale);
        return Redirect::back();
    }
}
