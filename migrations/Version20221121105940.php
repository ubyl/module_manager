<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121105940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD abilita_barthel TINYINT(1) NOT NULL, ADD abilita_braden TINYINT(1) NOT NULL, ADD abilita_spmsq TINYINT(1) NOT NULL, ADD abilita_tinetti TINYINT(1) NOT NULL, ADD abilita_vas TINYINT(1) NOT NULL, ADD abilita_lesioni TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP abilita_barthel, DROP abilita_braden, DROP abilita_spmsq, DROP abilita_tinetti, DROP abilita_vas, DROP abilita_lesioni');
    }
}
