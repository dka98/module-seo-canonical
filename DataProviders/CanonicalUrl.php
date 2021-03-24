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
namespace Lof\SeoCanonical\DataProviders;

class CanonicalUrl extends \Lof\Opengraph\DataProviders\TagProvider implements \Lof\Opengraph\DataProviders\TagProviderInterface
{
    /**
     * @var Lof\SeoCanonical\Service\CanonicalUrl
     */
    protected $canonicalUrl;

    /**
     * @var \Lof\Opengraph\Factory\TagFactoryInterface
     */
    protected $tagFactory;

    public function __construct(
        \Lof\SeoCanonical\Service\CanonicalUrl $canonicalUrl,
        \Lof\Opengraph\Factory\TagFactoryInterface $tagFactory
    )
    {
        $this->canonicalUrl = $canonicalUrl;
        $this->tagFactory = $tagFactory;
    }

    public function getTags()
    {
        $canonicalUrl = $this->canonicalUrl->getCanonicalUrl();

        if(!$canonicalUrl){
            return [];
        }

        $tag = $this->tagFactory->getTag('url', $canonicalUrl);
        return [$tag->getOpengraphName() => $tag->getValue()];
    }

}