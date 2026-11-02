<?php
namespace Tests\Feature;

use Illuminate\Database\Events\ConnectionEstablished;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class DemoPagesTest extends TestCase
{
    public function test_seed_maps_remain_objects_in_the_browser_configuration(): void
    {
        $html = $this->get('/login')->assertOk()->getContent();
        preg_match('#<script id="demo-config" type="application/json">(.*?)</script>#s', $html, $match);
        $config = json_decode($match[1], false, 512, JSON_THROW_ON_ERROR);
        $this->assertIsObject($config->seed->draft);
        $this->assertIsObject($config->seed->global->currencies);
        $this->assertIsArray($config->seed->properties);
    }
    public static function pages(): array
    {
        return array_map(fn ($definition) => [$definition[0]], require __DIR__.'/../../config/demo.php');
    }

    #[DataProvider('pages')]
    public function test_role_and_account_pages_render_without_database(string $path): void
    {
        $this->app['events']->listen(ConnectionEstablished::class, fn () => $this->fail('Demo must not connect to MySQL.'));
        $this->get($path)->assertOk()->assertSee('demo-config')->assertSee('demo-app.js');
    }

    public function test_every_original_design_remains_accessible(): void
    {
        foreach (array_keys(config('manager')) as $screen) {
            $this->get(route('design.'.$screen))->assertOk()->assertSee('Changes are not saved');
        }
    }
}
