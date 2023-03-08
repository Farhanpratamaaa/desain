<?php

class User extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('backend/auth/login');
		}
	}
	
    public function index()
    {
		$data['title'] = 'List Data User';
        $data['activeUser'] = $this->auth_model->current_user(); //menampilkan 
        $data['user'] = $this->User_model->get_all(); //menampilkan data

        $this->load->view('backend/list_user', $data);

    }
	public function delete($id = null)
	{
		$data['activeUser'] = $this->auth_model->current_user(); //menampilkan 
        $this->User_model->delete($id);
		redirect("backend/User");
	}
	public function add()
	{
		$data['activeUser'] = $this->auth_model->current_user(); //menampilkan 
		$user = $this->User_model;
		$validation = $this->form_validation;
        $validation->set_rules($user->rules());
		if ($validation->run()) {
            $user->save();
			redirect("backend/User");
		}
		$this->load->view('backend/componens/add_user', $data);

	}
	public function edit($id = null)
	{
		$data['activeUser'] = $this->auth_model->current_user(); //menampilkan level
		$data['user'] = $this->User_model->find($id);

		if (!$data['user'] || !$id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			// TODO: lakukan validasi data seblum simpan ke model
			$user = [
				'id_user' => $id,
				'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level'),
				'status' => $this->input->post('status') 
			];
			$updated = $this->User_model->update($user);
			if ($updated) {
				$this->session->set_flashdata('message', 'Article was updated');
				redirect('backend/user');
			}
		}
		$this->load->view('backend/componens/edit_user', $data);
	}

	public function hapus()
    {
        $id = $this->uri->segment(3);
        $data = array('status'  => '0');
        $update = $this->User_model->update_admin(array('id_user' => $id), $data); //1
        $this->session->set_flashdata('gagal', '<div class="alert alert-success" role="alert">
            Data Petugas Telah Dinon-aktif!
          </div>');
        redirect('backend/user');
    }


	public function change($id_user = null)
    {
        $data['activeUser'] = $this->auth_model->current_user();
        $data['user'] = $this->User_model->get_by_id($id_user);
        if ($data['activeUser']->level <> 'Admin' && $data['activeUser']->username <> $data['user']->username) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $current = $this->input->post('current');
            $verify = $this->User_model->verify($data['user']->username, $current);
            if (!$verify) {
                $this->session->set_flashdata('message', 'Current password salah!');
            } else {
                $user = [
                    'id_user'   => $id_user,
                    'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];
                $update = $this->User_model->update($user);
                if ($update) {
                    $this->session->set_flashdata('message', 'Password berhasil diubah!');
                    if ($data['activeUser']->username == $data['user']->username) {
                        $this->auth_model->logout();
                        redirect('backend');
                    }
                    redirect('backend/user');
                } else {
                    $this->session->set_flashdata('message', 'Password gagal diubah!');
                }
            }
        }
        $this->load->view('backend/change_password', $data);
    }

	// public function block($id_user = null)
    // {
    //     $data['activeUser'] = $this->auth_model->current_user();
    //     if ($data['activeUser']->level <> 'Admin') {
    //         show_404();
    //     }
    //     $data['user'] = $this->User_model->get_by_id($id_user);
    //     if (!$data['user'] || !$id_user) {
    //         show_404();
    //     }
    //     $user = [
    //         'id_user' => $id_user,
    //         'update_by' => $data['activeUser']->id_user,
    //         'update_date' => date('Y-m-d H:i:s'),
    //         'status' => 0
    //     ];
    //     $update = $this->User_model->update($user);
    //     if ($update) {
    //         $this->session->set_flashdata('message', 'Data berhasil diblokir!');
    //     } else {
    //         $this->session->set_flashdata('message', 'Data gagal diblokir!');
    //     }
    //     redirect('backend/user');
    //   }
    public function blokir()
    {
        $id = $this->uri->segment(4);
        $data = array('status'  => '0');
        $update = $this->User_model->update_admin(array('id_user' => $id), $data);
        if ($update) {
            $this->session->set_flashdata('message', 'Data berhasil diblokir!');
        } else {
            $this->session->set_flashdata('message', 'Data gagal diblokir!');
        }
        redirect('backend/user');
    }

    public function aktifkan()
    {
        $id = $this->uri->segment(4);
        $data = array('status'  => '1');
        $update = $this->User_model->update_user()(array('id_user' => $id), $data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
            Data Petugas Telah Di-aktifkan kembali!
          </div>');
        redirect('backend/user');
	}
	
}