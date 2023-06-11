<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					<?= $supplier["project_name"];
					?>
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('supplier/add/panel/') . $supplier['id_supplier'] ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
					<span class="text">
                        Add Panel
                    </span>
				</a>
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
		<div class="row">
			<div class="col-lg-6">
				<div class="card p-4">
					<div class="card-header bg-white py-3">
						<p class="font-weight-bold text-primary">PERCENTAGE PROJECT</p>
					</div>
					<div class="card-body">
						<section id="graphSection">
							<div class="row">
								<div class="col-lg-6">
									<div>
										<canvas id="productionChart" class="chartjs-render-monitor"></canvas>
									</div>
									<p class="text-center mt-2 text-info">Progress</p>
								</div>
								<div class="col-lg-6">
									<div>
										<canvas id="engineeringChart" class="chartjs-render-monitor"></canvas>
									</div>
									<p class="text-center mt-2 text-info">Evaluasi</p>
								</div>
							</div>
						</section>
						<p class="font-weight-bold text-primary bg-white py-3">Project Information</p>
						<section id="projectInfo">
							<div class="row">
								<div class="col-lg-6">
									<p class="font-weight-bold text-primary">Panel Vendor</p>
									<p><?= $supplier["vendor_panel"] ?></p>
								</div>
								<div class="col-lg-6">
									<p class="font-weight-bold text-primary">Project Manager</p>
									<p><?= $supplier["management_project"] ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="font-weight-bold text-primary">Customer</p>
									<p><?= $supplier["customer"] ?></p>
								</div>
								<div class="col-lg-6">
									<p class="font-weight-bold text-primary">End User</p>
									<p><?= $supplier["end_user"] ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<p class="font-weight-bold text-primary">Total Panel</p>
									<p>150</p>
								</div>
								<div class="col-lg-6">
									<p class="font-weight-bold text-primary">Project Number</p>
									<p><?= $supplier["project_number"] ?></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="table-responsive">
					<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
						<thead>
						<tr>
							<th>No</th>
							<th>Panel Name</th>
							<th>Panel Number</th>
							<th>Date</th>
							<th>Quality Inspector</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if ($projects != NULL):
							$no = 1;
							foreach ($projects as $s) :
								?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $s['panel_name']; ?></td>
									<td><?= $s['panel_number']; ?></td>
									<td><?= $s['date']; ?></td>
									<td><?= $s['quality_inspector']; ?></td>
									<th>
                                		<a href="<?= base_url('supplier/editpanel/') . $s['id_panel'] ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                		<a href="<?= base_url('supplier/ncr/'). $s['id_panel'] ?>" class="btn btn-circle btn-success btn-sm"><i class="fa fa-check"></i></a>
                                		<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('supplier/delete/') . $s['id_panel'] ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            		</th>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="6" class="text-center">
									Tidak ada Data
								</td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
