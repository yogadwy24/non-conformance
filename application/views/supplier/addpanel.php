<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Add Panel's Form
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('supplier') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                            <input value="<?= set_value('panel_name'); ?>" name="panel_name" id="panel_name" type="text" class="form-control" placeholder="Enter Panels's Name">
                        </div>
                        <?= form_error('panel_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="panel_number">Panel's Number</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-check"></i></span>
                            </div>
                            <input value="<?= set_value('panel_number'); ?>" name="panel_number" id="panel_number" type="text" class="form-control" placeholder="Panel Number">
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
                            <input value="<?= set_value('quality_inspector'); ?>" name="quality_inspector" id="quality_inspector" type="text" class="form-control" placeholder="Quality Inspector">
                        </div>
                        <?= form_error('quality_inspector', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="date">Entry Date</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('date', date('Y-m-d')); ?>" name="date" id="date" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('date', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="panel_vendor">Vendor Panel</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-tie"></i></span>
                            </div>
                            <input value="<?= set_value('panel_vendor'); ?>" name="panel_vendor" id="panel_vendor" type="text" class="form-control" placeholder="Panel Vendor">
                        </div>
                        <?= form_error('panel_vendor', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="conditions">Conditions</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-tie"></i></span>
                            </div>
                            <input value="<?= set_value('conditions'); ?>" name="conditions" id="conditions" type="text" class="form-control" placeholder="conditions">
                        </div>
                        <?= form_error('Engineering', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>