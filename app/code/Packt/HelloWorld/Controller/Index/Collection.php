<?php


namespace Packt\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Packt\HelloWorld\Model\SubscriptionFactory;

//Tạo cơ sở dữ liệu ảo
class Collection extends \Magento\Framework\App\Action\Action
{
    protected $subscription;

    public function __construct(Context $context, SubscriptionFactory $subscription)
    {
        $this->subscription = $subscription;
        parent::__construct($context);
    }

    public function execute()
    {
        $productCollection = $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
//            ->addAttributeToSelect(['name','price','image'])
//            ->addAttributeToFilter('price',array('in'=>array(100000,200000,300000)))
//            ->addAttributeToFilter('name',array('like'=> 'Áo sơ mi'))
//            ->setPageSize(10, 1);
//        $productCollection->setDataToAll('price',100000);
        $productCollection->addAttributeToSelect('*');
        $subscription = $this->subscription->create();
        foreach ($productCollection as $product) {
            $subscription->setSku($product->getSku());
            $subscription->setName($product->getName());
            $subscription->setPrice($product->getPrice());
        }
        $subscription->save();
        echo "Success to insert data!";
    }
}
