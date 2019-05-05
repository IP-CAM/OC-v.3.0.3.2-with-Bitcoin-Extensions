<?php
class ControllerExtensionPaymentDeposit extends Controller {
  public function index() {
    $this->language->load('extension/payment/deposit');
    $data['button_confirm'] = $this->language->get('button_confirm');
    $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
    $data['action'] = '/deposit-pay.php';
    $data['return_url'] = $this->url->link('checkout/success');
    $data['total_amount'] = trim($this->currency->format($order_info['total'], 'USD', '', false));
    $this->load->model('checkout/order');
    $data['order_id'] = $this->session->data['order_id'];
    return $this->load->view('extension/payment/deposit', $data);
  }

  public function callback() {
  }
}
