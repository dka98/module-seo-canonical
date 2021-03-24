<?php

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