<?php
require_once("DBConnection.class.php");
require_once("Channel.class.php");
class Channels extends DBConnection{

   private $channelsList;

   public function __construct(){

       $this->channelsList = $this->getChannels();
   }


   private function getChannels(){

       $stmt = $this->connect()->query('SELECT id_channels, channels_name, channels_description FROM channels' );

       if ($stmt == false){
           $stmt = null;
           return [];
       }

       $channels = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $channelsLength = sizeof($channels);
       $result = [];

       for ($i=0; $i < $channelsLength; $i++){

           $channel = new Channel($channels[$i]['channels_name'],$channels[$i]['channels_description'],$channels[$i]['id_channels']);
           array_push($result,$channel);
       }

       return $result;
   }

   public function createChannels(){

      $result = "";
      foreach ($this->channelsList as $value){

          $result .= $value->createOption();



      }

      return $result;




   }

























}