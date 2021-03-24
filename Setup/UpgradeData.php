<?php

namespace Lof\SeoCanonical\Setup;

class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{
    /**
     * @var \Magento\Eav\Setup\EavSetup
     */
    protected $eavSetup;

    /**
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    protected $eavSetupFactory;

    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    protected $moduleDataSetupInterface;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetupInterface
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetupInterface = $moduleDataSetupInterface;

        $this->eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetupInterface]);
    }

    public function upgrade(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    )
    {
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addCanonicalUrlProductAttribute();
        }
    }

    protected function addCanonicalUrlProductAttribute()
    {
        if (!$this->eavSetup->getAttributeId(\Magento\Catalog\Model\Product::ENTITY, 'seo_canonical_url')) {
            $this->eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'seo_canonical_url',
                [
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'type' => 'varchar',
                    'unique' => false,
                    'label' => 'Canonical URL',
                    'input' => 'text',
                    'source' => '',
                    'group' => 'Search Engine Optimization',
                    'required' => false,
                    'sort_order' => 45,
                    'user_defined' => 1,
                    'searchable' => false,
                    'filterable' => false,
                    'filterable_in_search' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'note' => 'Provided canonical URL will replace automatically generated one.'
                ]
            );
        }
    }
}
