<link rel="stylesheet" href="<?php echo base_url() ?>templates/dist/assets/extensions/choices.js/public/assets/styles/choices.css">


<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="row">
        <div class="col">
            <h3 class="mb-3">Create New Data</h3>
        </div>

        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="/proses_data_anime" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="cover" class="form-label">Upload Cover:</label>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                </div>

                                <div class="mb-3">
                                    <label for="realesed" class="form-label">Realesed</label>
                                    <input type="text" class="form-control" id="realesed" name="realesed" placeholder="Enter Realesed">
                                </div>

                                <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter Genre">
                                </div>

                                <div class="mb-3">
                                    <label for="episode" class="form-label">Episode</label>
                                    <input type="number" class="form-control" id="episode" name="episode" placeholder="Enter Episode">
                                </div>

                                <div class="col 12">
            <div class="form-group">
                <label for="studio" class="form-label">Studio</label>
                <select class="choices form-select" name="studio" id="studio">
                    <?php foreach ($studios as $studio) : ?>
                        <option value="<?= $studio->id_studio ?>"><?= $studio->studio_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
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