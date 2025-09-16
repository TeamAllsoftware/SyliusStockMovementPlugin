<?php

namespace Aropixel\SyliusStockMovementPlugin\Inventory\Operator;

use Aropixel\SyliusStockMovementPlugin\Persister\StockMovementPersisterInterface;
use Sylius\Component\Core\Inventory\Operator\OrderInventoryOperatorInterface as DecoratedOrderInventoryOperatorInterface;
use Sylius\Component\Core\Model\OrderInterface;

readonly class OrderInventoryOperator implements OrderInventoryOperatorInterface
{
    public function __construct(
        private DecoratedOrderInventoryOperatorInterface $decoratedOrderInventoryOperator,
        private StockMovementPersisterInterface $stockMovementPersister,
    ) {
    }

    public function cancel(OrderInterface $order): void
    {
        $this->decoratedOrderInventoryOperator->cancel($order);
        $this->stockMovementPersister->persistOrderStockMovements($order);
    }

    public function hold(OrderInterface $order): void
    {
        $this->decoratedOrderInventoryOperator->hold($order);
    }

    public function sell(OrderInterface $order): void
    {
        $this->decoratedOrderInventoryOperator->sell($order);
        $this->stockMovementPersister->persistOrderStockMovements($order);
    }
}
