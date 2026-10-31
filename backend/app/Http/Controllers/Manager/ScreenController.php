<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ScreenController extends Controller
{
    public function show(string $screen): View
    {
        $screens = config('manager');
        abort_unless(isset($screens[$screen]), 404);

        return view('manager.'.$screen, [
            'screen' => $screen,
            'title' => $screens[$screen]['title'],
            'screens' => $screens,
            'step' => str_starts_with($screen, 'add-property-') ? (int) substr($screen, -1) : null,
            'rtl' => $screen === 'dashboard-ar',
        ]);
    }
}
