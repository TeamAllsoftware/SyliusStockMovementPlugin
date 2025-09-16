<?php


namespace Aropixel\SyliusStockMovementPlugin\Entity;


use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class StockMovement implements ResourceInterface, StockMovementInterface
{
    /** @var ?int */
    private $id = null;

    /** @var ?\DateTimeInterface */
    private $createdAt = null;

    /** @var ?int */
    private $quantity = null;

    /** @var ?int */
    private $movement = null;

    /** @var ?StockMovementOriginEnum */
    private $origin = null;

    /** @var ?OrderInterface */
    private $order = null;

    /** @var ?AdminUserInterface */
    private $adminUser = null;

    /** @var ?ProductVariantInterface */
    private $productVariant = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getMovement(): ?int
    {
        return $this->movement;
    }

    public function setMovement(?int $movement): void
    {
        $this->movement = $movement;
    }

    public function getOrigin(): ?StockMovementOriginEnum
    {
        return $this->origin;
    }

    public function setOrigin(?StockMovementOriginEnum $origin): void
    {
        $this->origin = $origin;
    }

    public function getOrder(): ?OrderInterface
    {
        return $this->order;
    }

    public function setOrder(?OrderInterface $order): void
    {
        $this->order = $order;
    }

    public function getAdminUser(): ?AdminUserInterface
    {
        return $this->adminUser;
    }

    public function setAdminUser(?AdminUserInterface $adminUser): void
    {
        $this->adminUser = $adminUser;
    }

    public function getProductVariant(): ?ProductVariantInterface
    {
        return $this->productVariant;
    }

    public function setProductVariant(?ProductVariantInterface $productVariant): void
    {
        $this->productVariant = $productVariant;
    }
}
