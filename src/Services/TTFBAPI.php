<?php

namespace Quarterloop\TTFBTile\Services;

use Illuminate\Support\Facades\Http;

class TTFBAPI
{
  public static function getUptime(string $url, string $key): array
  {

      $response = Http::withHeaders([
        'x-api-key' => $key,
      ])->post('https://api.geekflare.com/ttfb', [
        'url' => $url,
        'locations' => [ "uk", "us", "sg" ],
      ])->json();

      return $response;
  }
}
