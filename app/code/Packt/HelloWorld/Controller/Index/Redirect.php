<?php

namespace Packt\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;

class Redirect extends \Magento\Framework\App\Action\Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_redirect('helloworld');
    }
}
