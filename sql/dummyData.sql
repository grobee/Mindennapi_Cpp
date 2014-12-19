USE mindenapicpp;

DROP PROCEDURE generateDummyQuestions;
DROP PROCEDURE generateDummyAnswers;

DELIMITER //
CREATE PROCEDURE generateDummyQuestions()
BEGIN
	DECLARE num_of_data INT DEFAULT 50;
    DECLARE counter INT DEFAULT 1;
    DECLARE var_diff VARCHAR(75) DEFAULT "közepes";
    
    WHILE counter <= num_of_data DO
		IF MOD(counter,2) = 0 THEN
			SET var_diff = "nehéz";
		ELSE
			SET var_diff = "közepes";
        END IF;
    
		INSERT INTO questions(question, answer_1, answer_2, answer_3, answer_4, correct_answer, difficulty) 
        VALUES (CONCAT("Num. ", counter, ": ", "Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!"), "Valasz1", "Valasz2", "Valasz3", "Valasz4", "Helyes valasz", var_diff);    
        
        SET counter = counter + 1;
    END WHILE;    
END //

DELIMITER //
CREATE PROCEDURE generateDummyAnswers()
BEGIN
	DECLARE num_of_data INT DEFAULT 25;
    DECLARE counter INT DEFAULT 1;
    DECLARE member INT DEFAULT 3;
    DECLARE correctness TINYINT(1) DEFAULT 0;
    DECLARE rand_quest_id INT;
    DECLARE min INT;
    DECLARE max INT;
    
    WHILE counter <= num_of_data DO
		SET min = (SELECT MIN(id_question) FROM questions);
        SET max = (SELECT MAX(id_question) FROM questions);
		SET rand_quest_id = ROUND(RAND() * (max - min)) + min;
    
		IF MOD(counter,2) = 0 THEN
			SET member = 5;
            SET correctness = 1;
		ELSE
			SET member = 3;
            SET correctness = 0;
        END IF;
    
		INSERT INTO answers(id_question, correct, date, id_member)
        VALUES (rand_quest_id, correctness, '2014-10-24', member);    
        
        SET counter = counter + 1;
    END WHILE;    
END //