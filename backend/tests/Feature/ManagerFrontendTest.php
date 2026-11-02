<?php

namespace Tests\Feature;

use Illuminate\Database\Events\ConnectionEstablished;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ManagerFrontendTest extends TestCase
{
    public static function screens(): array
    {
        $screens = require __DIR__.'/../../config/manager.php';
        return array_map(fn ($screen) => [$screen['path']], $screens);
    }

    #[DataProvider('screens')]
    public function test_screens_render_without_database_connections(string $path): void
    {
        $this->app['events']->listen(ConnectionEstablished::class, function () {
            $this->fail('The frontend demo must not connect to a database.');
        });

        $response = $this->get($path)->assertOk()
            ->assertSee('demo-config')
            ->assertSee('demo-app.js')
            ->assertDontSee('cdn.tailwindcss.com');
        $html = $response->getContent();
        $this->assertSame(1, substr_count($html, 'class="manager-sidebar"'));
        $this->assertSame(1, substr_count($html, 'class="manager-header"'));
        $this->assertSame(1, substr_count($html, '<main '));
    }

    public function test_demo_has_no_write_endpoints(): void
    {
        foreach ($this->app['router']->getRoutes() as $route) {
            if (str_starts_with($route->getName() ?? '', 'manager.')) {
                $this->assertSame(['GET', 'HEAD'], $route->methods());
            }
        }
    }

    public function test_review_does_not_claim_a_property_was_saved(): void
    {
        $this->get(route('manager.add-property-6'))
            ->assertOk()->assertSee('No real transactions')
            ->assertDontSee('has been added to your property portfolio');
    }
}
