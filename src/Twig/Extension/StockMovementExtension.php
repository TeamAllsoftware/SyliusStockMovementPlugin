<?php

namespace Aropixel\SyliusStockMovementPlugin\Twig\Extension;

use Aropixel\SyliusStockMovementPlugin\Twig\Runtime\StockMovementRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StockMovementExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getStockMovements', [StockMovementRuntime::class, 'getStockMovements']),
        ];
    }
}
