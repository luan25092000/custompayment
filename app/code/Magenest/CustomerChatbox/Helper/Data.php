<?php

namespace Magenest\CustomerChatbox\Helper;
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const FACEBOOK_MESSENGER_ENABLE = 'magenest_customer_chatbox/general/facebook_messenger_enable';
    const FACEBOOK_MESSENGER_CUSTOMER_CHAT_CODE = 'magenest_customer_chatbox/general/facebook_messenger_customer_chat_code';

    /**
     * Retrieve the facebook messenger status
     *
     * @return boolean
     */
    public function getFacebookMessengerStatus()
    {
        return $this->scopeConfig->isSetFlag(
            self::FACEBOOK_MESSENGER_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Retrieve the facebook messenger customer chat code
     *
     * @return string
     */
    public function getFacebookMessengerChatCode()
    {
        return $this->scopeConfig->getValue(
            self::FACEBOOK_MESSENGER_CUSTOMER_CHAT_CODE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
