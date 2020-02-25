@extends('layouts.app')

@section('content')

<!-- Hero Search Section Begin -->
    <div class="hero-search set-bg" data-setbg="img/search-bg.jpg">
        <div class="container">
            <div class="filter-table">
                <form action="/" method="GET" class="filter-search">
                    <input type="text" placeholder="Keywords" name="keyword" value="{{ $keyword }}">
                    <select id="category">
                        <option value="">Category</option>
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


    <div class="container">
        
    @foreach($apiData->results->shop as $shop)

    <img class="mr-2" src="{{ $shop->photo->pc->l }}" alt="">
    
    @endforeach
        
    </div>

    @endsection