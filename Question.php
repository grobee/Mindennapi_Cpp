<?php

/**
 * Class Question
 * @author Birkás Tamás
 * @author Gulyás Róbert
 * Date: 10/18/2014
 * Time: 7:29 PM
 */
class Question
{
    /* Question class which contains the data from the db for a later use */
    private $id;
    private $question;
    private $answer1;
    private $answer2;
    private $answer3;
    private $answer4;
    private $correctAnswer;

    /* constructor, create a question */
    public function __construct($id, $question, $ans1, $ans2, $ans3, $ans4, $correctAnswer)
    {
        /* question attributes */
        $this->id = $id;
        $this->question = $question;
        $this->answer1 = $ans1;
        $this->answer2 = $ans2;
        $this->answer3 = $ans3;
        $this->answer4 = $ans4;
        $this->correctAnswer = $correctAnswer;
    }

    /* get the question id */
    public function getId(){
        return $this->id;
    }

    /* get the given question's text */
    public function getQuestion(){
        return $this->question;
    }

    /* return the answer array */
    public function getAnswers(){
        return [$this->answer1, $this->answer2,  $this->answer3, $this->answer4];
    }

    /* get the correct answer */
    public function getCorrectAnswer(){
        return $this->correctAnswer;
    }
}
