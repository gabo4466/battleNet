<?php
require_once("DBConnection.class.php");
require_once("Thread.class.php");
class Threads extends DBConnection{

    private $threadsList;

    public function __construct($id){

        $this->threadsList = $this->getThreads($id);
    }


    private function getThreads($idChannel){

        $stmt = $this->connect()->prepare('SELECT id_threads, threads_name, threads_description FROM threads where fk_channels = ?;' );

        if ($stmt->execute(array($idChannel)) == false){
            $stmt = null;
            return [];
        }

        $threads = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $threadsLength = sizeof($threads);
        $result = [];

        for ($i=0; $i < $threadsLength; $i++){
            $thread = new Thread ($threads[$i]['threads_name'],$threads[$i]['threads_description'],$threads[$i]['id_threads'], $idChannel);
            array_push($result,$thread);
        }

        return $result;
    }

    public function createThreads(){

        $result = "";
        foreach ($this->threadsList as $value){
            $result .= $value->createOption();
        }

        return $result;
    }

























}
