<?php

namespace Aropixel\SyliusStockMovementPlugin\EventListener;

use Aropixel\SyliusStockMovementPlugin\Persister\StockMovementPersisterInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Model\ProductInterface;
use Webmozart\Assert\Assert;

readonly class ProductListener
{
    public function __construct(
        private StockMovementPersisterInterface $stockMovementPersister
    ) {
    }

    public function onProductPreRegister(ResourceControllerEvent $event): void
    {
        /** @var ProductInterface $product */
        $product = $event->getSubject();
        Assert::isInstanceOf($product, ProductInterface::class);
        Assert::true($product->isSimple());

        $this->stockMovementPersister->persistManualStockMovement($product->getVariants()->first());
    }
}
