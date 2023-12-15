<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215183407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_relations (child_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', parent_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_D30C6D48DD62C21B (child_id), INDEX IDX_D30C6D48727ACA70 (parent_id), PRIMARY KEY(child_id, parent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_relations ADD CONSTRAINT FK_D30C6D48DD62C21B FOREIGN KEY (child_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE category_relations ADD CONSTRAINT FK_D30C6D48727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_relations DROP FOREIGN KEY FK_D30C6D48DD62C21B');
        $this->addSql('ALTER TABLE category_relations DROP FOREIGN KEY FK_D30C6D48727ACA70');
        $this->addSql('DROP TABLE category_relations');
    }
}
