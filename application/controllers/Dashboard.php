<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_bangunan_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Data_tanah_model');
        $this->load->model('Berita_model');
        $this->load->library('googlemaps');
    }

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();
		$total_jenis = $this->Jenis_bangunan_model->get_total();
		$total_penduduk = $this->Penduduk_model->get_total();
		$total_tanah = $this->Data_tanah_model->get_total();
		$total_berita = $this->Berita_model->get_total();
		$data_tanah = $this->Data_tanah_model->get_all_join();

		$config['center'] = '-8.0864098, 111.71313932883618';
		$config['zoom'] = 'auto';
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
			'title' => 'Dashboard' , 
			'user' => $user,
			'total_jenis' => $total_jenis,
			'total_penduduk' => $total_penduduk,
			'total_tanah' => $total_tanah,
			'total_berita' => $total_berita,
			'map' => $this->googlemaps->create_map(),
		);

		$this->load->view('admin/head', $data);
		$this->load->view('admin/navigasi', $data);
		$this->load->view('admin/content',$data);
		$this->load->view('admin/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */