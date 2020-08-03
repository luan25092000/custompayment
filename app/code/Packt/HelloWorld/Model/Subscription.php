<?php


namespace Packt\HelloWorld\Model;

use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel;

class Subscription extends \Magento\Framework\Model\AbstractModel
{
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DECLINED = 'declined';

    public function __construct(Context $context, \Magento\Framework\Registry $registry, ResourceModel\AbstractResource $resource = null, \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    public function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\ResourceModel\Subscription');
    }
}
