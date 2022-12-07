<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207092227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel DROP nome, CHANGE totale_valutazione_funzionale totale_valutazione_funzionale INT DEFAULT NULL, CHANGE totale totale INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_chiusura_servizio DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_lesioni DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_parere_mmg DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_tinetti DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale DROP nome');
        $this->addSql('ALTER TABLE SCHEDA_PAI_vas DROP paziente');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel ADD nome VARCHAR(255) NOT NULL, CHANGE totale_valutazione_funzionale totale_valutazione_funzionale INT NOT NULL, CHANGE totale totale INT NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_chiusura_servizio ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_lesioni ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_parere_mmg ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_tinetti ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale ADD nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_vas ADD paziente VARCHAR(255) NOT NULL');
    }
}
