<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212121417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD detailscommande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF0DAD57C FOREIGN KEY (detailscommande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DF0DAD57C ON commande (detailscommande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF0DAD57C');
        $this->addSql('DROP INDEX IDX_6EEAA67DF0DAD57C ON commande');
        $this->addSql('ALTER TABLE commande DROP detailscommande_id');
    }
}
