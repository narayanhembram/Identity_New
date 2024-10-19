<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function list()
    {
        $pageTitle = 'Quiz';
        $quiz = Quiz::all();
        return view('admin.quiz.list', compact('pageTitle', 'quiz'));
    }
    public function Add()
    {
        $pageTitle = 'Add Quiz';
        return view('admin.Quiz.add', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $quiz = new Quiz();
        $quiz->question = $request->question;
        $quiz->option1 = $request->option1;
        $quiz->option2 = $request->option2;
        $quiz->option3 = $request->option3;
        $quiz->option4 = $request->option4;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();

        $notify[] = ['success', 'Plan has been created successfully'];
        return to_route('admin.quiz.list')->withNotify($notify);
    }

    public function edit($id){
        $pageTitle = 'Edit';
        $quiz = Quiz::findOrFail($id);

        return view('admin.Quiz.edit',compact('pageTitle','quiz'));
    }

    public function update(Request $request){
        $update = Quiz::findOrFail($request->id);
        $update->question = $request->question;
        $update->option1 = $request->option1;
        $update->option2 = $request->option2;
        $update->option3 = $request->option3;
        $update->option4 = $request->option4;
        $update->correct_answer = $request->correct_answer;
        $update->save();

        $notify[] = ['success', 'Question has been updated successfully'];
        return redirect()->route('admin.quiz.list')->withNotify($notify);
    }

    public function delete(Request $request){
        $quiz = Quiz::findOrFail($request->id);
        $quiz->delete();

        $notify[] = ['success', 'Question has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
