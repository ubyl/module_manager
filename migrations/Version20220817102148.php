<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220817102148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE valutazione_generale_altra_tipologia_assistenza (valutazione_generale_id INT NOT NULL, altra_tipologia_assistenza_id INT NOT NULL, INDEX IDX_54A2503468146AE8 (valutazione_generale_id), INDEX IDX_54A250346CC3158 (altra_tipologia_assistenza_id), PRIMARY KEY(valutazione_generale_id, altra_tipologia_assistenza_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE valutazione_generale_altra_tipologia_assistenza ADD CONSTRAINT FK_54A2503468146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE valutazione_generale_altra_tipologia_assistenza ADD CONSTRAINT FK_54A250346CC3158 FOREIGN KEY (altra_tipologia_assistenza_id) REFERENCES SCHEDA_PAI_altra_tipologia_assistenza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale DROP FOREIGN KEY FK_FB42077068146AE8');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale DROP FOREIGN KEY FK_FB4207706CC3158');
        $this->addSql('DROP TABLE altra_tipologia_assistenza_valutazione_generale');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE altra_tipologia_assistenza_valutazione_generale (altra_tipologia_assistenza_id INT NOT NULL, valutazione_generale_id INT NOT NULL, INDEX IDX_FB4207706CC3158 (altra_tipologia_assistenza_id), INDEX IDX_FB42077068146AE8 (valutazione_generale_id), PRIMARY KEY(altra_tipologia_assistenza_id, valutazione_generale_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale ADD CONSTRAINT FK_FB42077068146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale ADD CONSTRAINT FK_FB4207706CC3158 FOREIGN KEY (altra_tipologia_assistenza_id) REFERENCES SCHEDA_PAI_altra_tipologia_assistenza (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE valutazione_generale_altra_tipologia_assistenza DROP FOREIGN KEY FK_54A2503468146AE8');
        $this->addSql('ALTER TABLE valutazione_generale_altra_tipologia_assistenza DROP FOREIGN KEY FK_54A250346CC3158');
        $this->addSql('DROP TABLE valutazione_generale_altra_tipologia_assistenza');
    }
}
