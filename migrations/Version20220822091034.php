<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822091034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden ADD umidita INT NOT NULL, ADD attivita INT NOT NULL, ADD mobilita INT NOT NULL, DROP umidità, DROP attività, DROP mobilità, DROP firma_operatore');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI_braden ADD umidità INT NOT NULL, ADD attività INT NOT NULL, ADD mobilità INT NOT NULL, ADD firma_operatore LONGTEXT NOT NULL, DROP umidita, DROP attivita, DROP mobilita');
    }
}
