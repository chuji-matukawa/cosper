@extends('layouts.app')

@section('content')

 <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--
                    <form action="#" class="contact-form">
                        <h3>クチコミを書いてお店を紹介しよう</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea placeholder="Comment"></textarea>
                            </div>
                        </div>
                        <button type="submit">追加する</button>
                    </form>
                    -->
                    {!! Form::open(['url' => route('reviews.store', ['id' => $shopId]), 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('Post', ['class' => 'btn']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <div>
    @if (isset($reviews))
    <ul class="media-list">
    @foreach ($reviews as $review)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', optional($reviews)->user_id, ['id' => optional($reviews)->user_id]) !!} <span class="text-muted">posted at {{ optional($reviews)->created_at }}</span>
                </div>
                </div>
                <div>
                    <p class="mb-0">{{ optional($reviews)->content }}</p>
                </div>
                
                <div>
                    <!--@if (Auth::id() == $reviews->user_id)-->
                    <!--    //ReviewsController@delete  レビューの削除-->
                    <!--@endif-->
                </div>
            </div>
        </li>
    @endforeach
    </ul>
    @endif
    </div>

@endsection