<?php

class nota_proyek extends CI_Model{
    
    private $_table = "4_proyek_keluar";

	public $id_keluar_proyek;
	public $id_proyek;
	public $proyek;
	public $uraian;
	public $tanggal;
	public $bulan;
	public $tahun;
	public $nominal;
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
    
    public function save()
	{
		$post = $this->input->post();
		$this->id_proyek = html_escape($post["idproyek"]);
        $this->id_keluar_proyek = html_escape($post["idpproyek"]);
        $this->proyek = html_escape($post["proyek"]);
		$this->uraian = html_escape($post["uraian"]);
		$this->tanggal = html_escape($post["tanggal"]);
		$this->bulan = html_escape($post["bulan"]);
		$this->tahun = html_escape($post["tahun"]);
		$this->nominal = html_escape($post["nominal"]);

		$this->nota = $this->_uploadnota();
		return $this->db->insert($this->_table, $this);
	}


	public function _uploadnota()
	{
		$config['upload_path']          = './upload/data/';
		$config['allowed_types']        = 'jpg';
		$config['file_name']            =  $this->id_keluar_proyek;
		$config['overwrite']            = true;
		$config['max_size']             = 2024; // 2MB

		$this->load->library('upload', $config);

		// if ($this->upload->do_upload('CSV')) {
		//     return $this->upload->data("file_name");
		// }
		if (!$this->upload->do_upload('nota')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			redirect('Dashboard/upload_proyek', 'refresh');
		} 
			return $this->upload->data("file_name");
		// return "data_kosong.csv";
	}
}
?>