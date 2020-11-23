<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class historic extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Historic_model', 'historic');
    }

    public function index() {
      // $this->output->cache(1);
      $send['historic'] = $this->historic->all();

      $headers['headers'] = ['bootstrap.min', 'style', 'menu', 'admin', 'list', 'home', 'modal'];
      $headers['js'] = 1;
      $this->load->view('slices/header', $headers);
      $this->load->view('admin/components/menu');
      $this->load->view('admin/components/modal');
      $this->load->view('admin/historic/index.php', $send);
      $this->load->view('slices/footer');
    }

    public function update(){
      $this->historic->update($this->input->post('log_id'));
      redirect(base_url('historico'));
    }
}