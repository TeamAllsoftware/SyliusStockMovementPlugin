<?php

declare(strict_types = 1);

namespace Tests\Aropixel\SyliusStockMovementPlugin\Behat\Page\Admin\ProductVariant;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception\ElementNotFoundException;
use Sylius\Behat\Page\Admin\ProductVariant\UpdatePage as BaseUpdatePage;

class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    public function getLastStockMovementMovement(): string
    {
        return $this->getLastStockMovementCellByHeaderId('sylius_admin_stock_movement_movement')->getText();
    }

    public function getLastStockMovementStock(): string
    {
        return $this->getLastStockMovementCellByHeaderId('sylius_admin_stock_movement_stock')->getText();
    }

    public function getHTML(): string
    {
        return $this->getDocument()->getOuterHtml();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'table' => '#sylius_admin_stock_movement_table',
        ]);
    }

    private function getLastStockMovement()
    {
        return $this->getElement('table')->find('css', 'tbody tr:first-child');
    }

    /**
     * @throws ElementNotFoundException
     */
    private function getLastStockMovementCellByHeaderId(string $id): NodeElement
    {
        $headers     = $this->getElement('table')->findAll('css', 'thead th');
        $columnIndex = null;
        foreach ($headers as $i => $th) {
            if ($th->getAttribute('id') === $id) {
                $columnIndex = $i;
                break;
            }
        }

        if ($columnIndex === null) {
            throw new ElementNotFoundException(
                $this->getSession(),
                'Element <th>',
                'id',
                $id,
            );
        }

        $lastStockMovementRow = $this->getLastStockMovement();
        $cells                = $lastStockMovementRow->findAll('css', 'td');
        // Get the cell matching the header index
        $cell = $cells[$columnIndex] ?? null;

        if ($cell === null) {
            throw new ElementNotFoundException(
                $this->getSession(),
                'Element <td>',
                'index',
                $columnIndex,
            );
        }

        return $cell;
    }
}
