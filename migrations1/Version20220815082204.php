<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220815082204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_parere_mmg DROP firma_mmg, DROP firma_utente_famigliare_caregiver');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale ADD modalita_tempi_monitoraggio LONGTEXT NOT NULL, DROP modalitàtempi_monitoraggio, DROP firma_operatore');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_parere_mmg ADD firma_mmg LONGTEXT NOT NULL, ADD firma_utente_famigliare_caregiver LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale ADD firma_operatore LONGTEXT NOT NULL, CHANGE modalita_tempi_monitoraggio modalitàtempi_monitoraggio LONGTEXT NOT NULL');
    }
}
