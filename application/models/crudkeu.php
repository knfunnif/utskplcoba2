<?php

class crudkeu extends CI_Model
{

	private $_table = "3_kantor_keluar";

	public $id_kantor;
	public $tanggal;
	public $bulan;
	public $tahun;
	public $keperluan;
	public $stat_bayar;
	public $kota;
	public $pengeluaran;
	public $proyek;
	public $nota;

	public function rules()
	{
		return [
			[
				'field' => 'tanggal',
				'label' => 'tanggal',
				'rules' => 'required'
			],

			[
				'field' => 'bulan',
				'label' => 'bulan',
				'rules' => 'required'
			]
		];
	}


	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	function get_data($table)
	{
		return $this->db->get($table);
	}

	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	// fungsi untuk mengedit data
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	function delete_all($table)
	{
		$this->db->empty_table($table);
	}

	// fungsi cek login
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function insert_multiple($data, $table)
	{
		$this->db->insert_batch($table, $data);
	}

	public function get_id($keyword)
	{
		$keyword = array(
			'id_proyek' => $keyword,
		);
		$this->db->select('*');
		$this->db->from('1_pemasukan');
		$this->db->where($keyword);
		return $this->db->get()->result();
	}

	function ubah($data, $id1)
	{
		$this->db->where('id_proyek', $id1);
		$this->db->update('1_pemasukan', $data);
		return TRUE;
	}

	function ubah2($data, $id1)
	{
		$this->db->where('id_sub', $id1);
		$this->db->update('2_sub_pemasukan', $data);
		return TRUE;
	}
	
	function ubah3($data, $id1)
	{
		$this->db->where('id_kantor', $id1);
		$this->db->update('3_kantor_keluar', $data);
		return TRUE;
	}

	function ubah4($data, $id1)
	{
		$this->db->where('id_keluar_proyek', $id1);
		$this->db->update('4_proyek_keluar', $data);
		return TRUE;
	}

/////////////////////////////////////////////////////////////////////////////////////

	public function save()
	{
		$post = $this->input->post();
		$this->id_kantor = html_escape($post["id_kantor"]);
		$this->tanggal = html_escape($post["tanggal"]);
		$this->bulan = html_escape($post["bulan"]);
		$this->tahun = html_escape($post["tahun"]);
		$this->keperluan = html_escape($post["keperluan"]);
		$this->stat_bayar = html_escape($post["opsi"]);
		$this->pengeluaran = html_escape($post["nominal"]);
		$this->proyek = html_escape($post["proyek"]);
		$this->kota = html_escape($post["kota"]);

		$this->nota = $this->_uploadnota();
		return $this->db->insert($this->_table, $this);
	}
	

	public function _uploadnota()
	{
		$newname = $_FILES['nota'];
		$config['upload_path']          = './upload/data/';
		$config['allowed_types']        = 'jpg';
		$config['file_name']            = $newname;
		$config['overwrite']            = true;
		$config['max_size']             = 4024; // 2MB

		$this->load->library('upload', $config);

		// if ($this->upload->do_upload('CSV')) {
		//     return $this->upload->data("file_name");
		// }
		if (!$this->upload->do_upload('nota')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			// redirect('Dashboard/upload_kantor', 'refresh');
		}
			return $this->upload->data("file_name");
		// return "data_kosong.csv";
	}

///////////////////////////////////////////////////////////////////////////////////////////////////

// public function editnota()
// 	{
// 		$config['upload_path']          = './upload/data/';
// 		$config['allowed_types']        = 'jpg';
// 		$config['file_name']            =  $this->id_kantor;
// 		$config['overwrite']            = true;
// 		$config['max_size']             = 2024; // 2MB

// 		$this->load->library('upload', $config);

// 		// if ($this->upload->do_upload('CSV')) {
// 		//     return $this->upload->data("file_name");
// 		// }
// 		if (!$this->upload->do_upload('nota')) {
// 			$error = array('error' => $this->upload->display_errors());
// 			$this->session->set_flashdata('error', $error['error']);
// 			redirect('Dashboard/upload_kantor', 'refresh');
// 		} else {
// 			return $this->upload->data("file_name");
// 		}

// 		// return "data_kosong.csv";
// 	}
}
