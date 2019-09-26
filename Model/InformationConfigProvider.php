<?php
/**
* Copyright © 2019 Roma Technology Limited. All rights reserved.
* See COPYING.txt for license details.
*/
namespace RTech\Payment\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Escaper;
use Magento\Payment\Helper\Data as PaymentHelper;

class InformationConfigProvider implements ConfigProviderInterface {

  protected $methodCodes = [
    Olev::PAYMENT_METHOD_OLEV_CODE,
    PaymentTerms::PAYMENT_METHOD_TERMS_CODE,
  ];
  protected $methods = [];
  protected $escaper;

  public function __construct(
    PaymentHelper $paymentHelper,
    Escaper $escaper
  ) {
    $this->escaper = $escaper;
    foreach ($this->methodCodes as $code) {
      $this->methods[$code] = $paymentHelper->getMethodInstance($code);
    }
  }

  public function getConfig() {
    $config = [];
    foreach ($this->methodCodes as $code) {
      if ($this->methods[$code]->isAvailable()) {
        $config['payment']['information'][$code] = $this->getInformation($code);
      }
    }
    return $config;
  }

  protected function getInformation($code) {
    return nl2br($this->escaper->escapeHtml($this->methods[$code]->getInformation()));
  }
}