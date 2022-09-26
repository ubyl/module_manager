<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926091146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scheda_pai_user_inf (user_inf_id INT NOT NULL, scheda_pai_inf_id INT NOT NULL, INDEX IDX_718F63525A2499DD (user_inf_id), INDEX IDX_718F6352D4A69DA0 (scheda_pai_inf_id), PRIMARY KEY(user_inf_id, scheda_pai_inf_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheda_pai_user_tdr (user_tdr_id INT NOT NULL, scheda_pai_tdr_id INT NOT NULL, INDEX IDX_85446F8670A750F1 (user_tdr_id), INDEX IDX_85446F86FE25548C (scheda_pai_tdr_id), PRIMARY KEY(user_tdr_id, scheda_pai_tdr_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheda_pai_user_log (user_log_id INT NOT NULL, scheda_pai_log_id INT NOT NULL, INDEX IDX_1958A06E8F3546BB (user_log_id), INDEX IDX_1958A06E1B742C6 (scheda_pai_log_id), PRIMARY KEY(user_log_id, scheda_pai_log_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheda_pai_user_asa (user_asa_id INT NOT NULL, scheda_pai_asa_id INT NOT NULL, INDEX IDX_1E94CB55B3D0703A (user_asa_id), INDEX IDX_1E94CB553D527447 (scheda_pai_asa_id), PRIMARY KEY(user_asa_id, scheda_pai_asa_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheda_pai_user_oss (user_oss_id INT NOT NULL, scheda_pai_oss_id INT NOT NULL, INDEX IDX_E7B3971773CA8E5E (user_oss_id), INDEX IDX_E7B39717FD488A23 (scheda_pai_oss_id), PRIMARY KEY(user_oss_id, scheda_pai_oss_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scheda_pai_user_inf ADD CONSTRAINT FK_718F63525A2499DD FOREIGN KEY (user_inf_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_inf ADD CONSTRAINT FK_718F6352D4A69DA0 FOREIGN KEY (scheda_pai_inf_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_tdr ADD CONSTRAINT FK_85446F8670A750F1 FOREIGN KEY (user_tdr_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_tdr ADD CONSTRAINT FK_85446F86FE25548C FOREIGN KEY (scheda_pai_tdr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_log ADD CONSTRAINT FK_1958A06E8F3546BB FOREIGN KEY (user_log_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_log ADD CONSTRAINT FK_1958A06E1B742C6 FOREIGN KEY (scheda_pai_log_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_asa ADD CONSTRAINT FK_1E94CB55B3D0703A FOREIGN KEY (user_asa_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_asa ADD CONSTRAINT FK_1E94CB553D527447 FOREIGN KEY (scheda_pai_asa_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_oss ADD CONSTRAINT FK_E7B3971773CA8E5E FOREIGN KEY (user_oss_id) REFERENCES SCHEDA_PAI (id)');
        $this->addSql('ALTER TABLE scheda_pai_user_oss ADD CONSTRAINT FK_E7B39717FD488A23 FOREIGN KEY (scheda_pai_oss_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scheda_pai_user DROP FOREIGN KEY FK_1F72D6A432524E3D');
        $this->addSql('ALTER TABLE scheda_pai_user DROP FOREIGN KEY FK_1F72D6A4A76ED395');
        $this->addSql('DROP TABLE scheda_pai_user');
        $this->addSql('ALTER TABLE SCHEDA_PAI DROP id_operatore_secondario_tdr, DROP id_operatore_secondario_log, DROP id_operatore_secondario_asa, DROP id_operatore_secondario_oss');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scheda_pai_user (scheda_pai_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1F72D6A432524E3D (scheda_pai_id), INDEX IDX_1F72D6A4A76ED395 (user_id), PRIMARY KEY(scheda_pai_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE scheda_pai_user ADD CONSTRAINT FK_1F72D6A432524E3D FOREIGN KEY (scheda_pai_id) REFERENCES SCHEDA_PAI (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scheda_pai_user ADD CONSTRAINT FK_1F72D6A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scheda_pai_user_inf DROP FOREIGN KEY FK_718F63525A2499DD');
        $this->addSql('ALTER TABLE scheda_pai_user_inf DROP FOREIGN KEY FK_718F6352D4A69DA0');
        $this->addSql('ALTER TABLE scheda_pai_user_tdr DROP FOREIGN KEY FK_85446F8670A750F1');
        $this->addSql('ALTER TABLE scheda_pai_user_tdr DROP FOREIGN KEY FK_85446F86FE25548C');
        $this->addSql('ALTER TABLE scheda_pai_user_log DROP FOREIGN KEY FK_1958A06E8F3546BB');
        $this->addSql('ALTER TABLE scheda_pai_user_log DROP FOREIGN KEY FK_1958A06E1B742C6');
        $this->addSql('ALTER TABLE scheda_pai_user_asa DROP FOREIGN KEY FK_1E94CB55B3D0703A');
        $this->addSql('ALTER TABLE scheda_pai_user_asa DROP FOREIGN KEY FK_1E94CB553D527447');
        $this->addSql('ALTER TABLE scheda_pai_user_oss DROP FOREIGN KEY FK_E7B3971773CA8E5E');
        $this->addSql('ALTER TABLE scheda_pai_user_oss DROP FOREIGN KEY FK_E7B39717FD488A23');
        $this->addSql('DROP TABLE scheda_pai_user_inf');
        $this->addSql('DROP TABLE scheda_pai_user_tdr');
        $this->addSql('DROP TABLE scheda_pai_user_log');
        $this->addSql('DROP TABLE scheda_pai_user_asa');
        $this->addSql('DROP TABLE scheda_pai_user_oss');
        $this->addSql('ALTER TABLE SCHEDA_PAI ADD id_operatore_secondario_tdr LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD id_operatore_secondario_log LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD id_operatore_secondario_asa LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD id_operatore_secondario_oss LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
