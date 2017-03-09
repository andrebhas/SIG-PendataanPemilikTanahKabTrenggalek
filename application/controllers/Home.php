<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_bangunan_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Data_tanah_model');
        $this->load->model('Berita_model');
        $this->load->model('Slider_model');
        $this->load->library('googlemaps');
    }

	public function index()
	{
		$slider = $this->Slider_model->get_all();
		$data = array(
			'title' => 'Home' ,
			'slider_data' => $slider, 
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/slider', $data);
		$this->load->view('home/content', $data);
		$this->load->view('home/footer',$data);
	}

	public function berita()
	{
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'home/berita.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'home/berita.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'home/berita.html';
            $config['first_url'] = base_url() . 'home/berita.html';
        }

        $config['per_page'] = 2;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Berita_model->total_rows($q);
        $berita = $this->Berita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

		$data = array(
			'title' => 'Berita' , 
			'berita' => $berita,
			'pagination' => $this->pagination->create_links(),
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/v_berita', $data);
		$this->load->view('home/footer',$data);
	}

	public function berita_detail($id)
	{
		$berita = $this->Berita_model->get_by_id($id);
		$data = array(
			'title' => 'Berita' , 
			'berita' => $berita,
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/v_berita_detail', $data);
		$this->load->view('home/footer',$data);
	}

	public function peta()
	{
		$data_tanah = $this->Data_tanah_model->get_all_join();
		$penduduk = $this->Penduduk_model->get_all();
		$config['center'] = '-8.0864098, 111.71313932883618';
		$config['zoom'] = 'auto'; 
		$config['map_height'] = '650px';
		$config['map_type'] = 'HYBRID';
		$this->googlemaps->initialize($config);

		if ($data_tanah) {
            foreach ($data_tanah as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Pemilik : '.$p->nama.'<p>Persil : '.$p->persil.'</p><p>Luas Tanah :'.$p->luas_tanah.'</p><img src="'.base_url().'gambar/tanah/'.$p->gambar.'" width="200px" heigt="200px">';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }

		$data = array(
			'title' => 'Peta' , 
			'map' => $this->googlemaps->create_map(),
			'penduduk_data' => $penduduk,
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi',$data);
		$this->load->view('home/v_peta',$data);
		$this->load->view('home/footer',$data);
	}


	public function peta2()
	{
		$id = $this->input->post("id");
		$data_tanah = $this->Data_tanah_model->get_by_id_penduduk($id);
		$penduduk = $this->Penduduk_model->get_all();
		$config['center'] = '-8.0864098, 111.71313932883618';
		$config['zoom'] = 'auto'; 
		$config['map_height'] = '650px';
		$config['map_type'] = 'HYBRID';
		$this->googlemaps->initialize($config);

		if ($data_tanah) {
            foreach ($data_tanah as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Pemilik : '.$p->nama.'<p>Persil : '.$p->persil.'</p><p>Luas Tanah :'.$p->luas_tanah.'</p><img src="'.base_url().'gambar/tanah/'.$p->gambar.'" width="200px" heigt="200px">';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }

		$data = array(
			'title' => 'Peta' , 
			'map' => $this->googlemaps->create_map(),
			'penduduk_data' => $penduduk,
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi',$data);
		$this->load->view('home/v_peta',$data);
		$this->load->view('home/footer',$data);
	}

	public function contact()
	{
		$data = array(
			'title' => 'Contact' , 
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/v_contact', $data);
		$this->load->view('home/footer',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */