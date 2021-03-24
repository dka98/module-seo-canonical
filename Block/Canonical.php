<?php
/**
 * Landofcoder
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/license
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category   Landofcoder
 * @package    Lof_SeoCanonical
 * @copyright  Copyright (c) 2021 Landofcoder (https://landofcoder.com/)
 * @license    https://landofcoder.com/LICENSE-1.0.html
 */
namespace Lof\SeoCanonical\Block;

class Canonical extends \Magento\Framework\View\Element\Template
{
    protected $_template = 'Lof_SeoCanonical::canonical.phtml';

    /**
     * @var \Lof\SeoCanonical\Service\CanonicalUrl
     */
    protected $canonicalUrl;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Lof\SeoCanonical\Service\CanonicalUrl $canonicalUrl,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->canonicalUrl = $canonicalUrl;
    }

    public function getCanonicalUrl()
    {
        return $this->canonicalUrl->getCanonicalUrl();
    }
}
