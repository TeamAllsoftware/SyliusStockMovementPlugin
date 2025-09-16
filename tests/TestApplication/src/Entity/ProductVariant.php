<?php

namespace Tests\Aropixel\SyliusStockMovementPlugin\Entity;

use Aropixel\SyliusStockMovementPlugin\Entity\ProductVariantMovementInterface;
use Aropixel\SyliusStockMovementPlugin\Entity\ProductVariantMovementTrait;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use Sylius\Component\Product\Model\ProductVariantTranslation;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_variant')]
class ProductVariant extends BaseProductVariant implements ProductVariantMovementInterface
{
    use ProductVariantMovementTrait;

    protected function createTranslation(): ProductVariantTranslationInterface
    {
        return new ProductVariantTranslation();
    }
}
