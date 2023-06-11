<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							Add Project's Form
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
				<?= form_open();
				if ($page == "project"):
					?>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="nama_supplier">Project Name</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-tools"></i></span>
								</div>
								<input value="<?= set_value('project_name'); ?>" name="project_name" id="project_name"
									   type="text" class="form-control" placeholder="Enter Project Name">
							</div>
							<?= form_error('project_name', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="nama_supplier">Project Number</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-tools"></i></span>
								</div>
								<input value="<?= set_value('project_number'); ?>" name="project_number" id="project_number"
									   type="text" class="form-control" placeholder="Enter Projet Number">
							</div>
							<?= form_error('project_name', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="no_telp">Customer</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-user-check"></i></span>
								</div>
								<input value="<?= set_value('customer'); ?>" name="customer" id="customer" type="text"
									   class="form-control" placeholder="Customer">
							</div>
							<?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="no_telp">End User</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-address-card"></i></span>
								</div>
								<input value="<?= set_value('end_user'); ?>" name="end_user" id="vendor_panel"
									   type="text" class="form-control" placeholder="End User">
							</div>
							<?= form_error('end_user', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="no_telp">Vendor Panel</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-user-cog"></i></span>
								</div>
								<input value="<?= set_value('vendor_panel'); ?>" name="vendor_panel" id="vendor_panel"
									   type="text" class="form-control" placeholder="Vendor Panel">
							</div>
							<?= form_error('vendor_panel', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="no_telp">Management Project</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-user-tie"></i></span>
								</div>
								<input value="<?= set_value('management_project'); ?>" name="management_project"
									   id="management_project" type="text" class="form-control"
									   placeholder="Management Project">
							</div>
							<?= form_error('management_project', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-9 offset-md-3">
							<button type="submit" class="btn btn-success">Save</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				<?php
				elseif ($page == "panel"):
					?>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="panel_name">Panel's Name</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-tools"></i></span>
								</div>
								<input value="<?= set_value('panel_name'); ?>" name="panel_name" id="panel_name"
									   type="text" class="form-control" placeholder="Enter Panels's Name">
							</div>
							<?= form_error('panel_name', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="panel_number">Panel's Number</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-user-check"></i></span>
								</div>
								<input value="<?= set_value('panel_number'); ?>" name="panel_number" id="panel_number"
									   type="text" class="form-control" placeholder="Panel Number">
							</div>
							<?= form_error('panel_number', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="quality_inspector">Quality Inspector</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-address-card"></i></span>
								</div>
								<input value="<?= set_value('quality_inspector'); ?>" name="quality_inspector"
									   id="quality_inspector" type="text" class="form-control"
									   placeholder="Quality Inspector">
							</div>
							<?= form_error('quality_inspector', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="date">Date</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
												class="fa fa-fw fa-user-cog"></i></span>
								</div>
								<input value="<?= set_value('date'); ?>" name="date" id="date" type="date"
									   class="form-control" placeholder="Date and Day">
							</div>
							<?= form_error('date', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-9 offset-md-3">
							<button type="submit" class="btn btn-success">Save</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				<?php
				endif; ?>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
