<?php

namespace Rizwankhaan\Assignment\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Api\AttributeSetManagementInterface;
use Magento\Eav\Api\Data\AttributeSetInterfaceFactory;

/**
 * Creating Product Attributes
 */
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{

    /**
     * Eav Setup Factory Variable
     *
     * @var Eavsetup
     */
    private $eavSetupFactory;

    /**
     * Attribute Set Factory Variable
     *
     * @var Eavsetup
     */
    private $attributeSetInterfaceFactory;

    /**
     * @var AttributeSetManagementInterface
     */
    private $attributeSetManagement;

    /**
     * @param EavSetupFactory
     * @param AttributeSetInterfaceFactory
     * @param AttributeSetManagementInterface
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        AttributeSetInterfaceFactory $attribiteSetInterfaceFactory,
        AttributeSetManagementInterface $attributeSetManagement
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->attributeSetInterfaceFactory = $attribiteSetInterfaceFactory;
        $this->attributeSetManagement = $attributeSetManagement;
    }

    /**
     * Inserting Product Attributes
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $defaultAttributeSetId = $eavSetup->getDefaultAttributeSetId(\Magento\Catalog\Model\Product::ENTITY);

        $attrSet = $this->attributeSetInterfaceFactory->create();
        $attrSet->setAttributeSetName('RK Custom Group')->setEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
        $this->attributeSetManagement->create(\Magento\Catalog\Model\Product::ENTITY, $attrSet, $defaultAttributeSetId);

        //county product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_county',
            [
                'type' => 'varchar',
                'label' => 'County',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );

        //Country Product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_country',
            [
                'type' => 'varchar',
                'backend' => '',
                'label' => 'Country',
                'input' => 'select',
                'source' => 'Magento\Catalog\Model\Product\Attribute\Source\Countryofmanufacture',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => true,
                'filterable' => false,
                'comparable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false
            ]
        );

        //county product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_town',
            [
                'type' => 'varchar',
                'label' => 'Town',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );

        //Descriptions product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_descriptions',
            [
                'type' => 'text',
                'label' => 'Descriptions',
                'input' => 'textarea',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => true,
                'unique' => false
            ]
        );

        // Displayable Address product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_displayable_address',
            [
                'type' => 'text',
                'label' => 'Displayable Address',
                'input' => 'textarea',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => true,
                'unique' => false
            ]
        );

        //Image URL product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_image_url',
            [
                'type' => 'varchar',
                'label' => 'Image URL',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );

        //Image URL product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_thumbnail_url',
            [
                'type' => 'varchar',
                'label' => 'Thumbnail URL',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );


        //Latitude product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_latitude',
            [
                'type' => 'varchar',
                'label' => 'Latitude',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );

        //Longitude product attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_longitude',
            [
                'type' => 'varchar',
                'label' => 'Longitude',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );

        // Number of Bedrooms Product Attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_number_of_bedrooms',
            [
                'type' => 'int',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'frontend' => '',
                'label' => 'Number of Bedrooms',
                'input' => 'select',
                'class' => '',
                'option' => [
                    'values' => [
                        '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'
                    ],
                ],
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        // Number of Bathrooms
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_number_of_bathrooms',
            [
                'type' => 'int',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'frontend' => '',
                'label' => 'Number of Bathrooms',
                'input' => 'select',
                'class' => '',
                'option' => [
                    'values' => [
                        '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'
                    ],
                ],
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        // price
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_price',
            [
                'type' => 'varchar',
                'label' => 'Price',
                'input' => 'price',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => true,
                'filterable' => true,
                'comparable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        // Property Type
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_property_type',
            [
                'type' => 'varchar',
                'label' => 'Property Type',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false
            ]
        );

        // For Sale / Rent
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'rk_for_sale_rent',
            [
                'type' => 'int',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'frontend' => '',
                'label' => 'For Sale / Rent',
                'input' => 'select',
                'class' => '',
                'option' => [
                    'values' => [
                        'Sale', 'Rent'
                    ],
                ],
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'wysiwyg_enabled' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        // created product attribute group, Assign product attribute to custom created attribute set and group.
        $attributeSetId = $eavSetup->getAttributeSetId(\Magento\Catalog\Model\Product::ENTITY, 'RK Custom Group');
        $eavSetup->addAttributeGroup(\Magento\Catalog\Model\Product::ENTITY, $attributeSetId, 'RK Custom Attributes', 2);

        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_country');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_county');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_town');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_descriptions');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_displayable_address');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_image_url');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_thumbnail_url');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_latitude');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_longitude');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_number_of_bedrooms');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_number_of_bathrooms');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_price');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_property_type');
        $eavSetup->addAttributeToSet('catalog_product', $attributeSetId, 'RK Custom Attributes', 'rk_for_sale_rent');
    }
}
