<?php

namespace App\Http\Controllers;

use PDO;
use PDOException;
use Illuminate\Http\Request;

class DblibController extends Controller
{
    private $db;
    private $cTransID;
    private $childTrans = array();




 public function __construct(){



     $this->connect();
     
 }

 public function beginTransaction(){

     $cAlphanum = "AaBbCc0Dd1EeF2fG3gH4hI5iJ6jK7kLlM8mN9nOoPpQqRrSsTtUuVvWwXxYyZz";
     $this->cTransID = "T".substr(str_shuffle($cAlphanum), 0, 7);

     array_unshift($this->childTrans, $this->cTransID);

     $stmt = $this->db->prepare("BEGIN TRAN [$this->cTransID];");
     return $stmt->execute();

 }

 public function rollBack(){
     
     while(count($this->childTrans) > 0){
         $cTmp = array_shift($this->childTrans);
         $stmt = $this->db->prepare("ROLLBACK TRAN [$cTmp];");
         $stmt->execute();
     }

     return $stmt;
 }

 public function commit(){

     while(count($this->childTrans) > 0){
         $cTmp = array_shift($this->childTrans);
         $stmt = $this->db->prepare("COMMIT TRAN [$cTmp];");
         $stmt->execute();
     }

     return  $stmt;
 }

 public function close(){
     $this->db = null;
 }

 public function connect(){


    try {
        $db = new PDO ("dblib:host=192.168.1.14:1433;dbname=hharian", "usr_mycocoaviewer", "LD2022");
    } catch (PDOException $e) {
        $db = "Failed to get DB handle: " . $e->getMessage() . "\n";
    }

    return $db;

    //  try {
    //      $this->db = new PDO ("dblib:host=$this->hostname:$this->port;dbname=$this->dbname", "$this->username", "$this->pwd");

        

    //  } catch (PDOException $e) {
    //      $this->logsys .= "Failed to get DB handle: " . $e->getMessage() . "\n";
    //  }

 }
}
