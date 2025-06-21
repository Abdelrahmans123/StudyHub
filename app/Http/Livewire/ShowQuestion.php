<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use Livewire\Component;
use App\Models\Question;

class ShowQuestion extends Component
{
    public $quizId; 
    public $studentId;
    public $question;
    public $data;
    public $counter=0;
    public $questionCount=0;
    public $selectedAnswer;
    public function render()
    {
        $this->data=Question::where('quizId',$this->quizId)->get();
        $this->questionCount=$this->data->count();
        return view('livewire.show-question',['data']);
    }
    public function nextQuestion($questionId,$score,$answer,$rightAnswer){
        $studentDegree=Degree::where('studentId',$this->studentId)
        ->where('quizId',$this->quizId)
        ->first();
        if ($studentDegree == null) {
            $degree = new Degree();
            $degree->quizId = $this->quizId;
            $degree->studentId = $this->studentId;
            $degree->questionId = $questionId;
            if (strcmp(trim($answer), trim($rightAnswer)) === 0) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->date = date('Y-m-d');
            $degree->save();
        }else{
            if($studentDegree->questionId>=$this->data[$this->counter]->id){
                $studentDegree->score=0;
                $studentDegree->abuse='1';
                $studentDegree->save();
                return redirect()->route('student.exam.index')->with('error','The test was canceled to detect system tampering');
            }else{
                $studentDegree->questionId=$questionId;
                if (strcmp(trim($answer), trim($rightAnswer)) === 0) {
                    $studentDegree->score += $score;
                } else {
                    $studentDegree->score += 0;
                }
                $studentDegree->save();
            }
        }
        if($this->counter < $this->questionCount-1){
            $this->counter++;
        }else{
            return redirect()->route('student.exam.index')->with('success','The exam was completed successfully ');
        }
    }
}
