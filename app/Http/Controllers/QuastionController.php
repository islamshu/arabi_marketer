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
        Alert::success('Success', 'تم اضافة السؤال بنجاح');

        return redirect()->route('quastions.index');
    }
    public function edit($id){
        return view('pages.question.edit')->with('question',Quastion::find($id));
    }
    public function update(Request $request,$id)
    {

        $request->validate([
            'title' => 'required',
            'type_answer' => 'required',
        ]);
        $question = Quastion::find($id);
        $question->title = $request->title;
        $question->type = $request->type_answer;
        $question->save();
        if (is_array($request->addmore) || is_object($request->addmore)) {

            if($question->answers->count() != 0){
                foreach($question->answers as $ff){
                    $ff->delete();
                }
            }
            foreach ($request->addmore as $key => $value) {
                $blog = Answer::create([
                    'quastion_id'    => $question->id,
                    'title' => $value['answer'],
                ]);
            }
        }
        Alert::success('Success', 'تم تعديل السؤال بنجاح');

        return redirect()->route('quastions.index');
    }
    public function destroy($id){
        Quastion::find($id)->delete();
        Alert::success('Success', 'تم حذف السؤال بنجاح');

        return redirect()->route('quastions.index');
    }
}
