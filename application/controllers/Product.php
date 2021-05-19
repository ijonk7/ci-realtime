<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this->load->model('Product_model','product_model');
        }
        
    public function index(){
        $this->load->view('product_view');
    }
        
    public function get_product(){
        $data = $this->product_model->get_product()->result();
        var_dump($data);
        echo json_encode($data);
    }
        
    public function create(){
        $product_name = $this->input->post('product_name',TRUE);
        $product_price = $this->input->post('product_price',TRUE);
        $this->product_model->insert_product($product_name,$product_price);       

        // require_once(APPPATH.'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'dee096917714505790fa', //ganti dengan App_key pusher Anda
            '46302268185e34b43d17', //ganti dengan App_secret pusher Anda
            '885659', //ganti dengan App_key pusher Anda
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('pusher-ci', 'my-event', $data);
    }
        
    public function update(){
        $product_id = $this->input->post('product_id',TRUE);
        $product_name = $this->input->post('product_name',TRUE);
        $product_price = $this->input->post('product_price',TRUE);
        $this->product_model->update_product($product_id,$product_name,$product_price);

        // require_once(APPPATH.'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'dee096917714505790fa', //ganti dengan App_key pusher Anda
            '46302268185e34b43d17', //ganti dengan App_secret pusher Anda
            '885659', //ganti dengan App_key pusher Anda
            $options
        );
        
        $data['message'] = 'success';
        $pusher->trigger('pusher-ci', 'my-event', $data);
    }
        
    public function delete(){
        $product_id = $this->input->post('product_id',TRUE);
        $this->product_model->delete_product($product_id);
        
        // require_once(APPPATH.'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'dee096917714505790fa', //ganti dengan App_key pusher Anda
            '46302268185e34b43d17', //ganti dengan App_secret pusher Anda
            '885659', //ganti dengan App_key pusher Anda
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('pusher-ci', 'my-event', $data);
    }
}
