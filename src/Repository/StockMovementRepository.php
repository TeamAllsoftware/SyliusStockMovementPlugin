<?php

namespace Aropixel\SyliusStockMovementPlugin\Repository;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ProductVariantInterface;

class StockMovementRepository extends EntityRepository implements StockMovementRepositoryInterface
{
    public function findByProductVariant(ProductVariantInterface $productVariant): array
    {
        return $this
            ->createQueryBuilder('stockMovement')
            ->andWhere('stockMovement.productVariant = :productVariant')
            ->setParameter('productVariant', $productVariant)
            ->orderBy('stockMovement.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
