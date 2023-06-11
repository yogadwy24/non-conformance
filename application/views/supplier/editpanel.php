<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Edit Project Form 
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('supplier').$projects['supplier_id'] ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="panel_name">Panel's Name</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-tools"></i></span>
                            </div>
                            <input value="<?= $projects['panel_name']; ?>" name="panel_name" id="panel_name" type="text" class="form-control" placeholder="Enter Panels Name">
                        </div>
                        <?= form_error('panel_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="panel_number">Panel Number</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-check"></i></span>
                            </div>
                            <input value="<?= $projects['panel_number']; ?>" name="panel_number" id="panel_number" type="text" class="form-control" placeholder="Panel Number">
                        </div>
                        <?= form_error('panel_number', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="quality_inspector">Quality Inspector</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-address-card"></i></span>
                            </div>
                            <input value="<?= $projects['quality_inspector']; ?>" name="quality_inspector" id="quality_inspector" type="text" class="form-control" placeholder="Quality Inspector">
                        </div>
                        <?= form_error('quality_inspector', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="date">Date</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-cog"></i></span>
                            </div>
                            <input value="<?= $projects['date']; ?>" name="date" id="date" type="text" class="form-control" placeholder="Date">
                        </div>
                        <?= form_error('date', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Make Changes</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
