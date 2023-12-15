<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215215546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_feature (product_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', feature_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_CE0E6ED64584665A (product_id), INDEX IDX_CE0E6ED660E4B879 (feature_id), PRIMARY KEY(product_id, feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED64584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED660E4B879 FOREIGN KEY (feature_id) REFERENCES product_features (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_feature DROP FOREIGN KEY FK_CE0E6ED64584665A');
        $this->addSql('ALTER TABLE product_feature DROP FOREIGN KEY FK_CE0E6ED660E4B879');
        $this->addSql('DROP TABLE product_feature');
    }
}
