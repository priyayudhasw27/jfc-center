<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';
    protected $primaryKey = 'username';
    protected $returnType = 'object';
    protected $allowedFields = ['username', 'password', 'id_level', 'hash', 'active'];

    public function _get(){
        return $this->findAll();
    }

    public function _findById($id){
        return $this->find($id);
    }

    public function _findByHash($hash){
        return $this->where('hash', $hash)
        ->get()
        ->getResult();
    }

    public function _insert($data){
        $this->insert($data);
    }

    public function _update($id, $data){
        $this->update($id, $data);
    }

    public function _delete($id){
        $this->delete($id);
    }

    // Cek Username dan Password
    public function _auth($username, $password){
        $where = "username = '".$username."' && password = '".$password."'";
        $result = $this->where($where)->countAllResults();
        if($result == 1){
            return 'success';
        }else{
            return 'fail';
        }
    }
}
