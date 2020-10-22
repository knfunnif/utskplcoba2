<?php
defined('BASEPATH') or die('No direct script access allowed');


class Dashboard extends MY_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('crudkeu');
		$this->load->model('nota_proyek');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('LoginModel');
    }

	public function index()
	{
		$this->load->database();
		$data['pemasukan'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['sub_pemasukan'] = $this->db->query("select * from 2_sub_pemasukan")->result();
		$data['kantor'] = $this->db->query("select * from 3_kantor_keluar")->result();
		$data['proyek'] = $this->db->query("select * from 4_proyek_keluar")->result();
		
		$data['total'] = $this->db->query("select nominal , sum(nominal) as sum from 2_sub_pemasukan")->result();
		$data['total2'] = $this->db->query("select pengeluaran , sum(pengeluaran) as sum from 3_kantor_keluar")->result();
		$data['total3'] = $this->db->query("select nominal , sum(nominal) as sum from 4_proyek_keluar")->result();
		$data['tproy'] = $this->db->query("select id_proyek , count(id_proyek) as count from 1_pemasukan")->result();
		$this->load->view('depan', $data);
	}

	public function login()
	{
		$this->load->view('login');
	}


	public function pemasukan()
	{
		$this->load->database();
		$data['pemasukan'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['sub_pemasukan'] = $this->db->query("select * from 2_sub_pemasukan")->result();
		$this->load->view('pemasukan',$data);
	}

	public function pemasukan2($id1)
	{
		$this->load->database();
		$data['pemasukan'] = $this->db->query("select * from 1_pemasukan where id_proyek= '$id1'")->result();
		$data['sub_pemasukan'] = $this->db->query("select * from 2_sub_pemasukan where id_proyek= '$id1'")->result();
		$data['totalsub'] = $this->db->query("select nominal , sum(nominal) as sum from 2_sub_pemasukan where id_proyek= '$id1'")->result();
		$this->load->view('pemasukan2',$data);
	}

	public function tbl_proyek()
	{
		$this->load->database();
		$data['proyek1'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['proyek2'] = $this->db->query("select * from 4_proyek_keluar ")->result();
		$data['totalpro'] = $this->db->query("select nominal , sum(nominal) as sum from 4_proyek_keluar")->result();
		$this->load->view('proyek_keluar1',$data);
	}
	
	public function tbl_proyek2($id1){
		$this->load->database();
		$data['proyek1'] = $this->db->query("select * from 1_pemasukan where id_proyek= '$id1'")->result();
		$data['proyek3'] = $this->db->query("select * from 4_proyek_keluar where id_proyek= '$id1' limit 1")->result();
		$data['proyek2'] = $this->db->query("select * from 4_proyek_keluar where id_proyek= '$id1'")->result();
		$data['totalpro'] = $this->db->query("select nominal , sum(nominal) as sum from 4_proyek_keluar where id_proyek= '$id1'")->result();
		$data['totalsub'] = $this->db->query("select nominal , sum(nominal) as sum from 2_sub_pemasukan where id_proyek= '$id1'")->result();
		$this->load->view('proyek_keluar2',$data);
	}

	public function tbl_kantor()
	{
		$this->load->database();
		$data['kantor_keluar'] = $this->db->query("select * from 3_kantor_keluar group by bulan, tahun")->result();
		$this->load->view('kantor_keluar',$data);
	}

	public function tbl_kantor2($bulan,$tahun)
	{
		$this->load->database();
		$data['haha'] = $this->db->query("select * from 3_kantor_keluar group by bulan, tahun")->result();
		$data['kantor_keluar'] = $this->db->query("select * from 3_kantor_keluar where bulan='$bulan' and tahun='$tahun'")->result();
		$data['kantor_keluar1'] = $this->db->query("select * from 3_kantor_keluar where bulan='$bulan' and tahun='$tahun' limit 1")->result();
		
		$data['totalktr'] = $this->db->query("select pengeluaran , sum(pengeluaran) as sum from 3_kantor_keluar where bulan='$bulan' and tahun='$tahun'")->result();
		$this->load->view('kantor_keluar2',$data);
	}

	public function tbl_rekap()
	{
		$this->load->database();
		$data['kantor'] = $this->db->query("select * from 3_kantor_keluar group by tahun")->result();
		$data['masuk'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['masuk2'] = $this->db->query("select * from 2_sub_pemasukan group by tahun")->result();
		$data['proyek'] = $this->db->query("select * from 4_proyek_keluar group by tahun")->result();
		$this->load->view('rekapitulasi', $data);
	}

	public function tbl_rekap2($tahun)
	{
		$this->load->database();
		// $data['masuk'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['kantor1'] = $this->db->query("select *, sum(pengeluaran) as sum from 3_kantor_keluar where tahun='$tahun' group by bulan ASC limit 1")->result();
		$data['kantor'] = $this->db->query("select *, sum(pengeluaran) as sum from 3_kantor_keluar where tahun='$tahun' group by bulan ASC")->result();
		$data['totkantor'] = $this->db->query("select *, sum(pengeluaran) as sum from 3_kantor_keluar where tahun='$tahun'")->result();
		$data['masuk2'] = $this->db->query("select *, sum(nominal) as sum from 2_sub_pemasukan where tahun='$tahun' group by proyek")->result();
		$data['proyek'] = $this->db->query("select *, sum(nominal) as sum from 4_proyek_keluar where tahun='$tahun' group by proyek")->result();
		$data['totm'] = $this->db->query("select *, sum(nominal) as sum from 2_sub_pemasukan where tahun='$tahun'")->result();
		$data['totk'] = $this->db->query("select *, sum(nominal) as sum from 4_proyek_keluar where tahun='$tahun'")->result();
		$this->load->view('rekapitulasi2', $data);
	}

	public function export_masuk1()
	{
		$this->load->library('epdf.php');
		$data['masuk'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['sub_masuk'] = $this->db->query("select * from 2_sub_pemasukan")->result();
		$data['masuk'] = $this->crudkeu->get_data('1_pemasukan')->result();
		$this->epdf->generate_proyek('export_proyek', $data);
	}

	public function export_masuk2($id1)
	{
		$this->load->library('epdf.php');
		$data['masuk'] = $this->db->query("select * from 1_pemasukan where id_proyek='$id1'")->result();
		$data['sub_masuk'] = $this->db->query("select * from 2_sub_pemasukan where id_proyek='$id1'")->result();
		$data['sub_masuk'] = $this->crudkeu->get_data('2_sub_pemasukan')->result();
		$this->epdf->generate_submasuk('export_masukpr', $data);
	}

	public function export_kantor($bulan, $tahun)
	{
		$this->load->library('epdf.php');
		$data['kantor'] = $this->db->query("select * from 3_kantor_keluar")->result();
		$data['kantor_keluar'] = $this->db->query("select * from 3_kantor_keluar where bulan='$bulan' and tahun='$tahun'")->result();
		$data['totalktr'] = $this->db->query("select pengeluaran , sum(pengeluaran) as sum from 3_kantor_keluar where bulan='$bulan' and tahun='$tahun'")->result();
		$this->epdf->generate_keluar_kantor('export_keluar_kantor', $data);
	}

	public function export_kproyek($id1)
	{
		$this->load->library('epdf.php');
		$data['kantor'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['kantor2'] = $this->db->query("select * from 4_proyek_keluar")->result();
		$data['proyek1'] = $this->db->query("select * from 1_pemasukan where id_proyek= '$id1'")->result();
		$data['proyek2'] = $this->db->query("select * from 4_proyek_keluar where id_proyek= '$id1'")->result();
		$data['totalpro'] = $this->db->query("select nominal , sum(nominal) as sum from 4_proyek_keluar where id_proyek= '$id1'")->result();
		$data['totalsub'] = $this->db->query("select nominal , sum(nominal) as sum from 2_sub_pemasukan where id_proyek= '$id1'")->result();
		$this->epdf->generate_keluar_proyek('export_kelproyek', $data);
	}

	public function export_rekap($tahun)
	{
		$this->load->library('epdf.php');
		$data['kantor'] = $this->db->query("select * from 3_kantor_keluar group by tahun")->result();
		$data['masuk1'] = $this->db->query("select * from 1_pemasukan")->result();
		$data['masuk2'] = $this->db->query("select * from 2_sub_pemasukan group by tahun")->result();
		$data['proyek'] = $this->db->query("select * from 4_proyek_keluar group by tahun")->result();
	
		$data['kantor2'] = $this->db->query("select *, sum(pengeluaran) as sum from 3_kantor_keluar where tahun='$tahun' group by bulan ASC")->result();
		$data['masuk22'] = $this->db->query("select *, sum(nominal) as sum from 2_sub_pemasukan where tahun='$tahun' group by proyek")->result();
		$data['proyek2'] = $this->db->query("select *, sum(nominal) as sum from 4_proyek_keluar where tahun='$tahun' group by proyek")->result();
		
		$data['totkantor'] = $this->db->query("select *, sum(pengeluaran) as sum from 3_kantor_keluar where tahun='$tahun'")->result();
		$data['totm'] = $this->db->query("select *, sum(nominal) as sum from 2_sub_pemasukan where tahun='$tahun'")->result();
		$data['totk'] = $this->db->query("select *, sum(nominal) as sum from 4_proyek_keluar where tahun='$tahun'")->result();
		$this->epdf->generate_rekap('export_rekap', $data);
	}


//////////////////////------------------------FORM------------------////////////////////////

	public function new_masuk()
	{
		$this->load->view('form_newmasuk');
	}

	public function new_submasuk($id1)
	{
		$this->load->database();
		$data['pemasukan'] = $this->db->query("select * from 1_pemasukan where id_proyek= '$id1'")->result();
		$data['sub_pemasukan'] = $this->db->query("select * from 2_sub_pemasukan where id_proyek= '$id1'")->result();
		$this->load->view('form_submasuk', $data);
	}

	public function new_kantor()
	{
		$this->load->database();
		$data['kantor'] = $this->db->query("select * from 3_kantor_keluar")->result();
		$this->load->view('form_newkantor', $data);
	}

	public function new_proyek($id1)
	{
		$this->load->database();
		$data['proyek'] = $this->db->query("select * from 1_pemasukan where id_proyek= '$id1'")->result();
		$data['proyek_keluar'] = $this->db->query("select * from 4_proyek_keluar where id_proyek= '$id1'")->result();
		$this->load->view('form_newproyek', $data);
	}

//////////////// ---------------FUNGSI INPUT--------------- ////////////////

	public function input_proyek()
	{
		$data = [
			'nama' => html_escape($this->input->post('namaproyek', true)),
			'jumlah' => html_escape($this->input->post('anggaran', true))
		];
		$this->db->insert('1_pemasukan', $data);
		$this->session->set_flashdata('success', 'Data anggaran berhasil ditambah');
		redirect('dashboard/pemasukan');
	}

	public function input_pemasukan()
	{
		$data = [
			'id_proyek' => html_escape($this->input->post('idd', true)),
			'keterangan' => html_escape($this->input->post('keterangan', true)),
			'proyek' => html_escape($this->input->post('proyek', true)),
			'tanggal' => html_escape($this->input->post('tanggal', true)),
			'bulan' => html_escape($this->input->post('bulan', true)),
			'tahun' => html_escape($this->input->post('tahun', true)),
			'nominal' => html_escape($this->input->post('nominal', true))
		];
		$this->db->insert('2_sub_pemasukan', $data);
		$this->session->set_flashdata('success', 'Data pemasukan berhasil ditambah');
		redirect('dashboard/pemasukan');
	}
	
//INPUT PENGELUARAN KANTOR
	// public function input_keluar_kantor()
	// {
	// 	$data = [
	// 		'id_kantor' => $this->input->post('id_kantor'),

	// 		'tanggal' => $this->input->post('tanggal'),
	// 		'bulan' => $this->input->post('bulan'),
	// 		'tahun' => $this->input->post('tahun'),
	// 		'keperluan' => $this->input->post('keperluan'),
	// 		'stat_bayar' => $this->input->post('opsi'),
	// 		'kota' => $this->input->post('kota'),
	// 		'pengeluaran' => $this->input->post('nominal'),
	// 		'proyek' => $this->input->post('proyek')

	// 	];
	// 	$this->db->insert('3_kantor_keluar', $data);
	// 	redirect('dashboard/tbl_kantor');
	// }

	public function upload_kantor()
    {
        $dataNota = $this->crudkeu;
        $validation = $this->form_validation;
        $validation->set_rules($dataNota->rules());

        if ($validation->run()) {
            $dataNota->save();
            $this->session->set_flashdata('success', 'Data pengeluaran kantor berhasil ditambah');
		}
			$this->session->set_flashdata('danger', 'Data pengeluaran kantor GAGAL ditambahkan');
			$this->load->view("kantor_keluar");
		// $this->session->set_flashdata('success', '');
        redirect(base_url(). 'dashboard/tbl_kantor');
    }


	// public function input_keluar_proyek()
	// {
	// 	$data = [
	// 		'tanggal' => $this->input->post('tanggal'),
	// 		'bulan' => $this->input->post('bulan'),
	// 		'tahun' => $this->input->post('tahun'),
	// 		'proyek' => $this->input->post('proyek'),
	// 		'uraian' => $this->input->post('uraian'),
	// 		'nominal' => $this->input->post('nominal')
	// 	];
	// 	$this->db->insert('4_proyek_keluar', $data);
	// 	redirect('dashboard/tbl_proyek');
	// }

	public function upload_proyek()
    {
        $dataNota = $this->nota_proyek;
        $validation = $this->form_validation;
        $validation->set_rules($dataNota->rules());

        if ($validation->run()) {
            $dataNota->save();
            $this->session->set_flashdata('success', 'Data pengeluaran proyek berhasil ditambah');
		}
			$this->session->set_flashdata('danger', 'Data pengeluaran proyek GAGAL ditambahkan');
			$this->load->view("proyek_keluar1");
		// $this->session->set_flashdata('success', 'Data pengeluaran proyek berhasil ditambah');
		
        redirect(base_url(). 'dashboard/tbl_proyek');

    }

	///////////////----------------FUNGSI DELETE-----------/////////////////

	public function delete_pemasukan1($id1)
	{
		$where = array(
			'id_proyek' => $id1
		);
		$this->db->delete('1_pemasukan', $where);
		$this->session->set_flashdata('danger', 'Data anggaran berhasil dihapus');
		redirect('dashboard/pemasukan');
	}

	public function delete_pemasukan2($id1)
	{
		$where = array(
			'id_sub' => $id1
		);
		$this->db->delete('2_sub_pemasukan', $where);
		$this->session->set_flashdata('danger', 'Data pemasukan berhasil dihapus');
		redirect('dashboard/pemasukan');
	}


	public function delete_kantor($bulan, $tahun)
	{
		$where = array(
			'bulan' => $bulan,
			'tahun' => $tahun
		);
		$this->db->delete('3_kantor_keluar', $where);
		$this->session->set_flashdata('danger', 'Data pengeluaran kantor berhasil dihapus');
		redirect('dashboard/tbl_kantor');
	}

	public function delete_kantor2($tgl, $bulan, $tahun)
	{
		$where = array(
			'tanggal' => $tgl,
			'bulan' => $bulan,
			'tahun' => $tahun
		);
		$this->db->delete('3_kantor_keluar', $where);
		$this->session->set_flashdata('danger', 'Data pengeluaran kantor berhasil dihapus');
		redirect('dashboard/tbl_kantor');
	}
	
	public function delete_proyek($id1)
	{
		$where = array(
			'id_keluar_proyek' => $id1
		);
		$this->db->delete('4_proyek_keluar', $where);
		$this->session->set_flashdata('danger', 'Data pengeluaran proyek berhasil dihapus');
		redirect('dashboard/tbl_proyek');
	}


	///////////////----------------FUNGSI UPDATE-----------/////////////////

	public function update($id1)
	{
		$id1 =  $this->input->post('id');

		$where = array(

			'nama' =>  $this->input->post('nama'),
			'jumlah' =>  $this->input->post('anggaran')
		);
		$this->db->update( '1_pemasukan', $where);
		redirect('dashboard/pemasukan');
	}

	public function ubah(){
	$id1 = $this->input->post('id');
    $data = array(
        'nama'		=> $this->input->post('nama'),
        'jumlah'	=> $this->input->post('anggaran'),
    );
    $this->crudkeu->ubah($data,$id1);
    $this->session->set_flashdata('success', 'Data anggaran berhasil diubah');
    redirect('dashboard/pemasukan');
	}

	public function ubah2(){
		$id1 = $this->input->post('id');
		$data = array(
			'keterangan'=> $this->input->post('ket'),
			'tanggal'	 => $this->input->post('tgl'),
			'bulan'	 => $this->input->post('bln'),
			'tahun'	 => $this->input->post('thn'),
			'nominal'=> $this->input->post('nominal'),
		);
		$this->crudkeu->ubah2($data,$id1);
		$this->session->set_flashdata('success', 'Data pemasukan berhasil diubah');
		redirect('dashboard/pemasukan');
		}

		public function ubah3(){
			$id1 = $this->input->post('id');
			$data = array(
				'keperluan'	 => $this->input->post('ket'),
				'tanggal'	 => $this->input->post('tgl'),
				'bulan'		 => $this->input->post('bln'),
				'tahun'		 => $this->input->post('thn'),
				'stat_bayar' => $this->input->post('opsi'),
				'kota'		 => $this->input->post('kota'),
				'proyek'	 => $this->input->post('proyek'),
				'pengeluaran'	 => $this->input->post('nominal'),
				'nota' => $this->crudkeu->_uploadnota()
			);
			$where = array (
				'id_kantor' => $id1
			);
			$this->crudkeu->update_data($where, $data, '3_kantor_keluar');
			$this->session->set_flashdata('success', 'Data pengeluaran kantor berhasil diubah');
			redirect('dashboard/tbl_kantor');
			}

			public function ubah4(){
				$id1 = $this->input->post('id');
				$data = array(
					'uraian'	 => $this->input->post('ket'),
					'tanggal'	 => $this->input->post('tgl'),
					'bulan'		 => $this->input->post('bln'),
					'tahun'		 => $this->input->post('thn'),
					'nominal'	 => $this->input->post('nominal'),
					'nota' => $this->crudkeu->_uploadnota()
				);

				$where = array (
					'id_keluar_proyek' => $id1
				);
				$this->crudkeu->update_data($where, $data, '4_proyek_keluar');
				$this->session->set_flashdata('success', 'Data pengeluaran proyek berhasil diubah');				
				redirect('dashboard/tbl_proyek');
				}

				// public function updatektr()
				// {
				// 	$post = $this->input->post();
				// 	$this->id_kantor = $post["id_kantor"];
				// 	$this->tanggal = $post["tanggal"];
				// 	$this->bulan = $post["bulan"];
				// 	$this->tahun = $post["tahun"];
				// 	$this->keperluan = $post["keperluan"];
				// 	$this->stat_bayar = $post["opsi"];
				// 	$this->pengeluaran = $post["nominal"];
				// 	$this->proyek = $post["proyek"];
				// 	$this->kota = $post["kota"];
			
				// 	// $data = array(
				// 	// 	'id_kantor' => $id_kantor,
				// 	// 	'tanggal' => $tanggal,
				// 	// 	'bulan' => $bulan,
				// 	// 	'tahun' => $tahun,
				// 	// 	'keperluan' => $keperluan,
				// 	// 	'stat_bayar' => $opsi,
				// 	// 	'pengeluaran' => $nominal,
				// 	// 	'proyek' => $proyek,
				// 	// 	'kota' => $kota
				// 	// )
			
				// 	$this->nota = $this->_uploadnota();
				// 	return $this->db->where($where);
				// 	$this->db->update($table, $data);
				// 	// $this->db->insert($this->_table, $this);
				// }

	public function get() {
		
	}

}
