<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AuthenticationPageRoutesTest extends TestCase
{
    public function test_login_and_registration_paths_are_registered_as_web_pages(): void
    {
        foreach (['/login', '/register'] as $path) {
            $matched = Route::getRoutes()->match(Request::create($path, 'GET'));

            $this->assertInstanceOf(RoutingRoute::class, $matched);
            $this->assertSame(ltrim($path, '/'), $matched->uri());
            $this->assertContains('GET', $matched->methods());
        }
    }
}
