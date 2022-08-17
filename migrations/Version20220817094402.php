<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220817094402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE altra_tipologia_assistenza_valutazione_generale (altra_tipologia_assistenza_id INT NOT NULL, valutazione_generale_id INT NOT NULL, INDEX IDX_FB4207706CC3158 (altra_tipologia_assistenza_id), INDEX IDX_FB42077068146AE8 (valutazione_generale_id), PRIMARY KEY(altra_tipologia_assistenza_id, valutazione_generale_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bisogni_valutazione_generale (bisogni_id INT NOT NULL, valutazione_generale_id INT NOT NULL, INDEX IDX_8F5C0A5A75A473DE (bisogni_id), INDEX IDX_8F5C0A5A68146AE8 (valutazione_generale_id), PRIMARY KEY(bisogni_id, valutazione_generale_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale ADD CONSTRAINT FK_FB4207706CC3158 FOREIGN KEY (altra_tipologia_assistenza_id) REFERENCES SCHEDA_PAI_altra_tipologia_assistenza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale ADD CONSTRAINT FK_FB42077068146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bisogni_valutazione_generale ADD CONSTRAINT FK_8F5C0A5A75A473DE FOREIGN KEY (bisogni_id) REFERENCES SCHEDA_PAI_bisogni (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bisogni_valutazione_generale ADD CONSTRAINT FK_8F5C0A5A68146AE8 FOREIGN KEY (valutazione_generale_id) REFERENCES SCHEDA_PAI_valutazione_generale (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale DROP FOREIGN KEY FK_FB4207706CC3158');
        $this->addSql('ALTER TABLE altra_tipologia_assistenza_valutazione_generale DROP FOREIGN KEY FK_FB42077068146AE8');
        $this->addSql('ALTER TABLE bisogni_valutazione_generale DROP FOREIGN KEY FK_8F5C0A5A75A473DE');
        $this->addSql('ALTER TABLE bisogni_valutazione_generale DROP FOREIGN KEY FK_8F5C0A5A68146AE8');
        $this->addSql('DROP TABLE altra_tipologia_assistenza_valutazione_generale');
        $this->addSql('DROP TABLE bisogni_valutazione_generale');
    }
}
