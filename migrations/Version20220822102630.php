<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822102630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden CHANGE nome nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq DROP firma_operatore, CHANGE nome nome VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden CHANGE nome nome LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq ADD firma_operatore LONGTEXT NOT NULL, CHANGE nome nome LONGTEXT NOT NULL');
    }
}
