<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ReviewsModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check()) { // Проверяем, авторизован ли пользователь
            $review->user_id = Auth::id(); // Получаем ID пользователя и присваиваем его свойству user_id
        } else {
            $review->user_id = 666; // Получаем ID пользователя и присваиваем его свойству user_id
        }

        $review->save();

        return redirect()->route('reviews')->with('success', 'Отзыв был успешно добавлен');
    }

    public function show_one_reviews($id)
    {
        $reviews = new ReviewsModel();
        return view('review', ['data' => $reviews->find($id)]);
    }


    public function search(Request $request)
    {
        $searchValue = $request->input('s');
        $reviews = ReviewsModel::where('name', 'like', "%{$searchValue}%")
            ->orWhere('email', 'like', "%{$searchValue}%")
            ->orWhere('message', 'like', "%{$searchValue}%")
            ->paginate(6);

        return view('reviews', ['reviews' => $reviews]);
    }

    public function live_search()
    {
        $users = new User();
        $users = $users->all();
        return view('live-search', ['users' => $users]);
    }

    public function live_search_search(Request $request)
    {
        $searchValue = $request->input('s2');

        if ($searchValue) {
            $users = User::where('name', 'like', "%{$searchValue}%")->get();
        } else {
            $users = User::all();
        }

        return response()->json([
            'users' => $users
        ]);
    }
}

