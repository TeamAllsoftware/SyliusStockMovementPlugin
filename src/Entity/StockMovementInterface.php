<?php

namespace Aropixel\SyliusStockMovementPlugin\Entity;

use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Order\Model\OrderInterface;

interface StockMovementInterface
{
    public function getId(): int;

    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(?\DateTimeInterface $createdAt): void;

    public function getQuantity(): ?int;

    public function setQuantity(?int $quantity): void;

    public function getMovement(): ?int;

    public function setMovement(?int $movement): void;

    public function getOrigin(): ?StockMovementOriginEnum;

    public function setOrigin(?StockMovementOriginEnum $origin): void;

    public function getOrder(): ?OrderInterface;

    public function setOrder(?OrderInterface $order): void;

    public function getAdminUser(): ?AdminUserInterface;

    public function setAdminUser(?AdminUserInterface $adminUser): void;

    public function getProductVariant(): ?ProductVariantInterface;

    public function setProductVariant(?ProductVariantInterface $productVariant): void;
}
