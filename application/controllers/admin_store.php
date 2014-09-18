<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin.php');

class Admin_store extends Admin {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 
  public function _get_transaction()
  {

    //  DO:: get buku terpesan
    //  get the order
    $this->db->join('druid_order', 'druid_order.order_id = druid_checkout.order_id');
    //  get the data of the user
    $this->db->join('druid_data', 'druid_data.user_id = druid_order.user_id');
    $query_1 = $this->db->get('druid_checkout');
    $result_1 = $query_1->result();
    $buku_terpesan = 0;
    foreach ($result_1 as $key_1) {
      $buku_terpesan += $key_1->checkout_quantity;
    }
    //  DO:: get buku terbayar
    $this->db->join('druid_invoice', 'druid_invoice.invoice_id = druid_konfirmasi.invoice_id');
    $this->db->join('druid_order', 'druid_order.user_id = druid_invoice.user_id');
    $this->db->join('druid_checkout', 'druid_checkout.order_id = druid_order.order_id');
    $query_2 = $this->db->get('druid_konfirmasi');
    $result_2 = $query_2->result();
    $buku_terbayar = 0;
    foreach ($result_2 as $key_2) {
      $buku_terbayar += $key_2->checkout_quantity;
    }

    //  DO:: get buku terkirim
    //  DO:: Jumlah kan all
    $jumlah_total = $buku_terpesan + $buku_terbayar;

    //  DO:: get all transcation
    $transaksi = array();
    $this->db->join('druid_user', 'druid_user.user_id = druid_invoice.user_id');
    //$this->db->join('druid_data', 'druid_data.user_id = druid_invoice.user_id');
    //$this->db->join('druid_ongkir', 'druid_ongkir.ongkir_id = druid_data.ongkir_id');
    $this->db->order_by("druid_invoice.date_time", "desc"); 
    $query_3 = $this->db->get('druid_invoice');
    $result_3 = $query_3->result();

     $data = array(
      'default_logo' => $this->_system('default_logo'),
      'buku_terpesan' => $buku_terpesan,
      'buku_terbayar' => $buku_terbayar,
      'buku_total' => $jumlah_total,
      'transaksi' => $result_3,
    );

    return $data;

  
  }

  public function index()
  {

    $data = $this->_get_transaction();
    $this->load->view('admin_store/content_part', $data);   
  }

  public function detail($id = '')
  {
    $data = $this->_get_transaction();
    $transaksi = array();
    $this->db->join('druid_data', 'druid_data.user_id = druid_invoice.user_id');
    $this->db->join('druid_ongkir', 'druid_ongkir.ongkir_id = druid_data.ongkir_id');
    $this->db->join('druid_order', 'druid_order.user_id = druid_data.user_id');
    $this->db->join('druid_checkout', 'druid_checkout.order_id = druid_order.order_id');
    $this->db->join('druid_produk', 'druid_produk.produk_id = druid_checkout.produk_id');
    $this->db->join('druid_content', 'druid_content.content_id = druid_produk.content_id');
    $this->db->join('druid_promo', 'druid_promo.promo_checkout_id = druid_checkout.checkout_id');
    $this->db->where('druid_invoice.invoice_id', $id); 
    $this->db->order_by("druid_invoice.date_time", "desc"); 
    $query_3 = $this->db->get('druid_invoice');
    $result_3 = $query_3->result();
    //echo $this->db->last_query();
    //opn($result_3);
    $data['transaksi_detail'] = $result_3;
    $this->load->view('admin_store/detail', $data);   
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
