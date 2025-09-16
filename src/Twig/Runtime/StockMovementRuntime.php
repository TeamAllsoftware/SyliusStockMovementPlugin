<?php

namespace Aropixel\SyliusStockMovementPlugin\Twig\Runtime;

use Aropixel\SyliusStockMovementPlugin\Entity\StockMovementInterface;
use Aropixel\SyliusStockMovementPlugin\Repository\StockMovementRepositoryInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Twig\Extension\AbstractExtension;
use Webmozart\Assert\Assert;

class StockMovementRuntime extends AbstractExtension
{
    public function __construct(
        private readonly StockMovementRepositoryInterface $stockMovementRepository,
    ) {
    }

    /**
     * @return StockMovementInterface[]
     */
    public function getStockMovements(ProductInterface|ProductVariantInterface $productOrProductVariant): array
    {
        if ($productOrProductVariant instanceof ProductVariantInterface) {
            $productVariant = $productOrProductVariant;
        } else {
            $product = $productOrProductVariant;
            Assert::true($product->isSimple());
            $productVariant = $product->getVariants()->first();
        }

        Assert::isInstanceOf($productVariant, ProductVariantInterface::class);

        return $this->stockMovementRepository->findByProductVariant($productVariant);
    }
}
