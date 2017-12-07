<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

  public function __construct()
	{
      parent::__construct();

  }

  public function index()
  {
    $data['laporan'] = $this->db->get('laporan');
    $data['warga'] = $this->db->get('user');
    $this->load->view('admin/dashboard',$data);
  }

  public function add()
  {
    $this->load->view('admin/add');
  }

  public function action_add()
  {
    $data = array(
      'no_KTP' => $this->input->post('no_KTP'),
      'topik' => $this->input->post('topik'),
      'laporan' => $this->input->post('laporan')
    );
    $this->db->insert('laporan',$data);
    redirect('dashboard','refresh');
  }

  public function add2()
  {
    $this->load->view('admin/add2');
  }
  public function action_add2()
  {
    $data = array(
      'no_KTP' => $this->input->post('no_KTP'),
      'nama' => $this->input->post('nama'),
      'nomor_rumah' => $this->input->post('nomor_rumah')
    );
    $this->db->insert('user',$data);
    redirect('dashboard','refresh');
  }

  public function update($id_laporan=NULL)
  {
    $this->db->where('id_laporan',$id_laporan);
    $data['laporan'] = $this->db->get('laporan');
    $this->load->view('admin/update',$data);
  }

  public function action_update($id_laporan='')
  {
    $data = array(
      'no_KTP' => $this->input->post('no_KTP'),
      'topik' => $this->input->post('topik'),
      'laporan' => $this->input->post('laporan')
    );
    $this->db->where('id_laporan',$id_laporan);
    $this->db->update('laporan',$data);

    redirect('dashboard','refresh');
  }

  public function update2($no_KTP=NULL)
  {
    $this->db->where('no_KTP',$no_KTP);
    $data['warga'] = $this->db->get('user');
    $this->load->view('admin/update2',$data);
  }

  public function action_update2($no_KTP='')
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'nomor_rumah' => $this->input->post('nomor_rumah')
    );
    $this->db->where('no_KTP',$no_KTP);
    $this->db->update('user',$data);

    redirect('dashboard','refresh');
  }

  public function delete($id_laporan=NULL)
  {
    $this->db->where('id_laporan',$id_laporan);
    $this->db->delete('laporan');

    redirect('dashboard','refresh');
  }

  public function read($id_laporan=NULL)
  {
    $this->db->where('id_laporan',$id_laporan);
    $data['content']=$this->db->get('laporan');


    $this->load->view('admin/dashboard',$data);
  }

  public function delete2($no_KTP=NULL)
  {
    $this->db->where('no_KTP',$no_KTP);
    $this->db->delete('user');

    redirect('dashboard','refresh');
  }



}
/*EOF dashboard.php*/