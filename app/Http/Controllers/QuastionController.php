<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Answer;
use App\Models\Quastion;
use Illuminate\Http\Request;

class QuastionController extends Controller
{
    public function index()
    {
        return view('pages.question.index')->with('questions', Quastion::orderby('id', 'desc')->get());
    }
    public function create()
    {
        return view('pages.question.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);
        $question = new Quastion();
        $question->title = $request->title;
        $question->type = $request->type;
        $question->save();
        if (is_array($request->addmore) || is_object($request->addmore)) {
            foreach ($request->addmore as $key => $value) {
                $blog = Answer::create([
                    'quastion_id'    => $question->id,
                    'title' => $value['answer'],
                ]);
            }
        }
        Alert::success('Success', 'Video Uploded successfully');

        return redirect()->route('quastions.index');
    }
}
