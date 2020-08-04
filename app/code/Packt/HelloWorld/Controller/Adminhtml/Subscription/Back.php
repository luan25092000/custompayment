<?php


namespace Packt\HelloWorld\Controller\Adminhtml\Subscription;


use Magento\Backend\App\Action;

class Back extends \Magento\Backend\App\Action
{
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }
    public function execute()
    {
        $this->_redirect('*/*');
    }
}
