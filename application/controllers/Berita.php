<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $berita = $this->Berita_model->get_all();

        $data = array(
            'title' => 'Berita' , 
            'user' => $user,
            'berita_data' => $berita
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('berita/berita_list', $data);
        $this->load->view('admin/footer');
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $data = array(
            'title' => 'Berita' , 
            'user' => $user,
            'button' => 'Tambah',
            'action' => site_url('berita/create_action'),
    	    'id_berita' => set_value('id_berita'),
    	    'judul' => set_value('judul'),
    	    'isi' => set_value('isi'),
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('berita/berita_form');
        $this->load->view('admin/footer');  
    }
    
    public function create_action() 
    {
        $user = $user = $this->ion_auth->user()->row();
        $tanggal = date('Y-m-d G:i:s');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'judul' => $this->input->post('judul',TRUE),
        		'isi' => $this->input->post('isi',TRUE),
        		'penulis' => $user->id,
        		'tanggal' => $tanggal,
	        );

            $this->Berita_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('berita'));
        }
    }
    
    public function update($id) 
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $row = $this->Berita_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Berita' , 
                'user' => $user,
                'button' => 'Update',
                'action' => site_url('berita/update_action'),
        		'id_berita' => set_value('id_berita', $row->id_berita),
        		'judul' => set_value('judul', $row->judul),
        		'isi' => set_value('isi', $row->isi),
        		'penulis' => set_value('penulis', $row->penulis),
        		'tanggal' => set_value('tanggal', $row->tanggal),
	        );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('berita/berita_form', $data);
            $this->load->view('admin/footer'); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('berita'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_berita', TRUE));
        } else {
            $data = array(
        		'judul' => $this->input->post('judul',TRUE),
        		'isi' => $this->input->post('isi',TRUE),
        		'penulis' => $this->input->post('penulis',TRUE),
        		'tanggal' => $this->input->post('tanggal',TRUE),
	       );

            $this->Berita_model->update($this->input->post('id_berita', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('berita'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Berita_model->get_by_id($id);

        if ($row) {
            $this->Berita_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('berita'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('berita'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');

	$this->form_validation->set_rules('id_berita', 'id_berita', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "berita.xls";
        $judul = "berita";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi");
	xlsWriteLabel($tablehead, $kolomhead++, "Penulis");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Berita_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penulis);
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
        header("Content-Disposition: attachment;Filename=berita.doc");

        $data = array(
            'berita_data' => $this->Berita_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('berita/berita_doc',$data);
    }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */