<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130102818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD numero_barthel_corretto INT NOT NULL, ADD numero_braden_corretto INT NOT NULL, ADD numero_spmsq_corretto INT NOT NULL, ADD numero_tinetti_corretto INT NOT NULL, ADD numero_vas_corretto INT NOT NULL, ADD numero_lesioni_corretto INT NOT NULL, DROP numero_barthel, DROP numero_braden, DROP numero_spmsq, DROP numero_tinetti, DROP numero_vas, DROP numero_lesioni');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD numero_barthel INT NOT NULL, ADD numero_braden INT NOT NULL, ADD numero_spmsq INT NOT NULL, ADD numero_tinetti INT NOT NULL, ADD numero_vas INT NOT NULL, ADD numero_lesioni INT NOT NULL, DROP numero_barthel_corretto, DROP numero_braden_corretto, DROP numero_spmsq_corretto, DROP numero_tinetti_corretto, DROP numero_vas_corretto, DROP numero_lesioni_corretto');
    }
}
