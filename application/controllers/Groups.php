<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groups extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Groups_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $user = $this->ion_auth->user()->row();
        $groups = $this->Groups_model->get_all();

        $data = array(
            'title' => 'Groups' , 
            'user' => $user,
            'groups_data' => $groups
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi', $data);
        $this->load->view('groups/groups_list', $data);
        $this->load->view('admin/footer');
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $data = array(
            'title'       => 'Groups' , 
            'user'        => $user,
            'button'      => 'Tambah',
            'action'      => site_url('groups/create_action'),
            'id'          => set_value('id'),
            'name'        => set_value('name'),
            'description' => set_value('description'),
	   );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi', $data);
        $this->load->view('groups/groups_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Groups_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('groups'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $row = $this->Groups_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title'       => 'Groups' , 
                'user'        => $user,
                'button'      => 'Update',
                'action'      => site_url('groups/update_action'),
                'id'          => set_value('id', $row->id),
                'name'        => set_value('name', $row->name),
                'description' => set_value('description', $row->description),
	       );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi', $data);
            $this->load->view('groups/groups_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groups'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Groups_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('groups'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Groups_model->get_by_id($id);

        if ($row) {
            $this->Groups_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('groups'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groups'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('name', 'name', 'trim|required');
    	$this->form_validation->set_rules('description', 'description', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Groups.php */
/* Location: ./application/controllers/Groups.php */