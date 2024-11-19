<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\User;

class UserService
{

    public function __construct(private DatabaseInterface $db){

    }

    /**
     * @return array<User>
     *
     */
    public function all() : array{
       $users = $this->db->get("zakaznik");

       $users =  array_map(function ($user) {
           return new User(
               $user["id"],
               $user["jmeno"],
               $user["prijmeni"],
               $user["telefon"],
               $user["email"],
               $user["heslo"],
               $user["role"],
               $user["created_at"],
               $user["updated_at"],
           );
       }, $users);

       return  $users;
    }

    public function find(int $id) : ?User{
        $user = $this->db->first("zakaznik",[
           "id" => $id
        ]);

        if (!$user){
            return null;
        }

        return new User(
            $user["id"],
            $user["jmeno"],
            $user["prijmeni"],
            $user["telefon"],
            $user["email"],
            $user["heslo"],
            $user["role"],
            $user["created_at"],
            $user["updated_at"],
        );
    }

    public function update(int $id, array $data){
        $this->db->update("zakaznik",$data,
        [
            "id" => $id
        ]
        );
    }

    public function insert(array $data){
        $result = $this->db->insert("zakaznik", $data);

        if($result["success"] == false) {
            return false;
        }

        return true;
    }

    public function updateData(array $data, array $conditions) : bool{
        $update = $this->db->update("zakaznik",$data, $conditions);

        if (!$update){
            return false;
        }

        return  true;
    }

    public function findData(array $conditions) : array{
        $data = $this->db->first("zakaznik",$conditions);

        if (!$data){
            return [];
        }

        return $data;
    }

    public function delete(array $data){
        $result = $this->db->delete("zakaznik", $data);

        if($result["success"] == false) {
            return false;
        }

        return true;
    }

}