<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responden extends CI_Controller {

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
	
	private $data = [];
	
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('email')){
			redirect('home','refresh');
	   	}
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		if(!$data['user']['email']) {
			redirect('auth/logout');
		}

		if($this->session->userdata('role_id') != 2){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			if($this->session->userdata('role_id') == 1){
				redirect('admin/'.$data['user']['id'], 'refresh');
			}
	   	}

		$this->load->model('auth_model','auth');
		$this->load->model('responden_model','responden');
		$this->load->model('applied_kuesioner_responden_model','applied_kuesioner_responden');
		$this->load->model('kuesioner_responden_pretest_kontrol_model','kuesioner_responden_pretest_kontrol');
		$this->load->model('kuesioner_responden_pretest_intervensi_model','kuesioner_responden_pretest_intervensi');
		$this->load->model('kuesioner_responden_postest_kontrol_model','kuesioner_responden_postest_kontrol');
		$this->load->model('kuesioner_responden_postest_intervensi_model','kuesioner_responden_postest_intervensi');
		$this->load->model('kuesioner_pretest_kontrol_model','kuesioner_pretest_kontrol');
		$this->load->model('kuesioner_pretest_intervensi_model','kuesioner_pretest_intervensi');
		$this->load->model('kuesioner_postest_kontrol_model','kuesioner_postest_kontrol');
		$this->load->model('kuesioner_postest_intervensi_model','kuesioner_postest_intervensi');
		$this->load->model('logo_model','logo');
		$this->load->model('materi_model','materi');
		$this->load->model('materi_log_model','materi_log');

		// get database logo
		$this->data["logo"] = $this->logo->get_by_id(1);

		$this->data['title_website'] = "Responden";

		// $this->load->model('coaching_schedule_model','coaching_schedule');
		
		// $this->load->library('form_validation');
		// $this->data = [
		// 	"active" => "dashboard"
		// ];
	}

	// controller sidebar

	public function index($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->data["id_user"] = $id;
		$this->data["responden"] = $this->responden->get_responden_by_userid($id);

		$id_responden = $this->data['responden']['id'];

		$this->data["active"] = "dashboard";
		$this->load->view('template/responden/dashboard', $this->data);
	}
	
	public function kuesioner($id) {
		$this->data["id_user"] = $id;
		$this->data["responden"] = $this->responden->get_responden_by_userid($id);
		
		$id_responden = $this->data["responden"]['id'];
		
		// get all data kuesioner responden pretest kontrol
		$this->data["kuesioner_responden_pretest_kontrol"] = $this->kuesioner_responden_pretest_kontrol->get_all_by_idresponden($id_responden);
		// get all data kuesioner responden pretest intervensi
		$this->data["kuesioner_responden_pretest_intervensi"] = $this->kuesioner_responden_pretest_intervensi->get_all_by_idresponden($id_responden);
		// get all data kuesioner responden pretest kontrol
		$this->data["kuesioner_responden_postest_kontrol"] = $this->kuesioner_responden_postest_kontrol->get_all_by_idresponden($id_responden);
		// get all data kuesioner responden postest intervensi
		$this->data["kuesioner_responden_postest_intervensi"] = $this->kuesioner_responden_postest_intervensi->get_all_by_idresponden($id_responden);
		

		// get all data kuesioner pretest kontrol
		$this->data["kuesioner_pretest_kontrol"] = $this->kuesioner_pretest_kontrol->get_All();
		// get all data kuesioner pretest intervensi
		$this->data["kuesioner_pretest_intervensi"] = $this->kuesioner_pretest_intervensi->get_All();
		// get all data kuesioner postest kontrol
		$this->data["kuesioner_postest_kontrol"] = $this->kuesioner_postest_kontrol->get_All();
		// get all data kuesioner postest intervensi
		$this->data["kuesioner_postest_intervensi"] = $this->kuesioner_postest_intervensi->get_All();

		// get all applied kuesioner responden
		$this->data["applied_kuesioner_responden"] = $this->applied_kuesioner_responden->get_all_by_idresponden($id_responden);

		$this->data["active"] = "kuesioner";
		$this->load->view('template/responden/kuesioner', $this->data);
	}
	public function kuesioner_pretest_kontrol($id_responden) {
		
		$id_user = $this->input->post('id_user');
		// get data form
		// data demografi
		$nama1 = $this->input->post('nama1');
		$usia1 = $this->input->post('usia1');
		$pendidikan1 = $this->input->post('pendidikan1');
		$pekerjaan1 = $this->input->post('pekerjaan1');
		$riwayat_merokok1 = $this->input->post('riwayat_merokok1');
		$konsumsi_alkohol1 = $this->input->post('konsumsi_alkohol1');
		$penyakit1 = $this->input->post('penyakit1');
		$desc_penyakit1 = $this->input->post('desc_penyakit1');

		if($penyakit1 == "Ya" && !empty($desc_penyakit1)) {
            $penyakit1 = $penyakit1.", ".$desc_penyakit1;
        }

		// self management - integrasi diri
		$integrasi_diri11 = $this->input->post('integrasi_diri11');
		$integrasi_diri12 = $this->input->post('integrasi_diri12');
		$integrasi_diri13 = $this->input->post('integrasi_diri13');
		$integrasi_diri14 = $this->input->post('integrasi_diri14');
		$integrasi_diri15 = $this->input->post('integrasi_diri15');
		$integrasi_diri16 = $this->input->post('integrasi_diri16');
		$integrasi_diri17 = $this->input->post('integrasi_diri17');
		$integrasi_diri18 = $this->input->post('integrasi_diri18');
		$integrasi_diri19 = $this->input->post('integrasi_diri19');
		$integrasi_diri110 = $this->input->post('integrasi_diri110');

		// self management - regulasi diri
		$regulasi_diri11 = $this->input->post('regulasi_diri11');
		$regulasi_diri12 = $this->input->post('regulasi_diri12');
		$regulasi_diri13 = $this->input->post('regulasi_diri13');
		$regulasi_diri14 = $this->input->post('regulasi_diri14');
		$regulasi_diri15 = $this->input->post('regulasi_diri15');
		$regulasi_diri16 = $this->input->post('regulasi_diri16');
		$regulasi_diri17 = $this->input->post('regulasi_diri17');
		$regulasi_diri18 = $this->input->post('regulasi_diri18');
		$regulasi_diri19 = $this->input->post('regulasi_diri19');
		$regulasi_diri110 = $this->input->post('regulasi_diri110');
		
		// self management - idtk
		$idtk11 = $this->input->post('idtk11');
		$idtk12 = $this->input->post('idtk12');
		$idtk13 = $this->input->post('idtk13');
		$idtk14 = $this->input->post('idtk14');
		$idtk15 = $this->input->post('idtk15');
		$idtk16 = $this->input->post('idtk16');
		$idtk17 = $this->input->post('idtk17');
		$idtk18 = $this->input->post('idtk18');
		$idtk19 = $this->input->post('idtk19');
		$idtk110 = $this->input->post('idtk110');
		
		// self management - ptd
		$ptd11 = $this->input->post('ptd11');
		$ptd12 = $this->input->post('ptd12');
		$ptd13 = $this->input->post('ptd13');
		$ptd14 = $this->input->post('ptd14');
		$ptd15 = $this->input->post('ptd15');
		$ptd16 = $this->input->post('ptd16');
		$ptd17 = $this->input->post('ptd17');
		$ptd18 = $this->input->post('ptd18');
		$ptd19 = $this->input->post('ptd19');
		$ptd110 = $this->input->post('ptd110');
		
		// self management - ktayd
		$ktayd11 = $this->input->post('ktayd11');
		$ktayd12 = $this->input->post('ktayd12');
		$ktayd13 = $this->input->post('ktayd13');
		$ktayd14 = $this->input->post('ktayd14');
		$ktayd15 = $this->input->post('ktayd15');
		$ktayd16 = $this->input->post('ktayd16');
		$ktayd17 = $this->input->post('ktayd17');
		$ktayd18 = $this->input->post('ktayd18');
		$ktayd19 = $this->input->post('ktayd19');
		$ktayd110 = $this->input->post('ktayd110');

		// update data responden dari kuesoner data demografi
		$data_responden = array(
			'nama' => $nama1,
			'usia' => $usia1,
			'pendidikan' => $pendidikan1,
			'pekerjaan' => $pekerjaan1,
		);

		$this->responden->update(array('id' => $id_responden), $data_responden);
		
		// update data applied kuesioner
		$data_applied_kuesioner_responden = array(
			'pretest_kontrol' => 1,
			'pretest_kontrol_datetime_created' => date("Y-m-d H:i:s")
		);

		$this->applied_kuesioner_responden->update(array('id_responden' => $id_responden), $data_applied_kuesioner_responden);

		// update kuesioner responden pretest kontrol dari data self management
		$data_kuesioner_responden_pretest_kontrol = array(
			'qk1_d' => $nama1,
			'qk2_d' => $usia1,
			'qk3_d' => $pendidikan1,
			'qk4_d' => $pekerjaan1,
			'qk5_d' => $riwayat_merokok1,
			'qk6_d' => $konsumsi_alkohol1,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
			'qk9_sm' => $integrasi_diri11,
			'qk10_sm' => $integrasi_diri12,
			'qk11_sm' => $integrasi_diri13,
			'qk12_sm' => $integrasi_diri14,
			'qk13_sm' => $integrasi_diri15,
			'qk14_sm' => $integrasi_diri16,
			'qk15_sm' => $integrasi_diri17,
			'qk16_sm' => $integrasi_diri18,
			'qk17_sm' => $integrasi_diri19,
			'qk18_sm' => $integrasi_diri110,
			'qk19_sm' => $regulasi_diri11,
			'qk20_sm' => $regulasi_diri12,
			'qk21_sm' => $regulasi_diri13,
			'qk22_sm' => $regulasi_diri14,
			'qk23_sm' => $regulasi_diri15,
			'qk24_sm' => $regulasi_diri16,
			'qk25_sm' => $regulasi_diri17,
			'qk26_sm' => $regulasi_diri18,
			'qk27_sm' => $regulasi_diri19,
			'qk28_sm' => $regulasi_diri110,
			'qk29_sm' => $idtk11,
			'qk30_sm' => $idtk12,
			'qk31_sm' => $idtk13,
			'qk32_sm' => $idtk14,
			'qk33_sm' => $idtk15,
			'qk34_sm' => $idtk16,
			'qk35_sm' => $idtk17,
			'qk36_sm' => $idtk18,
			'qk37_sm' => $idtk19,
			'qk38_sm' => $idtk110,
			'qk39_sm' => $ptd11,
			'qk40_sm' => $ptd12,
			'qk41_sm' => $ptd13,
			'qk42_sm' => $ptd14,
			'qk43_sm' => $ptd15,
			'qk44_sm' => $ptd16,
			'qk45_sm' => $ptd17,
			'qk46_sm' => $ptd18,
			'qk47_sm' => $ptd19,
			'qk48_sm' => $ptd110,
			'qk49_sm' => $ktayd11,
			'qk50_sm' => $ktayd12,
			'qk51_sm' => $ktayd13,
			'qk52_sm' => $ktayd14,
			'qk53_sm' => $ktayd15,
			'qk54_sm' => $ktayd16,
			'qk55_sm' => $ktayd17,
			'qk56_sm' => $ktayd18,
			'qk57_sm' => $ktayd19,
			'qk58_sm' => $ktayd110,
		);

		$this->kuesioner_responden_pretest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_kontrol);
		
		// jika data demorafi diubah, ubah semua data demografi kuesioner
		// update kuesioner responden pretest intervensi dari data demografi
		$data_kuesioner_responden_pretest_intervensi = array(
			'qk1_d' => $nama1,
			'qk2_d' => $usia1,
			'qk3_d' => $pendidikan1,
			'qk4_d' => $pekerjaan1,
			'qk5_d' => $riwayat_merokok1,
			'qk6_d' => $konsumsi_alkohol1,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_pretest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_intervensi);
		
		// update kuesioner responden postest kontrol dari data demografi
		$data_kuesioner_responden_postest_kontrol = array(
			'qk1_d' => $nama1,
			'qk2_d' => $usia1,
			'qk3_d' => $pendidikan1,
			'qk4_d' => $pekerjaan1,
			'qk5_d' => $riwayat_merokok1,
			'qk6_d' => $konsumsi_alkohol1,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_postest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_kontrol);
		
		// update kuesioner responden postest intervensi dari data demografi
		$data_kuesioner_responden_postest_intervensi = array(
			'qk1_d' => $nama1,
			'qk2_d' => $usia1,
			'qk3_d' => $pendidikan1,
			'qk4_d' => $pekerjaan1,
			'qk5_d' => $riwayat_merokok1,
			'qk6_d' => $konsumsi_alkohol1,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_postest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_intervensi);

		// session
		$this->session->set_flashdata('flash', 'Diupdate');

		// redirect
		redirect('responden/kuesioner/'.$id_user);
	}

	public function kuesioner_pretest_intervensi($id_responden) {
		
		$id_user = $this->input->post('id_user');
		// get data form
		// data demografi
		$nama2 = $this->input->post('nama2');
		$usia2 = $this->input->post('usia2');
		$pendidikan2 = $this->input->post('pendidikan2');
		$pekerjaan2 = $this->input->post('pekerjaan2');
		$riwayat_merokok2 = $this->input->post('riwayat_merokok2');
		$konsumsi_alkohol2 = $this->input->post('konsumsi_alkohol2');
		$penyakit1 = $this->input->post('penyakit1');
		$desc_penyakit1 = $this->input->post('desc_penyakit1');

		if($penyakit1 == "Ya" && !empty($desc_penyakit1)) {
            $penyakit1 = $penyakit1.", ".$desc_penyakit1;
        }

		// self management - integrasi diri
		$integrasi_diri21 = $this->input->post('integrasi_diri21');
		$integrasi_diri22 = $this->input->post('integrasi_diri22');
		$integrasi_diri23 = $this->input->post('integrasi_diri23');
		$integrasi_diri24 = $this->input->post('integrasi_diri24');
		$integrasi_diri25 = $this->input->post('integrasi_diri25');
		$integrasi_diri26 = $this->input->post('integrasi_diri26');
		$integrasi_diri27 = $this->input->post('integrasi_diri27');
		$integrasi_diri28 = $this->input->post('integrasi_diri28');
		$integrasi_diri29 = $this->input->post('integrasi_diri29');
		$integrasi_diri210 = $this->input->post('integrasi_diri210');

		// self management - regulasi diri
		$regulasi_diri21 = $this->input->post('regulasi_diri21');
		$regulasi_diri22 = $this->input->post('regulasi_diri22');
		$regulasi_diri23 = $this->input->post('regulasi_diri23');
		$regulasi_diri24 = $this->input->post('regulasi_diri24');
		$regulasi_diri25 = $this->input->post('regulasi_diri25');
		$regulasi_diri26 = $this->input->post('regulasi_diri26');
		$regulasi_diri27 = $this->input->post('regulasi_diri27');
		$regulasi_diri28 = $this->input->post('regulasi_diri28');
		$regulasi_diri29 = $this->input->post('regulasi_diri29');
		$regulasi_diri210 = $this->input->post('regulasi_diri210');
		
		// self management - idtk
		$idtk21 = $this->input->post('idtk21');
		$idtk22 = $this->input->post('idtk22');
		$idtk23 = $this->input->post('idtk23');
		$idtk24 = $this->input->post('idtk24');
		$idtk25 = $this->input->post('idtk25');
		$idtk26 = $this->input->post('idtk26');
		$idtk27 = $this->input->post('idtk27');
		$idtk28 = $this->input->post('idtk28');
		$idtk29 = $this->input->post('idtk29');
		$idtk210 = $this->input->post('idtk210');
		
		// self management - ptd
		$ptd21 = $this->input->post('ptd21');
		$ptd22 = $this->input->post('ptd22');
		$ptd23 = $this->input->post('ptd23');
		$ptd24 = $this->input->post('ptd24');
		$ptd25 = $this->input->post('ptd25');
		$ptd26 = $this->input->post('ptd26');
		$ptd27 = $this->input->post('ptd27');
		$ptd28 = $this->input->post('ptd28');
		$ptd29 = $this->input->post('ptd29');
		$ptd210 = $this->input->post('ptd210');
		
		// self management - ktayd
		$ktayd21 = $this->input->post('ktayd21');
		$ktayd22 = $this->input->post('ktayd22');
		$ktayd23 = $this->input->post('ktayd23');
		$ktayd24 = $this->input->post('ktayd24');
		$ktayd25 = $this->input->post('ktayd25');
		$ktayd26 = $this->input->post('ktayd26');
		$ktayd27 = $this->input->post('ktayd27');
		$ktayd28 = $this->input->post('ktayd28');
		$ktayd29 = $this->input->post('ktayd29');
		$ktayd210 = $this->input->post('ktayd210');

		// update data responden dari kuesoner data demografi
		$data_responden = array(
			'nama' => $nama2,
			'usia' => $usia2,
			'pendidikan' => $pendidikan2,
			'pekerjaan' => $pekerjaan2,
		);

		$this->responden->update(array('id' => $id_responden), $data_responden);
		
		// update data applied kuesioner
		$data_applied_kuesioner_responden = array(
			'pretest_intervensi' => 1,
			'pretest_intervensi_datetime_created' => date("Y-m-d H:i:s")
		);

		$this->applied_kuesioner_responden->update(array('id_responden' => $id_responden), $data_applied_kuesioner_responden);

		// update kuesioner responden pretest intervensi dari data self management
		$data_kuesioner_responden_pretest_intervensi = array(
			'qk1_d' => $nama2,
			'qk2_d' => $usia2,
			'qk3_d' => $pendidikan2,
			'qk4_d' => $pekerjaan2,
			'qk5_d' => $riwayat_merokok2,
			'qk6_d' => $konsumsi_alkohol2,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
			'qk9_sm' => $integrasi_diri21,
			'qk10_sm' => $integrasi_diri22,
			'qk11_sm' => $integrasi_diri23,
			'qk12_sm' => $integrasi_diri24,
			'qk13_sm' => $integrasi_diri25,
			'qk14_sm' => $integrasi_diri26,
			'qk15_sm' => $integrasi_diri27,
			'qk16_sm' => $integrasi_diri28,
			'qk17_sm' => $integrasi_diri29,
			'qk18_sm' => $integrasi_diri210,
			'qk19_sm' => $regulasi_diri21,
			'qk20_sm' => $regulasi_diri22,
			'qk21_sm' => $regulasi_diri23,
			'qk22_sm' => $regulasi_diri24,
			'qk23_sm' => $regulasi_diri25,
			'qk24_sm' => $regulasi_diri26,
			'qk25_sm' => $regulasi_diri27,
			'qk26_sm' => $regulasi_diri28,
			'qk27_sm' => $regulasi_diri29,
			'qk28_sm' => $regulasi_diri210,
			'qk29_sm' => $idtk21,
			'qk30_sm' => $idtk22,
			'qk31_sm' => $idtk23,
			'qk32_sm' => $idtk24,
			'qk33_sm' => $idtk25,
			'qk34_sm' => $idtk26,
			'qk35_sm' => $idtk27,
			'qk36_sm' => $idtk28,
			'qk37_sm' => $idtk29,
			'qk38_sm' => $idtk210,
			'qk39_sm' => $ptd21,
			'qk40_sm' => $ptd22,
			'qk41_sm' => $ptd23,
			'qk42_sm' => $ptd24,
			'qk43_sm' => $ptd25,
			'qk44_sm' => $ptd26,
			'qk45_sm' => $ptd27,
			'qk46_sm' => $ptd28,
			'qk47_sm' => $ptd29,
			'qk48_sm' => $ptd210,
			'qk49_sm' => $ktayd21,
			'qk50_sm' => $ktayd22,
			'qk51_sm' => $ktayd23,
			'qk52_sm' => $ktayd24,
			'qk53_sm' => $ktayd25,
			'qk54_sm' => $ktayd26,
			'qk55_sm' => $ktayd27,
			'qk56_sm' => $ktayd28,
			'qk57_sm' => $ktayd29,
			'qk58_sm' => $ktayd210,
		);

		$this->kuesioner_responden_pretest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_intervensi);
		
		// jika data demorafi diubah, ubah semua data demografi kuesioner
		// update kuesioner responden pretest kontrol dari data demografi
		$data_kuesioner_responden_pretest_kontrol = array(
			'qk1_d' => $nama2,
			'qk2_d' => $usia2,
			'qk3_d' => $pendidikan2,
			'qk4_d' => $pekerjaan2,
			'qk5_d' => $riwayat_merokok2,
			'qk6_d' => $konsumsi_alkohol2,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_pretest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_kontrol);
		
		// update kuesioner responden postest kontrol dari data demografi
		$data_kuesioner_responden_postest_kontrol = array(
			'qk1_d' => $nama2,
			'qk2_d' => $usia2,
			'qk3_d' => $pendidikan2,
			'qk4_d' => $pekerjaan2,
			'qk5_d' => $riwayat_merokok2,
			'qk6_d' => $konsumsi_alkohol2,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_postest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_kontrol);
		
		// update kuesioner responden postest intervensi dari data demografi
		$data_kuesioner_responden_postest_intervensi = array(
			'qk1_d' => $nama2,
			'qk2_d' => $usia2,
			'qk3_d' => $pendidikan2,
			'qk4_d' => $pekerjaan2,
			'qk5_d' => $riwayat_merokok2,
			'qk6_d' => $konsumsi_alkohol2,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_postest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_intervensi);

		// session
		$this->session->set_flashdata('flash2', 'Diupdate');

		// redirect
		redirect('responden/kuesioner/'.$id_user);
	}
	public function kuesioner_postest_kontrol($id_responden) {
		
		$id_user = $this->input->post('id_user');
		// get data form
		// data demografi
		$nama3 = $this->input->post('nama3');
		$usia3 = $this->input->post('usia3');
		$pendidikan3 = $this->input->post('pendidikan3');
		$pekerjaan3 = $this->input->post('pekerjaan3');
		$riwayat_merokok3 = $this->input->post('riwayat_merokok3');
		$konsumsi_alkohol3 = $this->input->post('konsumsi_alkohol3');
		$penyakit1 = $this->input->post('penyakit1');
		$desc_penyakit1 = $this->input->post('desc_penyakit1');

		if($penyakit1 == "Ya" && !empty($desc_penyakit1)) {
            $penyakit1 = $penyakit1.", ".$desc_penyakit1;
        }

		// self management - integrasi diri
		$integrasi_diri31 = $this->input->post('integrasi_diri31');
		$integrasi_diri32 = $this->input->post('integrasi_diri32');
		$integrasi_diri33 = $this->input->post('integrasi_diri33');
		$integrasi_diri34 = $this->input->post('integrasi_diri34');
		$integrasi_diri35 = $this->input->post('integrasi_diri35');
		$integrasi_diri36 = $this->input->post('integrasi_diri36');
		$integrasi_diri37 = $this->input->post('integrasi_diri37');
		$integrasi_diri38 = $this->input->post('integrasi_diri38');
		$integrasi_diri39 = $this->input->post('integrasi_diri39');
		$integrasi_diri310 = $this->input->post('integrasi_diri310');

		// self management - regulasi diri
		$regulasi_diri31 = $this->input->post('regulasi_diri31');
		$regulasi_diri32 = $this->input->post('regulasi_diri32');
		$regulasi_diri33 = $this->input->post('regulasi_diri33');
		$regulasi_diri34 = $this->input->post('regulasi_diri34');
		$regulasi_diri35 = $this->input->post('regulasi_diri35');
		$regulasi_diri36 = $this->input->post('regulasi_diri36');
		$regulasi_diri37 = $this->input->post('regulasi_diri37');
		$regulasi_diri38 = $this->input->post('regulasi_diri38');
		$regulasi_diri39 = $this->input->post('regulasi_diri39');
		$regulasi_diri310 = $this->input->post('regulasi_diri310');
		
		// self management - idtk
		$idtk31 = $this->input->post('idtk31');
		$idtk32 = $this->input->post('idtk32');
		$idtk33 = $this->input->post('idtk33');
		$idtk34 = $this->input->post('idtk34');
		$idtk35 = $this->input->post('idtk35');
		$idtk36 = $this->input->post('idtk36');
		$idtk37 = $this->input->post('idtk37');
		$idtk38 = $this->input->post('idtk38');
		$idtk39 = $this->input->post('idtk39');
		$idtk310 = $this->input->post('idtk310');
		
		// self management - ptd
		$ptd31 = $this->input->post('ptd31');
		$ptd32 = $this->input->post('ptd32');
		$ptd33 = $this->input->post('ptd33');
		$ptd34 = $this->input->post('ptd34');
		$ptd35 = $this->input->post('ptd35');
		$ptd36 = $this->input->post('ptd36');
		$ptd37 = $this->input->post('ptd37');
		$ptd38 = $this->input->post('ptd38');
		$ptd39 = $this->input->post('ptd39');
		$ptd310 = $this->input->post('ptd310');
		
		// self management - ktayd
		$ktayd31 = $this->input->post('ktayd31');
		$ktayd32 = $this->input->post('ktayd32');
		$ktayd33 = $this->input->post('ktayd33');
		$ktayd34 = $this->input->post('ktayd34');
		$ktayd35 = $this->input->post('ktayd35');
		$ktayd36 = $this->input->post('ktayd36');
		$ktayd37 = $this->input->post('ktayd37');
		$ktayd38 = $this->input->post('ktayd38');
		$ktayd39 = $this->input->post('ktayd39');
		$ktayd310 = $this->input->post('ktayd310');

		// update data responden dari kuesoner data demografi
		$data_responden = array(
			'nama' => $nama3,
			'usia' => $usia3,
			'pendidikan' => $pendidikan3,
			'pekerjaan' => $pekerjaan3,
		);

		$this->responden->update(array('id' => $id_responden), $data_responden);
		
		// update data applied kuesioner
		$data_applied_kuesioner_responden = array(
			'postest_kontrol' => 1,
			'postest_kontrol_datetime_created' => date("Y-m-d H:i:s")
		);

		$this->applied_kuesioner_responden->update(array('id_responden' => $id_responden), $data_applied_kuesioner_responden);

		// update kuesioner responden postest kontrol dari data self management
		$data_kuesioner_responden_postest_kontrol = array(
			'qk1_d' => $nama3,
			'qk2_d' => $usia3,
			'qk3_d' => $pendidikan3,
			'qk4_d' => $pekerjaan3,
			'qk5_d' => $riwayat_merokok3,
			'qk6_d' => $konsumsi_alkohol3,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
			'qk9_sm' => $integrasi_diri31,
			'qk10_sm' => $integrasi_diri32,
			'qk11_sm' => $integrasi_diri33,
			'qk12_sm' => $integrasi_diri34,
			'qk13_sm' => $integrasi_diri35,
			'qk14_sm' => $integrasi_diri36,
			'qk15_sm' => $integrasi_diri37,
			'qk16_sm' => $integrasi_diri38,
			'qk17_sm' => $integrasi_diri39,
			'qk18_sm' => $integrasi_diri310,
			'qk19_sm' => $regulasi_diri31,
			'qk20_sm' => $regulasi_diri32,
			'qk21_sm' => $regulasi_diri33,
			'qk22_sm' => $regulasi_diri34,
			'qk23_sm' => $regulasi_diri35,
			'qk24_sm' => $regulasi_diri36,
			'qk25_sm' => $regulasi_diri37,
			'qk26_sm' => $regulasi_diri38,
			'qk27_sm' => $regulasi_diri39,
			'qk28_sm' => $regulasi_diri310,
			'qk29_sm' => $idtk31,
			'qk30_sm' => $idtk32,
			'qk31_sm' => $idtk33,
			'qk32_sm' => $idtk34,
			'qk33_sm' => $idtk35,
			'qk34_sm' => $idtk36,
			'qk35_sm' => $idtk37,
			'qk36_sm' => $idtk38,
			'qk37_sm' => $idtk39,
			'qk38_sm' => $idtk310,
			'qk39_sm' => $ptd31,
			'qk40_sm' => $ptd32,
			'qk41_sm' => $ptd33,
			'qk42_sm' => $ptd34,
			'qk43_sm' => $ptd35,
			'qk44_sm' => $ptd36,
			'qk45_sm' => $ptd37,
			'qk46_sm' => $ptd38,
			'qk47_sm' => $ptd39,
			'qk48_sm' => $ptd310,
			'qk49_sm' => $ktayd31,
			'qk50_sm' => $ktayd32,
			'qk51_sm' => $ktayd33,
			'qk52_sm' => $ktayd34,
			'qk53_sm' => $ktayd35,
			'qk54_sm' => $ktayd36,
			'qk55_sm' => $ktayd37,
			'qk56_sm' => $ktayd38,
			'qk57_sm' => $ktayd39,
			'qk58_sm' => $ktayd310,
		);

		$this->kuesioner_responden_postest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_kontrol);
		
		// jika data demorafi diubah, ubah semua data demografi kuesioner
		// update kuesioner responden pretest kontrol dari data demografi
		$data_kuesioner_responden_pretest_kontrol = array(
			'qk1_d' => $nama3,
			'qk2_d' => $usia3,
			'qk3_d' => $pendidikan3,
			'qk4_d' => $pekerjaan3,
			'qk5_d' => $riwayat_merokok3,
			'qk6_d' => $konsumsi_alkohol3,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_pretest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_kontrol);
		
		// update kuesioner responden pretest intervensi dari data demografi
		$data_kuesioner_responden_pretest_intervensi = array(
			'qk1_d' => $nama3,
			'qk2_d' => $usia3,
			'qk3_d' => $pendidikan3,
			'qk4_d' => $pekerjaan3,
			'qk5_d' => $riwayat_merokok3,
			'qk6_d' => $konsumsi_alkohol3,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_pretest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_intervensi);
		
		// update kuesioner responden postest intervensi dari data demografi
		$data_kuesioner_responden_postest_intervensi = array(
			'qk1_d' => $nama3,
			'qk2_d' => $usia3,
			'qk3_d' => $pendidikan3,
			'qk4_d' => $pekerjaan3,
			'qk5_d' => $riwayat_merokok3,
			'qk6_d' => $konsumsi_alkohol3,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_postest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_intervensi);

		// session
		$this->session->set_flashdata('flash3', 'Diupdate');

		// redirect
		redirect('responden/kuesioner/'.$id_user);
	}
	public function kuesioner_postest_intervensi($id_responden) {
		
		$id_user = $this->input->post('id_user');
		// get data form
		// data demografi
		$nama4 = $this->input->post('nama4');
		$usia4 = $this->input->post('usia4');
		$pendidikan4 = $this->input->post('pendidikan4');
		$pekerjaan4 = $this->input->post('pekerjaan4');
		$riwayat_merokok4 = $this->input->post('riwayat_merokok4');
		$konsumsi_alkohol4 = $this->input->post('konsumsi_alkohol4');
		$penyakit1 = $this->input->post('penyakit1');
		$desc_penyakit1 = $this->input->post('desc_penyakit1');

		if($penyakit1 == "Ya" && !empty($desc_penyakit1)) {
            $penyakit1 = $penyakit1.", ".$desc_penyakit1;
        }

		// self management - integrasi diri
		$integrasi_diri41 = $this->input->post('integrasi_diri41');
		$integrasi_diri42 = $this->input->post('integrasi_diri42');
		$integrasi_diri43 = $this->input->post('integrasi_diri43');
		$integrasi_diri44 = $this->input->post('integrasi_diri44');
		$integrasi_diri45 = $this->input->post('integrasi_diri45');
		$integrasi_diri46 = $this->input->post('integrasi_diri46');
		$integrasi_diri47 = $this->input->post('integrasi_diri47');
		$integrasi_diri48 = $this->input->post('integrasi_diri48');
		$integrasi_diri49 = $this->input->post('integrasi_diri49');
		$integrasi_diri410 = $this->input->post('integrasi_diri410');

		// self management - regulasi diri
		$regulasi_diri41 = $this->input->post('regulasi_diri41');
		$regulasi_diri42 = $this->input->post('regulasi_diri42');
		$regulasi_diri43 = $this->input->post('regulasi_diri43');
		$regulasi_diri44 = $this->input->post('regulasi_diri44');
		$regulasi_diri45 = $this->input->post('regulasi_diri45');
		$regulasi_diri46 = $this->input->post('regulasi_diri46');
		$regulasi_diri47 = $this->input->post('regulasi_diri47');
		$regulasi_diri48 = $this->input->post('regulasi_diri48');
		$regulasi_diri49 = $this->input->post('regulasi_diri49');
		$regulasi_diri410 = $this->input->post('regulasi_diri410');
		
		// self management - idtk
		$idtk41 = $this->input->post('idtk41');
		$idtk42 = $this->input->post('idtk42');
		$idtk43 = $this->input->post('idtk43');
		$idtk44 = $this->input->post('idtk44');
		$idtk45 = $this->input->post('idtk45');
		$idtk46 = $this->input->post('idtk46');
		$idtk47 = $this->input->post('idtk47');
		$idtk48 = $this->input->post('idtk48');
		$idtk49 = $this->input->post('idtk49');
		$idtk410 = $this->input->post('idtk410');
		
		// self management - ptd
		$ptd41 = $this->input->post('ptd41');
		$ptd42 = $this->input->post('ptd42');
		$ptd43 = $this->input->post('ptd43');
		$ptd44 = $this->input->post('ptd44');
		$ptd45 = $this->input->post('ptd45');
		$ptd46 = $this->input->post('ptd46');
		$ptd47 = $this->input->post('ptd47');
		$ptd48 = $this->input->post('ptd48');
		$ptd49 = $this->input->post('ptd49');
		$ptd410 = $this->input->post('ptd410');
		
		// self management - ktayd
		$ktayd41 = $this->input->post('ktayd41');
		$ktayd42 = $this->input->post('ktayd42');
		$ktayd43 = $this->input->post('ktayd43');
		$ktayd44 = $this->input->post('ktayd44');
		$ktayd45 = $this->input->post('ktayd45');
		$ktayd46 = $this->input->post('ktayd46');
		$ktayd47 = $this->input->post('ktayd47');
		$ktayd48 = $this->input->post('ktayd48');
		$ktayd49 = $this->input->post('ktayd49');
		$ktayd410 = $this->input->post('ktayd410');

		// update data responden dari kuesoner data demografi
		$data_responden = array(
			'nama' => $nama4,
			'usia' => $usia4,
			'pendidikan' => $pendidikan4,
			'pekerjaan' => $pekerjaan4,
		);

		$this->responden->update(array('id' => $id_responden), $data_responden);
		
		// update data applied kuesioner
		$data_applied_kuesioner_responden = array(
			'postest_intervensi' => 1,
			'postest_intervensi_datetime_created' => date("Y-m-d H:i:s")
		);

		$this->applied_kuesioner_responden->update(array('id_responden' => $id_responden), $data_applied_kuesioner_responden);

		// update kuesioner responden postest intervensi dari data self management
		$data_kuesioner_responden_postest_intervensi = array(
			'qk1_d' => $nama4,
			'qk2_d' => $usia4,
			'qk3_d' => $pendidikan4,
			'qk4_d' => $pekerjaan4,
			'qk5_d' => $riwayat_merokok4,
			'qk6_d' => $konsumsi_alkohol4,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
			'qk9_sm' => $integrasi_diri41,
			'qk10_sm' => $integrasi_diri42,
			'qk11_sm' => $integrasi_diri43,
			'qk12_sm' => $integrasi_diri44,
			'qk13_sm' => $integrasi_diri45,
			'qk14_sm' => $integrasi_diri46,
			'qk15_sm' => $integrasi_diri47,
			'qk16_sm' => $integrasi_diri48,
			'qk17_sm' => $integrasi_diri49,
			'qk18_sm' => $integrasi_diri410,
			'qk19_sm' => $regulasi_diri41,
			'qk20_sm' => $regulasi_diri42,
			'qk21_sm' => $regulasi_diri43,
			'qk22_sm' => $regulasi_diri44,
			'qk23_sm' => $regulasi_diri45,
			'qk24_sm' => $regulasi_diri46,
			'qk25_sm' => $regulasi_diri47,
			'qk26_sm' => $regulasi_diri48,
			'qk27_sm' => $regulasi_diri49,
			'qk28_sm' => $regulasi_diri410,
			'qk29_sm' => $idtk41,
			'qk30_sm' => $idtk42,
			'qk31_sm' => $idtk43,
			'qk32_sm' => $idtk44,
			'qk33_sm' => $idtk45,
			'qk34_sm' => $idtk46,
			'qk35_sm' => $idtk47,
			'qk36_sm' => $idtk48,
			'qk37_sm' => $idtk49,
			'qk38_sm' => $idtk410,
			'qk39_sm' => $ptd41,
			'qk40_sm' => $ptd42,
			'qk41_sm' => $ptd43,
			'qk42_sm' => $ptd44,
			'qk43_sm' => $ptd45,
			'qk44_sm' => $ptd46,
			'qk45_sm' => $ptd47,
			'qk46_sm' => $ptd48,
			'qk47_sm' => $ptd49,
			'qk48_sm' => $ptd410,
			'qk49_sm' => $ktayd41,
			'qk50_sm' => $ktayd42,
			'qk51_sm' => $ktayd43,
			'qk52_sm' => $ktayd44,
			'qk53_sm' => $ktayd45,
			'qk54_sm' => $ktayd46,
			'qk55_sm' => $ktayd47,
			'qk56_sm' => $ktayd48,
			'qk57_sm' => $ktayd49,
			'qk58_sm' => $ktayd410,
		);

		$this->kuesioner_responden_postest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_intervensi);
		
		// jika data demorafi diubah, ubah semua data demografi kuesioner
		// update kuesioner responden pretest kontrol dari data demografi
		$data_kuesioner_responden_pretest_kontrol = array(
			'qk1_d' => $nama4,
			'qk2_d' => $usia4,
			'qk3_d' => $pendidikan4,
			'qk4_d' => $pekerjaan4,
			'qk5_d' => $riwayat_merokok4,
			'qk6_d' => $konsumsi_alkohol4,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_pretest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_kontrol);
		
		// update kuesioner responden pretest intervensi dari data demografi
		$data_kuesioner_responden_pretest_intervensi = array(
			'qk1_d' => $nama4,
			'qk2_d' => $usia4,
			'qk3_d' => $pendidikan4,
			'qk4_d' => $pekerjaan4,
			'qk5_d' => $riwayat_merokok4,
			'qk6_d' => $konsumsi_alkohol4,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_pretest_intervensi->update(array('id_responden' => $id_responden), $data_kuesioner_responden_pretest_intervensi);
		
		// update kuesioner responden postest kontrol dari data demografi
		$data_kuesioner_responden_postest_kontrol = array(
			'qk1_d' => $nama4,
			'qk2_d' => $usia4,
			'qk3_d' => $pendidikan4,
			'qk4_d' => $pekerjaan4,
			'qk5_d' => $riwayat_merokok4,
			'qk6_d' => $konsumsi_alkohol4,
			'qk7_d' => $penyakit1,
			'qk8_d' => '',
		);

		$this->kuesioner_responden_postest_kontrol->update(array('id_responden' => $id_responden), $data_kuesioner_responden_postest_kontrol);

		// session
		$this->session->set_flashdata('flash4', 'Diupdate');

		// redirect
		redirect('responden/kuesioner/'.$id_user);
	}

	public function materi($id) {
		$this->data["id_user"] = $id;
		$this->data["responden"] = $this->responden->get_responden_by_userid($id);
		$id_responden = $this->data["responden"]['id'];
		// list datatable
		$this->data["materi"] = $this->materi->get_all();
		
		$this->data["active"] = "materi";
		$this->load->view('template/responden/materi', $this->data);
	}
	public function download_materi($id, $id_user) {
		$this->data["id_user"] = $id_user;

		// get data responden by iduser
		$this->data["responden"] = $this->responden->get_responden_by_userid($id_user);
		
		// get data materi by id materi
		$this->data["materi"] = $this->materi->get_materi_by_id($id);

		// get POST
		$id_materi = $id;
		$nama_responden = $this->data['responden']['nama'];
		$downloaded_datetime = $this->data['responden']['nama'];

		$data_materi_log = array(
			'id_materi' => $id_materi,
			'downloaded_by' => $nama_responden,
			'downloaded_datetime' => date("Y-m-d H:i:s"),
		);
		
		$insert = $this->materi_log->save($data_materi_log);

		redirect('assets/admin/upload/files/materi/'.$this->data['materi']['file']);
	}

	

	public function tables($id) {
		$this->data["id_user"] = $id;
		$this->data["coach"] = $this->coach->get_coach_by_userid($id);
		$this->data["active"] = "tables";
		$this->load->view('template/coach/tables', $this->data);
	}

	public function billing($id) {
		$this->data["id_user"] = $id;
		$this->data["coach"] = $this->coach->get_coach_by_userid($id);
		$this->data["active"] = "billing";
		$this->load->view('template/coach/billing', $this->data);
	}

	public function notifications($id) {
		$this->data["id_user"] = $id;
		$this->data["coach"] = $this->coach->get_coach_by_userid($id);
		$this->data["active"] = "notifications";
		$this->load->view('template/coach/notifications', $this->data);
	}

	public function profile($id) {
		$this->data["id_user"] = $id;
		$this->data["user"] = $this->auth->get_user_by_id($id);
		$this->data["responden"] = $this->responden->get_responden_by_userid($id);
		$id_responden = $this->data["responden"]['id'];

		// get all data kuesioner responden pretest kontrol
		$this->data["applied_kuesioner_responden"] = $this->applied_kuesioner_responden->get_all_by_idresponden($id_responden);
		
		$this->data["active"] = "profile";
		$this->load->view('template/responden/profile', $this->data);
	}

	// controller crud ajax modal
	public function ajax_edit($id)
	{
		$data = $this->coach->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add($active)
	{
		if($active == "materi") {

			$judul_materi = $this->input->post('judulMateri');
			$id_coach = $this->input->post('idCoach');
			
			$this->_validate($active);
			$data = array(
					'judul_materi' => $judul_materi,
					'tgl_waktu_upload' => date("Y-m-d H:i:s"),
					'id_coach' => $id_coach,
				);
			
			if(!empty($_FILES['fileMateri']['name']))
			{
				$upload = $this->_do_upload($id_coach);
				$data['file'] = $upload;
			}
		
			$insert = $this->materi->save($data);

		}else if($active == "coaching_schedule") {

			$senin = $this->input->post('senin');
			$selasa = $this->input->post('selasa');
			$rabu = $this->input->post('rabu');
			$kamis = $this->input->post('kamis');
			$jumat = $this->input->post('jumat');
			$sabtu = $this->input->post('sabtu');
			$minggu = $this->input->post('minggu');
			$id_coach = $this->input->post('idCoach');

			$this->_validate($active);
			$data = array(
					'senin' => $senin,
					'selasa' => $selasa,
					'rabu' => $rabu,
					'kamis' => $kamis,
					'jumat' => $jumat,
					'sabtu' => $sabtu,
					'minggu' => $minggu,
					'id_coach' => $id_coach
				);
		
			$insert = $this->jadwal_coach->save($data);

		}else if($active == "coaching_report") {
			
		}

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update($active)
	{
		 if($active == "coaching_schedule") {
			$id = $this->input->post('id');
			$senin = $this->input->post('senin');
			$selasa = $this->input->post('selasa');
			$rabu = $this->input->post('rabu');
			$kamis = $this->input->post('kamis');
			$jumat = $this->input->post('jumat');
			$sabtu = $this->input->post('sabtu');
			$minggu = $this->input->post('minggu');
			$id_coach = $this->input->post('idCoach');

			$this->_validate($active);

			$data = array(
					'senin' => $senin,
					'selasa' => $selasa,
					'rabu' => $rabu,
					'kamis' => $kamis,
					'jumat' => $jumat,
					'sabtu' => $sabtu,
					'minggu' => $minggu,
					'id_coach' => $id_coach
				);

			$this->jadwal_coach->update(array('id' => $id), $data);

		} else if($active == "materi") {
			$id = $this->input->post('id');
			$judul_materi = $this->input->post('judulMateri');
			$id_coach = $this->input->post('idCoach');

			//delete file
			$this->data["materi"] = $this->materi->get_materi_by_id($id);
			
			$this->_validate($active, 'update');

			$data = array(
					'judul_materi' => $judul_materi,
					'tgl_waktu_upload' => date('Y-m-d H:i:s'),
				);

			if(!empty($_FILES['fileMateri']['name']))
			{
				$upload = $this->_do_upload($id_coach);
				
				
				if(file_exists('assets/coach/upload/files/materi/'.$this->data["materi"]['file']) && $this->data["materi"]['file'])
				unlink('assets/coach/upload/files/materi/'.$this->data["materi"]['file']);
				
				$data['file'] = $upload;
			}

			$this->materi->update(array('id' => $id), $data);


		} else if($active == "profile") {
			
			// data profile
			$gender = $this->input->post('gender');
			$deskripsi_pribadi = $this->input->post('deskripsi_pribadi');
			$id = $this->input->post('id_responden');

			$this->_validate($active, 'update');

			// data responden
			$data = array(
				'gender' => $gender,
				'deskripsi_pribadi' => $deskripsi_pribadi
			);

			$this->responden->update(array('id' => $id), $data);

		}else if($active == 'edit_foto_profile') {

			$id_user = $this->input->post('id_user');
			$id_responden = $this->input->post('id_responden');

			$this->data["responden"] = $this->responden->get_responden_by_userid($id_user);
			
			if(!empty($_FILES['foto_profile']['name']))
			{
				$upload = $this->_do_upload_foto_profile($id_responden);
				
				//delete file
				if($this->data["responden"]['gambar'] != 'responden_default.png'){
					if(file_exists('assets/responden/upload/images/profile/'.$this->data["responden"]['gambar']) && $this->data["responden"]['gambar'])
					unlink('assets/responden/upload/images/profile/'.$this->data["responden"]['gambar']);
				}

				$data['gambar'] = $upload;
			}

			$this->_validate($active, 'update');

			$this->responden->update(array('id' => $id_responden), $data);

		}
		
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($active, $id)
	{
		if($active == "materi") {

			$this->materi->delete_by_id($id);

		}else if($active == "coaching_schedule") {

			$this->jadwal_coach->delete_by_id($id);
			
		}else if($active == "profile") {

			$coach_cv = $this->coach->get_by_id_array($id);
			$cv_resume = $coach_cv["cv_resume"];

			if(file_exists('assets/coach/upload/files/cv/'.$cv_resume) && $cv_resume)
			unlink('assets/coach/upload/files/cv/'.$cv_resume);
			$data['cv_resume'] = '';

			$this->coach->update(array('id' => $id), $data);
		
		}else if($active == "notif_startup") {
			$this->notif_startup->delete_by_id($id);
		}
		
		echo json_encode(array("status" => TRUE));
	}

	private function _validate($active, $update = '')
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		
		if($active == "materi") {
			
			if($this->input->post('judulMateri') == '')
			{
				$data['inputerror'][] = 'judulMateri';
				$data['error_string'][] = 'Judul Materi is required';
				$data['status'] = FALSE;
			}

			if(!$update) {
				if(empty($_FILES['fileMateri']['name'])){
					$data['inputerror'][] = 'fileMateri';
					$data['error_string'][] = 'File Materi tidak boleh kosong';
					$data['status'] = FALSE;
				}
			}
			
		} else if($active == "coaching_schedule") {

			if($this->input->post('senin') == '' && $this->input->post('selasa') == '' && $this->input->post('rabu') == '' && $this->input->post('kamis') == '' && $this->input->post('jumat') == '' && $this->input->post('sabtu') == '' && $this->input->post('minggu') == '')
			{
				$data['inputerror'][] = 'error_boy';
				$data['error_string'][] = 'Maaf Data Tidak Boleh Kosong';
				$data['status'] = FALSE;
			}

		} else if($active == "profile") {
			if($this->input->post('gender') == "") {
				$data['inputerror'][] = 'gender';
				$data['error_string'][] = 'Gender tidak boleh kosong';
				$data['status'] = FALSE;
			}

			if($this->input->post('deskripsi_pribadi') == "") {
				$data['inputerror'][] = 'deskripsi_pribadi';
				$data['error_string'][] = 'Deskripsi Pribadi tidak boleh kosong';
				$data['status'] = FALSE;
			}
		} else if($active == "edit_foto_profile") {
			if(empty($_FILES['foto_profile']['name'])) {
				$data['inputerror'][] = 'foto_profile';
				$data['error_string'][] = 'Foto Profile belum diganti';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _do_upload($id_coach)
    {
		$materi_name = $_FILES['fileMateri']['name'];
	
		$materi_name = pathinfo($materi_name, PATHINFO_FILENAME);

		$file_materi = str_replace(".", "", $materi_name);
		
		$newName = "$file_materi".time()."_c".$id_coach."file-materi";
		
        $config['upload_path']          = './assets/coach/upload/files/materi/';
        $config['allowed_types']        = 'doc|docx|xls|xlsx|ppt|pptx|pdf';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('fileMateri')) //upload and validate
        {
            $data['inputerror'][] = 'fileMateri';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	function updateProfile() {
		// data table coach
		$id = $this->input->post('id_coach');
		$id_user = $this->input->post('id_user');

		// data table bidang_keahlian_coach
		$checkEarlySSD = $this->input->post('checkEarlySSD');
		$checkProductM = $this->input->post('checkProductM');
		$checkTeamM = $this->input->post('checkTeamM');
		$checkStrategicMAB = $this->input->post('checkStrategicMAB');
		$checkSalesAM = $this->input->post('checkSalesAM');
		$checkFinanceAT = $this->input->post('checkFinanceAT');
		$checkSupplyC = $this->input->post('checkSupplyC');
		$checkFundingAIS = $this->input->post('checkFundingAIS');
		$checkOther = $this->input->post('checkOther');
		$otherBidang = $this->input->post('otherBidang');

		$this->data["coach"] = $this->coach->get_coach_by_userid($id_user);
		$id_coach = $this->data["coach"]['id'];

		// get data bidang_keahlian_coach
		$this->data['bidang_keahlian_coach'] = $this->bidang_keahlian_coach->get_all_by_coachid($id_coach);
		
		// validasi
		// $this->_validate("profile");

		// inisialisasi var temp
		$bidang_exists = false;
		$bidang_exists2 = false;
		$bidang_exists3 = false;
		$bidang_exists4 = false;
		$bidang_exists5 = false;
		$bidang_exists6 = false;
		$bidang_exists7 = false;
		$bidang_exists8 = false;
		$bidang_exists9 = false;
		$id_bkc9 = "";

		// check ada data di table tidak ?
		if($this->data['bidang_keahlian_coach']) 
		{
			foreach($this->data['bidang_keahlian_coach'] as $key => $value) :
				if($value['code'] == "bkc1") :
					$bidang_exists = true;
				endif;
				if($value['code'] == "bkc2") :
					$bidang_exists2 = true;
				endif;
				if($value['code'] == "bkc3") :
					$bidang_exists3 = true;
				endif;
				if($value['code'] == "bkc4") :
					$bidang_exists4 = true;
				endif;
				if($value['code'] == "bkc5") :
					$bidang_exists5 = true;
				endif;
				if($value['code'] == "bkc6") :
					$bidang_exists6 = true;
				endif;
				if($value['code'] == "bkc7") :
					$bidang_exists7 = true;
				endif;
				if($value['code'] == "bkc8") :
					$bidang_exists8 = true;
				endif;
				if($value['code'] == "bkc9") :
					$bidang_exists9 = true;
					$id_bkc9 = $value['id'];
				endif;
			endforeach;
			
		}

		// bidang keahlian 1
		if($bidang_exists):
			if(!isset($checkEarlySSD)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc1", $id_coach);
			endif;
		else:
			if(isset($checkEarlySSD)):
				$data2 = array(
					'code' => "bkc1",
					'bidang_keahlian' => $checkEarlySSD,
					'id_coach' => $id_coach,
				);
	
				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 2
		if($bidang_exists2):
			if(!isset($checkProductM)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc2", $id_coach);
			endif;
		else:
			if(isset($checkProductM)):
				$data2 = array(
					'code' => "bkc2",
					'bidang_keahlian' => $checkProductM,
					'id_coach' => $id_coach,
				);
	
				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 3
		if($bidang_exists3):
			if(!isset($checkTeamM)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc3", $id_coach);
			endif;
		else:
			if(isset($checkTeamM)):
				$data2 = array(
					'code' => "bkc3",
					'bidang_keahlian' => $checkTeamM,
					'id_coach' => $id_coach,
				);
	
				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 4
		if($bidang_exists4):
			if(!isset($checkStrategicMAB)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc4", $id_coach);
			endif;
		else:
			if(isset($checkStrategicMAB)):
				$data2 = array(
					'code' => "bkc4",
					'bidang_keahlian' => $checkStrategicMAB,
					'id_coach' => $id_coach,
				);
	
				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 5
		if($bidang_exists5):
			if(!isset($checkSalesAM)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc5", $id_coach);
			endif;
		else:
			if(isset($checkSalesAM)):
				$data2 = array(
					'code' => "bkc5",
					'bidang_keahlian' => $checkSalesAM,
					'id_coach' => $id_coach,
				);

				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 6
		if($bidang_exists6):
			if(!isset($checkFinanceAT)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc6", $id_coach);
			endif;
		else:
			if(isset($checkFinanceAT)):
				$data2 = array(
					'code' => "bkc6",
					'bidang_keahlian' => $checkFinanceAT,
					'id_coach' => $id_coach,
				);

				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 7
		if($bidang_exists7):
			if(!isset($checkSupplyC)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc7", $id_coach);
			endif;
		else:
			if(isset($checkSupplyC)):
				$data2 = array(
					'code' => "bkc7",
					'bidang_keahlian' => $checkSupplyC,
					'id_coach' => $id_coach,
				);
	
				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 8
		if($bidang_exists8):
			if(!isset($checkFundingAIS)):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc8", $id_coach);
			endif;
		else:
			if(isset($checkFundingAIS)) :
				$data2 = array(
					'code' => "bkc8",
					'bidang_keahlian' => $checkFundingAIS,
					'id_coach' => $id_coach,
				);

				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;
		
		// bidang keahlian 9
		if($bidang_exists9):
			if((empty($otherBidang)) || (!isset($checkOther))):
				$this->bidang_keahlian_coach->delete_by_code_coachid("bkc9", $id_coach);
			else:
				$data2 = array(
					'code' => "bkc9",
					'bidang_keahlian' => $otherBidang,
					'id_coach' => $id_coach,
				);
				// var_dump($data2);
				$this->bidang_keahlian_coach->update(array('id' => $id_bkc9), $data2);
				
			endif;
		else:
			if(!empty($otherBidang)):
				$data2 = array(
					'code' => "bkc9",
					'bidang_keahlian' => $otherBidang,
					'id_coach' => $id_coach,
				);

				$insert = $this->bidang_keahlian_coach->save($data2);
			endif;
		endif;

		
		// echo json_encode(array("status" => TRUE));
		// redirect('coach/profile/'.$id_user, 'refresh');
	}

	function status_pengajuan_coach($id_user, $params, $id_startup) {
		
			$this->data["coach"] = $this->coach->get_coach_by_userid($id_user);
			$nama_coach = $this->data["coach"]['nama'];

			if($params == "disetujui") :
				$message = "Selamat, Request Persetujuan anda berhasil disetujui oleh coach $nama_coach";
			endif;

			if($this->input->post('message')) :
				$message = $this->input->post('message');
			endif;
				
				
				$datetime_created = date("Y-m-d H:i:s");
				$id_coach = $this->data["coach"]['id'];
				
				$data = array(
						'code' => 'ncp',
						'message' => $message,
						'datetime_created' => $datetime_created,
						'id_coach' => $id_coach,
						'id_startup' => $id_startup
					);

				$insert = $this->notif_coach->save($data);
				
				$data2 = array(
					'status_pengajuan_coach' => $params
				);

				$this->startup->update(array('id_startup' => $id_startup), $data2);
				

				redirect('coach/coachee/'.$id_user, 'refresh');


	}

	function status_zoom_request($id_user, $params, $id_startup, $id) {
		
			$this->data["coach"] = $this->coach->get_coach_by_userid($id_user);
			$nama_coach = $this->data["coach"]['nama'];

			if($params == "disetujui") :
				$message = "Selamat, Request Zoom anda berhasil disetujui oleh coach $nama_coach";
			endif;

			if($this->input->post('message')) :
				$message = $this->input->post('message');
			endif;
				
				
				$datetime_created = date("Y-m-d H:i:s");
				$id_coach = $this->data["coach"]['id'];
				
				$data = array(
						'code' => 'ncz',
						'message' => $message,
						'datetime_created' => $datetime_created,
						'id_coach' => $id_coach,
						'id_startup' => $id_startup
					);

				$insert = $this->notif_coach->save($data);
				
				$data2 = array(
					'status' => $params,
					'approved_by' => $nama_coach,
					'id_notif_coach' => $insert
				);


				$this->zoom_request->update(array('id' => $id), $data2);
				
				redirect('coach/zoom/'.$id_user, 'refresh');


	}

	private function _do_upload_cv($id_coach)
    {
		$cv_name = $_FILES['cv_resume']['name'];
	
		$cv_name = pathinfo($cv_name, PATHINFO_FILENAME);

		$file_cv = str_replace(".", "", $cv_name);
		
		$newName = "$file_cv".time()."_c".$id_coach."cv-resume";

        $config['upload_path']          = './assets/coach/upload/files/cv/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('cv_resume')) //upload and validate
        {
            $data['inputerror'][] = 'cv_resume';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _do_upload_foto_profile($id)
    {
		$profile_name = $_FILES['foto_profile']['name'];
	
		$profile_name = pathinfo($profile_name, PATHINFO_FILENAME);

		$file_profile = str_replace(".", "", $profile_name);
		
		$newName = "$file_profile".time()."_r".$id."foto-profile";

        $config['upload_path']          = './assets/responden/upload/images/profile/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		$gambar = "file_name";
		if ($this->upload->do_upload('foto_profile')){
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='assets/responden/upload/images/profile/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 400;
			$config['height']= 400;
			$config['new_image']= 'assets/responden/upload/images/profile/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
		}
        else if(!$this->upload->do_upload('foto_profile')) //upload and validate
        {
            $data['inputerror'][] = 'foto_profile';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	public function change_password($id_user) {

		$old_password = $this->input->post('old_password');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$id_responden = $this->input->post('id_responden');

		$user_data = $this->db->get_where('user', ['password' => $old_password, 'id' => $id_user])->row_array();

		if($user_data) {
			$data = array(
				'password' => $password,
			);

			$this->auth->update(array('id' => $id_user), $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success border-radius-xl d-flex align-items-center text-white" style="font-size:13px" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg><div>Selamat, Password anda berhasil diubah.</div></div>');
		}else {
			$this->session->set_flashdata('message2', 'Gagal merubah password, password user tidak valid');
		}

		redirect('responden/profile/'.$id_user, 'refresh');

	}
	public function change_username($id_user) {

		$username = $this->input->post('username');

		$user_data = $this->db->get_where('user', ['username' => $username])->row_array();

		if(!$user_data) {
			$data = array(
				'username' => $username,
			);

			$this->auth->update(array('id' => $id_user), $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success border-radius-xl d-flex align-items-center text-white" style="font-size:13px" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg><div>Selamat, Username anda berhasil diubah. Username anda saat ini adalah <b class="bg-dark"><em>'.$username.'</em></b></div></div>');
			
		}else {
			
			$this->session->set_flashdata('message2','Maaf, Username yang anda masukkan telah terdaftar!');
			
		}
		
		redirect('responden/profile/'.$id_user);

	}
 

	// function upload_file() {
	// 	$data['current_user'] = $this->auth_model->current_user();

	// 	if ($this->input->method() === 'post') {
	// 		// the user id contain dot, so we must remove it
	// 		$file_name = "";
	// 		$config['upload_path']          = FCPATH.'/upload/avatar/';
	// 		$config['allowed_types']        = 'gif|jpg|jpeg|png';
	// 		$config['file_name']            = $file_name;
	// 		$config['overwrite']            = true;
	// 		$config['max_size']             = 1024; // 1MB
	// 		$config['max_width']            = 1080;
	// 		$config['max_height']           = 1080;

	// 		$this->load->library('upload', $config);

	// 		if (!$this->upload->do_upload('avatar')) {
	// 			$data['error'] = $this->upload->display_errors();
	// 		} else {
	// 			$uploaded_data = $this->upload->data();

	// 			$new_data = [
	// 				'id' => $data['current_user']->id,
	// 				'avatar' => $uploaded_data['file_name'],
	// 			];
		
	// 			if ($this->profile_model->update($new_data)) {
	// 				$this->session->set_flashdata('message', 'Avatar updated!');
	// 				redirect(site_url('admin/setting'));
	// 			}
	// 		}
	// 	}

	// 	$this->load->view('admin/setting_upload_avatar.php', $data);
	// }

	// function preview_file($file) {
	// 	redirect('upload/'.$file);
	// 	// header('www.example.com/path/to/pdf/aaa.pdf');
	// 	die();
	// }

}
