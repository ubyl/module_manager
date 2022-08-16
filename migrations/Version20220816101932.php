<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220816101932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel DROP FOREIGN KEY FK_90EA910F32524E3D');
        $this->addSql('DROP INDEX IDX_90EA910F32524E3D ON SCHEDA_PAI_barthel');
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel DROP scheda_pai_id, DROP firma_operatore, CHANGE nome nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale CHANGE tipo_operatore tipo_operatore ENUM(\'INF\', \'TDR\', \'LOG\', \'ASA\', \'OSS\') NOT NULL COMMENT \'(DC2Type:TipoOperatore)\'');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_generale CHANGE tipologia_valutazione tipologia_valutazione ENUM(\'Valutazione Iniziale\', \'Valutazione Ordinaria\', \'Valutazione Straordinaria\') NOT NULL COMMENT \'(DC2Type:Valutazione)\', CHANGE panf panf ENUM(\'presenza con funzione di care giver\', \'presenza senza funzione di care giver\', \'non presente\') NOT NULL COMMENT \'(DC2Type:PANF)\', CHANGE fanf fanf ENUM(\'presenza 24h su 24\', \'presenza saltuaria a ore nell\' arco della settimana\', \'solo giorni feriali\') NOT NULL COMMENT \'(DC2Type:FANF)\', CHANGE iss iss ENUM(\'presente\', \'presenza parziale e/o temporanea\', \'non presente\') NOT NULL COMMENT \'(DC2Type:ISS)\', CHANGE uso_servizi_igenici uso_servizi_igenici ENUM(\'autonomo\', \'parzialmente dipendente\', \'totalmente dipendente\') NOT NULL COMMENT \'(DC2Type:Autonomia)\', CHANGE abbigliamento abbigliamento ENUM(\'autonomo\', \'parzialmente dipendente\', \'totalmente dipendente\') NOT NULL COMMENT \'(DC2Type:Autonomia)\', CHANGE alimentazione alimentazione ENUM(\'autonomo\', \'parzialmente dipendente\', \'totalmente dipendente\') NOT NULL COMMENT \'(DC2Type:Autonomia)\', CHANGE indicatore_deambulazione indicatore_deambulazione ENUM(\'autonomo\', \'parzialmente dipendente\', \'totalmente dipendente\') NOT NULL COMMENT \'(DC2Type:Autonomia)\', CHANGE igene_personale igene_personale ENUM(\'autonomo\', \'parzialmente dipendente\', \'totalmente dipendente\') NOT NULL COMMENT \'(DC2Type:Autonomia)\', CHANGE cognitivita cognitivita ENUM(\'assenti/lievi\', \'moderati\', \'gravi\') NOT NULL COMMENT \'(DC2Type:Disturbi)\', CHANGE comportamento comportamento ENUM(\'assenti/lievi\', \'moderati\', \'gravi\') NOT NULL COMMENT \'(DC2Type:Disturbi)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel ADD scheda_pai_id INT DEFAULT NULL, ADD firma_operatore LONGTEXT NOT NULL, CHANGE nome nome LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel ADD CONSTRAINT FK_90EA910F32524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_90EA910F32524E3D ON SCHEDA_PAI_barthel (scheda_pai_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale CHANGE tipo_operatore tipo_operatore VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_generale CHANGE tipologia_valutazione tipologia_valutazione VARCHAR(255) NOT NULL, CHANGE panf panf VARCHAR(255) NOT NULL, CHANGE fanf fanf VARCHAR(255) NOT NULL, CHANGE iss iss VARCHAR(255) NOT NULL, CHANGE uso_servizi_igenici uso_servizi_igenici VARCHAR(255) NOT NULL, CHANGE abbigliamento abbigliamento VARCHAR(255) NOT NULL, CHANGE alimentazione alimentazione VARCHAR(255) NOT NULL, CHANGE indicatore_deambulazione indicatore_deambulazione VARCHAR(255) NOT NULL, CHANGE igene_personale igene_personale VARCHAR(255) NOT NULL, CHANGE cognitivita cognitivita VARCHAR(255) NOT NULL, CHANGE comportamento comportamento VARCHAR(255) NOT NULL');
    }
}
