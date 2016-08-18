<?php
/**
 * MageVision Admin Category Product Thumbnail Extension
 *
 * @category     MageVision
 * @package      MageVision_AdminCategoryProductThumbnail
 * @author       MageVision Team
 * @copyright    Copyright (c) 2016 MageVision (http://www.magevision.com)
 * @license      http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace MageVision\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab;

use Magento\Backend\Block\Widget\Grid;
use Magento\Backend\Block\Widget\Grid\Extended;

class Product extends \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
{
    /**
     * Extend collection adding product thumbnail
     * @return Grid
     */
    protected function _prepareCollection()
    {
        if ($this->getCategory()->getId()) {
            $this->setDefaultFilter(['in_category' => 1]);
        }
        $collection = $this->_productFactory->create()->getCollection()->addAttributeToSelect(
            'name'
        )->addAttributeToSelect(
            'sku'
        )->addAttributeToSelect(
            'price'
        )->addAttributeToSelect(
            'thumbnail'
        )->joinField(
            'position',
            'catalog_category_product',
            'position',
            'product_id=entity_id',
            'category_id=' . (int)$this->getRequest()->getParam('id', 0),
            'left'
        );
        $storeId = (int)$this->getRequest()->getParam('store', 0);
        if ($storeId > 0) {
            $collection->addStoreFilter($storeId);
        }
        $this->setCollection($collection);

        if ($this->getCategory()->getProductsReadonly()) {
            $productIds = $this->_getSelectedProducts();
            if (empty($productIds)) {
                $productIds = 0;
            }
            $this->getCollection()->addFieldToFilter('entity_id', ['in' => $productIds]);
        }

        return \Magento\Backend\Block\Widget\Grid\Extended::_prepareCollection();
    }

    /**
     * add column image with a custom renderer and after column entity_id
     * @return Extended
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        $this->addColumnAfter(
            'image',
            array(
                'header' => __('Thumbnail'),
                'index' => 'image',
                'renderer' => '\MageVision\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer\Image',
                'filter' => false,
                'sortable' => false,
                'column_css_class' => 'data-grid-thumbnail-cell'
            ),
            'entity_id'
        );
        $this->sortColumnsByOrder();
        
        return $this;
    }
}
