<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('quizz', compact('questions'));
    }




    public function create(){

        return view('create');
    }

    public function save(QuestionRequest $request){
        $question =  $request->input('question');
        $answer1 = $request->input('answer1');
        $answer2 = $request->input('answer2');
        $answer3 = $request->input('answer3');
        $answer4 = $request->input('answer4');

        $answer1_true=count($answer1)===2;
        $answer2_true=count($answer2)===2;
        $answer3_true=count($answer2)===2;
        $answer4_true=count($answer2)===2;


        $question_rec = new Question(['question'=>$question]);
        $question_rec -> save();
        $answer1_rec=new Answer(['answer'=>$answer1[0],'is_true'=>$answer1_true,'question_id'=>$question_rec->id]);
        $answer1_rec->save();
        $answer2_rec=new Answer(['answer'=>$answer2[0],'is_true'=>$answer2_true,'question_id'=>$question_rec->id]);
        $answer2_rec->save();
        $answer3_rec=new Answer(['answer'=>$answer3[0],'is_true'=>$answer3_true,'question_id'=>$question_rec->id]);
        $answer3_rec->save();
        $answer4_rec=new Answer(['answer'=>$answer4[0],'is_true'=>$answer4_true,'question_id'=>$question_rec->id]);
        $answer4_rec->save();


        return $this->index();

    }



    public function results(Request $request){
        $corr=0;
        $ans=0;

        return view('results')->with('corr',$corr)->with('ans',$ans);
    }

    public function append(Request $request){
        $answers = $request->all();
        $correct_ans = 1;
        $all_ans = count($answers);
        $counter=1;

        foreach($answers as $answ){

            $ans = Answer::findOrFail((int)$answ);
            $counter=$counter+1;



            if (($ans->is_true) == 0){

                $correct_ans=$correct_ans+1;
                }
            if($counter == $all_ans){


                return redirect()->route('results')->with('corr',$correct_ans)->with('ans',$all_ans);


            }


        }


    }


}
