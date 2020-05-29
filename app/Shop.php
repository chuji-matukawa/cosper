<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    private static $apiKey = "e242f266605eeee7";
    private static $baseUrl = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    
    
    public static function getShopByApiShopId($apiShopId)
    {
        // api_shop_idで既に保存済みの場合は、DBからデータを取得
        $shop = self::where('api_shop_id', $apiShopId)->first();
        
        if($shop){
            return $shop;
        }

        // API パラメーター準備
        $params = [
            'format' => 'json',
            'key'    => "e242f266605eeee7",//self::apikeyで呼び出せなっかた。 
            'id'     => $apiShopId,
        ];
        
        // APIアクセス
        $query = http_build_query($params, "", "&");
        $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/' . '?' . $query;//
        $response_json = file_get_contents($url);
        $response = json_decode($response_json);
            
        // 新規作成
        $shop = new Shop;
        $shop->api_shop_id = $response->results->shop[0]->id;
        $shop->name = $response->results->shop[0]->name;
        $shop->photo = $response->results->shop[0]->photo->pc->l;
        $shop->genre = $response->results->shop[0]->genre->name;
        $shop->genre_catch = $response->results->shop[0]->genre->catch;
        $shop->open = $response->results->shop[0]->open;
        $shop->close = $response->results->shop[0]->close;
        $shop->address = $response->results->shop[0]->address;
        $shop->budget = $response->results->shop[0]->budget->name;
        

            
        $shop->save();
        
        return $shop;
        
    } 
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
