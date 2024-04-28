<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="row">
        <div class="col">
            <h3 class="mb-3">Studio</h3>
        </div>

        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="/proses_data_studio" method="POST" enctype="multipart/form-data">
                            

                                <div class="mb-3">
                                    <label for="title" class="form-label">Studio Name</label>
                                    <input type="text" class="form-control" id_studio="studio_name" name="studio_name" placeholder="Enter Studio Name">
                                </div>

                                <div class="mb-3">
                                    <label for="realesed" class="form-label">Address</label>
                                    <textarea class="form-control" id_studio="address" name="address" placeholder="Enter Address"></textarea>
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
