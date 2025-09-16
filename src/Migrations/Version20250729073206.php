<?php

declare(strict_types=1);

namespace Aropixel\SyliusStockMovementPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250729073206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the table aropixel_stock_movement';
    }

    public function up(Schema $schema): void
    {
        if ($schema->hasTable('aropixel_stock_movement')) {
            return;
        }

        $this->addSql('CREATE TABLE aropixel_stock_movement (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, admin_user_id INT DEFAULT NULL, product_variant_id INT DEFAULT NULL, quantity INT NOT NULL, movement INT NOT NULL, origin VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_91B12778D9F6D38 (order_id), INDEX IDX_91B12776352511C (admin_user_id), INDEX IDX_91B1277A80EF684 (product_variant_id), INDEX variant_idx (product_variant_id, created_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aropixel_stock_movement ADD CONSTRAINT FK_91B12778D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id)');
        $this->addSql('ALTER TABLE aropixel_stock_movement ADD CONSTRAINT FK_91B12776352511C FOREIGN KEY (admin_user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE aropixel_stock_movement ADD CONSTRAINT FK_91B1277A80EF684 FOREIGN KEY (product_variant_id) REFERENCES sylius_product_variant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aropixel_stock_movement DROP FOREIGN KEY FK_91B12778D9F6D38');
        $this->addSql('ALTER TABLE aropixel_stock_movement DROP FOREIGN KEY FK_91B12776352511C');
        $this->addSql('ALTER TABLE aropixel_stock_movement DROP FOREIGN KEY FK_91B1277A80EF684');
        $this->addSql('DROP TABLE aropixel_stock_movement');
    }
}
