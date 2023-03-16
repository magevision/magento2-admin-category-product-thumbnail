<?php
/**
 * MageVision Admin Category Product Thumbnail Extension
 *
 * @category     MageVision
 * @package      MageVision_AdminCategoryProductThumbnail
 * @author       MageVision Team
 * @copyright    Copyright (c) 2023 MageVision (https://www.magevision.com)
 * @license      http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
declare(strict_types=1);

namespace MageVision\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Framework\DataObject;

class Image extends AbstractRenderer
{
    /**
     * Image Helper
     *
     * @var ImageHelper
     */
    protected $imageHelper;

    /**
     * @param Context $context
     * @param ImageHelper $imageHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        ImageHelper $imageHelper,
        array $data = []
    ) {
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    /**
     * Renders grid column
     *
     * @param DataObject $row
     * @return  string
     */
    public function render(DataObject $row): string
    {
        $image = 'product_listing_thumbnail';
        $imageUrl = $this->imageHelper->init($row, $image)->getUrl();

        return '<img src="' . $imageUrl . '" width="50"/>';
    }
}
