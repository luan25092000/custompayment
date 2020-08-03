<?php
namespace Packt\HelloWorld\Model\ResourceModel;

class Subscription extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('Packt_HelloWorld_Subscription','subscription_id');
    }
}
