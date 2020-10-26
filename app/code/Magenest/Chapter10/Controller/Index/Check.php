<?php

namespace Magenest\Chapter10\Controller\Index;

use Magento\Customer\Model\AccountManagement;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Customer\Model\Customer;
class Check extends Action
{
    private $accountManagement;
    private $session;
    private $customer;
    public function __construct(Context $context, AccountManagement $accountManagement, Session $session, Customer $customer)
    {
        $this->session = $session;
        $this->accountManagement = $accountManagement;
        $this->customer = $customer;
        parent::__construct($context);
    }

    public function execute()
    {
        $email = $this->getRequest()->getParam('email');
        $password = $this->getRequest()->getParam('password');
        try {
            $id = $this->accountManagement->authenticate($email, $password)->getId();
            $customer = $this->customer->load($id);
            $this->session->setCustomerAsLoggedIn($customer);
            if($this->session->isLoggedIn()) {
                echo 1;
            }
        } catch (LocalizedException $e) {
            throwException($e);
            echo false;
        }
    }
}
