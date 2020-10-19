<?php

namespace Tests;

use App\BookingService;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();

        $this->withoutExceptionHandling();

    }

    protected function createService($args = [], $num = null)
    {
        // $title = $title ?? 'Business';
        // return BookingService::create(['service_name' => $title]);

        return factory(BookingService::class, $num)->create($args);
    }
}

