<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\ScreenController;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

// Stateless presentation routes: the frontend demo never opens a database session.
// The original root dashboard route is preserved in tools/ui/backups/web.php.original.
Route::withoutMiddleware([StartSession::class, ShareErrorsFromSession::class, ValidateCsrfToken::class])->group(function () {
    foreach (config('manager') as $screen => $definition) {
        Route::get($definition['path'], [ScreenController::class, 'show'])
            ->defaults('screen', $screen)
            ->name('manager.'.$screen);
        Route::get('/designs'.($definition['path'] === '/' ? '/dashboard' : $definition['path']), [ScreenController::class, 'design'])
            ->defaults('screen', $screen)->name('design.'.$screen);
    }
    foreach (config('demo') as $screen => $definition) {
        Route::get($definition[0], [ScreenController::class, 'demo'])
            ->defaults('screen', $screen)->name('demo.'.$screen);
    }
});
