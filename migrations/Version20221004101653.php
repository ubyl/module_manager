<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004101653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD id_operatore_principale_id INT DEFAULT NULL, DROP id_operatore_principale');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD CONSTRAINT FK_521766CE246F5FAA FOREIGN KEY (id_operatore_principale_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_521766CE246F5FAA ON SCHEDA_PAI (id_operatore_principale_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP FOREIGN KEY FK_521766CE246F5FAA');
        $this->addSql('DROP INDEX IDX_521766CE246F5FAA ON SCHEDA_PAI');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD id_operatore_principale INT NOT NULL, DROP id_operatore_principale_id');
    }
}
