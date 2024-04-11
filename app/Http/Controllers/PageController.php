<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ReviewsModel;

class PageController extends Controller
{
    public function welcome()
    {
        return view('Welcome');
    }
    public function about()
    {
        return view('about');
    }
    public function reviews()
    {
        $reviews = new ReviewsModel();

        $reviews = $reviews->orderBy('name')->paginate(6);
        return view('reviews', ['reviews' => $reviews]);
    }

    public function reviews_check(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required | min:3',
            'message' => 'required | min:10',
        ]);

        $review = new ReviewsModel();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('reviews')->with('success', 'Отзыв был успешно добавлен');
    }

    public function show_one_reviews($id)
    {
        $reviews = new ReviewsModel();
        return view('review', ['data' => $reviews->find($id)]);
    }
}
