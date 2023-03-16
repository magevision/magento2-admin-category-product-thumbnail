# [MageVision](https://www.magevision.com/) Admin Category Product Thumbnail Extension for Magento 2

## Overview
The Admin Category Product Thumbnail extension is a simple but really useful extension which gives you the ability to display the product thumbnail image in category products tab in Magento admin. You don't need anymore to navigate through products grid and search for a product to double check it with its image. Save time and have a better overview of the products that are assigned in a category.

## Key Features
	* Display product thumbnail in category products tab
        * Better overview of the products assigned in a category
        * Save time
	
## Other Features
	* Developed by a Magento Certified Developer
	* Meets Magento standard development practices
	* Simple installation
	* 100% open source

## Compatibility
Magento Community Edition 2.4

## Installing the Extension using an archive and FTP
	* Backup your web directory and store database
	* Download the extension
		1. Sign in to your account
		2. Navigate to menu My Account → My Downloads
		3. Find the extension and click to download it
	* Extract the downloaded ZIP file in a temporary directory
	* Upload the extracted folders and files of the extension to base (root) Magento directory. Do not replace the whole folders, but merge them. If you have downloaded the extension from Magento Marketplace, then create the following folder path app/code/MageVision/AdminCategoryProductThumbnail and upload there the extracted folders and files.
        * Connect via SSH to your Magento server as, or switch to, the Magento file system owner and run the following commands from the (root) Magento directory:
            1. cd path_to_the_magento_root_directory 
            2. php bin/magento maintenance:enable
            3. php bin/magento module:enable MageVision_AdminCategoryProductThumbnail --clear-static-content
            4. php bin/magento setup:upgrade
            5. php bin/magento setup:di:compile
            6. php bin/magento setup:static-content:deploy
            7. php bin/magento maintenance:disable
        * Log out from Magento admin and log in again

## Installing the Extension via composer
	* Backup your web directory and store database
    * Connect via SSH to your Magento server as, or switch to, the Magento file system owner and run the following commands from the (root) Magento directory:
        1. cd path_to_the_magento_root_directory 
        2. php bin/magento maintenance:enable
        3. composer require magevision/module-admin-category-product-thumbnail
        4. php bin/magento module:enable MageVision_AdminCategoryProductThumbnail --clear-static-content
        5. php bin/magento setup:upgrade
        6. php bin/magento setup:di:compile
        7. php bin/magento setup:static-content:deploy
        8. php bin/magento maintenance:disable

## Support
If you need support or have any questions directly related to a [MageVision](https://www.magevision.com/) extension, please contact us at [support@magevision.com](mailto:support@magevision.com)
