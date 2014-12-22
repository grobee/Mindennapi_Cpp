<?php

class Statistics {
    private $sql;
    private $data;
    private $correct_count;
    private $incorrect_count;
    private $total_count;
    private $query;

    public function __construct(mysqli $sqlcon, $bottom = null, $number = null){
        $this->sql = $sqlcon;
        $this->data = new ArrayObject();

        $this->bottom = $bottom;
        $this->number = $number;

        $this->query = "SELECT q.number AS 'number', q.id_question AS 'id_question', a.correct AS 'correct', a.date AS 'date', CONCAT(m.forename, ' ', m.surname) AS 'name',
            q.question AS 'question', q.difficulty AS 'difficulty' FROM answers a INNER JOIN members m ON a.id_member = m.id_member
            INNER JOIN questions q ON a.id_question = q.id_question ORDER BY a.date DESC";

        if($this->bottom != null && $this->number != null) $this->query .= " LIMIT $this->bottom, $this->number";

        $this->generateFullList();
        $this->countCorrect();
    }

    public function getCorrectPercentage() { return $this->total_count == 0 ? 0 : number_format(($this->correct_count / $this->total_count) * 100, 2); }
    public function getIncorrectPrecentage() { return $this->total_count == 0 ? 0 : number_format(($this->incorrect_count / $this->total_count) * 100, 2); }
    public function getFullList() { return $this->data; }
    public function getNumberOfRows() { return $this->sql->query($this->query)->num_rows; }

    public function getQuestionCorrectPercentage($id){
        $query = "SELECT id_question FROM answers WHERE id_question = $id";
        $totalC = $this->sql->query($query)->num_rows;

        $query = "SELECT id_question FROM answers WHERE correct = 1 AND id_question = $id";
        $correctC = $this->sql->query($query)->num_rows;

        if($totalC == 0) return 0;

        return number_format(($correctC / $totalC) * 100, 2);
    }

    public function getQuestionIncorrectPercentage($id){
        $query = "SELECT id_question FROM answers WHERE id_question = $id";
        $totalC = $this->sql->query($query)->num_rows;

        $query = "SELECT id_question FROM answers WHERE correct = 0 AND id_question = $id";
        $incorrectC = $this->sql->query($query)->num_rows;

        if($totalC == 0) return 0;

        return number_format(($incorrectC / $totalC) * 100, 2);
    }

    private function countCorrect(){
        foreach($this->data as $answer){
            $answer['correct'] == 1 ? $this->correct_count++ : $this->incorrect_count++;
            $this->total_count++;
        }
    }

    private function generateFullList(){
        $this->sql->query('SET NAMES utf8');
        $result = $this->sql->query($this->query);

        if($result->num_rows) while($value = $result->fetch_assoc()) $this->data->append($value);
    }
}
