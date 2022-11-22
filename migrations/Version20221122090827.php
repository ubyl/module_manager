<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221122090827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD numero_barthel INT NOT NULL, ADD numero_braden INT NOT NULL, ADD numero_spmsq INT NOT NULL, ADD numero_tinetti INT NOT NULL, ADD numero_vas INT NOT NULL, ADD numero_lesioni INT NOT NULL, ADD frequenza_barthel INT NOT NULL, ADD frequenza_braden INT NOT NULL, ADD frequenza_spmsq INT NOT NULL, ADD frequenza_tinetti INT NOT NULL, ADD frequenza_vas INT NOT NULL, ADD frequenza_lesioni INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP numero_barthel, DROP numero_braden, DROP numero_spmsq, DROP numero_tinetti, DROP numero_vas, DROP numero_lesioni, DROP frequenza_barthel, DROP frequenza_braden, DROP frequenza_spmsq, DROP frequenza_tinetti, DROP frequenza_vas, DROP frequenza_lesioni');
    }
}
