<?php

namespace RummelCeniza\LaravelTurbo;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class TurboServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'turbo');

        Request::macro('wantsTurboStream', function () {
            return Str::contains($this->headers->get('Accept'), Turbo::CONTENT_TYPE);
        });
    }
}
