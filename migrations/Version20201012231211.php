<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201012231211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tick DROP CONSTRAINT fk_16af98cc308ced7');
        $this->addSql('DROP SEQUENCE hap_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tick_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE haps_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ticks_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE haps (id INT NOT NULL, title VARCHAR(255) NOT NULL, start_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, stop_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, slug VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ticks (id INT NOT NULL, hap_id INT NOT NULL, price INT NOT NULL, currency VARCHAR(3) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_89CAEE08308CED7 ON ticks (hap_id)');
        $this->addSql('ALTER TABLE ticks ADD CONSTRAINT FK_89CAEE08308CED7 FOREIGN KEY (hap_id) REFERENCES haps (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE tick');
        $this->addSql('DROP TABLE hap');
        $this->addSql('ALTER INDEX uniq_8d93d649f85e0677 RENAME TO UNIQ_1483A5E9F85E0677');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticks DROP CONSTRAINT FK_89CAEE08308CED7');
        $this->addSql('DROP SEQUENCE haps_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ticks_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE hap_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tick_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tick (id INT NOT NULL, hap_id INT NOT NULL, price INT NOT NULL, currency VARCHAR(3) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_16af98cc308ced7 ON tick (hap_id)');
        $this->addSql('CREATE TABLE hap (id INT NOT NULL, title VARCHAR(255) NOT NULL, start_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, stop_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE tick ADD CONSTRAINT fk_16af98cc308ced7 FOREIGN KEY (hap_id) REFERENCES hap (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE haps');
        $this->addSql('DROP TABLE ticks');
        $this->addSql('ALTER INDEX uniq_1483a5e9f85e0677 RENAME TO uniq_8d93d649f85e0677');
    }
}
