<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();

		$this->load->model('Admin_model', 'admin');
		$this->load->library('form_validation');
	}

	private function _validasi($validate = null)
	{
		if ($validate == 'add' || $validate == 'edit') {
			$this->form_validation->set_rules('project_name', 'Project Name', 'required|trim');
			$this->form_validation->set_rules('customer', 'Customer', 'required|trim');
			$this->form_validation->set_rules('end_user', 'End User', 'required|trim');
		} elseif ($validate == 'addpanel') {
			$this->form_validation->set_rules('panel_name', 'Panel Name', 'required|trim');
			$this->form_validation->set_rules('panel_vendor', 'Panel Vendor', 'required|trim');
		}
	}

	public function index()
	{
		$data['title'] = "Non - Conformance Report";
		$data['supplier'] = $this->admin->get('supplier');
		$this->template->load('templates/dashboard', 'supplier/data', $data);
	}

//	public function add()
//	{
//		$add = $this->uri->segment(3);
//		if ($add == "project"){
//			$this->_validasi("add");
//			if ($this->form_validation->run() == false) {
//				$data['title'] = "Non - Conformance Report";
//				$this->template->load('templates/dashboard', 'supplier/add', $data);
//			} else {
//				$input = $this->input->post(null, true);
//				$save = $this->admin->insert('supplier', $input);
//				if ($save) {
//					set_pesan('Data Saved');
//					redirect('supplier');
//				} else {
//					set_pesan('Something went wrong', false);
//					redirect('supplier/add');
//				}
//			}
//		}elseif	($add == "panel"){
//			$this->_validasi("addpanel");
//			$spp = $this->uri->segment(4);
//			if ($this->form_validation->run() == false) {
//				$data['title'] = "Non - Conformance Report";
//				$data['supplier_id'] = $spp;
//				$this->template->load('templates/dashboard', 'supplier/addpanel', $data);
//			} else {
//				$input = $this->input->post(null, true);
//				$input['supplier_id'] = $spp;
//				$save = $this->admin->insert('project', $input);
//				if ($save) {
//					set_pesan('Data Saved');
//					redirect('supplier/detail/' . $spp);
//				} else {
//					set_pesan('Something went wrong', false);
//					redirect('supplier/addpanel');
//				}
//			}
//		}
//	}

	public function add()
	{
		$add = $this->uri->segment(3);
		$data['title'] = "Non - Conformance Report";
		$data['supplier_id'] = null;

		if ($add == "panel") {
			$this->_validasi("addpanel");
			$spp = $this->uri->segment(4);
			$data['supplier_id'] = $spp;
			$data['page'] = "panel";
		} else {
			$this->_validasi("add");
			$data['page'] = "project";
		}

		if ($this->form_validation->run() == false) {
			$this->template->load('templates/dashboard', 'supplier/add', $data);
		} else {
			$input = $this->input->post(null, true);
			if ($add == "panel") {
				$input['supplier_id'] = $spp;
				$save = $this->admin->insert('project', $input);
				$redirect_url = 'supplier/detail/' . $spp;
			} else {
				$save = $this->admin->insert('supplier', $input);
				$redirect_url = 'supplier';
			}

			if ($save) {
				set_pesan('Data Saved');
				redirect($redirect_url);
			} else {
				set_pesan('Something went wrong', false);
				redirect('supplier/add');
			}
		}
	}



	public function edit($getId)
	{
		$id = $this->uri->segment(3);
		$this->_validasi("edit");
		if ($this->form_validation->run() == false) {
			$data['title'] = "Non - Conformance Report";
			$data['supplier'] = $this->admin->get('supplier', ['id_supplier' => $id]);
			$this->template->load('templates/dashboard', 'supplier/edit', $data);
		} else {
			$input = $this->input->post(null, true);
			$update = $this->admin->update('supplier', 'id_supplier', $id, $input);
			if ($update) {
				set_pesan('Data Updated');
				redirect('supplier');
			} else {
				set_pesan('Something went wrong');
				redirect('supplier/edit/' . $id);
			}
		}
	}

	public function delete($getId)
	{
		$id = encode_php_tags($getId);
		if ($this->admin->delete('supplier', 'id_supplier', $id)) {
			set_pesan('Data Deleted');
		} else {
			set_pesan('Something went wrong', false);
		}
		redirect('supplier');
	}

	public function detail($getId)
	{
		$data['title'] = "NCR Report";
		$data['supplier'] = $this->admin->get('supplier', ["id_supplier" => $getId]);
		$data['projects'] = $this->admin->getPanels($getId);
		$this->template->load('templates/dashboard', 'supplier/detail', $data);
	}

	public function ncr($getId)
	{
		$data['title'] = "Non Conformance (NC) Finding in Factory Routine Test";
		$data['supplier'] = $this->admin->get('supplier', ["id_supplier" => $getId]);
		$data['projects'] = $this->admin->getPanels($getId);
		$this->template->load('templates/dashboard', 'supplier/ncr', $data);
	}

	public function editpanel($getId){
		$add = $this->uri->segment(3);
		$data['title'] = "Non - Conformance Report";
		$data['projects'] = $this->admin->get('project', ["id_panel" => $getId]);
		
		$this->form_validation->set_rules('panel_name', 'Panel Name', 'required');
		$this->form_validation->set_rules('panel_number', 'Panel Number', 'required');
		$this->form_validation->set_rules('quality_inspector', 'Panel Number', 'required');
		$this->form_validation->set_rules('date', 'Panel Number', 'required');
		$this->form_validation->set_rules('production', 'Production', 'required');
		$this->form_validation->set_rules('engineering', 'Engineering', 'required');
		$this->form_validation->set_rules('conditions', 'Conditions', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->template->load('templates/dashboard', 'supplier/editpanel', $data);
		} else {
			$input = $this->input->post(null, true);
			var_dump($input);
			$update = $this->admin->update('project', 'id_panel', $getId, $input);

			if ($update) {
				set_pesan('Data Updated');
				redirect('supplier/editpanel/'. $getId);
			} else {
				set_pesan('Something went wrong');
				redirect('supplier/editpanel/' . $getId);
			}
		}
	}

//	public function addpanel()
//	{
//		$this->_validasi("addpanel");
//		$spp = $this->uri->segment(3);
//		if ($this->form_validation->run() == false) {
//			$data['title'] = "Non - Conformance Report";
//			$data['supplier_id'] = $spp;
//			$this->template->load('templates/dashboard', 'supplier/addpanel', $data);
//		} else {
//			$input = $this->input->post(null, true);
//			$input['supplier_id'] = $spp;
//			$save = $this->admin->insert('project', $input);
//			if ($save) {
//				set_pesan('Data Saved');
//				redirect('supplier/detail/' . $spp);
//			} else {
//				set_pesan('Something went wrong', false);
//				redirect('supplier/addpanel');
//			}
//		}
//	}

}
