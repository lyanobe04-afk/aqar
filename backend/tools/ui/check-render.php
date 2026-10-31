<?php
// Read-only frontend check. No session middleware and no database queries permitted.
require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();
$app['events']->listen(Illuminate\Database\Events\ConnectionEstablished::class, function () {
    throw new RuntimeException('Frontend must not connect to a database.');
});
$keys = in_array('--core', $argv) ? ['dashboard', 'properties', 'bookings'] : array_keys(config('manager'));
foreach ($keys as $key) {
    $path = config('manager.'.$key.'.path');
    $request = Illuminate\Http\Request::create($path);
    $response = $kernel->handle($request);
    if ($response->getStatusCode() !== 200) {
        fwrite(STDERR, $key.': HTTP '.$response->getStatusCode().PHP_EOL);
        exit(1);
    }
    $html = $response->getContent();
    foreach (['class="manager-sidebar"', 'class="manager-header"', '<main '] as $marker) {
        if (substr_count($html, $marker) !== 1) throw new RuntimeException($key.': duplicate or missing shell '.$marker);
    }
    if (str_contains($html, 'cdn.tailwindcss.com') || str_contains($html, '{{')) throw new RuntimeException($key.': uncompiled content');
    echo $key.': HTTP 200, one shared shell'.PHP_EOL;
    $kernel->terminate($request, $response);
}
