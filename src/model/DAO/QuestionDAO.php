<?php

namespace App\src\model\DAO;

use App\src\model\Question;


class QuestionDAO extends DAO
{
    
    public function getQuestions()
    {
        $sql = 'SELECT * FROM questions ORDER BY RAND() LIMIT 1,2';
        $result = $this->sql($sql);
        $questions = [];
        foreach ($result as $row) {
            $questionId = $row['id'];
            $questions[$questionId] = $this->buildObject($row);
        }
        return $questions;
    }

    public function getBillet($idBillet)
    {
        $sql = 'SELECT id, title, content, date_added FROM billet WHERE id = ?';
        $result = $this->sql($sql, [$idBillet]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } else {
           
            echo 'Aucun billet existant avec cet identifiant';
        }
    }

    public function rajoutBillet($billet)
    {
        //Permet de récupérer les variables $title et $content
        extract($billet);
        $sql = 'INSERT INTO billet (title, content, date_added) VALUES (?, ?, NOW())';
        $this->sql($sql, [$title, $content]);        
    }
    
    public function supprimeBillet($idBillet)
    {
        $sql = 'DELETE FROM billet WHERE id = ?';
        $this->sql($sql,[$idBillet]);
    }
    
    public function modifierBillet($billet,$idBillet)
    {
        extract($billet);
        $sql = 'UPDATE billet SET title = ?, content = ?, date_added = NOW() WHERE id = ?';
        $this->sql($sql, [$title, $content,$idBillet]);
    }
    
    public function editeBillet($idBillet)
    {
        $sql = 'SELECT id, title, content, date_added FROM billet WHERE id = ?';
        $result = $this->sql($sql, [$idBillet]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } else {
            
            echo 'Aucun billet existant avec cet identifiant';
        }
    }
    
    private function buildObject(array $row)//nous permet de convertir chaque champ de la table en propriété de notre objet Billet
    {
        $question= new Question();
        $question->setId($row['id']);
        $question->setTheme($row['theme']);
        $question->setSujet($row['sujet']);
               
        return $question;
    }
}
