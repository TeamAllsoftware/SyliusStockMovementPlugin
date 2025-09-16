<?php

namespace Aropixel\SyliusStockMovementPlugin\Persister;

use Aropixel\SyliusStockMovementPlugin\Factory\StockMovementFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

readonly class StockMovementPersister implements StockMovementPersisterInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private StockMovementFactoryInterface $stockMovementFactory
    ) {
    }

    public function persistManualStockMovement(ProductVariantInterface $productVariant): void
    {
        if ($productVariant->isStockUpdated()) {
            $stockMovement = $this->stockMovementFactory->createManualStockMovement($productVariant);
            $this->entityManager->persist($stockMovement);
        }
    }

    public function persistOrderStockMovements(OrderInterface $order): void
    {
        foreach ($order->getItems() as $orderItem) {
            /** @var ?ProductVariantInterface $productVariant */
            $productVariant = $orderItem->getVariant();

            if ($productVariant !== null) {
                $stockMovement = $this->stockMovementFactory->createOrderStockMovement($productVariant, $order);
                $this->entityManager->persist($stockMovement);
            }
        }

        $this->entityManager->flush();
    }
}
