<?php
require_once("DBConnection.class.php");
require_once("Forum.class.php");
class Forums extends DBConnection{

    private $forumsList;

    public function __construct(){

        $this->forumsList = $this->getForums();
    }


    private function getForums(){

        $stmt = $this->connect()->query('SELECT id_forums, forums_name, forums_description FROM forums' );

        if ($stmt == false){
            $stmt = null;
            return [];
        }

        $forums = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $forumsLength = sizeof($forums);
        $result = [];

        for ($i=0; $i < $forumsLength; $i++){

            $forum = new Forum($forums[$i]['forums_name'],$forums[$i]['forums_description'],$forums[$i]['id_forums']);
            array_push($result,$forum);
        }

        return $result;
    }

    public function createForums(){

        $result = "";
        foreach ($this->forumsList as $value){

            $result .= $value->createOption();



        }

        return $result;




    }


}
