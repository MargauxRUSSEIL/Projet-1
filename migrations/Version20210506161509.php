<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506161509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE roles_user (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, roles_id INT DEFAULT NULL, INDEX IDX_57048B30A76ED395 (user_id), INDEX IDX_57048B3038C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE roles_user ADD CONSTRAINT FK_57048B30A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE roles_user ADD CONSTRAINT FK_57048B3038C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BFD3CE8FC35F0816 ON localisation (adresse)');
        $this->addSql('ALTER TABLE mcc CHANGE departement departement VARCHAR(255) NOT NULL, CHANGE annee annee DATETIME NOT NULL, CHANGE niveau niveau VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mention CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE modalite_formation CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_177E55B1A4D60759 ON modalite_formation (libelle)');
        $this->addSql('ALTER TABLE modalite_pedagogique CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_96625500A4D60759 ON modalite_pedagogique (libelle)');
        $this->addSql('ALTER TABLE modalite_recrutement CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EC00EC8CA4D60759 ON modalite_recrutement (libelle)');
        $this->addSql('ALTER TABLE niveau CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE parcours CHANGE created_at created_at DATETIME NOT NULL, CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE partenaire CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32FFA373A4D60759 ON partenaire (libelle)');
        $this->addSql('ALTER TABLE roles CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B63E2EC7A4D60759 ON roles (libelle)');
        $this->addSql('ALTER TABLE semestre CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_DFC95C2ECCA5EC1C ON session_unique');
        $this->addSql('ALTER TABLE session_unique DROP session_unique_has_controle_connaissance_id');
        $this->addSql('ALTER TABLE type_diplome CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ue CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD telephone INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE mail mail VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495126AC48 ON user (mail)');
        $this->addSql('ALTER TABLE workflow CHANGE intitule intitule VARCHAR(255) NOT NULL, CHANGE date_creation date_creation DATETIME NOT NULL, CHANGE date_limite date_limite DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE roles_user');
        $this->addSql('DROP INDEX UNIQ_BFD3CE8FC35F0816 ON localisation');
        $this->addSql('ALTER TABLE mcc CHANGE departement departement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annee annee DATETIME DEFAULT NULL, CHANGE niveau niveau VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mention CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_177E55B1A4D60759 ON modalite_formation');
        $this->addSql('ALTER TABLE modalite_formation CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_96625500A4D60759 ON modalite_pedagogique');
        $this->addSql('ALTER TABLE modalite_pedagogique CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_EC00EC8CA4D60759 ON modalite_recrutement');
        $this->addSql('ALTER TABLE modalite_recrutement CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE niveau CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE parcours CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_32FFA373A4D60759 ON partenaire');
        $this->addSql('ALTER TABLE partenaire CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_B63E2EC7A4D60759 ON roles');
        $this->addSql('ALTER TABLE roles CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE semestre CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE session_unique ADD session_unique_has_controle_connaissance_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_DFC95C2ECCA5EC1C ON session_unique (session_unique_has_controle_connaissance_id)');
        $this->addSql('ALTER TABLE type_diplome CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ue CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_8D93D6495126AC48 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP telephone, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE workflow CHANGE intitule intitule VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_creation date_creation DATETIME DEFAULT NULL, CHANGE date_limite date_limite DATETIME DEFAULT NULL');
    }
}
