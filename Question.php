<?php

class Question
{
    /* Question class which contains the data from the db for a later use */
    public $id;
    public $question;
    public $answer1;
    public $answer2;
    public $answer3;
    public $answer4;
    public $correctAnswer;
	public $difficulty;

    /* constructor, create a question */
    public function __construct($id = null, $question = null, $ans1 = null, $ans2 = null, $ans3 = null, $ans4 = null, $correctAnswer = null, $diff = null)
    {
        /* question attributes */
        $this->id = $id;
        $this->question = $question;
        $this->answer1 = $ans1;
        $this->answer2 = $ans2;
        $this->answer3 = $ans3;
        $this->answer4 = $ans4;
        $this->correctAnswer = $correctAnswer;
		$this->difficulty = $diff;
    }
}
