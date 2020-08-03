<?php


namespace Packt\HelloWorld\Block\Adminhtml\Subscription;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $_subscriptionCollection;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Packt\HelloWorld\Model\ResourceModel\Subscription\Collection $_subscriptionCollection,
        array $data = [])
    {
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No subscriptions found'));
        $this->_subscriptionCollection=$_subscriptionCollection;
    }

    protected function _prepareCollection()
    {
        $this->setCollection($this->_subscriptionCollection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            [
                'header' => __('ID'),
                'index' => 'entity_id'
            ]
        );
        $this->addColumn(
            'attribute_set_id',
            [
                'header' => __('Attribute set id'),
                'index' => 'attribute_set_id'
            ]
        );
        $this->addColumn(
            'type_id',
            [
                'header' => __('Type id'),
                'index' => 'type_id'
            ]
        );
        $this->addColumn(
            'sku',
            [
                'header' => __('Sku'),
                'index' => 'sku'
            ]
        );
        $this->addColumn(
            'required_option',
            [
                'header' => __('Required option'),
                'index' => 'required_option'
            ]
        );
        $this->addColumn(
            'created_at',
            [
                'header' => __('Created at'),
                'index' => 'created_at'
            ]
        );
        $this->addColumn(
            'updated_at',
            [
                'header' => __('Updated at'),
                'index' => 'updated at'
            ]
        );
        $this->addColumn(
            'Name',
            [
                'header' => __('Name'),
                'index' => 'Name'
            ]
        );
        $this->addColumn(
            'price',
            [
                'header' => __('Price'),
                'index' => 'price',
                ''
            ]
        );
        $this->addColumn(
            'is_salable',
            [
                'header' => __('Is salable'),
                'index' => 'is-salable'
            ]
        );
        $this->addColumn(
            'store_id',
            [
                'header' => __('Store id'),
                'index' => 'store_id'
            ]
        );
        return $this;
    }
}
