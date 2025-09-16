<?php

namespace Aropixel\SyliusStockMovementPlugin\Entity;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum StockMovementOriginEnum: string implements TranslatableInterface
{
    case Manual = "manual";
    case Order = "order";

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return match ($this) {
            self::Manual  => $translator->trans('aropixel_sylius_stock_movement.ui.origin_manual', locale: $locale),
            self::Order => $translator->trans('aropixel_sylius_stock_movement.ui.origin_order', locale: $locale),
        };
    }
}
