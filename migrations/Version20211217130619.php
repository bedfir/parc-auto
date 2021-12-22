<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217130619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture ADD modele VARCHAR(31) NOT NULL, ADD slug VARCHAR(31) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9E2810F10028558 ON voiture (modele)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9E2810F989D9B62 ON voiture (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_E9E2810F10028558 ON voiture');
        $this->addSql('DROP INDEX UNIQ_E9E2810F989D9B62 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP modele, DROP slug');
    }
}
