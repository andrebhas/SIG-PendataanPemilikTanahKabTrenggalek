<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $user = $this->ion_auth->user()->row();
        $data = array(
            'title' => 'Dashboard' , 
            'user' => $user,
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi', $data);
        $this->load->view('users/users_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        $user = $this->ion_auth->user()->row();
        if ($row) {
            $data = array(
                'title'        => 'Dashboard' , 
                'user'         => $user,
                'id'           => $row->id,
                'nama_lengkap' => $row->nama_lengkap,
                'username'     => $row->username,
                'password'     => $row->password,
                'phone'        => $row->phone,
                'email'        => $row->email,
                'foto'         => $row->foto,
                'last_login'   => $row->last_login,
	        );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi', $data);
            $this->load->view('users/users_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $data = array(
            'title'        => 'Dashboard' , 
            'user'         => $user,
            'button'       => 'Tambah',
            'action'       => site_url('users/create_action'),
            'id'           => set_value('id'),
            'nama_lengkap' => set_value('nama_lengkap'),
            'username'     => set_value('username'),
            'password'     => set_value('password'),
            'phone'        => set_value('phone'),
            'email'        => set_value('email'),
            'foto'         => set_value('foto'),
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi', $data);
        $this->load->view('users/users_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $config['upload_path'] = './gambar/user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 100;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $username = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);
        $email = $this->input->post('email',TRUE);
        if ($this->ion_auth->username_check($username) || $this->ion_auth->email_check($email)) {
            $this->session->set_flashdata('check', 'email atau password sudah digunakan');
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $additional_data = array(
        		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        		'phone' => $this->input->post('phone',TRUE),
        		'foto' => $gambar,
	        );
            $group = array('2');
            $this->ion_auth->register($username, $password, $email, $additional_data, $group);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'        => 'Dashboard' , 
                'user'         => $user,
                'button'       => 'Update',
                'action'       => site_url('users/update_action'),
                'id'           => set_value('id', $row->id),
                'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
                'username'     => set_value('username', $row->username),
                'password'     => set_value('password', $row->password),
                'phone'        => set_value('phone', $row->phone),
                'email'        => set_value('email', $row->email),
                'foto'         => set_value('foto', $row->foto),
	        );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi', $data);
            $this->load->view('users/users_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $config['upload_path'] = './gambar/user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            // update the password if it was posted
            if ($this->input->post('password',TRUE)) 
            {
                $data['password'] = $this->input->post('password',TRUE);
            }

            if ($this->input->post('nama_lengkap',TRUE)) {
                $data['nama_lengkap'] = $this->input->post('nama_lengkap',TRUE);
            }

            if ($this->input->post('username',TRUE)) {
                $data['username'] = $this->input->post('username',TRUE);
            }

            if ($this->input->post('phone',TRUE)) {
                $data['phone'] = $this->input->post('phone',TRUE);
            }

            if ($this->input->post('email',TRUE)) {
                $data['email'] = $this->input->post('email',TRUE);
            }

            $data['active'] = 1;

            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data['foto'] = $gambar;

            $this->ion_auth->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->ion_auth->delete_user($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */