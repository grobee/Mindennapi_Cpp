<?php

namespace Robert;
use mysqli;
use Question;

require_once("Question.php");

/**
 * Class QuestionList
 * @package Robert
 * @author Gulyás Róbert
 * @version 0.2
 */
class QuestionList {
    /** Question array */
    private $questions;
    private $sql;

    /* constructor, initialize variables */
    public function __construct(mysqli $sql){
        $this->questions = array();
        $this->sql = $sql;
    }

    /* Populate the list of questions */
    public function populate(){
        /* query the db */
        $this->sql->query("SET NAMES utf8;");
        $result = $this->sql->query("SELECT * FROM questions;");

        /* array of question attributes from the database */
        /* iterator */
        $i = 0;

        while($row = $result->fetch_assoc()){
            $this->questions[$i] = new Question($row['id_question'], $row['question'], $row['answer_1'], $row['answer_2'], $row['answer_3'], $row['answer_4'], $row['correct_answer']);
            $i++;
        }
    }

    /* get the questions */
    public function getQuestions(){
        return $this->questions;
    }
}
