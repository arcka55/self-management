<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		// $this->load->library('form_validation');
		// $this->load->model('activities_model','activities');
		// $this->load->model('product_model');
		// $this->load->model('about_model','about_data');
		// $this->load->model('services_model','services');
		// $this->load->model('testimonial_model','testimonial');
		// $this->load->model('carousel_model','carousel');
		// $this->load->model('contact_model','contact');
		// $this->load->model('logo_model','logo');
		// $this->load->model('partners_model','partners');
	}
	
	public function index()
	{
		// var_dump($this->session->flashdata('message'));
		// get database berita
		// $this->data["activities"] = $this->activities->news_all_limit();
		
		// // get database services
		// $this->data["services"] = $this->services->get_all();
		
		// // get database testimonial
		// $this->data["carousel"] = $this->carousel->get_all();
		
		// // get database carousel
		// $this->data["testimonial"] = $this->testimonial->get_all();
		
		// // get database about_data
		// $this->data["about_data"] = $this->about_data->get_by_id(1);

		
		// $this->data['produk'] = $this->product_model->getLimitProduct();
		
		// // get database contact
		// $this->data["contact"] = $this->contact->get_by_id(1);
		
		// // get database partners
		// $this->data["partners"] = $this->partners->get_all();

		// // get database logo
		// $this->data["logo"] = $this->logo->get_by_id(1);

		$this->data["active"] = "home";
		$this->load->view('login.php', $this->data);
	}
}
