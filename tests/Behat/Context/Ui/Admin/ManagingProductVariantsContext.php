<?php

declare(strict_types=1);

namespace Tests\Aropixel\SyliusStockMovementPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Step\Then;
use Tests\Aropixel\SyliusStockMovementPlugin\Behat\Page\Admin\ProductVariant\UpdatePageInterface;
use Webmozart\Assert\Assert;

final class ManagingProductVariantsContext implements Context
{
    public function __construct(
        private UpdatePageInterface $updatePage,
    ) {
    }

    #[Then('/^I should see the last stock movement of ([+-]?\d+) and current stock at (\d+)$/')]
    public function iShouldSeeTheLastStockMovementAndCurrentStockAt(string $movement, int $stock): void
    {
        Assert::eq($movement, $this->updatePage->getLastStockMovementMovement());
        Assert::eq($stock, $this->updatePage->getLastStockMovementStock());
    }
}
