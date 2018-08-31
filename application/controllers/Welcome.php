<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->library('encryption');	
		$this->load->library('cart');	
	}
	public function index()
	{
		$berita_fj = 'author_berita.id_berita = berita.id_berita'; 
		$news_author = 'admin.nik = author_berita.nik'; 
		$artikel_fj = 'author_artikel.id_artikel = artikel.id_artikel';
		$art_author = 'admin.nik = author_artikel.nik'; 
		$berita_f = 'berita.status_berita'; $artikel_f = 'artikel.status_artikel';
		$data['berita_baru'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','desc','3','0');
		$data['berita_lama'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','desc','5','3');
		$data['artikel_baru'] = $this->Model_halimun->berita('artikel',$artikel_f,'1','author_artikel',$artikel_fj,$art_author,'artikel.tgl_artikel','asc','2','0');
		$data['artikel_lama'] = $this->Model_halimun->berita('artikel',$artikel_f,'1','author_artikel',$artikel_fj,$art_author,'artikel.tgl_artikel','asc','5','2');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$bp = $this->Model_halimun->data_where('banner','kat_banner','2');
		$data['count_bp'] = count($bp);	
		$data['banner_promo'] = $bp;
		$data['beranda'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['informasi'] ="";
		$this->load->view('beranda',$data);
	}
	function informasi($a)
	{
		if($a == "berita_dan_artikel"){
			$berita_fj = 'author_berita.id_berita = berita.id_berita'; 
			$news_author = 'admin.nik = author_berita.nik'; 
			$artikel_fj = 'author_artikel.id_artikel = artikel.id_artikel';
			$art_author = 'admin.nik = author_artikel.nik'; 
			$berita_f = 'berita.status_berita'; $artikel_f = 'artikel.status_artikel';
			$data['berita_baru'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','desc','3','0');
			$data['berita_lama'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','desc','5','3');
			$data['artikel_baru'] = $this->Model_halimun->berita('artikel',$artikel_f,'1','author_artikel',$artikel_fj,$art_author,'artikel.tgl_artikel','asc','2','0');
			$data['artikel_lama'] = $this->Model_halimun->berita('artikel',$artikel_f,'1','author_artikel',$artikel_fj,$art_author,'artikel.tgl_artikel','asc','5','2');
			$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
			$data['beranda'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['informasi'] ="";
			$this->load->view('info_berita',$data);
		}else if($a == "jalur_pendakian"){
			$info = $this->Model_halimun->info('informasi','status_info','1','kategori','Informasi Pendakian');
			$data['info'] = $info->result();
			$agenda = $this->Model_halimun->info('informasi','status_info','1','kategori','Agenda');
			$data['agenda'] = $agenda->result();
			$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
			$data['banner_utama'] = $bu;
			$data['count_bu'] = count($bu);
			$data['informasi'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['beranda'] ="";
			$this->load->view('informasi',$data);
		}else{
			redirect('welcome');
		}	
	}
	function detail_informasi($a,$b,$c)
	{
		if($a =="")
		{ 
			redirect('welcome');
		}
		$data['info'] = $this->Model_halimun->data_detail('informasi','id_info',$a);
		$agenda = $this->Model_halimun->info('informasi','status_info','1','kategori','Agenda');
		$data['agenda'] = $agenda->result();
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['informasi'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['beranda'] ="";
		$this->load->view('detail_informasi',$data);		
	}
	function proses_search()
	{
		$word = $this->input->post('word',true);
		redirect('welcome/searching/'.$word);
	}

	function searching($word)
	{
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data_berita = $this->Model_halimun->searching('berita','status_berita','1','judul_berita',$word);
		$data_artikel = $this->Model_halimun->searching('artikel','status_artikel','1','judul_artikel',$word);
		if(count($data_berita)==0){
			$data['berita_kosong'] = "Tidak ada berita yang sesuai";
		}else{ $data['berita_kosong'] = "";}
		if(count($data_artikel)==0){
			$data['artikel_kosong'] = "Tidak ada artikel yang sesuai";
		}else{ $data['artikel_kosong'] = "";}
		$data['berita'] = $data_berita;
		$data['artikel'] = $data_artikel;
		$data['beranda'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['informasi'] ="";
		$this->load->view('searching',$data);
	}

	function tentang()
	{
		$berita_fj = 'author_berita.id_berita = berita.id_berita'; 
		$news_author = 'admin.nik = author_berita.nik'; 
		$artikel_fj = 'author_artikel.id_artikel = artikel.id_artikel';
		$art_author = 'admin.nik = author_artikel.nik'; 
		$berita_f = 'berita.status_berita'; $artikel_f = 'artikel.status_artikel';
		$data['berita_baru'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','asc','3','0');
		$data['artikel_baru'] = $this->Model_halimun->berita('artikel',$artikel_f,'1','author_artikel',$artikel_fj,$art_author,'artikel.tgl_artikel','asc','2','0');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['tentang'] = "active"; $data['galeri'] = $data['kontak'] = $data['beranda'] = $data['pemesanan'] = $data['informasi'] ="";
		$this->load->view('tentang',$data);
	}
	function berita($a,$b)
	{
		$berita_fj = 'author_berita.id_berita = berita.id_berita'; 
		$news_author = 'admin.nik = author_berita.nik'; 
		$berita_f = 'berita.status_berita';
		$data['berita'] = $this->Model_halimun->detail_berita('berita','berita.id_berita',$a,'author_berita',$berita_fj,$news_author);
		$data['berita_lain'] = $this->Model_halimun->berita('berita',$berita_f,'1','author_berita',$berita_fj,$news_author,'berita.tgl_berita','asc','8','0');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['informasi'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['beranda'] ="";
		$this->load->view('berita',$data);
	}
	function artikel($a,$b)
	{
		$artikel_fj = 'author_artikel.id_artikel = artikel.id_artikel';
		$art_author = 'admin.nik = author_artikel.nik'; 
		$artikel_f = 'artikel.status_artikel';
		$data['artikel'] = $this->Model_halimun->detail_berita('artikel','artikel.id_artikel',$a,'author_artikel',$artikel_fj,$art_author);
		$data['artikel_lain'] = $this->Model_halimun->berita('artikel',$artikel_f,'1','author_artikel',$artikel_fj,$art_author,'artikel.tgl_artikel','asc','8','0');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['informasi'] = "active"; $data['galeri'] = $data['kontak'] = $data['tentang'] = $data['pemesanan'] = $data['beranda'] ="";
		$this->load->view('artikel',$data);
	}
	function galeri()
	{
		$data['galery'] = $this->Model_halimun->get_data('galeri');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['galeri'] = "active"; $data['tentang'] = $data['kontak'] = $data['beranda'] = $data['pemesanan'] = $data['informasi'] ="";
		$this->load->view('galeri',$data);
	}

	function kontak()
	{
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['kontak'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['pemesanan'] = $data['informasi'] ="";
		$this->load->view('kontak',$data);
	}
	function komentar()
	{
		$nama = $this->input->post('nama',true);
		$email = $this->input->post('email',true);
		$subject = $this->input->post('subject',true);
		$pesan = $this->input->post('pesan',true);
		$data = array(
			'nama'=>$nama,
			'subject'=>$subject,
			'email'=>$email,
			'pesan'=>$pesan
			);
		$this->Model_halimun->insert_data('komentar',$data);
		$data['word'] = "Terimakasi atas pesan Anda";
		$data['action'] = "welcome/kontak";
		$this->load->view('alert',$data);
	}
	function pendakian()
	{
		$tgl= date('Y-m-d', strtotime($this->input->post('tgl',true)));
		$kuota= $this->Model_halimun->data_where('kuota_pendakian','tgl_kuota',$tgl);
		$data['kuota']= $kuota; $data['c_kuota']= count($kuota);
		$pintu = $this->Model_halimun->get_data('pintu_masuk');
		$data['pintu'] = $pintu;
		$data['jml_pintu'] = count($pintu);
		$data['harga'] = $this->Model_halimun->data_detail('tarif_wisata','kode_tarif','Adv-w1');
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('pemesanan',$data);
	}

	function sewaalat()
	{
		$tj = 'kategori_outdoor.id_kat = alat.kategori_alat';
		$tabel = $this->Model_halimun->data_num_rows('alat',$tj);
		$this->Model_halimun->halaman('12','3','welcome/sewaalat',$tabel);
		$data['paging'] = $this->pagination->create_links();
		$page = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['data'] = $this->Model_halimun->page_data('12',$page,'alat',$tj);
		$data['sidemenu'] = $this->Model_halimun->get_data('kategori_outdoor');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('sewaalat',$data);
	}
	function kategori($a)
	{
		$tj = 'kategori_outdoor.id_kat = alat.kategori_alat';
		$tabel = $this->Model_halimun->num_rows_kategori('alat',$tj,$a);
		$this->Model_halimun->halaman('12','3','welcome/sewaalat',$tabel);		
		$data['paging'] = $this->pagination->create_links();
		$page = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['data'] = $this->Model_halimun->page_kategori('12',$page,'alat',$tj,$a);
		$data['sidemenu'] = $this->Model_halimun->get_data('kategori_outdoor');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('sewaalat',$data);
	}
	function detail_outdoor($a,$b,$c)
	{
		$id = $this->uri->segment(4);
		$cek_id = $this->Model_halimun->data_detail('alat','id_alat',$id);
		if($this->input->post('btnCek') == 1){
			$cekin_sewa = $this->input->post('cekin_sewa',true); $tgl_cekin = date('Y-m-d', strtotime($cekin_sewa));
			$hasil = $this->Model_halimun->data_where('sewa_alat','tgl_sewa',$tgl_cekin);
			$data['hasil'] = $hasil;
			if(count($hasil) > 0){				
				$data['kosong']="";
			}else if(count($hasil) < 1){
				$data['kosong']="Item tersedia. Segera sewa sekarang juga !";
			}
		}else{
		$tgl_cekin = ""; $data['kosong']="";
		$data['hasil'] = $this->Model_halimun->data_where('sewa_alat','tgl_sewa',$tgl_cekin);
		}
		$data['a']=$a; $data['b']=$b; $data['c']=$c;
		$now = date('Y-m-d');
		$data['outdoor'] = $cek_id;
		$data['sidemenu'] = $this->Model_halimun->get_data('kategori_outdoor');
		$bu = $this->Model_halimun->data_where('banner','kat_banner','1');
		$data['banner_utama'] = $bu;
		$data['count_bu'] = count($bu);
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('detail_outdoor',$data);
	}
	function add_to_cartdetail($a,$b,$c)
	{
		$produk = $this->Model_halimun->data_detail('alat','id_alat',$b);
		$data = array(
						'id' => $produk->id_alat,
						'qty' => 1,
						'price' => $produk->harga_sewa,
						'name' => $produk->nama_alat
		);
		$this->cart->insert($data);
		redirect('welcome/detail_outdoor/'.$a.'/'.$b.'/'.$c);
	}
	function cart()
	{
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('sewa_alat');
		$data['sidemenu'] = $this->Model_halimun->get_data('kategori_outdoor');
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('show_cart',$data);
	}
	
	function destroy_cart()
	{
		$this->cart->destroy();
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('sewa_alat');
		$data['sidemenu'] = $this->Model_halimun->get_data('kategori_outdoor');
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('show_cart',$data);
	}
	function proses_sewa()
	{
        $id_sewa = $this->input->post('id_sewa',true); 
        $jml_cart = $this->input->post('jml_cart',true);
        $total_bayar = $this->input->post('total',true);
		$nama = $this->input->post('nama',true);
		$pay = $this->input->post('pay',true);
		$alamat = $this->input->post('alamat',true);
		$tlp = $this->input->post('no_tlp',true);
		$kartu_identitas = $this->input->post('kartu_identitas',true);
		$no_identitas = $this->input->post('no_identitas',true);
		$email = $this->input->post('email',true);
		$cekin_sewa = $this->input->post('cekin_sewa',true); $tgl_cekin = date('Y-m-d', strtotime($cekin_sewa));
		$cekout_sewa = $this->input->post('cekout_sewa',true); $tgl_cekout = date('Y-m-d', strtotime($cekout_sewa));
		$jam_cekin = $this->input->post('jam_cekin',true); $jam_in = date('H', strtotime($jam_cekin));
		$jam_cekout = $this->input->post('jam_cekout',true); $jam_out = date('H', strtotime($jam_cekout));
		$harga_sewa = $this->input->post('harga_sewa',true);
		$cek_sewa = $this->Model_halimun->cek_sewa($tgl_cekin,$jam_in,$tgl_cekout,$jam_out);
		if($cek_sewa >=1){
			$data['word'] = "Barang sudah disewa seseorang, cari waktu checkin lain";
			$data['action'] = 'welcome/cart';
			$this->load->view('alert',$data);
		}else{
			$data = array(
				'id_sewa'=>$id_sewa,
				'nama_penyewa' =>$nama,
				'tgl_order'=>date('Y-m-d H:i:s'),
				'tgl_sewa'=>$tgl_cekin,
				'jam_cekin'=>$jam_cekin,
				'tgl_akhir_sewa'=>$tgl_cekout,
				'jam_cekout'=>$jam_cekout,
				'nama_penyewa'=>$nama,
				'kartu_identitas'=>$kartu_identitas,
				'no_identitas'=>$no_identitas,
				'alamat'=>$alamat,
				'tlp'=>$tlp,
				'email'=>$email
				);
			$data2 = array(
				'id_sewa'=>$id_sewa,
				'metode_pembayaran'=>$pay,
				'total_bayar'=>$total_bayar);
			$this->Model_halimun->insert_data('sewa_alat',$data);
			$this->Model_halimun->insert_data('invoice_sewa_alat',$data2);
			for($x=1;$x<=$jml_cart;$x++){
                $id_alat[$x] = $this->input->post('id_alat'.$x);
                $harga_sewa[$x] = $this->input->post('harga_sewa'.$x);
                $qty[$x] = $this->input->post('qty_sewa'.$x);
                $alat[$x] = array(
				'id_sewa'=>$id_sewa,
				'id_alat'=>$id_alat[$x],
				'harga_unit_sewa'=>$harga_sewa[$x],
				'qty'=>$qty[$x],
				);
			$this->Model_halimun->insert_data('order_alat',$alat[$x]);
        	}
        	$ci = get_instance();
	        $ci->load->library('email');
	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "ssl://smtp.gmail.com";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "adventurer.gnsalak@gmail.com";
	        $config['smtp_pass'] = "ADV123456$";
	        $config['charset'] = "utf-8";
	        $config['mailtype'] = "html";
	        $config['newline'] = "\r\n";
	        $ci->email->initialize($config);
	        $ci->email->from('adventurer.gnsalak@gmail.com', 'Adventurer Gunung Salak');
	        $list = array($email);
	        $ci->email->to($list);
	        $ci->email->subject('Konfirmasi Pembayaran');
	        $data['title'] = "Konfirmasi Pembayaran Penyewaan";
	        $data['dear'] = "Dear ".$nama.",";
	        $data['kode'] = $id_sewa;
			$data['contain'] = "Terimakasi Anda sudah memilih Adventurer Gunung Salak sebagai layanan wisata alam pendakian Gunung Salak.<br/>Berikut adalah tagihan alat yang telah Anda sewa.<br/>";
			$data['btn'] = "Cetak Tagihan Anda";
			$data['link'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/tagihan_sewa/'.$id_sewa;
			$data['link_mail'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/email_sewa/'.$id_sewa;
			$data['konfirm'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/konfirm_sewa/'.$id_sewa;
			$body = $this->load->view('email-template.html',$data,TRUE);
	        $ci->email->message($body);
	        if($this->email->send()){
				$data['word'] = "Permintaan Anda akan segera kami follow Up. Cek email untuk melihat tagihan";
				$data['action'] = "welcome/sewaalat";
				$this->load->view('alert',$data);
				$this->cart->destroy();
			}else{
				$data['word'] = "Permintaan Anda gagal, Periksa jaringan internet Anda.";
				$data['action'] = "welcome/sewaalat";
				$this->load->view('alert',$data);
			}
			
		}
	}
	function peserta()
	{
		$data['masuk'] = $this->input->post('masuk2',true);
		$data['autoinc'] = $this->Model_halimun->cek_autoinc('register');
		$data['nama_reg'] = $this->input->post('nama_reg',true);
		$data['tarif'] = $this->input->post('tarif',true);
		$data['id_isi'] = $this->input->post('id_isi',true);
		$data['volume_kuota'] = $this->input->post('volume_kuota',true);
		$data['alamat_reg'] = $this->input->post('alamat_reg',true);
		$data['keluar'] =$this->input->post('keluar',true);
		$data['tlp_reg'] = $this->input->post('tlp_reg',true);
		$data['tgl_reg'] = $this->input->post('tgl_reg2',true);
		$data['email_reg'] = $this->input->post('email_reg',true);
		$data['harga'] = $this->Model_halimun->data_detail('tarif_wisata','kode_tarif','Adv-w1');
		$data['jml'] = $this->input->post('jml',true);
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('peserta',$data);	
	}
	function proses_daftar()
	{
		$nama_reg = $this->input->post('nama_reg');
		$tgl_reg = $this->input->post('tgl_reg');
		$alamat_reg = $this->input->post('alamat_reg');
		$tlp_reg = $this->input->post('tlp_reg');
		$tarif = $this->input->post('tarif');
		$masuk = $this->input->post('masuk');
		$id_isi = $this->input->post('id_isi');
		$volume_kuota = $this->input->post('volume_kuota');
		$keluar = $this->input->post('keluar');
		$email_reg = $this->input->post('email_reg');
		$payment = $this->input->post('pay',true);
		$jml = $this->input->post('jml');
		$id_reg = $this->input->post('id_reg');
		$data = array(
			'id_reg'=>$id_reg,
			'nama_reg'=>$nama_reg,
			'pintu_masuk'=>$masuk,
			'pintu_keluar'=>$keluar,
			'tgl_masuk'=>$tgl_reg,
			'tgl_order'=>date('Y-m-d H:i:s'),
			'tlp_reg'=>$tlp_reg,
			'email_reg'=>$email_reg,
			'alamat_reg'=>$alamat_reg,
			'jml_peserta'=>$jml,
			'jml_peserta'=>$jml,
			'tarif_per_orang'=>$tarif,
			);
		$data2 = array('id_reg'=>$id_reg,'metode_pembayaran'=>$payment);
		$data3= array('volume_kuota'=>$volume_kuota-$jml);
		$this->Model_halimun->insert_data('register',$data);
		$this->Model_halimun->insert_data('invoice',$data2);
		$this->Model_halimun->update_data('isi_kuota','id_isi',$id_isi,$data3);
		for($i=1; $i<=$jml; $i++){
			$nama_peserta[$i] = $this->input->post('nama_peserta'.$i);
			$kartu_identitas[$i] = $this->input->post('kartu_identitas'.$i);
			$no_identitas[$i] = $this->input->post('no_identitas'.$i);
			$ttl_peserta[$i] = $this->input->post('ttl_peserta'.$i);
			$tlp_peserta[$i] = $this->input->post('tlp_peserta'.$i);
			$tlp_rumah[$i] = $this->input->post('tlp_rumah'.$i);
			$jk_peserta[$i] = $this->input->post('jk_peserta'.$i);
			$pekerjaan_peserta[$i] = $this->input->post('pekerjaan_peserta'.$i);
			$alamat_peserta[$i] = $this->input->post('alamat_peserta'.$i);
			$kota[$i] = $this->input->post('kota'.$i);
			$provinsi[$i] = $this->input->post('provinsi'.$i);
			$peserta[$i] = array(
				'id_reg'=>$id_reg,
				'nama_peserta'=>$nama_peserta[$i],
				'ttl_peserta'=>$ttl_peserta[$i],
				'jenis_kelamin'=>$jk_peserta[$i],
				'pekerjaan_peserta'=>$pekerjaan_peserta[$i],
				'alamat_peserta'=>$alamat_peserta[$i],
				'kota'=>$kota[$i],
				'provinsi'=>$provinsi[$i],
				'kartu_identitas'=>$kartu_identitas[$i],
				'no_identitas'=>$no_identitas[$i],
				'tlp_rumah'=>$tlp_rumah	[$i],
				'tlp_peserta'=>$tlp_peserta[$i],
				);
			$this->Model_halimun->insert_data('peserta',$peserta[$i]);
		}
		$ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "adventurer.gnsalak@gmail.com";
        $config['smtp_pass'] = "ADV123456$";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);
        $ci->email->from('adventurer.gnsalak@gmail.com', 'Adventurer Gunung Salak');
        $list = array($email_reg);
        $ci->email->to($list);
        $ci->email->subject('Konfirmasi Pembayaran');
        $data['title'] = "Konfirmasi Pembayaran Pendakian";
        $data['dear'] = "Dear ".$nama_reg.",";
        $data['kode'] = $id_reg;
		$data['contain'] = "Terimakasi Anda sudah memilih Adventurer Gunung Salak sebagai layanan wisata alam pendakian Gunung Salak.<br/>Berikut adalah tagihan tiket masuk untuk pendakian Gunung Salak Anda.<br/>";
		$data['btn'] = "Cetak Tagihan Anda";
		$data['link'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/tagihan/'.$id_reg;
		$data['link_mail'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/email/'.$id_reg;
		$data['konfirm'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/konfirm/'.$id_reg;
		$body = $this->load->view('email-template.html',$data,TRUE);
        $ci->email->message($body);
        if($this->email->send()){
			$data['word'] = "Permintaan Anda akan segera kami follow Up. Cek email untuk melihat tagihan";
			$data['action'] = "welcome";
			$this->load->view('alert',$data);
		}else{
			$data['word'] = "Permintaan Anda gagal, Periksa jaringan internet Anda.";
			$data['action'] = "welcome/pendakian";
			$this->load->view('alert',$data);
		}
	}
	function email($a)
	{	
		$reg = $this->Model_halimun->data_detail('register','id_reg',$a);
		if(count($reg)<1){
			redirect('welcome');
		}
		$data['kode'] = $a;
		$data['title'] = "Konfirmasi Pembayaran Pendakian";
        $data['dear'] = "Dear ".$reg->nama_reg.",";
		$data['contain'] = "Terimakasi Anda sudah memilih Adventurer Gunung Salak sebagai layanan wisata alam pendakian Gunung Salak.<br/>Berikut adalah tagihan tiket masuk untuk pendakian Gunung Salak Anda.<br/>";
		$data['btn'] = "Catak Tagihan Anda";
		$data['link'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/tagihan/'.$a;
		$data['link_mail'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/email/'.$a;
		$data['konfirm'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/konfirm/'.$a;
		$this->load->view('email-template.html',$data);
	}

	function email_sewa($a)
	{
		$reg = $this->Model_halimun->data_detail('sewa_alat','id_sewa',$a);
		if(count($reg)<1){
			redirect('welcome');
		}
		$data['kode'] = $a;
		$data['title'] = "Konfirmasi Pembayaran Penyewaan";
        $data['dear'] = "Dear ".$reg->nama_penyewa.",";
		$data['contain'] = "Terimakasi Anda sudah memilih Adventurer Gunung Salak sebagai layanan wisata alam pendakian Gunung Salak.<br/>Berikut adalah tagihan alat yang telah Anda sewa.<br/>";
		$data['btn'] = "Cetak Tagihan Anda";
		$data['link'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/tagihan_sewa/'.$a;
		$data['link_mail'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/email_sewa/'.$a;
		$data['konfirm'] = 'http://localhost/sistem_informasi_gunungsalak/welcome/konfirm_sewa/'.$a;
		$this->load->view('email-template.html',$data);
	}
	function konfirm($a)
	{
		$reg = $this->Model_halimun->data_detail('register','id_reg',$a);
		if(count($reg) == 0){
			redirect('welcome');
		}
		$data['target'] = "pro_konfirm/".$a;
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('konfirmasi',$data);
	}

	function konfirm_sewa($a)
	{
		$reg = $this->Model_halimun->data_detail('sewa_alat','id_sewa',$a);
		if(count($reg) == 0){
			redirect('welcome');
		}
		$data['target'] = "pro_konfirm_sewa/".$a;
		$data['pemesanan'] = "active"; $data['tentang'] = $data['galeri'] = $data['beranda'] = $data['kontak'] = $data['informasi'] ="";
		$this->load->view('konfirmasi',$data);
	}
	function pro_konfirm($a)
	{
		$kode = $this->input->post('id_reg',true);
		$data = array(
				'status_invoice'=>'1',
				'tgl_invoice'=>date('Y-m-d H:i:s')
			);
		$this->Model_halimun->update_data('invoice','id_reg',$kode,$data);
		$data['word'] = "Data berhasil diunggah";
		$data['action'] = "welcome";
		$this->load->view('alert',$data);	
	}

	function pro_konfirm_sewa($a)
	{		
		$kode = $this->input->post('id_reg',true);
		$data = array(
				'status_inv_alat'=>'1',
				'tgl_inv_alat'=>date('Y-m-d H:i:s')
			);
		$this->Model_halimun->update_data('invoice_sewa_alat','id_sewa',$kode,$data);
		$data['word'] = "Data berhasil diunggah";
		$data['action'] = "welcome";
		$this->load->view('alert',$data);
	}
	function tagihan($a)
	{
		$reg = $this->Model_halimun->data_join('register','register.id_reg = invoice.id_reg','invoice.id_reg',$a,'invoice')->row();
		$id_reg = $reg->id_reg;
		if(count($reg) == 0){
			redirect('welcome');
		}
		$data['invoice'] = $reg;
		$data['peserta'] = $this->Model_halimun->data_where('peserta','id_reg',$id_reg);
		$data['target'] = $a;
		$this->load->view('tagihan',$data);
	}
	function tagihan_sewa($a)
	{
		$fj1='alat.id_alat = order_alat.id_alat';
		$fj='invoice_sewa_alat.id_sewa = sewa_alat.id_sewa';
		$reg = $this->Model_halimun->data_join('invoice_sewa_alat',$fj,'sewa_alat.id_sewa',$a,'sewa_alat')->row();
		if(count($reg) == 0){
			redirect('welcome');
		}
		$data['alat'] = $this->Model_halimun->data_join('alat',$fj1,'order_alat.id_sewa',$a,'order_alat')->result();
		$data['invoice'] = $reg;
		$this->load->view('tagihan_sewa',$data);
	}
}
