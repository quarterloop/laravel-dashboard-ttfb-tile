<?php

namespace Quarterloop\TTFBTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\TTFBTile\Services\TTFBAPI;
use Quarterloop\TTFBTile\TTFBStore;

class FetchTTFBCommand extends Command
{
    protected $signature = 'dashboard:fetch-ttfb-data';

    protected $description = 'Fetch total time first byte';

    public function handle(TTFBAPI $ttfb_api)
    {

        $this->info('Fetching total time first byte ...');

        $ttfb = $ttfb_api::getUptime(
            config('dashboard.tiles.hosting.url'),
            config('dashboard.tiles.uptime.key'),
        );

        TTFBStore::make()->setData($ttfb);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
