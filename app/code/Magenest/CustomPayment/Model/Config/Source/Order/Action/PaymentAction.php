<?php

namespace Magenest\CustomPayment\Model\Config\Source\Order\Action;
class PaymentAction
{
    /**
     * @return array[]
     */
    public function toOptionArray(){
        return [ ['value' => 'authorize', 'label' => __('Authorize Only')], ['value' => 'authorize_capture', 'label' => __('Authorize and Capture')], ];
    }
}
