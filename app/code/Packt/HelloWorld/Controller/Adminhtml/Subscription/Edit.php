<?php


namespace Packt\HelloWorld\Controller\Adminhtml\Subscription;


use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
class Edit extends \Magento\Backend\App\Action
{
    protected $resultFactory;
    public function __construct(Action\Context $context, ResultFactory $resultFactory)
    {
        parent::__construct($context);
        $this->resultFactory=$resultFactory;
    }
    public function execute()
    {
        $resultPage=$this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Product Details Form'));
        return $resultPage;
    }
}
