<link rel="stylesheet" href="<?php echo base_url() ?>templates/dist/assets/extensions/choices.js/public/assets/styles/choices.css">
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="row">
        <div class="col">
            <h3 class="mb-3">Update Data</h3>
        </div>

        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="/proses_edit_anime" method="POST" enctype="multipart/form-data">
                            <div class="row">

                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id_anime="id_anime" name="id_anime" value="<?= $data_anime->id_anime?>">
                                </div>

                                <div class="mb-3">
                                    <label for="cover" class="form-label">Upload Cover:</label>
                                    <input type="file" class="form-control" id="cover" name="cover" value="<?= $data_anime->cover?>">
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?= $data_anime->title?>">
                                </div>

                                <div class="mb-3">
                                    <label for="realesed" class="form-label">Realesed</label>
                                    <input type="text" class="form-control" id="realesed" name="realesed" placeholder="Enter Realesed" value="<?= $data_anime->realesed?>">
                                </div>

                                <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter Genre"value="<?= $data_anime->genre?>">
                                </div>

                                <div class="mb-3">
                                    <label for="episode" class="form-label">Episode</label>
                                    <input type="number" class="form-control" id="episode" name="episode" placeholder="Enter Episode" value="<?= $data_anime->episode?>">
                                </div>

                                <div class="mb-3">
    <label for="studio" class="form-label">Studio</label>
    <select class="choices form-select" id="studio" name="studio">
        <?php foreach ($studios as $studio) : ?>
            <option value="<?= $studio->studio_name ?>" <?= ($data_anime->id_studio == $studio->id_studio) ? 'selected' : '' ?>>
                <?= $studio->studio_name ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>templates/dist/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="<?php echo base_url() ?>templates/dist/assets/static/js/pages/form-element-select.js"></script>
