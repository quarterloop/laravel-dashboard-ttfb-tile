<?php

namespace Quarterloop\TTFBTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\TTFBTile\Commands\FetchTTFBCommand;

class TTFBTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchTTFBCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-ttfb-tile'),
        ], 'dashboard-ttfb-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-ttfb-tile');

        Livewire::component('ttfb-tile', TTFBTileComponent::class);
    }
}
