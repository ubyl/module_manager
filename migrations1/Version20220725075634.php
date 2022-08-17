<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725075634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE SCHEDA_PAI (id INT AUTO_INCREMENT NOT NULL, id_operatore_principale INT NOT NULL, id_operatore_secondario_inf LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', id_operatore_secondario_tdr LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', id_operatore_secondario_log LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', id_operatore_secondario_asa LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', id_operatore_secondario_oss LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', id_assistito INT NOT NULL, id_console INT NOT NULL, id_progetto INT NOT NULL, id_valutazione_generale INT NOT NULL, id_valutazione_figura_professionale LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', id_parere_mmg INT NOT NULL, id_chiusura_servizio INT NOT NULL, id_barthel LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', id_braden LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', id_spmsq LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', id_tinetti LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', id_vas LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_altra_tipologia_assistenza (id INT AUTO_INCREMENT NOT NULL, valutazione_generale_id INT DEFAULT NULL, nome LONGTEXT NOT NULL, INDEX IDX_367B83BF68146AE8 (valutazione_generale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_barthel (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, data_valutazione DATE NOT NULL, alimentazione INT NOT NULL, bagno_doccia INT NOT NULL, igiene_personale INT NOT NULL, abbigliamento INT NOT NULL, continenza_intestinale INT NOT NULL, continenza_urinaria INT NOT NULL, toilet INT NOT NULL, totale_valutazione_funzionale INT NOT NULL, trasferimento_letto_sedia INT NOT NULL, scale INT NOT NULL, deambulazione TINYINT(1) NOT NULL, deambulazione_valida INT NOT NULL, uso_carrozzina INT NOT NULL, totale INT NOT NULL, firma_operatore LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_bisogni (id INT AUTO_INCREMENT NOT NULL, valutazione_generale_id INT DEFAULT NULL, nome LONGTEXT NOT NULL, INDEX IDX_5E03803568146AE8 (valutazione_generale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_braden (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, percezione_sensoriale INT NOT NULL, umidità INT NOT NULL, attività INT NOT NULL, mobilità INT NOT NULL, nutrizione INT NOT NULL, frizione_scivolamento INT NOT NULL, data_valutazione DATE NOT NULL, totale INT NOT NULL, firma_operatore LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_chiusura_servizio (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, conclusioni LONGTEXT NOT NULL, data_valutazione DATE NOT NULL, firma_operatore LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_parere_mmg (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, parere TINYINT(1) NOT NULL, descrizione LONGTEXT DEFAULT NULL, firma_mmg LONGTEXT NOT NULL, firma_utente_famigliare_caregiver LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_spmsq (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, data_valutazione DATE NOT NULL, giorno_oggi TINYINT(1) NOT NULL, giorno_settimana TINYINT(1) NOT NULL, posto TINYINT(1) NOT NULL, indirizzo TINYINT(1) NOT NULL, anni TINYINT(1) NOT NULL, data_nascita TINYINT(1) NOT NULL, presidente_attuale TINYINT(1) NOT NULL, presidente_precedente TINYINT(1) NOT NULL, cognome_madre TINYINT(1) NOT NULL, sottrazione TINYINT(1) NOT NULL, totale INT NOT NULL, firma_operatore LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_tinetti (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, data_valutazione DATE NOT NULL, equilibrio_seduto INT NOT NULL, sedia INT NOT NULL, alzarsi INT NOT NULL, stazione_eretta INT NOT NULL, stazione_eretta_prolungata INT NOT NULL, romberg INT NOT NULL, romberg_sensibilizzato INT NOT NULL, girarsi1 INT NOT NULL, girarsi2 INT NOT NULL, sedersi INT NOT NULL, totale_equilibrio INT NOT NULL, inizio_deambulazione INT NOT NULL, piede_dx INT NOT NULL, piede_dx2 INT NOT NULL, piede_sx INT NOT NULL, piede_sx2 INT NOT NULL, simmetria_passo INT NOT NULL, continuita_passo INT NOT NULL, traiettoria INT NOT NULL, tronco INT NOT NULL, cammino INT NOT NULL, totale_andatura INT NOT NULL, totale INT NOT NULL, firma_operatore LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_valutazione_figura_professionale (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, operatore LONGTEXT NOT NULL, tipo_operatore VARCHAR(255) NOT NULL, diagnosi_professionale LONGTEXT NOT NULL, obbiettivi_da_raggiungere LONGTEXT NOT NULL, tipo_efrequenza LONGTEXT NOT NULL, modalitàtempi_monitoraggio LONGTEXT NOT NULL, data_valutazione DATE NOT NULL, firma_operatore LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_valutazione_generale (id INT AUTO_INCREMENT NOT NULL, nome LONGTEXT NOT NULL, data_valutazione DATE NOT NULL, n_componenti_nucleo_abitativo INT NOT NULL, rischio_infettivo TINYINT(1) NOT NULL, diagnosi LONGTEXT NOT NULL, firma_operatore LONGTEXT NOT NULL, tipologia_valutazione VARCHAR(255) NOT NULL, panf VARCHAR(255) NOT NULL, fanf VARCHAR(255) NOT NULL, iss VARCHAR(255) NOT NULL, uso_servizi_igenici VARCHAR(255) NOT NULL, abbigliamento VARCHAR(255) NOT NULL, alimentazione VARCHAR(255) NOT NULL, indicatore_deambulazione VARCHAR(255) NOT NULL, igene_personale VARCHAR(255) NOT NULL, cognitività VARCHAR(255) NOT NULL, comportamento VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SCHEDA_PAI_vas (id INT AUTO_INCREMENT NOT NULL, paziente LONGTEXT NOT NULL, data DATE NOT NULL, ora TIME NOT NULL, base2 VARCHAR(255) NOT NULL, pz VARCHAR(255) NOT NULL, esito VARCHAR(255) NOT NULL, rilevanza_monitoraggio INT NOT NULL, firma_sanitario LONGTEXT NOT NULL, trattamento TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE SCHEDA_PAI_altra_tipologia_assistenza ADD CONSTRAINT FK_367B83BF68146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_bisogni ADD CONSTRAINT FK_5E03803568146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_altra_tipologia_assistenza DROP FOREIGN KEY FK_367B83BF68146AE8');
        $this->addSql('ALTER TABLE SCHEDA_PAI_bisogni DROP FOREIGN KEY FK_5E03803568146AE8');
        $this->addSql('DROP TABLE SCHEDA_PAI');
        $this->addSql('DROP TABLE SCHEDA_PAI_altra_tipologia_assistenza');
        $this->addSql('DROP TABLE SCHEDA_PAI_barthel');
        $this->addSql('DROP TABLE SCHEDA_PAI_bisogni');
        $this->addSql('DROP TABLE SCHEDA_PAI_braden');
        $this->addSql('DROP TABLE SCHEDA_PAI_chiusura_servizio');
        $this->addSql('DROP TABLE SCHEDA_PAI_parere_mmg');
        $this->addSql('DROP TABLE SCHEDA_PAI_spmsq');
        $this->addSql('DROP TABLE SCHEDA_PAI_tinetti');
        $this->addSql('DROP TABLE SCHEDA_PAI_valutazione_figura_professionale');
        $this->addSql('DROP TABLE SCHEDA_PAI_valutazione_generale');
        $this->addSql('DROP TABLE SCHEDA_PAI_vas');
    }
}
