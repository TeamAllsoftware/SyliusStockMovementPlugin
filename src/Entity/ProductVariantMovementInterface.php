<?php

namespace Aropixel\SyliusStockMovementPlugin\Entity;

interface ProductVariantMovementInterface
{
    public function getOldOnHand(): ?int;

    public function getStockMovement(): int;

    public function isStockUpdated(): bool;
}
