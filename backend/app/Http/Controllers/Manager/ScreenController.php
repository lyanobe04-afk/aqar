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

        return $this->workspace($screen, $screens[$screen]['title']);
    }

    public function demo(string $screen): View
    {
        // Dotted role keys are literal inventory entries, not nested configuration.
        $definition = config('demo')[$screen] ?? null;
        abort_unless($definition, 404);
        return $this->workspace($screen, $definition[1]);
    }

    private function workspace(string $screen, string $title): View
    {
        $routes = [];
        foreach (config('manager') as $key => $definition) {
            $routes['manager.'.$key] = route('manager.'.$key);
        }
        foreach (config('demo') as $key => $definition) {
            $routes['demo.'.$key] = route('demo.'.$key);
        }
        return view('demo.workspace', [
            'screen' => $screen, 'title' => $title, 'routeMap' => $routes,
            'seed' => json_decode(file_get_contents(public_path('assets/aqar/demo-seed.json')), false, 512, JSON_THROW_ON_ERROR),
            'translations' => json_decode(file_get_contents(public_path('assets/aqar/demo-i18n.json')), true, 512, JSON_THROW_ON_ERROR),
            'screens' => config('manager'),
        ]);
    }

    public function design(string $screen): View
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
