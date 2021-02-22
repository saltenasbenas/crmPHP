<?php
namespace app;

use db\DB;

class Customer
{

    public $id;

    public $name;

    public $surname;

    public $phone;

    public $email;

    public $address;

    public $position;

    public $company_id;

    public $company_name;
    public $description;

    public function __construct($id = null)
    {
        if ($id != null) {
            $ps = DB::get()->prepare("SELECT * FROM customers  WHERE id=?");
            $ps->execute([$id]);
            $data = $ps->fetch(\PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->phone = $data['phone'];
            $this->email = $data['email'];
            $this->address = $data['address'];
            $this->position = $data['position'];
            $this->company_id = $data['company_id'];
            $this->description = $data['description'];
            // $this->company_name=$data['company_name']; KODEL META KLAIDA? IR NELEIDZIA LEFT JOIN PANAUDOTI?
        }
    }

    public function save()
    {
        $ps = DB::get()->prepare("UPDATE customers SET name=?, surname=?, phone=?, email=? ,address=?, position=?, company_id=?, description=? WHERE id=?");
        $ps->execute([
            $this->name,
            $this->surname,
            $this->phone,
            $this->email,
            $this->address,
            $this->position,
            $this->company_id,
            $this->description,
            $this->id
         
        ]);
       
    }

    public function getInfo()
    {
        return Information::getConversation($this->id);
    }
    public function getCompanyInfo()
    {
        return Company::Companies($this->company_id);
    }

    // Kodel negaliu prideti company_name i Main puslapi
    public static function getCustomers()
    {
        $res = DB::get()->query("SELECT `customers`.*, company.company_name  FROM `customers` LEFT JOIN company ON company.id=customers.company_id");
        $customers = [];

        foreach ($res->fetchAll() as $customer) {
            $customers[] = new Customer($customer['id']);
        }
        return $customers;
    }

  
    public  function deleteCustomer()
    {
       
            $ps = DB::get()->prepare("DELETE FROM `customers` WHERE `customers`.`id` = ?");
            $ps->execute([
                $this->id
            ]);
     

    }

    public function addCustomer()
    {
            $ps = DB::get()->prepare('INSERT INTO customers ( name, surname, phone, email, address, position,company_id) VALUES (?,?,?,?,?,?,?)');
            $ps->execute([
                $this->name,
                $this->surname,
                $this->phone,
                $this->email,
                $this->address,
                $this->position,
                $this->company_id
     
            ]);
    
    }
}


