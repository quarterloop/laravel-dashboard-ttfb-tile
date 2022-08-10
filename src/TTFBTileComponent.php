<?php

namespace Quarterloop\TTFBTile;

use Livewire\Component;
use Illuminate\Support\DB;

class TTFBTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

      $ttfbStore = TTFBStore::make();

        return view('dashboard-ttfb-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),
            'ttfb'           => $ttfbStore->getData(),
            'lastUpdateTime'  => date('H:i:s', strtotime($ttfbStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($ttfbStore->getLastUpdateDate())),
        ]);
    }
}
