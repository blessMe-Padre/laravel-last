<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewsModel;

class AdminReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = new ReviewsModel();
        $reviews = $reviews->all();
        return view('admin.admin-reviews', ['reviews' => $reviews]);
    }

    public function edit_review($id)
    {
        $reviews = new ReviewsModel();
        return view('admin.admin-review-edit', ['data' => $reviews->find($id)]);
    }


    public function edit_review_submit($id, Request $request)
    {
        $valid = $request->validate([
            'name' => 'required | min:3',
            'message' => 'required | min:10',
        ]);

        $review = ReviewsModel::find($id);
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('admin-reviews', $id);
    }

    public function delete_review($id)
    {
        ReviewsModel::find($id)->delete();
        return redirect()->route('admin-reviews');
    }
}
