<?php
class ModelExtensionPaymentKanipay extends Model {
  public function getMethod($address, $total) {
    $this->load->language('extension/payment/kanipay');
  
    $method_data = array(
      'code'     => 'kanipay',
      'title'    => $this->language->get('text_title'),
      'sort_order' => $this->config->get('kanipay_sort_order')
    );
  
    return $method_data;
  }
}