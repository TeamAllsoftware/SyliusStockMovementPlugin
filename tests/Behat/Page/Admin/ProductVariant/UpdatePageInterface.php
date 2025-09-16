<?php

declare(strict_types=1);

namespace Tests\Aropixel\SyliusStockMovementPlugin\Behat\Page\Admin\ProductVariant;

use Sylius\Behat\Page\Admin\ProductVariant\UpdatePageInterface as BaseUpdatePageInterface;

interface UpdatePageInterface extends BaseUpdatePageInterface
{
    public function getLastStockMovementMovement(): string;

    public function getLastStockMovementStock(): string;
}
