<?php


namespace Magenest\Chapter10\Block;


use Magento\Checkout\Model\Cart;
use Magento\Framework\View\Element\Template;

class Total extends Template
{
    private $cart;
    private $json;
    public function __construct(Template\Context $context, Cart $cart, \Magento\Framework\Serialize\Serializer\Json $json, array $data = [])
    {
        $this->cart = $cart;
        $this->json = $json;
        parent::__construct($context, $data);
    }

    public function getTotal()
    {
        $total = $this->cart->getQuote()->getGrandTotal();
        return $this->json->serialize($total);
    }
}
