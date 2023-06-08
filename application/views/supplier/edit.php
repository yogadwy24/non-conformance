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
                <?= form_open('', [], ['id_supplier' => $supplier['id_supplier']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Project Name">Project's Name</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-tools"></i></span>
                            </div>
                            <input value="<?= set_value('project_name', $supplier['project_name']); ?>" name="project_name" id="project_name" type="text" class="form-control" placeholder="Project's Name">
                        </div>
                        <?= form_error('project_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="customer">Customer Name</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-check"></i></span>
                            </div>
                            <input value="<?= set_value('customer', $supplier['customer']); ?>" name="customer" id="customer" type="text" class="form-control" placeholder="Nama Customer">
                        </div>
                        <?= form_error('customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="end_user">End User</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-address-card"></i></span>
                            </div>
                            <input value="<?= set_value('end_user', $supplier['end_user']); ?>" name="end_user" id="end_user" type="text" class="form-control" placeholder="Nama Client">
                        </div>
                        <?= form_error('end_user', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="vendor_panel">Vendor Panel</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-cog"></i></span>
                            </div>
                            <input value="<?= set_value('vendor_panel', $supplier['vendor_panel']); ?>" name="vendor_panel" id="vendor_panel" type="text" class="form-control" placeholder="Nama Vendor">
                        </div>
                        <?= form_error('vendor_panel', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="management_project">Management Project</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user-tie"></i></span>
                            </div>
                            <input value="<?= set_value('management_project', $supplier['management_project']); ?>" name="management_project" id="management_project" type="text" class="form-control" placeholder="Nama PM">
                        </div>
                        <?= form_error('management_project', '<small class="text-danger">', '</small>'); ?>
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