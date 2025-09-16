<?php

namespace Aropixel\SyliusStockMovementPlugin\Entity;

trait ProductVariantMovementTrait
{
    /** @var ?int */
    private $oldOnHand = null;

    /** @var int */
    protected $onHand = 0;

    public function getOldOnHand(): ?int
    {
        return $this->oldOnHand;
    }

    public function setOnHand(?int $onHand): void
    {
        $this->oldOnHand = $this->onHand;
        parent::setOnHand($onHand);
    }

    public function getStockMovement(): int
    {
        return $this->onHand - $this->oldOnHand;
    }

    public function isStockUpdated(): bool
    {
        if (!is_null($this->oldOnHand)) {
            return true;
        }

        return false;
    }
}
