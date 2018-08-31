<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if($this->input->post('submit') == 1){
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			$hast = MD5($password);
			$akun = $this->Model_halimun->cek_login('admin',$username,$hast);
			$temp_akun = count($akun);	
			if ($temp_akun > 0)
			{
				$data = array(
					'username'=>$username,
					'nama'=>$akun->nama,
					'nik'=>$akun->nik,
					'jabatan'=>$akun->jabatan,
					'foto'=>$akun->foto,
					'hak'=>$akun->hak_akses,
					'logged_in'=>true
				);	
				$this->session->set_userdata($data);
				redirect('admin');
			}
			else
			{
				$data['err'] = "Username dan password salah";
			}
		}else{ $data['err'] = "";}
		$data['action'] = "login";
		$this->load->view('admin/login',$data);
	}
}