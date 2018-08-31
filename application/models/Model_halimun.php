<?php
defined('BASEPATH') OR EXIT('No direct access allowed');
class Model_halimun extends CI_Model
{
	public	function __construct()
	{
		parent::__construct();
	}
	function update_data($t,$a,$b,$c)
	{
		$this->db->where($a,$b);
		$this->db->update($t,$c);
	}
	function data_where($t,$f,$v)
	{
		$this->db->where($f,$v);
		return $this->db->get($t)->result();
	}
	function data_detail($t,$f,$v)
	{
		$this->db->where($f,$v);
		return $this->db->get($t)->row();
	}
	function get_data($t)
	{
		return $this->db->get($t)->result();
	}
	function get_komen($t,$order,$z)
	{
		$this->db->order_by($order,$z);
		return $this->db->get($t)->result();
	}
	function berita($t,$f,$v,$tj,$fj,$author,$order,$v_order,$limit,$endlimit)
	{
		$this->db->limit($limit,$endlimit);
		$this->db->order_by($order,$v_order);
		$this->db->join($tj,$fj);
		$this->db->join('admin',$author);
		$this->db->where($f,$v);
		return $this->db->get($t)->result();
	}
	function adm_berita($t,$tj,$fj,$author,$order,$v_order)
	{
		$this->db->order_by($order,$v_order);
		$this->db->join($tj,$fj);
		$this->db->join('admin',$author);
		return $this->db->get($t)->result();
	}
	function detail_berita($t,$f,$v,$tj,$fj,$author)
	{
		$this->db->join($tj,$fj);
		$this->db->join('admin',$author);
		$this->db->where($f,$v);
		return $this->db->get($t)->row();
	}
	function searching($t,$f,$v,$obj,$word)
	{
		$this->db->like($obj, $word, 'both');
		$this->db->where($f,$v);
		return $this->db->get($t)->result();
	}
	function page_data($limit,$start,$tabel,$tj)
	{
		$this->db->limit($limit,$start);
		$this->db->order_by('kategori_alat','asc');
		$this->db->join('kategori_outdoor',$tj);
		$this->db->where('status_alat','1');
		return $this->db->get($tabel);
	}
	function adm_outdoor($a,$b,$c,$d,$tj)
	{
		$this->db->order_by($b,$c);
		$this->db->join($d,$tj);
		return $this->db->get($a)->result();
	}
	function data_num_rows($tabel,$tj)
	{
		$this->db->join('kategori_outdoor',$tj);
		$this->db->where('status_alat','1');
		return $this->db->get($tabel)->num_rows();
	}
	function data_join($a,$b,$c,$d,$t)
	{
		$this->db->join($a,$b);
		$this->db->where($c,$d);
		return $this->db->get($t);
	}
	function tutup_kuota($t,$a,$b)
	{
		$this->db->where("DATE_FORMAT(tgl_kuota,('%Y-%m-%d')) < '$a'");
		$this->db->update($t,$b);
	}
	function data_kuota($tabel,$now)
	{
		$query = $this->db->query("SELECT * FROM $tabel WHERE DATE_FORMAT(tgl_kuota,('%Y-%m-%d')) >= '$now'");
		return $query->result();
	}
	function data_sewa($tabel,$id,$now)
	{
		$query = $this->db->query("SELECT * FROM $tabel INNER JOIN alat ON alat.id_alat = sewa_alat.id_alat WHERE alat.id_alat ='$id' AND sewa_alat.status_sewa ='0' AND DATE_FORMAT(tgl_sewa,('%Y-%m-%d')) >= '$now'");
		return $query->result();
	}
	function cek_sewa($a,$b,$c,$d)
	{
		$query = $this->db->query("SELECT * FROM sewa_alat WHERE tgl_sewa ='$a' AND DATE_FORMAT(jam_cekin,('%H')) ='$b'");
		return $query->num_rows();
	}
	function cek_autoinc($a)
	{
		$query = $this->db->query("show table status like '$a'");
		return $query->row();
	}
	function page_kategori($limit,$start,$tabel,$tj,$a)
	{
		$this->db->limit($limit,$start);
		$this->db->order_by('kategori_alat','asc');
		$this->db->join('kategori_outdoor',$tj);
		$this->db->where('filter',$a);
		$this->db->where('status_alat','1');
		return $this->db->get($tabel);
	}
	function num_rows_kategori($tabel,$tj,$a)
	{
		$this->db->join('kategori_outdoor',$tj);
		$this->db->where('filter',$a);
		$this->db->where('status_alat','1');
		return $this->db->get($tabel)->num_rows();
	}
	function insert_data($tabel,$data)
	{
		return $this->db->insert($tabel,$data);
	}
	
	function halaman($per_page,$segment,$site_url,$tabel)
	{
		$config['base_url'] = site_url($site_url);
		$config['total_rows'] = $tabel;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = $segment;
		$config['full_tag_open'] = '<div class="pager"><ul>';
        $config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
	}
	function cek_login($a,$b,$c)
	{
		$this->db->where('username',$b);
		$this->db->where('password',$c);
		$this->db->where('status_admin','1');
		return $this->db->get($a)->row();
	}
	function info($a,$bf,$b,$cf,$c)
	{
		$this->db->order_by('tgl_post','desc');
		$this->db->where($bf,$b);
		$this->db->where($cf,$c);
		return $this->db->get($a);
	}
	function adm_info($a,$bf,$b,$order,$z)
	{
		$this->db->order_by($order,$z);
		$this->db->where($bf,$b);
		return $this->db->get($a);
	}
	function limit_words($string, $word_limit)
	{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
	}
	function konversi_hari($tgl,$format)
	{
	    $tgl_skrg = $format;
	    switch(date('D', strtotime($tgl)))
	    {
	        case 'Mon':$nmh="Senin";break; 
	        case 'Tue':$nmh="Selasa";break; 
	        case 'Wed':$nmh="Rabu";break; 
	        case 'Thu':$nmh="Kamis";break; 
	        case 'Fri':$nmh="Jum'at";break; 
	        case 'Sat':$nmh="Sabtu";break; 
	        case 'Sun':$nmh="minggu";break; 
	    }
	    return $nmh.", "."$tgl_skrg";
	}
	function delete_data($t,$f,$v)
	{
		$this->db->where($f,$v);
		$this->db->delete($t);
	}
	function laporan($a,$b,$tgl1,$tgl2,$t)
	{
		$this->db->order_by('register.tgl_masuk','asc');
		$this->db->join($a,$b);
		$this->db->where("(register.tgl_masuk between '$tgl1' and '$tgl2')");
		$this->db->where('invoice.status_invoice','3');
		return $this->db->get($t)->result();
	}
	function tot_pengunjung($a,$b,$tgl1,$tgl2,$t)
	{
		$query = $this->db->query("SELECT sum(jml_peserta) as tot_pengunjung, sum(tarif_per_orang*jml_peserta) as tot_uang FROM $t INNER JOIN $a ON $b WHERE invoice.status_invoice ='3' AND register.tgl_masuk between '$tgl1' and '$tgl2'");
		return $query->row();
	}
	function kuota($a,$b,$c)
	{
		$this->db->order_by($b,$c);
		return $this->db->get($a)->result();
	}
}
?>