<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_tanah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_tanah_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Jenis_bangunan_model');
        $this->load->library('form_validation');
        $this->load->library('googlemaps');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $data_tanah = $this->Data_tanah_model->get_all();
        $data = array(
            'title' => 'Data Tanah' , 
            'user' => $user,
            'data_tanah_data' => $data_tanah
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('data_tanah/data_tanah_list', $data);
        $this->load->view('admin/footer');
    }

    public function get_data_tanah()
    {
        $p = $this->Penduduk_model->get_all();
        echo json_encode($p);

    }

    public function penduduk($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $data_tanah = $this->Data_tanah_model->get_by_id_penduduk($id);
        $row = $this->Penduduk_model->get_by_id($id);

        $config['center'] = '-8.0864098, 111.71313932883618';
        $config['zoom'] = 'auto';
        $config['map_type'] = 'HYBRID';
        $this->googlemaps->initialize($config);

        if ($data_tanah) {
            foreach ($data_tanah as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Pemilik : '.$p->nama.'<p>Persil : '.$p->persil.'</p><p>Luas Tanah :'.$p->luas_tanah.' m2</p><img src="'.base_url().'gambar/tanah/'.$p->gambar.'" width="200px" heigt="200px"><br><br><a href="'.site_url().'data_tanah/update/'.$p->id_tanah.'" class="btn btn-warning btn-sm"> <i class="fa fa-edit"> </i> Edit</a><a href="'.site_url().'data_tanah/delete/'.$p->id_tanah.'/'.$p->id_penduduk.'" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"><i class="fa fa-trash"> </i> Delete</a>';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }
        
        if ($row) {
            $data = array(
                'title' => 'Data Tanah' , 
                'user' => $user,
                'id_penduduk' => $row->id_penduduk,
                'no_induk'    => $row->no_induk,
                'nama'        => $row->nama,
                'alamat'      => $row->alamat,
                'no_telepon'  => $row->no_telepon,
                'data_tanah_data' => $data_tanah,
                'map' => $this->googlemaps->create_map(),
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('data_tanah/data_tanah_penduduk', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
        
    }

    public function cetak_per_id($id_penduduk)
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_tanah.doc");

        $data = array(
            'data_tanah_data' => $this->Data_tanah_model->get_by_id_penduduk($id_penduduk),
            'start' => 0
        );
        
        $this->load->view('data_tanah/data_tanah_doc',$data);
    }

    public function create($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $penduduk = $this->Penduduk_model->get_by_id($id);
        $user = $user = $this->ion_auth->user()->row();
        $jenis_bangunan = $this->Jenis_bangunan_model->get_all();

        $lat = "-8.309605399999997";
        $lng = '111.59750810000003';
        $center = $lat.",".$lng;    
        $cfg=array(
            'class'                       =>'map-canvas',
            'map_div_id'                  =>'map-canvas',
            'center'                      =>$center,
            'zoom'                        =>17,
            'map_type'                    => 'HYBRID',
            'places'                      =>TRUE, //Aktifkan pencarian alamat
            'placesAutocompleteInputID'   =>'cari', //set sumber pencarian input
            'placesAutocompleteBoundsMap' =>TRUE,
            'placesAutocompleteOnChange'  =>'showmap();' //Aksi ketika pencarian dipilih
        );
        $this->googlemaps->initialize($cfg);
        
        $marker=array(
            'position'      =>$center,
            'draggable'     =>TRUE,
            'title'         =>'Coba diDrag',
            'ondragend'     =>"document.getElementById('lat').value = event.latLng.lat();
                                document.getElementById('lng').value = event.latLng.lng();
                                showmap();",
        );      
        $this->googlemaps->add_marker($marker);

        $data = array(
            'title'             => 'Data Tanah' , 
            'user'              => $user,
            'button'            => 'Tambah',
            'action'            => site_url('data_tanah/create_action'),
            'id_tanah'          => set_value('id_tanah'),
            'id_penduduk'       => set_value('id_penduduk'),
            'id_jenis_bangunan' => set_value('id_jenis_bangunan'),
            'penginput'         => set_value('penginput'),
            'persil'            => set_value('persil'),
            'luas_tanah'        => set_value('luas_tanah'),
            'lat'               => set_value('lat'),
            'lng'               => set_value('lng'),
            'tanggal'           => set_value('tanggal'),
            'penduduk'          => $penduduk,
            'jenis_bangunan'    => $jenis_bangunan,
            'map'               => $this->googlemaps->create_map(),
            'latitude'          => $lat,
            'longitude'         => $lng,
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('data_tanah/data_tanah_form', $data);
        $this->load->view('admin/footer'); 
    }
    
    public function create_action() 
    {
        $user = $this->ion_auth->user()->row();
        $tanggal = date('Y-m-d G:i:s');

        $config['upload_path'] = './gambar/tanah/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 
        
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id_penduduk',TRUE));
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'id_penduduk'       => $this->input->post('id_penduduk',TRUE),
                'id_jenis_bangunan' => $this->input->post('id_jenis_bangunan',TRUE),
                'penginput'         => $user->id,
                'persil'            => $this->input->post('persil',TRUE),
                'luas_tanah'        => $this->input->post('luas_tanah',TRUE),
                'lat'               => $this->input->post('lat',TRUE),
                'lng'               => $this->input->post('lng',TRUE),
                'gambar'            => $gambar,
                'tanggal'           => $tanggal,
	        );

            $this->Data_tanah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_tanah/penduduk/'. $this->input->post('id_penduduk',TRUE)));
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $row = $this->Data_tanah_model->get_by_id($id);

        if ($row) {
            $user = $user = $this->ion_auth->user()->row();
            $jenis_bangunan = $this->Jenis_bangunan_model->get_all();
            $penduduk = $this->Penduduk_model->get_by_id($row->id_penduduk);

            $lat = $row->lat;
            $lng = $row->lng;
            $center = $lat.",".$lng;    
            $cfg=array(
                'class'                       =>'map-canvas',
                'map_div_id'                  =>'map-canvas',
                'center'                      =>$center,
                'zoom'                        =>17,
                'map_type'                    => 'HYBRID',
                'places'                      =>TRUE, //Aktifkan pencarian alamat
                'placesAutocompleteInputID'   =>'cari', //set sumber pencarian input
                'placesAutocompleteBoundsMap' =>TRUE,
                'placesAutocompleteOnChange'  =>'showmap();' //Aksi ketika pencarian dipilih
            );
            $this->googlemaps->initialize($cfg);
            
            $marker=array(
                'position'      =>$center,
                'draggable'     =>TRUE,
                'title'         =>'Coba diDrag',
                'ondragend'     =>"document.getElementById('lat').value = event.latLng.lat();
                                    document.getElementById('lng').value = event.latLng.lng();
                                    showmap();",
            );      
            $this->googlemaps->add_marker($marker);

            $data = array(
                'button'            => 'Edit',
                'action'            => site_url('data_tanah/update_action'),
                'id_tanah'          => set_value('id_tanah', $row->id_tanah),
                'id_penduduk'       => set_value('id_penduduk', $row->id_penduduk),
                'id_jenis_bangunan' => set_value('id_jenis_bangunan', $row->id_jenis_bangunan),
                'penginput'         => set_value('penginput', $row->penginput),
                'persil'            => set_value('persil', $row->persil),
                'luas_tanah'        => set_value('luas_tanah', $row->luas_tanah),
                'lat'               => set_value('lat', $row->lat),
                'lng'               => set_value('lng', $row->lng),
                'gambar'            => set_value('gambar', $row->gambar),
                'tanggal'           => set_value('tanggal', $row->tanggal),
                'title'             => 'Data Tanah' , 
                'user'              => $user,
                'penduduk'          => $penduduk,
                'jenis_bangunan'    => $jenis_bangunan,
                'map'               => $this->googlemaps->create_map(),
                'latitude'          => $lat,
                'longitude'         => $lng,
        	);
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('data_tanah/data_tanah_form', $data);
            $this->load->view('admin/footer'); 

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_tanah'));
        }
    }
    
    public function update_action() 
    {
        $user = $this->ion_auth->user()->row();
        $tanggal = date('Y-m-d G:i:s');

        $config['upload_path'] = './gambar/tanah/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tanah', TRUE));
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'id_penduduk'       => $this->input->post('id_penduduk',TRUE),
                'id_jenis_bangunan' => $this->input->post('id_jenis_bangunan',TRUE),
                'penginput'         => $user->id,
                'persil'            => $this->input->post('persil',TRUE),
                'luas_tanah'        => $this->input->post('luas_tanah',TRUE),
                'lat'               => $this->input->post('lat',TRUE),
                'lng'               => $this->input->post('lng',TRUE),
                'gambar'            => $gambar,
                'tanggal'           => $this->input->post('tanggal',TRUE),
        	);

            $this->Data_tanah_model->update($this->input->post('id_tanah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_tanah/penduduk/'.$this->input->post('id_penduduk',TRUE)));
        }
    }
    
    public function delete($id,$id_p) 
    {
        $row = $this->Data_tanah_model->get_by_id($id);

        if ($row) {
            $this->Data_tanah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_tanah/penduduk/'.$id_p));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_tanah/penduduk/'.$id_p));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');
    	$this->form_validation->set_rules('id_jenis_bangunan', 'id jenis bangunan', 'trim|required|max_length[5]',array(
                'max_length' => 'Pilih jenis bangunan' , 
            )
        );
    	$this->form_validation->set_rules('persil', 'persil', 'trim|required');
    	$this->form_validation->set_rules('luas_tanah', 'luas tanah', 'trim|required',
            array(
                'required' => 'harus diisi' , 
            ));
    	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
    	$this->form_validation->set_rules('lng', 'lng', 'trim|required');

    	$this->form_validation->set_rules('id_tanah', 'id_tanah', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_tanah.xls";
        $judul = "data_tanah";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Penduduk");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Bangunan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Penginput");
    	xlsWriteLabel($tablehead, $kolomhead++, "Persil");
    	xlsWriteLabel($tablehead, $kolomhead++, "Luas Tanah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Lat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Lng");
    	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

    	foreach ($this->Data_tanah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_penduduk);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_bangunan);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->penginput);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->persil);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->luas_tanah);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->lat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->lng);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_tanah.doc");

        $data = array(
            'data_tanah_data' => $this->Data_tanah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_tanah/data_tanah_doc',$data);
    }

}

/* End of file Data_tanah.php */
/* Location: ./application/controllers/Data_tanah.php */
