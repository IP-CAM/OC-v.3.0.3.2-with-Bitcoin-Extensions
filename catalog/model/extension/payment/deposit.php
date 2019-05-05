<?php
class ModelExtensionPaymentDeposit extends Model {
  public function getMethod($address, $total) {
    $this->load->language('extension/payment/deposit');

    $method_data = array(
      'code'     => 'deposit',
      'title'    => $this->language->get('text_title'),
      'sort_order' => $this->config->get('deposit_sort_order')
    );

    return $method_data;
  }
}
