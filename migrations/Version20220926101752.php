<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926101752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scheda_pai_user_inf ADD PRIMARY KEY (user_inf_id, scheda_pai_inf_id)');
        $this->addSql('ALTER TABLE scheda_pai_user_inf ADD CONSTRAINT FK_718F63525A2499DD FOREIGN KEY (user_inf_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_inf ADD CONSTRAINT FK_718F6352D4A69DA0 FOREIGN KEY (scheda_pai_inf_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scheda_pai_user_inf DROP FOREIGN KEY FK_718F63525A2499DD');
        $this->addSql('ALTER TABLE scheda_pai_user_inf DROP FOREIGN KEY FK_718F6352D4A69DA0');
        $this->addSql('DROP INDEX `primary` ON scheda_pai_user_inf');
    }
}
