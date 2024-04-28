<?php

namespace App\Controllers;
use App\Models\AnimeModel;
use App\Models\StudioModel;

class Anime extends BaseController
{
    public function index()
    {
        $data['title'] = 'anime';

        $anime_model = new AnimeModel();
        $data['all_data_anime'] = $anime_model->getAnimeWithStudio();


        echo view('data_master/anime', $data);
        echo view('template/header');
        echo view('template/sidebar');
        echo view('template/footer');
    }

    public function add_data_anime()
    {
        $data['title'] = 'anime';
        $studio_model = new StudioModel();
        $data['studios'] = $studio_model->findAll();

        echo view('data_master/add_data_anime', $data);
        echo view('template/header');
        echo view('template/sidebar');
        echo view('template/footer');
    }
    

    public function proses_data_anime()
{
    // Menerima data dari form
    $animeData = $this->request->getPost();

    // Menyimpan sampul
    $cover = $this->request->getFile('cover');

    // Mengecek apakah sampul berhasil diunggah
    if ($cover->isValid() && !$cover->hasMoved()) {
        // Mengatur aturan validasi untuk file yang diunggah
        $validationRules = [
            'cover' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]'
        ];

        // Membuat objek validasi dan menerapkan aturan
        if ($this->validate($validationRules)) {
            // Jika validasi berhasil, lanjutkan proses menyimpan file dan data
            $newName = $cover->getRandomName();
            $cover->move('./path/to/sampul_directory', $newName);
            $animeData['cover'] = $newName;

            // Make sure to set id_studio if it's present in the form data
            $animeData['id_studio'] = $this->request->getPost('studio');

            // Menyimpan data anime ke dalam database
            $anime_model = new AnimeModel();
            $anime_model->insert($animeData);

            session()->setFlashdata('flash', 'Ditambahkan');

            return redirect()->to(base_url('anime'));
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }
    } else {
        // Handle jika file tidak valid atau gagal diunggah
        return redirect()->back()->withInput()->with('error', 'Invalid or failed upload for cover image');
    }
    // Memasukkan data anime ke dalam database
    $anime_model = new AnimeModel();
    $anime_model->insert($animeData);
    // Mengarahkan kembali ke halaman anime
    return redirect()->to(base_url('anime')); 
}


    public function edit_data_anime($id_anime = false)
    {
        $data['title'] = 'anime';
    
        $anime_model = new AnimeModel();
        $data_anime = $anime_model->find($id_anime);
        $data['studios'] = (new StudioModel())->findAll();

    
        echo view('template/header', $data);
        echo view('template/sidebar', $data);
        echo view('data_master/edit_data_anime', ['data_anime' => $data_anime]);
        echo view('template/footer');
    }
    

    public function proses_edit_anime($id_anime = false)
{
    // Menerima data dari form
    $animeData = $this->request->getPost();

    // Mengecek apakah ada file gambar yang diunggah
    $cover = $this->request->getFile('cover');

    // Jika cover diunggah, validasi dan simpan gambar baru
    if ($cover->isValid() && !$cover->hasMoved()) {
        $validationRules = [
            'cover' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]'
        ];

        if ($this->validate($validationRules)) {
            $newName = $cover->getRandomName();
            $cover->move('./path/to/sampul_directory', $newName);
            $animeData['cover'] = $newName;
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }
    }

    // Convert the studio name to studio ID
        $studio_model = new StudioModel();
        $studio = $studio_model->where('studio_name', $animeData['studio'])->first();
        $animeData['id_studio'] = $studio ? $studio->id_studio : null;
        unset($animeData['studio']); 


    // Memperbarui data anime ke dalam database
    $anime_model = new AnimeModel();
    $anime_model->update($this->request->getPost('id_anime'), $animeData);

    session()->setFlashdata('flash', 'DiPerbaharui');
    return redirect()->to(base_url('anime'));
}

    
    public function delete_data_anime($id_anime = false)
    {

        $anime_model = new AnimeModel();

        
        // Mendapatkan informasi anime berdasarkan ID
        $anime = $anime_model->find($id_anime);
    
        if ($anime) {
            // Mendapatkan path cover dari informasi anime
            $cover_path = WRITEPATH . '/path/to/sampul_directory' . $anime->cover;
    
            // Menghapus cover dari direktori
            if (file_exists($cover_path)) {
                unlink($cover_path);
            }
    
            // Menghapus data anime dari database
            $anime_model->delete($id_anime);

            session()->setFlashdata('flash', 'Dihapus');
            return redirect()->to(base_url('anime'));
        } else {
            // Handle jika ID anime tidak ditemukan
            // Misalnya, tampilkan pesan error atau redirect ke halaman lain
            return redirect()->to(base_url('anime'))->with('error', 'Anime not found');
        }
    }    

    public function search()
    {
        // Menerima kata kunci pencarian dari URL
        $keyword = $this->request->getVar('keyword');
    
        // Memastikan kata kunci tidak kosong
        if (!empty($keyword)) {
            // Mencari data anime berdasarkan kata kunci
            $anime_model = new AnimeModel();
            $data['all_data_anime'] = $anime_model->searchAnimes($keyword);
    
            // Menampilkan hasil pencarian
            echo view('template/header');
            echo view('template/sidebar');
            echo view('data_master/anime', $data);
            echo view('template/footer');
        } else {
            // Jika kata kunci kosong, kembali ke halaman utama
            return redirect()->to(base_url('anime'));
        }
    }
    

}
