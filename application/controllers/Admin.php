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
	
	private $data = [];
	
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('email')){
			redirect('home','refresh');
	   	}

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		if($this->session->userdata('role_id') != 1){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			if($this->session->userdata('role_id') == 2){
				redirect('coach/'.$data['user']['id'], 'refresh');
			}else{
				redirect('startup/'.$data['user']['id'], 'refresh');
			}
		}

		$this->load->helper('date');
		$this->load->model('admin_model','admin');
		$this->load->model('auth_model','user');
		$this->load->model('startup_model2','startup');
		$this->load->model('coach_model','coach');
		$this->load->model('about_model','about');
		$this->load->model('contact_model','contact');
		$this->load->model('services_model','services');
		$this->load->model('partners_model','partners');
		$this->load->model('carousel_model','carousel');
		$this->load->model('zoom_request_model','zoom_request');
		$this->load->model('testimonial_model','testimonial');
		$this->load->model('berita_model','berita');
		$this->load->model('logo_model','logo');
		$this->load->model('upkb_support_model','upkb_support');
		$this->load->model('antrian_user_model','antrian_user');
		$this->load->model('contact_model','contact');
		$this->load->model('links_model','links');

		// get database contact
		$this->data["contact"] = $this->contact->get_by_id(1);
		
		// get database logo
		$this->data["logo"] = $this->logo->get_by_id(1);

		$this->data['title_website'] = "Admin";

		// $this->load->model('coach_model','coach');
	}

	public function index($id)
	{
		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/'.$data['user']['id'], 'refresh');
		}

		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);

		// get jumlah berita
		$this->data["count_berita"] = $this->berita->count_all();

		// get jumlah user
		$this->data["count_user"] = $this->user->count_all();

		// get jumlah zoom request
		$this->data["count_zoom_request"] = $this->zoom_request->count_all();

		$this->data["active"] = "dashboard";
		$this->load->view('template/admin/dashboard', $this->data);
	}

	public function berita($id) {

		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/berita/'.$data['user']['id'], 'refresh');
		}

		if(!$this->session->userdata('email')){
			redirect('home','refresh');
	   	}
		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);

		// get database berita
		$this->data["berita"] = $this->berita->getAllWithAuthor();

		$this->data["active"] = "berita";
		$this->load->view('template/admin/berita', $this->data);
	}

	public function user($id) {

		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/user/'.$data['user']['id'], 'refresh');
		}

		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);

		// get database user
		$this->data["user"] = $this->user->get_all();
		// get data antrian user
		$this->data["antrian_user"] = $this->antrian_user->get_all();
		// get data join role dan admin
		$this->data["user_role_admin"] = $this->user->get_all_join_role_admin();

		$this->data["active"] = "user";
		$this->load->view('template/admin/user', $this->data);
	}

	// public function profile($id) {
	// 	$this->data["id_user"] = $id;
	// 	$this->data["admin"] = $this->admin->get_admin_by_userid($id);

	// 	// get database coach
	// 	// $this->data["coach"] = $this->coach->get_all();

	// 	$this->data["active"] = "profile";
	// 	$this->load->view('template/admin/profile', $this->data);
	// }

	public function website_features($id) {

		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/website_features/'.$data['user']['id'], 'refresh');
		}

		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);

		// get database about
		$this->data["about_data"] = $this->about->get_by_id(1);

		// get database testimonial
		$this->data["testimonial"] = $this->testimonial->get_all();
		
		// get database contact
		$this->data["contact"] = $this->contact->get_by_id(1);
		
		// get database links
		$this->data["links"] = $this->links->get_all();
		
		// get database services
		$this->data["services"] = $this->services->get_all();
		
		// get database partners
		$this->data["partners"] = $this->partners->get_all();
		
		// get database carousel
		$this->data["carousel"] = $this->carousel->get_all();
		
		// get database logo
		$this->data["logo"] = $this->logo->get_by_id(1);

		$this->data["active"] = "website features";
		$this->load->view('template/admin/website_features', $this->data);
	}

	public function zoom_request($id) {

		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/zoom_request/'.$data['user']['id'], 'refresh');
		}

		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);

		// get database carousel
		$this->data["zoom_request"] = $this->zoom_request->get_all_desc_admin();

		$this->data["active"] = "zoom request";
		$this->load->view('template/admin/zoom_request', $this->data);
	}

	public function profile($id) {

		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/profile/'.$data['user']['id'], 'refresh');
		}

		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);
		
		$this->data["active"] = "profile";
		$this->load->view('template/admin/profile', $this->data);
	}

	public function upkb_support($id) {

		// check session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($data['user']['id'] != $id){
			echo '<script>alert("Hayoloh mau ngapain :D");</script>';
			redirect('admin/upkb_support/'.$data['user']['id'], 'refresh');
		}

		$this->data["id_user"] = $id;
		$this->data["admin"] = $this->admin->get_admin_by_userid($id);
		
		// get database upkb_support
		$this->data["upkb_support"] = $this->upkb_support->get_all_desc();

		$this->data["active"] = "upkb support";
		$this->load->view('template/admin/upkb_support', $this->data);
	}



	// public function coach($id) {
	// 	$this->data["id_user"] = $id;
	// 	$this->data["admin"] = $this->admin->get_admin_by_userid($id);

	// 	// get database coach
	// 	$this->data["coach"] = $this->coach->get_all();

	// 	$this->data["active"] = "coach";
	// 	$this->load->view('template/admin/coach', $this->data);
	// }

	// controller crud ajax modal
	public function ajax_edit($id)
	{
		$data = $this->coach->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add($active)
	{
		if($active == "berita") {

			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$post = $this->input->post('content');
			$datetime_created = date("Y-m-d H:i:s");
			$id_admin = $this->input->post('idAdmin');
			
			$this->_validate($active);

			$data = array(
					'title' => $title,
					'category' => $category,
					'post' => $post,
					'datetime_created' => $datetime_created,
					'id_admin' => $id_admin,
				);
			
			if(!empty($_FILES['picture']['name']))
			{
				$upload = $this->_do_upload($id_admin);
				$data['picture'] = $upload;
			}
		
			$insert = $this->berita->save($data);

		}else if($active == "user") {

			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role_id = $this->input->post('role_id');
			$nama = $this->input->post('nama');
			$id_admin = $this->input->post('id_admin');

			$this->_validate($active);

			$data_user = array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'role_id' => $role_id,
				'date_created' => date("Y-m-d H:i:s"),
				'id_admin' => $id_admin
			);
				
			$insert = $this->user->save($data_user);

			if($role_id)
			{
				if($role_id == 3)
				{
					$data_startup = array(
						'email' => $email,
						'nama_startup' => $nama,
						'gambar' => 'startup_default.png',
						'id_user' => $insert
					);
					
					$insert = $this->startup->save($data_startup);

				}else if($role_id == 2)
				{
					$data_coach = array(
						'email' => $email,
						'nama' => $nama,
						'gambar' => 'coach_default.png',
						'id_user' => $insert
					);
					
					$insert = $this->coach->save($data_coach);
					
				}else if($role_id == 1){
					$data_admin = array(
						'email' => $email,
						'nama' => $nama,
						'gambar' => 'admin_default.png',
						'id_user' => $insert
					);
					
					$insert = $this->admin->save($data_admin);
				}
			}
			
		}else if($active == "coaching_report") {
			
		}else if($active == "testimonial") {

			$nama = $this->input->post('nama');
			$profesi = $this->input->post('profesi');
			$testimonial = $this->input->post('testimonial');
			$id_admin = $this->input->post('id_admin');

			$this->_validate($active);

			$data_testimonial = array(
				'nama' => $nama,
				'profesi' => $profesi,
				'testimonial' => $testimonial,
			);

			if(!empty($_FILES['foto']['name']))
			{
				$upload = $this->_do_upload_foto($id_admin);
				$data_testimonial['foto'] = $upload;
			}
			
			$insert = $this->testimonial->save($data_testimonial);

		}else if($active == "services") {

			$id = $this->input->post('id');
			$font = $this->input->post('font');
			$layanan = $this->input->post('layanan');
			$deskripsi_layanan = $this->input->post('deskripsi_layanan');

			$this->_validate($active);

			$data = array(
				'font' => $font,
				'layanan' => $layanan,
				'deskripsi_layanan' => $deskripsi_layanan,
			);

			$insert = $this->services->save($data);
			
		}else if($active == "partners") {

			$nama = $this->input->post('nama');
			$id_admin = $this->input->post('id_admin');

			$this->_validate($active);

			$data = array(
				'nama' => $nama,
			);

			if(!empty($_FILES['logo']['name']))
			{
				$upload = $this->_do_upload_logo($id_admin);
				$data['logo'] = $upload;
			}
			
			$insert = $this->partners->save($data);

		}else if($active == "links") {

			$title_link = $this->input->post('title_link');
			$link = $this->input->post('link');

			$this->_validate($active);

			$data = array(
				'link' => $link,
				'title_link' => $title_link,
			);
			
			$insert = $this->links->save($data);

		}

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update($active)
	{
		 if($active == "berita") {
			$id = $this->input->post('id_berita');
			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$post = $this->input->post('content');
			$remove_photo = $this->input->post('remove_photo');
			$datetime_created = date("Y-m-d H:i:s");
			$id_admin = $this->input->post('idAdmin');
			
			// inisialisasi variabel update
			$update = "saya update";
			
			$this->_validate($active, $update);

			$data = array(
					'title' => $title,
					'category' => $category,
					'post' => $post,
					'datetime_created' => $datetime_created,
					'id_admin' => $id_admin,
				);
				
			if($remove_photo) // if remove photo checked
			{
				if(file_exists('assets/admin/upload/images/berita/'.$remove_photo) && $remove_photo)
				unlink('assets/admin/upload/images/berita/'.$remove_photo);
				$data['picture'] = '';
			}
			
			if(!empty($_FILES['picture']['name']))
			{
				$upload = $this->_do_upload($id_admin);
				
				//delete file
				$berita = $this->berita->get_by_id($id);
				if(file_exists('assets/admin/upload/images/berita/'.$berita['picture']) && $berita['picture'])
				unlink('assets/admin/upload/images/berita/'.$berita['picture']);
				
				$data['picture'] = $upload;
			}
			
			$this->berita->update(array('id' => $id), $data);

		} else if($active == "coaching_report") {

		} else if($active == "user") {

			$id = $this->input->post('id_user');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role_id = $this->input->post('role_id');

			$update = "saya update";
			
			$this->_validate($active, $update);

			$data_user = array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
			);
				
			$this->user->update(array('id' => $id), $data_user);

			
			if($role_id)
			{
				if($role_id == 3)
				{
					$data_startup = array(
						'email' => $email,
					);

					$data["startup"] = $this->startup->get_startup_by_userid($id);
					$id_startup = $data["startup"]["id_startup"];

					$this->startup->update(array('id_startup' => $id_startup), $data_startup);

				}else if($role_id == 2)
				{
					$data_coach = array(
						'email' => $email,
					);

					$data["coach"] = $this->coach->get_coach_by_userid($id);
					$id_coach = $data["coach"]["id"];
					
					$this->coach->update(array('id' => $id_coach), $data_coach);
					
				}else if($role_id == 1){
					$data_admin = array(
						'email' => $email,
					);

					$data["admin"] = $this->admin->get_admin_by_userid($id);
					$id_admin = $data["admin"]["id"];
					
					$this->admin->update(array('id' => $id_admin), $data_admin);
				}
			}
				
			
		}else if(($active == "about_visimisi") || ($active == "about_struktur")) {
			if($active == "about_visimisi"){
				$id = $this->input->post('id');
				$visi = $this->input->post('visi');
				$misi = $this->input->post('misi');

				$data_about_visimisi = array(
					'visi' => $visi,
					'misi' => $misi,
				);
				// var_dump( $this->input->post());
				$this->about->update(array('id' => $id), $data_about_visimisi);

			}else if($active == "about_struktur"){
				$id = $this->input->post('id');
				$id_admin = $this->input->post('id_admin');

				$this->_validate($active);

				if(!empty($_FILES['struktur_organisasi']['name']))
				{
					$upload = $this->_do_upload_struktur($id_admin);
					
					//delete file
					$about = $this->about->get_by_id($id);
					if(file_exists('assets/admin/upload/images/about/'.$about['struktur_organisasi']) && $about['struktur_organisasi'])
					unlink('assets/admin//upload/images/about/'.$about['struktur_organisasi']);
					
					$data['struktur_organisasi'] = $upload;
				}
			
				$this->about->update(array('id' => $id), $data);

			}
		}else if($active == "testimonial"){
				
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$profesi = $this->input->post('profesi');
			$testimonial = $this->input->post('testimonial');
			$id_admin = $this->input->post('id_admin');

			$data = array(
				'nama' => $nama,
				'profesi' => $profesi,
				'testimonial' => $testimonial,
			);

			if(!empty($_FILES['foto']['name']))
			{
				$upload = $this->_do_upload_foto($id_admin);
				
				//delete file
				$testimonial = $this->testimonial->get_by_id($id);
				if(file_exists('assets/admin/upload/images/testimonial/'.$testimonial['foto']) && $testimonial['foto'])
				unlink('assets/admin//upload/images/testimonial/'.$testimonial['foto']);
				
				$data['foto'] = $upload;
			}
		
			$this->testimonial->update(array('id' => $id), $data);
			
		}else if($active == "contact"){

			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$email = $this->input->post('email');
			$nomor_telp = $this->input->post('nomor_telp');
			$alamat = $this->input->post('alamat');
			$sosmed_fb = $this->input->post('sosmed_fb');
			$sosmed_ig = $this->input->post('sosmed_ig');
			$sosmed_yt = $this->input->post('sosmed_yt');

			$data = array(
				'title' => $title,
				'email' => $email,
				'nomor_telp' => $nomor_telp,
				'alamat' => $alamat,
				'sosmed_fb' => $sosmed_fb,
				'sosmed_ig' => $sosmed_ig,
				'sosmed_yt' => $sosmed_yt,
			);

		
			$this->contact->update(array('id' => $id), $data);

		}else if($active == "services") {
			$id = $this->input->post('id');
			$id_admin = $this->input->post('id_admin');
			$font = $this->input->post('font');
			$layanan = $this->input->post('layanan');
			$deskripsi_layanan = $this->input->post('deskripsi_layanan');

			$data = array(
				'font' => $font,
				'layanan' => $layanan,
				'deskripsi_layanan' => $deskripsi_layanan,
			);

			$this->services->update(array('id' => $id), $data);

		}else if($active == "partners") {

			$id = $this->input->post('id');
			$id_admin = $this->input->post('id_admin');
			$nama = $this->input->post('nama');

			$data = array(
				'nama' => $nama,
			);

			if(!empty($_FILES['logo']['name']))
			{
				$upload = $this->_do_upload_logo($id_admin);
				
				//delete file
				$partners = $this->partners->get_by_id($id);
				if(file_exists('assets/admin/upload/images/partners/'.$partners['logo']) && $partners['logo'])
				unlink('assets/admin//upload/images/partners/'.$partners['logo']);
				
				$data['logo'] = $upload;
			}

			$this->partners->update(array('id' => $id), $data);

		}else if($active == "carousel") {

			$id = $this->input->post('id');
			$id_admin = $this->input->post('id_admin');
			$title = $this->input->post('title');
			$deskripsi = $this->input->post('deskripsi');

			$data = array(
				'title' => $title,
				'deskripsi' => $deskripsi,
			);

			if(!empty($_FILES['foto']['name']))
			{
				$upload = $this->_do_upload_carousel($id_admin);
				
				//delete file
				$carousel = $this->carousel->get_by_id($id);
				if(file_exists('assets/admin/upload/images/carousel/'.$carousel['foto']) && $carousel['foto'])
				unlink('assets/admin//upload/images/carousel/'.$carousel['foto']);
				
				$data['foto'] = $upload;
			}

			$this->carousel->update(array('id' => $id), $data);

		} else if($active == "zoom_request") {

			$id = $this->input->post('id');
			$link = $this->input->post('link');

			$data = array(
				'link' => $link,
			);

			$this->zoom_request->update(array('id' => $id), $data);

		}else if($active == 'edit_foto_profile') {

			$id_user = $this->input->post('id_user');

			$this->data["admin"] = $this->admin->get_admin_by_userid($id_user);
			$id_admin = $this->data["admin"]['id'];
			
			if(!empty($_FILES['foto_profile']['name']))
			{
				$upload = $this->_do_upload_foto_profile($id_admin);
				
				//delete file
				if($this->data["admin"]['gambar'] != 'admin_default.png'){
					if(file_exists('assets/admin/upload/images/profile/'.$this->data["admin"]['gambar']) && $this->data["admin"]['gambar'])
					unlink('assets/admin/upload/images/profile/'.$this->data["admin"]['gambar']);
				}

				$data['gambar'] = $upload;
			}

			$this->admin->update(array('id' => $id_admin), $data);

		}else if($active == 'profile') 
		{
				// data table coach
				$id = $this->input->post('id');
				$id_user = $this->input->post('id_user');
				$nama = $this->input->post('nama');
				$gender = $this->input->post('gender');
				$nomor_telp = $this->input->post('nomor_hp');
				$alamat = $this->input->post('alamat');
				$email = $this->input->post('email');
				$deskripsi_pribadi = $this->input->post('deskripsi_pribadi');
	
				// data coach
				$data = array(
					'nama' => $nama,
					'gender' => $gender,
					'nomor_telp' => $nomor_telp,
					'alamat' => $alamat,
					'email' => $email,
					'deskripsi_pribadi' => $deskripsi_pribadi,
				);
	
				$dataEmail = array(
					'email' => $email
				);
	
				$this->user->update(array('id' => $id_user), $dataEmail);
				$this->admin->update(array('id' => $id), $data);
	
		}else if($active == "logo") {

			$id = $this->input->post('id');
			$id_admin = $this->input->post('id_admin');

			if(!empty($_FILES['logo']['name']))
			{
				$upload = $this->_do_upload_logo_brand($id_admin);
				
				//delete file
				$logo = $this->logo->get_by_id($id);
				if(file_exists('assets/admin/upload/images/logo/'.$logo['logo']) && $logo['logo'])
				unlink('assets/admin//upload/images/logo/'.$logo['logo']);
				
				$data['logo'] = $upload;
			}

			$this->logo->update(array('id' => $id), $data);

		}else if($active == "links") {
			$id = $this->input->post('id');
			$title_link = $this->input->post('title_link');
			$link = $this->input->post('link');

			$this->_validate($active);

			$data = array(
				'link' => $link,
				'title_link' => $title_link,
			);
			
			$this->links->update(array('id' => $id), $data);

		}  
		
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($active, $id, $role_id = "")
	{
		if($active == "berita") {

			$this->berita->delete_by_id($id);

		}else if($active == "user") {

			if($role_id == "1"){
				$this->admin->delete_by_id_user($id);
			}else if($role_id == "2"){
				$this->coach->delete_by_id_user($id);
			}else if($role_id == "3"){
				$this->startup->delete_by_id_user($id);
			}

			$this->user->delete_by_id($id);
			
		}else if($active == "profil") {
			
			
		}else if($active == "testimonial") {
			$this->testimonial->delete_by_id($id);
		}else if($active == "services"){
			$this->services->delete_by_id($id);
		}else if($active == "partners"){
			$this->partners->delete_by_id($id);
		}else if($active == "carousel"){
			$this->carousel->delete_by_id($id);
		}else if($active == "zoom_request"){
			$this->zoom_request->delete_by_id($id);
		}else if($active == "upkb_support"){
			$this->upkb_support->delete_by_id($id);
		}else if($active == "links"){
			$this->links->delete_by_id($id);
		}
		
		echo json_encode(array("status" => TRUE));
	}


	private function _validate($active, $update = "")
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		
		if($active == "berita") {
			// var_dump($this->input->post());
			if($this->input->post('title') == '')
			{
				$data['inputerror'][] = 'title';
				$data['error_string'][] = 'Title is required';
				$data['status'] = FALSE;
			}
			
			if($this->input->post('category') == '')
			{
				$data['inputerror'][] = 'category';
				$data['error_string'][] = 'Category is required';
				$data['status'] = FALSE;
			}
			$post = htmlentities(strip_tags(trim($this->input->post('content'))));
			if($post == '')
			{
				$data['inputerror'][] = 'content';
				$data['error_string'][] = 'Content is required';
				$data['status'] = FALSE;
			}

			if($update) {

			}else {
				if(empty($_FILES['picture']['name']))
				{
					$data['inputerror'][] = 'picture';
					$data['error_string'][] = 'Picture is required';
					$data['status'] = FALSE;
				}
			}

		} else if($active == "user"){
			if($update)
			{
				if($this->input->post('username') == '')
				{
					$data['inputerror'][] = 'username';
					$data['error_string'][] = 'Username is required';
					$data['status'] = FALSE;
				}
	
				if($this->input->post('email') == '')
				{
					$data['inputerror'][] = 'email';
					$data['error_string'][] = 'Email is required';
					$data['status'] = FALSE;
				}
	
				else if(!preg_match("/.+@.+\..+/", $this->input->post('email')))
				{
					$data['inputerror'][] = 'email';
					$data['error_string'][] = 'Maaf, Format Email Tidak Sesuai';
					$data['status'] = FALSE;
				}
	
				if($this->input->post('password') == '')
				{
					$data['inputerror'][] = 'password';
					$data['error_string'][] = 'Password is required';
					$data['status'] = FALSE;
				}
			}else{
				if($this->input->post('username') == '')
				{
					$data['inputerror'][] = 'username';
					$data['error_string'][] = 'Username is required';
					$data['status'] = FALSE;
				}
	
				if($this->input->post('email') == '')
				{
					$data['inputerror'][] = 'email';
					$data['error_string'][] = 'Email is required';
					$data['status'] = FALSE;
				}
	
				else if(!preg_match("/.+@.+\..+/", $this->input->post('email')))
				{
					$data['inputerror'][] = 'email';
					$data['error_string'][] = 'Maaf, Format Email Tidak Sesuai';
					$data['status'] = FALSE;
				}
	
				if($this->input->post('password') == '')
				{
					$data['inputerror'][] = 'password';
					$data['error_string'][] = 'Password is required';
					$data['status'] = FALSE;
				}
	
				if($this->input->post('role_id') == '')
				{
					$data['inputerror'][] = 'role_id';
					$data['error_string'][] = 'Role is required';
					$data['status'] = FALSE;
				}
	
				if($this->input->post('nama') == '')
				{
					$data['inputerror'][] = 'nama';
					$data['error_string'][] = 'Nama is required';
					$data['status'] = FALSE;
				}
			}
		}else if($active == "testimonial"){
			if($this->input->post('nama') == '')
			{
				$data['inputerror'][] = 'nama';
				$data['error_string'][] = 'Nama is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('profesi') == '')
			{
				$data['inputerror'][] = 'profesi';
				$data['error_string'][] = 'Profesi is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('testimonial') == '')
			{
				$data['inputerror'][] = 'testimonial';
				$data['error_string'][] = 'Testimonial is required';
				$data['status'] = FALSE;
			}

			if(!$update){
				if(empty($_FILES['foto']['name']))
				{
					$data['inputerror'][] = 'foto';
					$data['error_string'][] = 'Foto is required';
					$data['status'] = FALSE;
				}
			}
		}else if($active == "services") {
			if($this->input->post('font') == '')
			{
				$data['inputerror'][] = 'font';
				$data['error_string'][] = 'Font is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('layanan') == '')
			{
				$data['inputerror'][] = 'layanan';
				$data['error_string'][] = 'Layanan is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('deskripsi_layanan') == '')
			{
				$data['inputerror'][] = 'deskripsi_layanan';
				$data['error_string'][] = 'Deskripsi Layanan is required';
				$data['status'] = FALSE;
			}
		}else if($active == "partners") {
			if($this->input->post('nama') == '')
			{
				$data['inputerror'][] = 'nama';
				$data['error_string'][] = 'Nama is required';
				$data['status'] = FALSE;
			}

			if(!$update){
				if(empty($_FILES['logo']['name']))
				{
					$data['inputerror'][] = 'logo';
					$data['error_string'][] = 'Logo is required';
					$data['status'] = FALSE;
				}
			}
		}else if($active == "links") {

			if($this->input->post('title_link') == '')
			{
				$data['inputerror'][] = 'title_link';
				$data['error_string'][] = 'Title Link is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('link') == '')
			{
				$data['inputerror'][] = 'link';
				$data['error_string'][] = 'Link is required';
				$data['status'] = FALSE;
			}
		}
		// else if($active == "coaching_schedule") {

		// 	if($this->input->post('senin') == '' && $this->input->post('selasa') == '' && $this->input->post('rabu') == '' && $this->input->post('kamis') == '' && $this->input->post('jumat') == '' && $this->input->post('sabtu') == '' && $this->input->post('minggu') == '')
		// 	{
		// 		$data['inputerror'][] = 'error_boy';
		// 		$data['error_string'][] = 'Maaf Data Tidak Boleh Kosong';
		// 		$data['status'] = FALSE;
		// 	}

		// }

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _do_upload($id)
    {
		$picture_name = $_FILES['picture']['name'];

		$picture_name = pathinfo($picture_name, PATHINFO_FILENAME);

		$file_picture = str_replace(".", "", $picture_name);

		$newName = "$file_picture".time()."_a".$id."thumbnail-berita";

        $config['upload_path']          = 'assets/admin/upload/images/berita/';
        $config['allowed_types']        = 'jpg|png|jpeg|JPEG|JPG|PNG';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		$gambar = "file_name";
		if ($this->upload->do_upload('picture')){
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='assets/admin/upload/images/berita/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 750;
			$config['height']= 500;
			$config['new_image']= 'assets/admin/upload/images/berita/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
		}
        else if(!$this->upload->do_upload('picture')) //upload and validate
        {
            $data['inputerror'][] = 'picture';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _do_upload_struktur($id)
    {
		$struktur_name = $_FILES['struktur_organisasi']['name'];
	
		$struktur_name = pathinfo($struktur_name, PATHINFO_FILENAME);

		$file_struktur = str_replace(".", "", $struktur_name);
		
		$newName = "$file_struktur".time()."_a".$id."bagan-struktur-organisasi";

        $config['upload_path']          = 'assets/admin/upload/images/about/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 4000; // set max width image allowed
        $config['max_height']           = 4000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		$gambar = "file_name";
		if ($this->upload->do_upload('struktur_organisasi')){
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='assets/admin/upload/images/about/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			// $config['width']= 750;
			// $config['height']= 500;
			$config['new_image']= 'assets/admin/upload/images/about/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
		}
        else if(!$this->upload->do_upload('struktur_organisasi')) //upload and validate
        {
            $data['inputerror'][] = 'struktur_organisasi';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _do_upload_foto($id)
    {
		$foto_name = $_FILES['foto']['name'];
	
		$foto_name = pathinfo($foto_name, PATHINFO_FILENAME);

		$file_foto = str_replace(".", "", $foto_name);
		
		$newName = "$file_foto".time()."_a".$id."foto-testimonial";

        $config['upload_path']          = 'assets/admin/upload/images/testimonial/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		$gambar = "file_name";
		if ($this->upload->do_upload('foto')){
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='assets/admin/upload/images/testimonial/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 100;
			$config['height']= 107;
			$config['new_image']= 'assets/admin/upload/images/testimonial/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
		}
        else if(!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _do_upload_logo($id)
    {
		$logo_name = $_FILES['logo']['name'];
	
		$logo_name = pathinfo($logo_name, PATHINFO_FILENAME);

		$file_logo = str_replace(".", "", $logo_name);
		
		$newName = "$file_logo".time()."_a".$id."logo-partners";

        $config['upload_path']          = 'assets/admin/upload/images/partners/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		$gambar = "file_name";
		if ($this->upload->do_upload('logo')){
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='assets/admin/upload/images/partners/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 400;
			$config['height']= 400;
			$config['new_image']= 'assets/admin/upload/images/partners/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
		}
        else if(!$this->upload->do_upload('logo')) //upload and validate
        {
            $data['inputerror'][] = 'logo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _do_upload_logo_brand($id)
    {
		$brand_name = $_FILES['logo']['name'];
	
		$brand_name = pathinfo($brand_name, PATHINFO_FILENAME);

		$file_brand = str_replace(".", "", $brand_name);
		
		$newName = "$file_brand".time()."_a".$id."logo-brand";

        $config['upload_path']          = 'assets/admin/upload/images/logo/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		
        if(!$this->upload->do_upload('logo')) //upload and validate
        {
            $data['inputerror'][] = 'logo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _do_upload_carousel($id)
    {
		$carousel_name = $_FILES['foto']['name'];
	
		$carousel_name = pathinfo($carousel_name, PATHINFO_FILENAME);

		$file_carousel = str_replace(".", "", $carousel_name);
		
		$newName = "$file_carousel".time()."_a".$id."foto-carousel";

        $config['upload_path']          = 'assets/admin/upload/images/carousel/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = $newName; //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
		
		$gambar = "file_name";
		if ($this->upload->do_upload('foto')){
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='assets/admin/upload/images/carousel/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 1280;
			$config['height']= 618;
			$config['new_image']= 'assets/admin/upload/images/carousel/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
		}
        else if(!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
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
		
		$newName = "$file_profile".time()."_a".$id."foto-profile";

        $config['upload_path']          = 'assets/admin/upload/images/profile/';
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
			$config['source_image']='assets/admin/upload/images/profile/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 400;
			$config['height']= 400;
			$config['new_image']= 'assets/admin/upload/images/profile/'.$gbr['file_name'];
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

	function status_antrian_user($id_admin, $id_user, $params, $id_antrian) 
	{
		
		$data["antrian_user"] = $this->antrian_user->get_by_id_array($id_antrian);
		
		$email = $data['antrian_user']['email'];
		$role = $data['antrian_user']['role'];
		$nama = $data['antrian_user']['nama'];

		if($role){
			if($role == "Startup"){
				$role = 3;
			}else if($role == "Coach"){
				$role = 2;
			}
		}


		if($params == "disetujui")
		{
			
			$data_user = array(
				'email' => $email,
				'role_id' => $role,
				'date_created' => date("Y-m-d H:i:s"),
				'id_admin' => $id_admin
			);
			
			$insert = $this->user->save($data_user);

			if($role)
			{
				if($role == 3)
				{
					$data_startup = array(
						'email' => $email,
						'nama_startup' => $nama,
						'gambar' => 'startup_default.png',
						'id_user' => $insert
					);
					
					$insert = $this->startup->save($data_startup);

				}else if($role == 2)
				{
					$data_coach = array(
						'email' => $email,
						'nama' => $nama,
						'gambar' => 'coach_default.png',
						'id_user' => $insert
					);
					
					$insert = $this->coach->save($data_coach);
					
				}
			}

		}
		
		$data_antrian_user = array(
			'status' => $params,
		);

		$this->antrian_user->update(array('id' => $id_antrian), $data_antrian_user);
		
	
		redirect('admin/user/'.$id_user, 'refresh');


	}

	public function change_password($id_user) {

		$old_password = $this->input->post('old_password');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$id_coach = $this->input->post('id_coach');

		$user_data = $this->db->get_where('user', ['password' => $old_password])->row_array();

		if($user_data) {
			$data = array(
				'password' => $password,
			);

			$this->user->update(array('id' => $id_user), $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success border-radius-xl d-flex align-items-center text-white" style="font-size:13px" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg><div>Selamat, Password anda berhasil diubah.</div></div>');
		}else {
			echo '<script>alert("Gagal merubah password, password user tidak valid");</script>';
		}

		redirect('admin/profile/'.$id_user, 'refresh');

	}



}
