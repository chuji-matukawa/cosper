@extends('layouts.app')

@section('content')

    <!-- Hero Search Section Begin -->
    <div class="hero-search set-bg" data-setbg="img/search-bg.jpg">
        <div class="container">
            <div class="filter-table">
                <form action="/" method="GET" class="filter-search">
                    <input type="text" placeholder="駅名・店名" name="keyword" value="{{ $keyword }}">
                    <select id="category">
                        <option value="">カテゴリー</option>
                    </select>
                    <select id="tag" name="areaCode">
                        @foreach($areas as $area)
                            <option value="{{ $area->code }}" <?php echo ($areaCode == $area->code) ? "selected":""?>>
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
<!-- Hero Search Section End -->
 
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">
            @foreach($apiData->results->shop as $shop)
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="{{ route('shops.show', ['id' => $shop->id]) }}"><img class="photo" src="{{ $shop->photo->pc->l }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">{{ $shop->genre->name }}</div>
                            <a href="#">
                                <h4>{{ $shop->genre->catch }}</h4>
                            </a>
                            <p>{{ $shop->access }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            'use strict';
            
            let todo = ['デザイン','データ','勉強会申し込み'];
            
            for(let item of todo){
                const li = `<li>${id}</li>`;
                console.log(li);
            }
            
        </script>
    </section>

@endsection