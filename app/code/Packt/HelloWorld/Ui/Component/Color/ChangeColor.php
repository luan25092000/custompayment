<?php


namespace Packt\HelloWorld\Ui\Component\Color;


use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class ChangeColor extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $color = $item["color"];
                $html = '<div style="background-color:'.$color.';width:100%;height:20px"></div>';
                $item["color"]=$html;
            }
        }
        return $dataSource;
    }
}
