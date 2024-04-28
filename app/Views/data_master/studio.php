<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
        <?php if (session()->getFlashdata('flash')) : ?>
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="class" data-dismiss="alert" aria-label="close"> 
            <span aria-hidden="true">&times;</span>
        </button>
        Data Berhasil  <strong><?= session()->getFlashdata('flash') ?></strong>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var successAlert = document.getElementById('success-alert');
                successAlert.style.display = 'none';
            }, 3000);
        });
    </script>
<?php endif; ?>
    </header>
    
    <div class="row">
        <div class="col">
            <h3 class="mb-3">Studio Table</h3>
            <a href="/add_data_studio" class="btn btn-primary btn btn-sm mb-3">
                <i class="bi bi-plus"></i> Add Data
            </a>
        </div>

        <div class="col">
            <form class="d-flex" action="<?= base_url('searchs') ?>" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>



<section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Anime Recommendation </h4>
                    </div>
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Studio Name</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($all_data_studio as $studio): ?>
    <tr>
        <td> <?= $studio->id_studio?></td>
        <td> <?= $studio->studio_name?></td>
        <td> <?= $studio->address?></td>

      
        <td> 
        <div class="buttons d-flex center-content-between">
        <?php if (session()->get('role') == 'admin') : ?>
        <a href="/edit_data_studio/<?= $studio->id_studio ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
        <a href="/delete_data_studio/<?= $studio->id_studio ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
        <?php endif; ?>    
    </div>
        </td>

      </tr> <?php endforeach ?>
  </tbody>
</table>
                              