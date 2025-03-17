<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommoditiesController extends Controller {
    protected $darkStat = 'https://apigateway.dd84ai.com';

    public function getCommodities(Request $request) {
        $response = $this->curlRequest($this->darkStat . '/statproto.Darkstat/GetCommodities', [
            'includeMarketGoods' => true,
            'filterToUseful' => true,
            'filterNicknames' => json_decode($request->getContent()),
        ]);
        return response()->json(json_decode($response));
    }
}
