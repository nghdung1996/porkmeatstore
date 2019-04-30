<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function new(){
        return view('feedback.formfeedback');
    }

    public function createfeedback(Request $request)
    {
        $feedback = new Feedback;
        $this->validate($request,
            [
                'name' => 'required',
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên của bạn',
                'title.required' => 'Vui lòng nhập tiêu đề góp ý',
                'content.required' => 'Vui lòng nhập nội dung góp ý'
            ]
        );
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->phone = $request->phone;
        $feedback->address = $request->address;
        $feedback->title = $request->title;
        $feedback->content = $request->content;

        $feedback->save();
        return redirect('home')->with('success', 'Cảm ơn bạn đã góp ý');
    }

}
