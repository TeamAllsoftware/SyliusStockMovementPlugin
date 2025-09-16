<?php

declare(strict_types=1);

namespace Aropixel\SyliusStockMovementPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('aropixel_sylius_stock_movement');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
