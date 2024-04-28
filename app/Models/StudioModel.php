<?php

namespace App\Models; 
use CodeIgniter\Model;

class StudioModel extends Model
{
    protected $table = 'tb_studio';
    protected $primaryKey = 'id_studio';
    protected $returnType = 'object';
    protected $allowedFields = ['studio_name','address'];


public function searchStudios($keyword)
{
    return $this->like('studio_name', $keyword)
                ->orLike('address', $keyword)
                ->findAll();
}

}
