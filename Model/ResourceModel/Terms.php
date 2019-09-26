<?php
/**
 * Copyright © 2019 Roma Technology Limited. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace RTech\Payment\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Terms extends AbstractDb {

  protected $_isPkAutoIncrement = false;

  protected function _construct() {
    $this->_init('rtech_payment_terms', 'terms_id');
  }

}