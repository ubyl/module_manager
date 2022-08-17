<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220810090110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_bisogni DROP FOREIGN KEY FK_5E03803568146AE8');
        $this->addSql('DROP INDEX IDX_5E03803568146AE8 ON SCHEDA_PAI_bisogni');
        $this->addSql('ALTER TABLE SCHEDA_PAI_bisogni DROP valutazione_generale_id');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_generale CHANGE nome nome VARCHAR(255) NOT NULL, CHANGE diagnosi diagnosi VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_bisogni ADD valutazione_generale_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE SCHEDA_PAI_bisogni ADD CONSTRAINT FK_5E03803568146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5E03803568146AE8 ON SCHEDA_PAI_bisogni (valutazione_generale_id)');
        $this->addSql('ALTER TABLE SCHEDA_PAI_valutazione_generale CHANGE nome nome LONGTEXT NOT NULL, CHANGE diagnosi diagnosi LONGTEXT NOT NULL');
    }
}
