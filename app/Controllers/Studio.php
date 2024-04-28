<?php

namespace App\Controllers;
use App\Models\StudioModel;

class Studio extends BaseController
{
    public function index()
    {
        $data['title'] = 'studio';

        $studio_model = new StudioModel();
        $data['all_data_studio'] = $studio_model->findAll();

        echo view('data_master/studio', $data);
        echo view('template/header');
        echo view('template/sidebar');
        echo view('template/footer');
    }

    public function add_data_studio()
    {
        $data['title'] = 'studio';


        echo view('data_master/add_data_studio', $data);
        echo view('template/header');
        echo view('template/sidebar');
        echo view('template/footer');
    }
    

    public function proses_data_studio()
    {
     // Menerima data dari form
        $studioData = $this->request->getPost();

                // Menyimpan data studio ke dalam database
                $studio_model = new StudioModel();
                $studio_model->insert($studioData);

                session()->setFlashdata('flash', 'Ditambahkan');

                return redirect()->to(base_url('studio'));
    }

    public function edit_data_studio($id_studio = false)
    {
        $data['title'] = 'studio';
    
        $studio_model = new StudioModel();
        $data_studio = $studio_model->find($id_studio);

    
        echo view('template/header', $data);
        echo view('template/sidebar', $data);
        echo view('data_master/edit_data_studio', ['data_studio' => $data_studio]);
        echo view('template/footer');
    }
    

    public function proses_edit_studio($id_studio = false)
    {

            // Menerima data dari form
            $studioData = $this->request->getPost();

        
            // Memperbarui data studio ke dalam database
            $studio_model = new StudioModel();
            $studio_model->update($this->request->getPost('id_studio'), $studioData);

            session()->setFlashdata('flash', 'DiPerbaharui');
            return redirect()->to(base_url('studio'));
    }

    
    public function delete_data_studio($id_studio = false)
    {

        $studio_model = new StudioModel();

    
        // Mendapatkan informasi studio berdasarkan ID
        $studio = $studio_model->find($id_studio);
            // Menghapus data studio dari database
            $studio_model->delete($id_studio);

            session()->setFlashdata('flash', 'Dihapus');
            return redirect()->to(base_url('studio'));
    }    
    public function searchs()
    {
        // Menerima kata kunci pencarian dari URL
        $keyword = $this->request->getVar('keyword');
    
        // Memastikan kata kunci tidak kosong
        if (!empty($keyword)) {
            // Mencari data anime berdasarkan kata kunci
            $studio_model = new StudioModel();
            $data['all_data_studio'] = $studio_model->searchStudios($keyword);
    
            // Menampilkan hasil pencarian
            echo view('template/header');
            echo view('template/sidebar');
            echo view('data_master/studio', $data);
            echo view('template/footer');
        } else {
            // Jika kata kunci kosong, kembali ke halaman utama
            return redirect()->to(base_url('studio'));
        }
    }
    
    

}
