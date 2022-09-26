<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926075410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scheda_pai_user (scheda_pai_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1F72D6A432524E3D (scheda_pai_id), INDEX IDX_1F72D6A4A76ED395 (user_id), PRIMARY KEY(scheda_pai_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scheda_pai_user ADD CONSTRAINT FK_1F72D6A432524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scheda_pai_user ADD CONSTRAINT FK_1F72D6A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP id_operatore_secondario_inf');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scheda_pai_user DROP FOREIGN KEY FK_1F72D6A432524E3D');
        $this->addSql('ALTER TABLE scheda_pai_user DROP FOREIGN KEY FK_1F72D6A4A76ED395');
        $this->addSql('DROP TABLE scheda_pai_user');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD id_operatore_secondario_inf LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
