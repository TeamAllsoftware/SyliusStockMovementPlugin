<?php

namespace Aropixel\SyliusStockMovementPlugin\Factory;

use Aropixel\SyliusStockMovementPlugin\Entity\StockMovement;
use Aropixel\SyliusStockMovementPlugin\Entity\StockMovementInterface;
use Aropixel\SyliusStockMovementPlugin\Entity\StockMovementOriginEnum;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Symfony\Bundle\SecurityBundle\Security;

readonly class StockMovementFactory implements StockMovementFactoryInterface
{
    public function __construct(
        private Security $security,
    ) {
    }

    public function createManualStockMovement(
        ProductVariantInterface $productVariant,
    ): StockMovementInterface {
        $adminUser = $this->security->getUser();

        $stockMovement = new StockMovement();
        $stockMovement->setProductVariant($productVariant);
        $stockMovement->setQuantity((int) $productVariant->getOnHand());
        $stockMovement->setMovement($productVariant->getStockMovement());
        $stockMovement->setOrigin(StockMovementOriginEnum::Manual);
        $stockMovement->setAdminUser($adminUser);

        return $stockMovement;
    }

    public function createOrderStockMovement(
        ProductVariantInterface $productVariant,
        OrderInterface $order,
    ): StockMovementInterface {
        $stockMovement = new StockMovement();
        $stockMovement->setProductVariant($productVariant);
        $stockMovement->setQuantity($productVariant->getOnHand());
        $stockMovement->setMovement($productVariant->getStockMovement());
        $stockMovement->setOrigin(StockMovementOriginEnum::Order);
        $stockMovement->setOrder($order);

        return $stockMovement;
    }
}

