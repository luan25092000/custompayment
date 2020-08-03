<?php


namespace Packt\HelloWorld\Block\Adminhtml;


use \Magento\Backend\Block\Widget\Context;

class Subscription extends \Magento\Backend\Block\Widget\Grid\Container
{
    public function __construct(Context $context, array $data = [])
    {
        $this->_blockGroup = "Packt_HelloWorld";
        $this->_controller = "adminhtml_subscription";
        parent::__construct($context, $data);
    }
}
