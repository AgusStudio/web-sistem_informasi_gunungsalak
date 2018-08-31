<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$log_in = $this->session->userdata('logged_in');
		if(empty($log_in)){
			redirect('login');
		}
	}
	public function index()
	{
		$data['tarif'] = $this->Model_halimun->get_data('tarif_wisata');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/beranda',$data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
	function kuota()
	{
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('kuota_pendakian');
		$data['kuota'] = $this->Model_halimun->kuota('kuota_pendakian','tgl_kuota','desc');
		$data['pintu'] = $this->Model_halimun->get_data('pintu_masuk');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/kuota',$data);
	}
	function editkuota($id)
	{
		$cek = $this->Model_halimun->data_detail('kuota_pendakian','id_kuota',$id);
		if(count($cek) < 1){ redirect('admin/kuota'); }
		$data['kuota_edit'] = $cek;
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('kuota_pendakian');
		$data['kuota'] = $this->Model_halimun->kuota('kuota_pendakian','tgl_kuota','desc');
		$data['pintu'] = $this->Model_halimun->get_data('pintu_masuk');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/editkuota',$data);
	}
	function add_kuota(){
		$id = $this->input->post('id_kuota',true);
		$tgl = date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$id_pintu = $this->input->post('id_pintu',true);
		$data = array(
			'id_kuota'=>$id,
			'tgl_kuota'=>$tgl);
		$this->Model_halimun->insert_data('kuota_pendakian',$data);
		foreach ($id_pintu as $pintu)
		{
			$val_pintu = $pintu;
			$kuota = $this->input->post('kuota'.$val_pintu,true);
			if($kuota < 1){ $status_isi = '1';}else{ $status_isi = '0'; }			
			$data_isi = array(
				'id_kuota'=>$id,
				'pintu_masuk'=>$val_pintu,
				'volume_kuota'=>$kuota,
				'status_isi'=>$status_isi);
			$this->Model_halimun->insert_data('isi_kuota',$data_isi);
		}
		$data['word'] = "Data berhasil disimpan";
		$data['action'] = "admin/kuota";
		$this->load->view('alert',$data);
	}
	function edit_kuota(){
		$id = $this->input->post('id_kuota',true);
		$tgl = date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$id_isi = $this->input->post('id_isi',true);
		$data = array(
			'tgl_kuota'=>$tgl);
		$this->Model_halimun->update_data('kuota_pendakian','id_kuota',$id,$data);
		foreach ($id_isi as $isi)
		{
			$val_isi = $isi;
			$id_pintu = $this->input->post('id_pintu'.$val_isi,true);
			$kuota = $this->input->post('kuota'.$val_isi,true);	
			$data_isi = array(
				'id_kuota'=>$id,
				'pintu_masuk'=>$id_pintu,
				'volume_kuota'=>$kuota);
			$this->Model_halimun->update_data('isi_kuota','id_isi',$val_isi,$data_isi);
		}
		$data['word'] = "Data berhasil disimpan";
		$data['action'] = "admin/kuota";
		$this->load->view('alert',$data);
	}
	function tutupkuota($a){
		$cek = $this->Model_halimun->data_detail('kuota_pendakian','id_kuota',$a);
		if(count($cek)==0){ redirect('admin/kuota'); }
		$data_isi = array('status_isi'=>'1');
		$this->Model_halimun->update_data('isi_kuota','id_kuota',$a,$data_isi);
		$data['word'] = "Kuota telah ditutup";
		$data['action'] = "admin/kuota";
		$this->load->view('alert',$data);
	}
	function pintu_masuk()
	{
		$data['pintu'] = $this->Model_halimun->get_data('pintu_masuk');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/pintu_masuk',$data);
	}
	function edit_pintu()
	{
		$id = $this->input->post('id',true);
		$nama = $this->input->post('nama',true);
		$status = $this->input->post('status',true);
		$data = array(
			'nama_pintu'=>$nama,
			'status_pintu'=>$status);
		$this->Model_halimun->update_data('pintu_masuk',$id,$data);
		$data['word'] = "Data berhasil disimpan";
		$data['action'] = "admin/pintu_masuk";
		$this->load->view('alert',$data);
	}
	function add_pintu()
	{
		$nama = $this->input->post('nama',true);
		$status = $this->input->post('status',true);
		$data = array(
			'nama_pintu'=>$nama,
			'status_pintu'=>$status);
		$this->Model_halimun->insert_data('pintu_masuk',$data);
		$data['word'] = "Data berhasil disimpan";
		$data['action'] = "admin/pintu_masuk";
		$this->load->view('alert',$data);
	}
	function proses_tarif()
	{
		if($this->input->post('btn') =="1"){
			$kd_tarif = $this->input->post('kode_show',true);
			$jenis_wisata = $this->input->post('jenis_wisata',true);
			$jenis_kegiatan = $this->input->post('jenis_kegiatan',true);
			$satuan = $this->input->post('satuan',true);
			$tarif = $this->input->post('tarif',true);
			$data = array(
				'jenis_wisata'=>$jenis_wisata,
				'jenis_kegiatan'=>$jenis_kegiatan,
				'satuan'=>$satuan,
				'tarif'=>$tarif
				);
			$this->Model_halimun->update_data('tarif_wisata','kode_tarif',$kd_tarif,$data);
			$data['word'] = "Data berhasil disimpan";
			$data['action'] = "admin";
			$this->load->view('alert',$data);
		}else{
			$kd_tarif = $this->input->post('kd_tarif',true);
			$jenis_wisata = $this->input->post('jenis_wisata',true);
			$jenis_kegiatan = $this->input->post('jenis_kegiatan',true);
			$satuan = $this->input->post('satuan',true);
			$tarif = $this->input->post('tarif',true);
			$data = array(
				'kode_tarif'=>$kd_tarif,
				'jenis_wisata'=>$jenis_wisata,
				'jenis_kegiatan'=>$jenis_kegiatan,
				'satuan'=>$satuan,
				'tarif'=>$tarif
				);
			$this->Model_halimun->insert_data('tarif_wisata',$data);
			$data['word'] = "Data berhasil disimpan";
			$data['action'] = "admin";
			$this->load->view('alert',$data);
		}
	}
	function berita()
	{
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('berita');
		$data['berita'] = $this->Model_halimun->adm_berita('berita','author_berita','author_berita.id_berita = berita.id_berita','admin.nik = author_berita.nik','berita.tgl_berita','desc');
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/berita',$data);
	}
	function editberita($a,$b)
	{
		$edit = $this->Model_halimun->data_detail('berita','id_berita',$a);
		if(count($edit)==0){
			redirect('admin/berita');
		}
		$data['berita_edit'] = $edit;
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('berita');
		$data['berita'] = $this->Model_halimun->adm_berita('berita','author_berita','author_berita.id_berita = berita.id_berita','admin.nik = author_berita.nik','berita.tgl_berita','desc');
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/editberita',$data);
	}
	function artikel()
	{
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('artikel');
		$data['artikel'] = $this->Model_halimun->adm_berita('artikel','author_artikel','author_artikel.id_artikel = artikel.id_artikel','admin.nik = author_artikel.nik','artikel.tgl_artikel','desc');
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/artikel',$data);
	}
	function editartikel($a,$b)
	{
		$edit = $this->Model_halimun->data_detail('artikel','id_artikel',$a);
		if(count($edit)==0){
			redirect('admin/artikel');
		}
		$data['artikel_edit'] = $edit;
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('artikel');
		$data['artikel'] = $this->Model_halimun->adm_berita('artikel','author_artikel','author_artikel.id_artikel = artikel.id_artikel','admin.nik = author_artikel.nik','artikel.tgl_artikel','desc');
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/editartikel',$data);
	}
	function add_berita()
	{
		$id = $this->input->post('autoinc',true);
		$nik = $this->input->post('nik',true);
		$judul = $this->input->post('add_judul',true);
		$isi = $this->input->post('add_isi',true);
		$nmfile = 'berita_'.$id;
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/berita";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'id_berita'=>$id,
				'judul_berita'=>$judul,
				'isi_berita'=>$isi,
				'gambar_berita'=>$gbr['file_name'],
				'status_berita'=>'1',
			);
			$data2 = array(
				'id_berita'=>$id,
				'nik'=>$nik
			);
			$this->Model_halimun->insert_data('berita',$data);
			$this->Model_halimun->insert_data('author_berita',$data2);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/berita";
			$this->load->view('alert',$data);	
		}
	}
	function edit_berita()
	{
		$id = $this->input->post('id_berita',true);
		$nik = $this->input->post('nik',true);
		$judul = $this->input->post('judul',true);
		$isi = $this->input->post('isi',true);
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'berita_'.$id;
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/berita";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'judul_berita'=>$judul,
					'isi_berita'=>$isi,
					'gambar_berita'=>$gbr['file_name'],
					'status_berita'=>'0'
				);
				$data2 = array(
					'nik'=>$nik
				);
				$this->Model_halimun->update_data('berita','id_berita',$id,$data);
				$this->Model_halimun->update_data('author_berita','id_berita',$id,$data2);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/berita";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'judul_berita'=>$judul,
				'isi_berita'=>$isi,
				'status_berita'=>'0'
			);
			$data2 = array(
				'nik'=>$nik
			);
			$this->Model_halimun->update_data('berita','id_berita',$id,$data);
			$this->Model_halimun->update_data('author_berita','id_berita',$id,$data2);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/berita";
			$this->load->view('alert',$data);	
		}
	}
	function del_berita($id)
	{
		$this->Model_halimun->delete_data('berita','id_berita',$id);
		$this->Model_halimun->delete_data('author_berita','id_berita',$id);
		$data['word'] = "Berita berhasil dihapus";
		$data['action'] = "admin/berita";
		$this->load->view('alert',$data);
	}
	function publ_berita($id)
	{
		$data = array('status_berita'=>'1');
		$this->Model_halimun->update_data('berita','id_berita',$id,$data);
		$data['word'] = "Berita berhasil diposting";
		$data['action'] = "admin/berita";
		$this->load->view('alert',$data);
	}
	function detail_berita($a,$b)
	{
		$berita_fj = 'author_berita.id_berita = berita.id_berita'; 
		$news_author = 'admin.nik = author_berita.nik'; 
		$berita_f = 'berita.status_berita';
		$data['berita'] = $this->Model_halimun->detail_berita('berita','berita.id_berita',$a,'author_berita',$berita_fj,$news_author);
		$data['berita_lain'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','asc','8','0');
		$data['banner_utama'] = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['informasi'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['beranda'] ="";
		$this->load->view('berita',$data);
	}
	function add_artikel()
	{
		$id = $this->input->post('autoinc',true);
		$nik = $this->input->post('nik',true);
		$judul = $this->input->post('add_judul',true);
		$isi = $this->input->post('add_isi',true);
		$nmfile = 'artikel_'.$id;
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/artikel";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'id_artikel'=>$id,
				'judul_artikel'=>$judul,
				'isi_artikel'=>$isi,
				'gambar_artikel1'=>$gbr['file_name'],
			);
			$data2 = array(
				'id_artikel'=>$id,
				'nik'=>$nik
			);
			$this->Model_halimun->insert_data('artikel',$data);
			$this->Model_halimun->insert_data('author_artikel',$data2);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/artikel";
			$this->load->view('alert',$data);	
		}
	}
	function edit_artikel()
	{
		$id = $this->input->post('id_artikel',true);
		$nik = $this->input->post('nik',true);
		$judul = $this->input->post('judul',true);
		$isi = $this->input->post('isi',true);
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'artikel_'.$id;
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/artikel";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'judul_artikel'=>$judul,
					'isi_artikel'=>$isi,
					'gambar_artikel1'=>$gbr['file_name'],
					'status_artikel'=>'0'
				);
				$data2 = array(
					'nik'=>$nik
				);
				$this->Model_halimun->update_data('artikel','id_artikel',$id,$data);
				$this->Model_halimun->update_data('author_artikel','id_artikel',$id,$data2);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/artikel";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'judul_artikel'=>$judul,
				'isi_artikel'=>$isi,
				'status_artikel'=>'0'
			);
			$data2 = array(
				'nik'=>$nik
			);
			$this->Model_halimun->update_data('artikel','id_artikel',$id,$data);
			$this->Model_halimun->update_data('author_artikel','id_artikel',$id,$data2);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/artikel";
			$this->load->view('alert',$data);	
		}
	}
	function del_artikel($id)
	{
		$this->Model_halimun->delete_data('artikel','id_artikel',$id);
		$this->Model_halimun->delete_data('author_artikel','id_artikel',$id);
		$data['word'] = "Artikel berhasil dihapus";
		$data['action'] = "admin/artikel";
		$this->load->view('alert',$data);
	}
	function publ_artikel($id)
	{
		$data = array('status_artikel'=>'1');
		$this->Model_halimun->update_data('artikel','id_artikel',$id,$data);
		$data['word'] = "Artikel berhasil diposting";
		$data['action'] = "admin/artikel";
		$this->load->view('alert',$data);
	}
	function agenda()
	{
		$agenda = $this->Model_halimun->adm_info('informasi','kategori','Agenda','tgl_post','desc');
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('informasi');
		$data['agenda'] = $agenda->result();
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['hak'] = $this->session->userdata('hak');
		$data['foto'] = $this->session->userdata('foto');
		$this->load->view('admin/agenda',$data);
	}
	function editagenda($a,$b)
	{
		$agenda = $this->Model_halimun->adm_info('informasi','kategori','Agenda','tgl_post','desc');
		$edit = $this->Model_halimun->data_detail('informasi','id_info',$a);
		if(count($edit)==0){
			redirect('admin/agenda');
		}
		$data['agenda_edit'] = $edit;
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('informasi');
		$data['agenda'] = $agenda->result();
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/editagenda',$data);
	}
	function add_agenda()
	{
		$id = $this->input->post('autoinc',true);
		$judul = $this->input->post('add_judul',true);
		$tgl_agenda = date('Y-m-d',strtotime($this->input->post('add_tgl',true)));
		$isi = $this->input->post('add_isi',true);
		$nmfile = 'agenda_'.$id;
		$config['upload_path'] = './assets/img/info/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/agenda";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'id_info'=>$id,
				'judul_info'=>$judul,
				'isi_info'=>$isi,
				'gambar_info'=>$gbr['file_name'],
				'tgl_agenda'=>$tgl_agenda,
				'kategori'=>'Agenda',
			);
			$this->Model_halimun->insert_data('informasi',$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/agenda";
			$this->load->view('alert',$data);	
		}
	}
	function edit_agenda()
	{
		$id = $this->input->post('id_info',true);
		$tgl_agenda = date('Y-m-d',strtotime($this->input->post('tgl_agenda',true)));
		$judul = $this->input->post('judul',true);
		$isi = $this->input->post('isi',true);
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'agenda_'.$id;
			$config['upload_path'] = './assets/img/info/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/agenda";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'judul_info'=>$judul,
					'isi_info'=>$isi,
					'gambar_info'=>$gbr['file_name'],
					'status_info'=>'0',
					'tgl_agenda'=>$tgl_agenda,
					'kategori'=>'Agenda',
				);
				$this->Model_halimun->update_data('informasi','id_info',$id,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/agenda";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'judul_info'=>$judul,
				'isi_info'=>$isi,
				'status_info'=>'0',
				'tgl_agenda'=>$tgl_agenda,
				'kategori'=>'Agenda',
			);
			$this->Model_halimun->update_data('informasi','id_info',$id,$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/agenda";
			$this->load->view('alert',$data);	
		}
	}
	function del_agenda($id)
	{
		$this->Model_halimun->delete_data('informasi','id_info',$id);
		$data['word'] = "Agenda berhasil dihapus";
		$data['action'] = "admin/agenda";
		$this->load->view('alert',$data);
	}
	function publ_agenda($id)
	{
		$data = array('status_info'=>'1');
		$this->Model_halimun->update_data('informasi','id_info',$id,$data);
		$data['word'] = "Agenda berhasil diposting";
		$data['action'] = "admin/agenda";
		$this->load->view('alert',$data);
	}
	function informasi()
	{
		$informasi = $this->Model_halimun->adm_info('informasi','kategori','Informasi Pendakian','tgl_post','desc');
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('informasi');
		$data['informasi'] = $informasi->result();
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/informasi',$data);
	}
	function editinformasi($a,$b)
	{
		$informasi = $this->Model_halimun->adm_info('informasi','kategori','Informasi Pendakian','tgl_post','desc');
		$edit = $this->Model_halimun->data_detail('informasi','id_info',$a);
		if(count($edit)==0){
			redirect('admin/informasi');
		}
		$data['informasi_edit'] = $edit;
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('informasi');
		$data['informasi'] = $informasi->result();
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/editinformasi',$data);
	}
	function add_informasi()
	{
		$id = $this->input->post('autoinc',true);
		$judul = $this->input->post('add_judul',true);
		$isi = $this->input->post('add_isi',true);
		$nmfile = 'informasi_'.$id;
		$config['upload_path'] = './assets/img/info/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/informasi";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'id_info'=>$id,
				'judul_info'=>$judul,
				'isi_info'=>$isi,
				'gambar_info'=>$gbr['file_name'],
				'kategori'=>'Informasi Pendakian',
			);
			$this->Model_halimun->insert_data('informasi',$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/informasi";
			$this->load->view('alert',$data);	
		}
	}
	function edit_informasi()
	{
		$id = $this->input->post('id_info',true);
		$judul = $this->input->post('judul',true);
		$isi = $this->input->post('isi',true);
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'informasi_'.$id;
			$config['upload_path'] = './assets/img/info/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/informasi";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'judul_info'=>$judul,
					'isi_info'=>$isi,
					'gambar_info'=>$gbr['file_name'],
					'status_info'=>'0',
					'kategori'=>'Informasi Pendakian',
				);
				$this->Model_halimun->update_data('informasi','id_info',$id,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/informasi";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'judul_info'=>$judul,
				'isi_info'=>$isi,
				'status_info'=>'0',
				'kategori'=>'Informasi Pendakian',
			);
			$this->Model_halimun->update_data('informasi','id_info',$id,$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/informasi";
			$this->load->view('alert',$data);	
		}
	}
	function del_informasi($id)
	{
		$this->Model_halimun->delete_data('informasi','id_info',$id);
		$data['word'] = "Informasi berhasil dihapus";
		$data['action'] = "admin/informasi";
		$this->load->view('alert',$data);
	}
	function publ_informasi($id)
	{
		$data = array('status_info'=>'1');
		$this->Model_halimun->update_data('informasi','id_info',$id,$data);
		$data['word'] = "Informasi berhasil diposting";
		$data['action'] = "admin/informasi";
		$this->load->view('alert',$data);
	}
	function galeri()
	{
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('galeri');
		$data['galery'] = $this->Model_halimun->get_data('galeri');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/galeri',$data);
	}
	function edit_galeri()
	{
		$id = $this->input->post('id_galeri',true);
		$nama = $this->input->post('nama',true);
		$kategori = $this->input->post('kategori',true);
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'galeri_'.$id;
			$config['upload_path'] = './assets/img/gallery/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/galeri";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'nama_galeri'=>$nama,
					'kat_galeri'=>$kategori,
					'foto_galeri'=>$gbr['file_name'],
				);
				$this->Model_halimun->update_data('galeri','id_galeri',$id,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/galeri";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'nama_galeri'=>$nama,
				'kat_galeri'=>$kategori,
			);
			$this->Model_halimun->update_data('galeri','id_galeri',$id,$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/galeri";
			$this->load->view('alert',$data);
		}
	}
	function add_galeri()
	{
		$id = $this->input->post('autoinc',true);
		$nama = $this->input->post('nama',true);
		$kategori = $this->input->post('kategori',true);
		$nmfile = 'galeri_'.$id;
		$config['upload_path'] = './assets/img/gallery/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/galeri";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'nama_galeri'=>$nama,
				'kat_galeri'=>$kategori,
				'foto_galeri'=>$gbr['file_name'],
			);
			$this->Model_halimun->insert_data('galeri',$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/galeri";
			$this->load->view('alert',$data);	
		}
	}
	function komentar()
	{ 
		$data['komen'] = $this->Model_halimun->get_komen('komentar','tgl_post','desc');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/komentar',$data);
	}
	function administrator()
	{ 
		$data['adm'] = $this->Model_halimun->get_data('admin');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/administrator',$data);
	}
	function add_admin()
	{ 
		$nik = $this->input->post('nik',true);
		$nama = $this->input->post('nama',true);
		$jabatan = $this->input->post('jabatan',true);
		$username = $this->input->post('username',true);
		$pass = $this->input->post('pass',true);
		$co_pass = $this->input->post('co_pass',true);
		if($pass != $co_pass){
			$data['word'] = "Password & Konfirmasi Password tidak sama";
			$data['action'] = "admin/administrator";
			$this->load->view('alert',$data);
		}else{
			$password = MD5($pass);
			$hak_akses = $this->input->post('hak_akses',true);
			$img = $_FILES['userfile']['name'];
			if($img != ""){
				$nmfile = 'user_'.$nik;
				$config['upload_path'] = './assets/img/user/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 100000;
				$config['max_height'] = 4000;
				$config['max_width'] = 4000;
				$config['file_name'] = $nmfile;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('userfile')){
					$data['word'] = "Data gagal unggah";
					$data['action'] = "admin/administrator";
					$this->load->view('alert',$data);	
				}else{
					$gbr = $this->upload->data();
					$data = array(
						'nik'=>$nik,
						'nama'=>$nama,
						'jabatan'=>$jabatan,
						'username'=>$username,
						'password'=>$password,
						'hak_akses'=>$hak_akses,
						'status_admin'=>'1',
						'foto'=>$gbr['file_name'],
					);
					$this->Model_halimun->insert_data('admin',$data);
					$data['word'] = "Data berhasil diunggah";
					$data['action'] = "admin/administrator";
					$this->load->view('alert',$data);	
				}
			}
			if($img == ""){
				$data = array(
					'nik'=>$nik,
					'nama'=>$nama,
					'jabatan'=>$jabatan,
					'username'=>$username,
					'password'=>$password,
					'hak_akses'=>$hak_akses,
					'status_admin'=>'1',
				);
				$this->Model_halimun->insert_data('admin',$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/administrator";
				$this->load->view('alert',$data);	
			}
		}
	}
	function edit_admin()
	{ 
		$nik = $this->input->post('nik',true);
		$nama = $this->input->post('nama',true);
		$jabatan = $this->input->post('jabatan',true);
		$hak_akses = $this->input->post('hak_akses',true);
		$data = array(

				'nama'=>$nama,
				'jabatan'=>$jabatan,
				'hak_akses'=>$hak_akses,
				'status_admin'=>'1',
			);
		$this->Model_halimun->update_data('admin','nik',$nik,$data);
		$data['word'] = "Data berhasil diunggah";
		$data['action'] = "admin/administrator";
		$this->load->view('alert',$data);	
	}
	function del_admin($a)
	{ 
		$data = array('status_admin'=>'0');
		$this->Model_halimun->update_data('admin','nik',$a,$data);
		$data['word'] = "Admin berhasil dihapus";
		$data['action'] = "admin/administrator";
		$this->load->view('alert',$data);
	}

	function banner()
	{ 
		$data['banner'] = $this->Model_halimun->get_data('banner');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$bp = $this->Model_halimun->data_where('banner','kat_banner','2');
		$data['count_bu'] = count($bu);
		$data['count_bp'] = count($bp);
		$data['banner_utama'] = $bu;
		$data['banner_promo'] = $bp;
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/banner',$data);
	}
	function add_banner()
	{ 
		$nama = $this->input->post('add_nama',true);
		$txt_contain = $this->input->post('add_txt_contain',true);
		$txt_btn = $this->input->post('add_txt_btn',true);
		$kat = $this->input->post('add_kat',true);
		if($kat == 1){ $link = base_url('welcome/pendakian');}else{ $link = base_url('welcome/sewaalat');}
		$cb = $this->Model_halimun->info('banner','kat_banner',$kat,'status_banner','active')->num_rows();
		if($cb > 0){ $status_banner = "#"; }else{ $status_banner = "active";}
		$nmfile = 'banner_'.$nama;
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/banner";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'judul'=>$nama,
				'isi'=>$txt_contain,
				'gambar'=>$gbr['file_name'],
				'text_button'=>$txt_btn,
				'status_banner'=>$status_banner,
				'link'=>$link,
				'kat_banner'=>$kat
			);
			$this->Model_halimun->insert_data('banner',$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/banner";
			$this->load->view('alert',$data);	
		}
	}
	function edit_banner()
	{ 
		$id= $this->input->post('id_banner',true);
		$nama = $this->input->post('nama',true);
		$txt_contain = $this->input->post('txt_contain',true);
		$txt_btn = $this->input->post('txt_btn',true);    
		$kat = $this->input->post('kat',true);
		if($kat == 1){ $link = base_url('welcome/pendakian');}else{ $link = base_url('welcome/sewaalat');}
		$cb = $this->Model_halimun->info('banner','kat_banner',$kat,'status_banner','active')->num_rows();
		if($cb > 0){ $status_banner = "#"; }else{ $status_banner = "active";}
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'banner_'.$nama;
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/banner";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'judul'=>$nama,
					'isi'=>$txt_contain,
					'gambar'=>$gbr['file_name'],
					'text_button'=>$txt_btn,
					'status_banner'=>$status_banner,
					'link'=>$link,
					'kat_banner'=>$kat
				);
				$this->Model_halimun->update_data('banner','id_banner',$id,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/banner";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'judul'=>$nama,
				'isi'=>$txt_contain,
				'text_button'=>$txt_btn,
				'status_banner'=>$status_banner,
				'link'=>$link,
				'kat_banner'=>$kat
			);
			$this->Model_halimun->update_data('banner','id_banner',$id,$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/banner";
			$this->load->view('alert',$data);	
		}
	}
	function del_banner($a)
	{ 
		$get_data = $this->Model_halimun->data_detail('banner','id_banner',$a);
		if($get_data->status_banner == 'active'){
			$data['word'] = "Status Banner active tidak dapat dihapus";
			$data['action'] = "admin/banner";
			$this->load->view('alert',$data);	
		}else{
		unlink('assets/img/'.$get_data->gambar);
		$this->Model_halimun->delete_data('banner','id_banner',$a);
		$data['word'] = "Data berhasil dihapus";
		$data['action'] = "admin/banner";
		$this->load->view('alert',$data);
		}
	}
	function outdoor_equipment()
	{
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('alat');
		$tj = 'kategori_outdoor.id_kat = alat.kategori_alat';
		$data['alat'] = $this->Model_halimun->adm_outdoor('alat','tgl_post','desc','kategori_outdoor',$tj);
		$data['kategori'] = $this->Model_halimun->get_data('kategori_outdoor');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/outdoor_equipment',$data);
	}
	function edit_outdoor($a,$b)
	{
		$get_data = $this->Model_halimun->data_detail('alat','id_alat',$a);
		if(count($get_data) == 0){
			redirect('admin/outdoor_equipment');
		}
		$data['alat'] = $get_data;
		$data['kategori'] = $this->Model_halimun->get_data('kategori_outdoor');
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/detail_outdoor',$data);
	}
	function add_outdoor()
	{ 
		$id_alat = $this->input->post('id_alat',true);
		$nama = $this->input->post('nama',true);
		$deskripsi = $this->input->post('deskripsi',true);
		$harga = $this->input->post('harga',true);
		$kat = $this->input->post('kategori',true);
		$img = $_FILES['userfile']['name'];
		$img1 = $_FILES['userfile1']['name'];
		$config['upload_path'] = './assets/img/outdoor_equipment/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile') || !$this->upload->do_upload('userfile1')){
			$data['word'] = "Data gagal unggah";
			$data['action'] = "admin/outdoor_equipment";
			$this->load->view('alert',$data);	
		}else{
			$gbr = $this->upload->data('userfile'); $gbr1 = $this->upload->data('userfile1');
			$data = array(
				'nama_alat'=>$nama,
				'deskripsi'=>$deskripsi,
				'harga_sewa'=>$harga,
				'kategori_alat'=>$kat,
				'gambar'=>$img,
				'gambar_besar'=>$img1,
			);
			$this->Model_halimun->insert_data('alat',$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/outdoor_equipment";
			$this->load->view('alert',$data);	
		}
	}
	function pro_edit_outdoor()
	{ 
		$id_alat = $this->input->post('id_alat',true);
		$nama = $this->input->post('nama',true);
		$deskripsi = $this->input->post('deskripsi',true);
		$harga = $this->input->post('harga',true);
		$kat = $this->input->post('kategori',true);
		$img = $_FILES['userfile']['name'];
		$img1 = $_FILES['userfile1']['name'];
		if($img != "" && $img1 != ""){
			$config['upload_path'] = './assets/img/outdoor_equipment/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile') || !$this->upload->do_upload('userfile1')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/outdoor_equipment";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data('userfile'); $gbr1 = $this->upload->data('userfile1');
				$data = array(
					'nama_alat'=>$nama,
					'deskripsi'=>$deskripsi,
					'harga_sewa'=>$harga,
					'kategori_alat'=>$kat,
					'gambar'=>$img,
					'gambar_besar'=>$img1,
				);
				$this->Model_halimun->update_data('alat','id_alat',$id_alat,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/outdoor_equipment";
				$this->load->view('alert',$data);	
			}
		}
		if($img != "" && $img1 == ""){
			$config['upload_path'] = './assets/img/outdoor_equipment/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/outdoor_equipment";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data('userfile');
				$data = array(
					'nama_alat'=>$nama,
					'deskripsi'=>$deskripsi,
					'harga_sewa'=>$harga,
					'kategori_alat'=>$kat,
					'gambar'=>$img,
				);
				$this->Model_halimun->update_data('alat','id_alat',$id_alat,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/outdoor_equipment";
				$this->load->view('alert',$data);	
			}
		}
		if($img == "" && $img1 != ""){
			$config['upload_path'] = './assets/img/outdoor_equipment/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile1')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/outdoor_equipment";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data('userfile1');
				$data = array(
					'nama_alat'=>$nama,
					'deskripsi'=>$deskripsi,
					'harga_sewa'=>$harga,
					'kategori_alat'=>$kat,
					'gambar_besar'=>$img1,
				);
				$this->Model_halimun->update_data('alat','id_alat',$id_alat,$data);
				$data['word'] = "Data berhasil diunggah";
				$data['action'] = "admin/outdoor_equipment";
				$this->load->view('alert',$data);	
			}
		}
		if($img == "" && $img1 == ""){
			$data = array(
				'nama_alat'=>$nama,
				'deskripsi'=>$deskripsi,
				'harga_sewa'=>$harga,
				'kategori_alat'=>$kat,
			);
			$this->Model_halimun->update_data('alat','id_alat',$id_alat,$data);
			$data['word'] = "Data berhasil diunggah";
			$data['action'] = "admin/outdoor_equipment";
			$this->load->view('alert',$data);	
		}
	}
	function publ_outdoor($a)
	{ 
		$get_data = $this->Model_halimun->data_detail('alat','id_alat',$a);
		if(count($get_data) == 0){
			redirect('admin/outdoor_equipment');
		}else{
		$data = array('status_alat'=>'1');
		$this->Model_halimun->update_data('alat','id_alat',$a,$data);
		$data['word'] = "Data berhasil dipublish";
		$data['action'] = "admin/outdoor_equipment";
		$this->load->view('alert',$data);
		}
	}
	function del_outdoor($a)
	{ 
		$get_data = $this->Model_halimun->data_detail('alat','id_alat',$a);
		if(count($get_data) == 0){
			redirect('admin/outdoor_equipment');
		}else{
		$data = array('status_alat'=>'0');
		$this->Model_halimun->update_data('alat','id_alat',$a,$data);
		$data['word'] = "Data berhasil dihapus";
		$data['action'] = "admin/outdoor_equipment";
		$this->load->view('alert',$data);
		}
	}
	
	function profil()
	{ 
		$x = $this->uri->segment(3);
		if($x == "ubahpassword"){ $data['b'] = 'active'; $data['a'] = $data['c'] = '';
		}else if($x == "ubahbiodata"){ $data['c'] = 'active'; $data['a'] = $data['b'] = '';
		}else if($x == "biodata"){ $data['a'] = 'active'; $data['b'] = $data['c'] = '';
		}else{ $data['a'] = 'active'; $data['b'] = $data['c'] = '';  }
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$data['nik'] = $this->session->userdata('nik');
		$this->load->view('admin/profil',$data);
	}
	function ubahpassword()
	{
		$nik = $this->input->post('nik',true);
		$get_data = $this->Model_halimun->data_detail('admin','nik',$nik);
		$curent_pass = $get_data->password;
		$oldpass = $this->input->post('passlama',true);
		$newpass = $this->input->post('passbaru',true);
		$hast = MD5($newpass);
		$hast2 = MD5($oldpass);
		if($hast2!=$curent_pass){
			$data['word'] = "Password lama salah";
			$data['action'] = "admin/profil/ubahpassword";
			$this->load->view('alert',$data);
		}else{
			$data = array('password'=>$hast);
			$this->Model_halimun->update_data('admin','nik',$nik,$data);
			$data['word'] = "Password berhasil diubah";
			$data['action'] = "admin/logout";
			$this->load->view('alert',$data);
		}
	}

	function ubahprofil()
	{
		$nik = $this->input->post('nik',true);
		$nama = $this->input->post('nama',true);
		$jabatan = $this->input->post('jabatan',true);
		$img = $_FILES['userfile']['name'];
		if($img != ""){
			$nmfile = 'user_'.$nik;
			$config['upload_path'] = './assets/img/user/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 100000;
			$config['max_height'] = 4000;
			$config['max_width'] = 4000;
			$config['file_name'] = $nmfile;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('userfile')){
				$data['word'] = "Data gagal unggah";
				$data['action'] = "admin/profil/ubahbiodata";
				$this->load->view('alert',$data);	
			}else{
				$gbr = $this->upload->data();
				$data = array(
					'nama'=>$nama,
					'jabatan'=>$jabatan,
					'foto'=>$gbr['file_name'],
				);
				$this->Model_halimun->update_data('admin','nik',$nik,$data);
				$data['word'] = "Biodata berhasil diubah";
				$data['action'] = "admin/logout";
				$this->load->view('alert',$data);	
			}
		}
		if($img == ""){
			$data = array(
				'nama'=>$nama,
				'jabatan'=>$jabatan,
			);
			$this->Model_halimun->update_data('admin','nik',$nik,$data);
			$data['word'] = "Biodata berhasil diubah";
			$data['action'] = "admin/logout";
			$this->load->view('alert',$data);	
		}
	}
	function pemesanan()
	{
		$tj = "invoice.id_reg = register.id_reg";
		$data['pemesanan'] = $this->Model_halimun->adm_outdoor('register','register.id_reg','desc','invoice',$tj);
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/pemesanan',$data);
	}
	function aprv_pemesanan($a)
	{
		$cek = $this->Model_halimun->data_detail('register','id_reg',$a);
		if(count($cek) < 1){
			redirect('admin/pemesanan');
		}else{
			$data = array('status_invoice'=>3);
			$this->Model_halimun->update_data('invoice','id_reg',$a,$data);
			redirect('admin/pemesanan');
		}
	}
	function del_pemesanan($a,$b,$c)
	{
		$cek = $this->Model_halimun->data_detail('register','id_reg',$a);
		$cek_isi = $this->Model_halimun->data_detail('isi_kuota','id_isi',$c);
		if(count($cek) < 1 && count($cek_isi) < 1){
			redirect('admin/pemesanan');
		}else{
			$volume_kuota= $cek_isi->volume_kuota;
			$this->Model_halimun->delete_data('invoice','id_reg',$a);
			$this->Model_halimun->delete_data('register','id_reg',$a);
			$data= array('volume_kuota'=>$volume_kuota+$b);
			$this->Model_halimun->update_data('isi_kuota','id_isi',$c,$data);
			redirect('admin/pemesanan');
		}
	}
	function penyewaan()
	{
		$tj = "invoice_sewa_alat.id_sewa = sewa_alat.id_sewa";
		$data['penyewaan'] = $this->Model_halimun->adm_outdoor('sewa_alat','sewa_alat.id_sewa','desc','invoice_sewa_alat',$tj);
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/penyewaan',$data);
	}
	function aprv_penyewaan($a)
	{
		$cek = $this->Model_halimun->data_detail('sewa_alat','id_sewa',$a);
		if(count($cek) < 1){
			redirect('admin/pemesanan');
		}else{
			$data = array('status_inv_alat'=>3);
			$this->Model_halimun->update_data('invoice_sewa_alat','id_sewa',$a,$data);
			redirect('admin/penyewaan');
		}
	}
	function del_penyewaan($a)
	{
		$cek = $this->Model_halimun->data_detail('sewa_alat','id_sewa',$a);
		if(count($cek) < 1){
			redirect('admin/penyewaan');
		}else{
			$this->Model_halimun->delete_data('invoice_sewa_alat','id_sewa',$a);
			$this->Model_halimun->delete_data('sewa_alat','id_sewa',$a);
			$this->Model_halimun->delete_data('order_alat','id_sewa',$a);
			redirect('admin/penyewaan');
		}
	}
	function laporan()
	{
		$b= "invoice.id_reg = register.id_reg";
		if($this->input->post('tampil')=='1'){
			$tglawal = date('Y-m-d',strtotime($this->input->post('tglawal',true)));
			$tglakhir = date('Y-m-d',strtotime($this->input->post('tglakhir',true)));
			$lap = $this->Model_halimun->laporan('invoice',$b,$tglawal,$tglakhir,'register');
			if(count($lap) < 1){
				$data['data_kosong'] ="*Data tidak ditemukan.";
				$data['tgl1'] = $tglawal; $data['tgl2'] = $tglakhir;
			}else{
				$data['data_kosong'] ="";
				$data['tgl1'] = $tglawal; $data['tgl2'] = $tglakhir;
			}
		}else{
			$tglawal = "";
			$tglakhir = "";
			$data['tgl1'] = $tglawal; $data['tgl2'] = $tglakhir;
			$lap = $this->Model_halimun->laporan('invoice',$b,$tglawal,$tglakhir,'register');
			$data['data_kosong'] ="";
		}
		$data['laporan'] = $lap;
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['foto'] = $this->session->userdata('foto');
		$data['hak'] = $this->session->userdata('hak');
		$this->load->view('admin/laporan',$data);
	}
	function download($a,$b)
	{
		$fj= "invoice.id_reg = register.id_reg";
		$lap = $this->Model_halimun->laporan('invoice',$fj,$a,$b,'register');
		$data['total'] = $this->Model_halimun->tot_pengunjung('invoice',$fj,$a,$b,'register');
		if(count($lap)< 1){
			redirect('admin');
		}
		$data['laporan'] = $lap;
		$data['tgl1'] =$a; $data['tgl2'] = $b;
		$this->load->view('admin/download',$data);
	}
}
