<?php
/**
 * MageVision Admin Category Product Thumbnail Extension
 *
 * @category  MageVision
 * @package   MageVision_AdminCategoryProductThumbnail
 * @author    MageVision Team
 * @copyright Copyright (c) 2024 MageVision (https://www.magevision.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
declare(strict_types=1);

namespace MageVision\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab;

use Magento\Framework\Data\Collection;
use MageVision\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer\Image;

class Product extends \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
{
    /**
     * Set collection object adding product thumbnail
     *
     * @param  Collection $collection
     * @return void
     */
    public function setCollection($collection)
    {
        $collection->addAttributeToSelect('thumbnail');
        $this->_collection = $collection;
    }

    /**
     * add column image with a custom renderer and after column entity_id
     *
     * @return Product
     */
    protected function _prepareColumns(): Product
    {
        parent::_prepareColumns();
        $this->addColumnAfter(
            'image',
            [
                'header' => __('Thumbnail'),
                'index' => 'image',
                'renderer' => Image::class,
                'filter' => false,
                'sortable' => false,
                'column_css_class' => 'data-grid-thumbnail-cell'
            ],
            'entity_id'
        );
        $this->sortColumnsByOrder();

        return $this;
    }
}
