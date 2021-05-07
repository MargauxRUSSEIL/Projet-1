<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506233802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE controle_connaissance_session_unique DROP FOREIGN KEY FK_19D53AAE4908D3B4');
        $this->addSql('CREATE TABLE controle_connaissances (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, competences_id INT DEFAULT NULL, INDEX IDX_A83D5F3B7ECF78B0 (cours_id), INDEX IDX_A83D5F3BA660B158 (competences_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE controle_connaissances_session_unique (controle_connaissances_id INT NOT NULL, session_unique_id INT NOT NULL, INDEX IDX_5ED336522B34C263 (controle_connaissances_id), INDEX IDX_5ED33652A024C649 (session_unique_id), PRIMARY KEY(controle_connaissances_id, session_unique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE controle_connaissances ADD CONSTRAINT FK_A83D5F3B7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE controle_connaissances ADD CONSTRAINT FK_A83D5F3BA660B158 FOREIGN KEY (competences_id) REFERENCES competences (id)');
        $this->addSql('ALTER TABLE controle_connaissances_session_unique ADD CONSTRAINT FK_5ED336522B34C263 FOREIGN KEY (controle_connaissances_id) REFERENCES controle_connaissances (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE controle_connaissances_session_unique ADD CONSTRAINT FK_5ED33652A024C649 FOREIGN KEY (session_unique_id) REFERENCES session_unique (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE controle_connaissance');
        $this->addSql('DROP TABLE controle_connaissance_session_unique');
        $this->addSql('ALTER TABLE composante CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8E84C8A4D60759 ON composante (libelle)');
        $this->addSql('ALTER TABLE cours CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE domaine CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE etape CHANGE intitule intitule VARCHAR(255) NOT NULL, CHANGE date_limite date_limite DATETIME NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE created_at created_at DATETIME NOT NULL, CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE localisation CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE ville ville VARCHAR(255) NOT NULL, CHANGE code_postal code_postal INT NOT NULL');
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
        $this->addSql('ALTER TABLE type_diplome CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ue CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD telephone INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE mail mail VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495126AC48 ON user (mail)');
        $this->addSql('ALTER TABLE workflow CHANGE intitule intitule VARCHAR(255) NOT NULL, CHANGE date_creation date_creation DATETIME NOT NULL, CHANGE date_limite date_limite DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE controle_connaissances_session_unique DROP FOREIGN KEY FK_5ED336522B34C263');
        $this->addSql('CREATE TABLE controle_connaissance (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, competences_id INT DEFAULT NULL, INDEX IDX_55EA1EF8A660B158 (competences_id), INDEX IDX_55EA1EF87ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE controle_connaissance_session_unique (controle_connaissance_id INT NOT NULL, session_unique_id INT NOT NULL, INDEX IDX_19D53AAE4908D3B4 (controle_connaissance_id), INDEX IDX_19D53AAEA024C649 (session_unique_id), PRIMARY KEY(controle_connaissance_id, session_unique_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE controle_connaissance ADD CONSTRAINT FK_55EA1EF87ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE controle_connaissance ADD CONSTRAINT FK_55EA1EF8A660B158 FOREIGN KEY (competences_id) REFERENCES competences (id)');
        $this->addSql('ALTER TABLE controle_connaissance_session_unique ADD CONSTRAINT FK_19D53AAE4908D3B4 FOREIGN KEY (controle_connaissance_id) REFERENCES controle_connaissance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE controle_connaissance_session_unique ADD CONSTRAINT FK_19D53AAEA024C649 FOREIGN KEY (session_unique_id) REFERENCES session_unique (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE controle_connaissances');
        $this->addSql('DROP TABLE controle_connaissances_session_unique');
        $this->addSql('DROP INDEX UNIQ_D8E84C8A4D60759 ON composante');
        $this->addSql('ALTER TABLE composante CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cours CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE domaine CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etape CHANGE intitule intitule VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_limite date_limite DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE formation CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_BFD3CE8FC35F0816 ON localisation');
        $this->addSql('ALTER TABLE localisation CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal INT DEFAULT NULL');
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
        $this->addSql('ALTER TABLE type_diplome CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ue CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_8D93D6495126AC48 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP telephone, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE workflow CHANGE intitule intitule VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_creation date_creation DATETIME DEFAULT NULL, CHANGE date_limite date_limite DATETIME DEFAULT NULL');
    }
}
