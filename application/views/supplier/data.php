<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Data Project
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('supplier/add/project') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Add Project
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Project Name</th>
                    <th>Project Number</th>
                    <th>Customer</th>
                    <th>End User</th>
                    <th>Vendor Panel</th>
                    <th>Project Management</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($supplier):
                    $no = 1;
                    foreach ($supplier as $s) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
							<td><?= $s['project_name']; ?></td>
                            <td><?= $s['project_number']; ?></td>
                            <td><?= $s['customer']; ?></td>
                            <td><?= $s['end_user']; ?></td>
                            <td><?= $s['vendor_panel']; ?></td>
                            <td><?= $s['management_project']; ?></td>                              
                            <th>
                                <a href="<?= base_url('supplier/edit/') . $s['id_supplier'] ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('supplier/detail/'). $s['id_supplier'] ?>" class="btn btn-circle btn-success btn-sm"><i class="fa fa-check"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('supplier/delete/') . $s['id_supplier'] ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">
                        Blank Data
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
