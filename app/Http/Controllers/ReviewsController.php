<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use \App\Shop;
use \App\Review;

class ReviewsController extends Controller
{
    public function index($shopId)
    {
        //dd($shopId);
        
        $reviews = Review::where('shop_id', $shopId )->first();
        
        return view('shops.reviews', [
            'shopId' => $shopId,
            'reviews' => $reviews
        ]);
           
           
    }
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $reviews = new Review;
        $reviews->user_id = \Auth::id();
        $reviews->shop_id = $request->id;
        $reviews->content = $request->content;
        $reviews->save();

        return back();
    }
    
    public function destroy($id)
    {
        $review = \App\Review::find($id);

        if (\Auth::id() === $review->user_id) {
            $review->delete();
        }

        return back();
    }
}
