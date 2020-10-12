<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201009205151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tick ADD hap_id INT NOT NULL');
        $this->addSql('ALTER TABLE tick ADD CONSTRAINT FK_16AF98CC308CED7 FOREIGN KEY (hap_id) REFERENCES hap (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_16AF98CC308CED7 ON tick (hap_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tick DROP CONSTRAINT FK_16AF98CC308CED7');
        $this->addSql('DROP INDEX IDX_16AF98CC308CED7');
        $this->addSql('ALTER TABLE tick DROP hap_id');
    }
}
