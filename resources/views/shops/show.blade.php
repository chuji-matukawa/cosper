@extends('layouts.app')

@section('content')

 <!-- Single Recipe Section Begin -->
    
<div class="container">
  <div class="row">
    <aside class="col-sm-4">
      <div class="">
        <div>
          <p>{{ $shop->name }}</p>
        </div>
        <div>
          <img src="{{ $shop->photo }}" class="mr-3" alt="...">
        </div>
      </div>
    </aside>
  <div class="clo-sm-8">
  <table class="table table-borderless">
    <tbody>
      <tr>
        <th>店舗詳細</th>
      </tr>
      <tr>
          <th>ジャンル</th>
          <td>{{ $shop->genre }}</td>
      </tr>
      <tr>
          <th>PR</th>
          <td>{{ $shop->genre_catch }}</td>
      </tr>
      <tr>
          <th>営業時間</th>
          <td>{{ $shop->open }}</td>
      </tr>
      <tr>
          <th>定休日</th>
          <td>{{ $shop->close }}</td>
      </tr>
      <tr>
          <th>予算</th>
          <td>{{ $shop->budget }}</td>
      </tr>
      <tr>
          <th>住所</th>
          <td>{{ $shop->address }}</td>
      </tr>
    </tbody>
  </table>
  </div>
   
  <div>
    @if (count($reviews) > 0)
    <ul class="media-list">
    @foreach ($reviews as $review)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                    <p>口コミ投稿者の名前と投稿日時</p>
                </div>
                <div>
                    <p class="mb-0">reviewsのコンテンツ</p>
                </div>
                <!--
                <div>
                    @if (Auth::id() == $reviews->user_id)
                        <a href="reviewsController@delete">削除</a>
                    @endif
                </div>
                -->
            </div>
        </li>
    @endforeach
    </ul>
    @endif
  </div>
  <p>{!! link_to_route('shops.api_shop_id', 'クチコミを書く', ['id' => $shop->api_shop_id]) !!}</p>
  
</div>
   

@endsection

<!--
Shop {#210 ▼
  #connection: "mysql"
  #table: null
  #primaryKey: "id"
  #keyType: "int"
  +incrementing: true
  #with: []
  #withCount: []
  #perPage: 15
  +exists: true
  +wasRecentlyCreated: false
  #attributes: array:11 [▼
    "id" => 1
    "api_shop_id" => "J001193140"
    "name" => "貸切レストラン for ETERNITY フォーエタニティ"
    "genre" => "居酒屋"
    "genre_catch" => "【全席完全個室】4名様～280名様まで可◎"
    "open" => "月～日、祝日、祝前日: 09:00～23:30"
    "close" => "完全予約制　ご予約があればいつでもご利用いただけます。定休日はございません。"
    "address" => "東京都中央区銀座６‐２‐１　DAIWA銀座ビルＢ２"
    "budget" => "4001～5000円"
    "created_at" => "2020-02-28 15:25:56"
    "updated_at" => "2020-02-28 15:25:56"
  ]
  <div class="container">
    <div class="row">
        <div class="media col-sm-12">
          <img src="{{ $shop->photo }}" class="mr-3" alt="...">
          <div class="media-body">
            <h5 class="mt-0">{{$shop->name}}</h5>
            {{ $shop->genre_catch }}
          </div>
        </div>
    </div>
</div>