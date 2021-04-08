<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408091812 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_roles (user_id INT NOT NULL, roles_id INT NOT NULL, INDEX IDX_54FCD59FA76ED395 (user_id), INDEX IDX_54FCD59F38C751C4 (roles_id), PRIMARY KEY(user_id, roles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow_user (workflow_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C80CC6722C7C2CBA (workflow_id), INDEX IDX_C80CC672A76ED395 (user_id), PRIMARY KEY(workflow_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59F38C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_user ADD CONSTRAINT FK_C80CC6722C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_user ADD CONSTRAINT FK_C80CC672A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE roles_user');
        $this->addSql('ALTER TABLE composante DROP FOREIGN KEY FK_D8E84C85200282E');
        $this->addSql('DROP INDEX IDX_D8E84C85200282E ON composante');
        $this->addSql('ALTER TABLE composante DROP formation_id');
        $this->addSql('ALTER TABLE formation ADD composante_id INT DEFAULT NULL, ADD localisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFAC12F1AD FOREIGN KEY (composante_id) REFERENCES composante (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFC68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
        $this->addSql('CREATE INDEX IDX_404021BFAC12F1AD ON formation (composante_id)');
        $this->addSql('CREATE INDEX IDX_404021BFC68BE09C ON formation (localisation_id)');
        $this->addSql('ALTER TABLE localisation DROP FOREIGN KEY FK_BFD3CE8F5200282E');
        $this->addSql('DROP INDEX IDX_BFD3CE8F5200282E ON localisation');
        $this->addSql('ALTER TABLE localisation DROP formation_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492C7C2CBA');
        $this->addSql('DROP INDEX IDX_8D93D6492C7C2CBA ON user');
        $this->addSql('ALTER TABLE user DROP workflow_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE roles_user (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, roles_id INT DEFAULT NULL, INDEX IDX_57048B3038C751C4 (roles_id), INDEX IDX_57048B30A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE roles_user ADD CONSTRAINT FK_57048B3038C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE roles_user ADD CONSTRAINT FK_57048B30A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE workflow_user');
        $this->addSql('ALTER TABLE composante ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE composante ADD CONSTRAINT FK_D8E84C85200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_D8E84C85200282E ON composante (formation_id)');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFAC12F1AD');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFC68BE09C');
        $this->addSql('DROP INDEX IDX_404021BFAC12F1AD ON formation');
        $this->addSql('DROP INDEX IDX_404021BFC68BE09C ON formation');
        $this->addSql('ALTER TABLE formation DROP composante_id, DROP localisation_id');
        $this->addSql('ALTER TABLE localisation ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localisation ADD CONSTRAINT FK_BFD3CE8F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_BFD3CE8F5200282E ON localisation (formation_id)');
        $this->addSql('ALTER TABLE `user` ADD workflow_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6492C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492C7C2CBA ON `user` (workflow_id)');
    }
}
