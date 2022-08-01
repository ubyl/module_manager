<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220801081740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE SCHEDA_PAI_lesioni (id INT AUTO_INCREMENT NOT NULL, scheda_pai_id INT DEFAULT NULL, data_rivalutazioni_settimanali DATE NOT NULL, tipologia_lesione VARCHAR(255) NOT NULL, numero_sede_lesione VARCHAR(255) NOT NULL, grado_lesione VARCHAR(255) NOT NULL, condizione_lesione VARCHAR(255) NOT NULL, bordi_lesione VARCHAR(255) NOT NULL, cute_perilesionale VARCHAR(255) NOT NULL, note_sulla_lesione LONGTEXT DEFAULT NULL, INDEX IDX_5286357732524E3D (scheda_pai_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE SCHEDA_PAI_lesioni ADD CONSTRAINT FK_5286357732524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD id_valutazione_generale_id INT DEFAULT NULL, ADD id_parere_mmg_id INT DEFAULT NULL, ADD id_chiusura_servizio_id INT DEFAULT NULL, DROP id_valutazione_generale, DROP id_valutazione_figura_professionale, DROP id_parere_mmg, DROP id_chiusura_servizio, DROP id_barthel, DROP id_braden, DROP id_spmsq, DROP id_tinetti, DROP id_vas');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD CONSTRAINT FK_521766CE67FBDB8 FOREIGN KEY (id_valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD CONSTRAINT FK_521766CE50254F30 FOREIGN KEY (id_parere_mmg_id) REFERENCES SCHEDA_PAI_parere_mmg (id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD CONSTRAINT FK_521766CE51D31DF FOREIGN KEY (id_chiusura_servizio_id) REFERENCES SCHEDA_PAI_chiusura_servizio (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_521766CE67FBDB8 ON SCHEDA_PAI (id_valutazione_generale_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_521766CE50254F30 ON SCHEDA_PAI (id_parere_mmg_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_521766CE51D31DF ON SCHEDA_PAI (id_chiusura_servizio_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel ADD scheda_pai_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel ADD CONSTRAINT FK_90EA910F32524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('CREATE INDEX IDX_90EA910F32524E3D ON SCHEDA_PAI_barthel (scheda_pai_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden ADD scheda_pai_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden ADD CONSTRAINT FK_150FFD332524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('CREATE INDEX IDX_150FFD332524E3D ON SCHEDA_PAI_braden (scheda_pai_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq ADD scheda_pai_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq ADD CONSTRAINT FK_652E7A3F32524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('CREATE INDEX IDX_652E7A3F32524E3D ON SCHEDA_PAI_spmsq (scheda_pai_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_tinetti ADD scheda_pai_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_tinetti ADD CONSTRAINT FK_38D7D6432524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('CREATE INDEX IDX_38D7D6432524E3D ON SCHEDA_PAI_tinetti (scheda_pai_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale ADD scheda_pai_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale ADD CONSTRAINT FK_B016824132524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('CREATE INDEX IDX_B016824132524E3D ON SCHEDA_PAI_valutazione_figura_professionale (scheda_pai_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_vas ADD scheda_pai_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_vas ADD CONSTRAINT FK_D92348332524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('CREATE INDEX IDX_D92348332524E3D ON SCHEDA_PAI_vas (scheda_pai_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE SCHEDA_PAI_lesioni');
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP FOREIGN KEY FK_521766CE67FBDB8');
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP FOREIGN KEY FK_521766CE50254F30');
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP FOREIGN KEY FK_521766CE51D31DF');
        $this->addSql('DROP INDEX UNIQ_521766CE67FBDB8 ON SCHEDA_PAI');
        $this->addSql('DROP INDEX UNIQ_521766CE50254F30 ON SCHEDA_PAI');
        $this->addSql('DROP INDEX UNIQ_521766CE51D31DF ON SCHEDA_PAI');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD id_valutazione_generale INT NOT NULL, ADD id_valutazione_figura_professionale LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD id_parere_mmg INT NOT NULL, ADD id_chiusura_servizio INT NOT NULL, ADD id_barthel LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD id_braden LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD id_spmsq LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD id_tinetti LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD id_vas LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP id_valutazione_generale_id, DROP id_parere_mmg_id, DROP id_chiusura_servizio_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel DROP FOREIGN KEY FK_90EA910F32524E3D');
        $this->addSql('DROP INDEX IDX_90EA910F32524E3D ON SCHEDA_PAI_barthel');
        $this->addSql('ALTER TABLE SCHEDA_PAI_barthel DROP scheda_pai_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden DROP FOREIGN KEY FK_150FFD332524E3D');
        $this->addSql('DROP INDEX IDX_150FFD332524E3D ON SCHEDA_PAI_braden');
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden DROP scheda_pai_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq DROP FOREIGN KEY FK_652E7A3F32524E3D');
        $this->addSql('DROP INDEX IDX_652E7A3F32524E3D ON SCHEDA_PAI_spmsq');
        $this->addSql('ALTER TABLE SCHEDA_PAI_spmsq DROP scheda_pai_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_tinetti DROP FOREIGN KEY FK_38D7D6432524E3D');
        $this->addSql('DROP INDEX IDX_38D7D6432524E3D ON SCHEDA_PAI_tinetti');
        $this->addSql('ALTER TABLE SCHEDA_PAI_tinetti DROP scheda_pai_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale DROP FOREIGN KEY FK_B016824132524E3D');
        $this->addSql('DROP INDEX IDX_B016824132524E3D ON SCHEDA_PAI_valutazione_figura_professionale');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_figura_professionale DROP scheda_pai_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_vas DROP FOREIGN KEY FK_D92348332524E3D');
        $this->addSql('DROP INDEX IDX_D92348332524E3D ON SCHEDA_PAI_vas');
        $this->addSql('ALTER TABLE SCHEDA_PAI_vas DROP scheda_pai_id');
    }
}
