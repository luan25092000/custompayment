<?php


namespace Packt\HelloWorld\Controller\Adminhtml\Subscription;


use Magento\Backend\App\Action;
use Packt\HelloWorld\Model\SubscriptionFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $subscription;

    public function __construct(Action\Context $context, SubscriptionFactory $subscription)
    {
        parent::__construct($context);
        $this->subscription = $subscription;
    }

    public function execute()
    {
        $sku = $this->getRequest()->getParam('sku');
        $name = $this->getRequest()->getParam('name');
        $price = $this->getRequest()->getParam('price');
        $subscription = $this->subscription->create();
        $subscription->setName($sku);
        $subscription->setName($name);
        $subscription->setPrice($price);
        $subscription->save();
        $this->messageManager->addSuccessMessage('Success to insert product!');
        $this->_redirect('*/*');
    }
}
