/**
* Copyright 2019 © Roma Technology Ltd. All rights reserved.
* See COPYING.txt for license details.
**/
define([
  'uiComponent',
  'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, rendererList) {
  'use strict';

  rendererList.push(
    {
      type: 'terms',
      component: 'RTech_Payment/js/view/payment/method-renderer/terms-method'
    }
  );

  /** Add view logic here if needed */
  return Component.extend({});
});