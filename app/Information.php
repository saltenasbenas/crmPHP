<?php
namespace app;
use db\DB;

class Information {
    public $id;
    public $costumer_id;
    public $date;
    public $conversation;
   
    
    public function __construct($id=null){
        if ($id!=null) {
            $ps= DB::get()->prepare("SELECT * FROM contact_information WHERE id=?");
            $ps->execute([$id]);
            $data=$ps->fetch(\PDO::FETCH_ASSOC);
            $this->id=$data['id'];
            $this->costumer_id=$data['costumer_id'];
            $this->date=$data['date'];
            $this->conversation=$data['conversation'];
        
            
            
        }
    }
    
    public function save(){
        $ps=DB::get()->prepare("UPDATE contact_information SET   conversation=? WHERE id=?");
        $ps->execute([$this->conversation,$this->id ]);
    }
    
    public static function getConversation($costumerID) {
        $ps=DB::get()->prepare("SELECT * FROM contact_information WHERE costumer_id=?");
        $ps->execute([$costumerID]);
        $info=[];
        
        foreach ($ps->fetchAll(\PDO::FETCH_ASSOC)as $information){
            $info[]=new Information($information['id']);
        }
        return $info; 
    }
}


