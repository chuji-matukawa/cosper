<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopsController extends Controller
{
    private $apiKey = "e242f266605eeee7";
    
    public function index(Request $request)
    {
        $apiData = [];
        $keyword = $request->keyword;
        $areaCode = $request->areaCode;
        $genre = $request->genre;

        // APIリクエスト
        $shops = $this->searchShop($keyword, $areaCode, $genre);
        $areas = $this->searchArea();
        
        return view('shops.index', [
            'apiData' => $shops,
            'areas' => $areas->results->service_area,
            
            'keyword' => $keyword,
            'areaCode' => $areaCode,
            'genre' => $genre
        ]);
    }
    
    private function searchShop($keyword, $areaCode, $genre)
    {
        $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1';
        
        $params = [
            'format' => 'json',
            'key'    => $this->apiKey,
        ];
        
        // キーワード条件加
        
        
        
        // エリア検索追加
        if(!empty($areaCode)){
            $params['service_area'] = $areaCode;
        }else{
            $params['service_area'] = "SA11"; // 東京
        }
        
        // ジャンル検索追加
        
        
        
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query;
        $response_json = file_get_contents($search_url);
        $apiData = json_decode($response_json);  // JSONデータをオブジェクトにする             
        
        return $apiData;
    }
    
    private function searchArea()
    {
        $basUrl = 'http://webservice.recruit.co.jp/hotpepper/service_area/v1/';
        
        $params = [
            'format' => 'json',
            'key'    => $this->apiKey,
        ];
        
        $query = http_build_query($params, "", "&");
        $url = $basUrl . '?' . $query;
        $response_json = file_get_contents($url);
        
        $response = json_decode($response_json);
        
        return $response;
    }
}
