<?php

namespace Aropixel\SyliusStockMovementPlugin\Repository;

use Sylius\Component\Core\Model\ProductVariantInterface;

interface StockMovementRepositoryInterface
{
    public function findByProductVariant(ProductVariantInterface $productVariant): array;
}
