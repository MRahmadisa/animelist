<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'tb_anime';
    protected $primaryKey = 'id_anime';
    protected $returnType = 'object';
    protected $allowedFields = ['cover', 'title', 'realesed', 'genre', 'episode', 'id_studio'];

    public function searchAnimes($keyword)
    {
        return $this->like('title', $keyword)
            ->orLike('genre', $keyword)
            ->orLike('realesed', $keyword)
            ->findAll();
    }

    public function setStudio($animeID, $studioID)
{
    $this->db->table('tb_anime')
        ->where('id_anime', $animeID)
        ->update(['id_studio' => $studioID]);
}

public function getAnimeWithStudio()
    {
        return $this->db->table('tb_anime')
            ->join('tb_studio', 'tb_studio.id_studio = tb_anime.id_studio')
            ->get()
            ->getResult();
    }
}
