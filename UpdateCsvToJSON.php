<?php

namespace App\Http\Controllers;


use App\Models\IblceOutline;
use Illuminate\Support\Str;

class DevTestingController extends Controller
{
    public function __invoke()
    {
        IblceOutline::whereNotNull('courses')->chunk(100, function ($outlines) {
            foreach ($outlines as $outline) {
                $codes = collect(explode(',', $outline->courses))
                    ->map(fn($code) => trim($code))
                    ->filter() // remove empty entries
                    ->values()
                    ->all();

                $outline->course_codes = $codes;
                $outline->save();
            }
        });
        return view('dev');
    }
}
