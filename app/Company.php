<?php
namespace app;
use db\DB;

class Company {
    public $id;
    public $name;
    public $address;
    public $vat_code;
    public $company_name;
    public $phone;
    public $email;
    
    public function __construct($id=null){
        if ($id!=null) {
            $ps= DB::get()->prepare("SELECT * FROM company WHERE id=?");
            $ps->execute([$id]);
            $data=$ps->fetch(\PDO::FETCH_ASSOC);
            $this->id=$data['id'];
            $this->name=$data['name'];
            $this->address=$data['address'];
            $this->vat_code=$data['vat_code'];
            $this->company_name=$data['company_name'];
            $this->phone=$data['phone'];
            $this->email=$data['email'];
            
            
            
        }
    }
    
    public function save(){
        $ps=DB::get()->prepare("UPDATE company SET name=?, address=?, vat_code=?, company_name=? ,phone=?, email=? WHERE id=?");
        $ps->execute([$this->name, $this->address,$this->vat_code,$this->company_name,$this->phone,$this->email,$this->id ]);
    }
    
    public static function getCompany() {
        $res=DB::get()->query("SELECT * FROM company");
        $companies=[];
        
        foreach ($res->fetchAll()as $company){
            $companies[]=new Company($company['id']);
        }
        return $companies;
    }
    public static function Companies($idCustomer) {
        $ps=DB::get()->prepare("SELECT * FROM company WHERE id=?");
        $ps->execute([$idCustomer]);
        $companies=[];
        
        foreach ($ps->fetchAll(\PDO::FETCH_ASSOC)as $company){
            $companies[]=new Company($company['id']);
        }
        return $companies;
    }
}


