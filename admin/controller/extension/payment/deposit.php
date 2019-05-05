<?php
class ControllerExtensionPaymentDeposit extends Controller {
private $error = array();

public function index() {
$this->load->language('extension/payment/deposit');
$this->document->setTitle($this->language->get('heading_title'));
$this->load->model('setting/setting');
if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
$this->model_setting_setting->editSetting('payment_deposit', $this->request->post);
$this->session->data['success'] = 'Saved.';
$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));}
 if (isset($this->error['warning'])) {$data['error_warning'] = $this->error['warning'];
} else {$data['error_warning'] = '';}
$data['breadcrumbs'] = array();
$data['breadcrumbs'][] = array(
'text' => $this->language->get('text_home'),
'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/deposit', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/deposit', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);
    if (isset($this->request->post['text_config_one'])) {
      $data['text_config_one'] = $this->request->post['text_config_one'];
    } else {
      $data['text_config_one'] = $this->config->get('text_config_one');
    }
    if (isset($this->request->post['text_config_two'])) {
      $data['text_config_two'] = $this->request->post['text_config_two'];
    } else {
      $data['text_config_two'] = $this->config->get('text_config_two');
    }
    $this->load->model('localisation/order_status');
    $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
     if (isset($this->request->post['payment_deposit_status'])) {
      $data['payment_deposit_status'] = $this->request->post['payment_deposit_status'];
} else {
$data['payment_deposit_status'] = $this->config->get('payment_deposit_status');
}
	$data['header'] = $this->load->controller('common/header');
	$data['column_left'] = $this->load->controller('common/column_left');
	$data['footer'] = $this->load->controller('common/footer');
    $this->response->setOutput($this->load->view('extension/payment/deposit', $data));
  }
}
