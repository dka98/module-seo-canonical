<?php

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
