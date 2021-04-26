<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330105725 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, libelle_domaine VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, INDEX IDX_BFD3CE8F5200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mcc (id INT AUTO_INCREMENT NOT NULL, parcours_id INT DEFAULT NULL, niveau_id INT DEFAULT NULL, mention_id INT DEFAULT NULL, departement VARCHAR(255) DEFAULT NULL, site VARCHAR(255) DEFAULT NULL, annee DATETIME DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, type_diplome VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_252589E76E38C0DB (parcours_id), INDEX IDX_252589E7B3E9C81 (niveau_id), INDEX IDX_252589E77A4147F0 (mention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mention (id INT AUTO_INCREMENT NOT NULL, domaine_id INT DEFAULT NULL, libelle_mention VARCHAR(255) DEFAULT NULL, INDEX IDX_E20259CD4272FC9F (domaine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nb_groupe_type_cours (id INT AUTO_INCREMENT NOT NULL, nb_groupe_type_cours_has_cours_id INT DEFAULT NULL, cm VARCHAR(255) DEFAULT NULL, tp VARCHAR(255) DEFAULT NULL, td VARCHAR(255) DEFAULT NULL, autre VARCHAR(255) DEFAULT NULL, INDEX IDX_C684FF2020CE246 (nb_groupe_type_cours_has_cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nb_groupe_type_cours_has_cours (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, libelle_niveau VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, structure_prolongee VARCHAR(255) DEFAULT NULL, structure_basse VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, libelle_parcours VARCHAR(255) DEFAULT NULL, libelle_parcours_apogee VARCHAR(255) DEFAULT NULL, second_vet VARCHAR(255) DEFAULT NULL, annu_ou_semest VARCHAR(255) DEFAULT NULL, INDEX IDX_99B1DEE35200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, libelle_role VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre (id INT AUTO_INCREMENT NOT NULL, parcours_id INT DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, code_semestre VARCHAR(255) DEFAULT NULL, INDEX IDX_71688FBC6E38C0DB (parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_unique (id INT AUTO_INCREMENT NOT NULL, session_unique_has_type_controle_id INT DEFAULT NULL, type_controle VARCHAR(255) DEFAULT NULL, type_epreuve VARCHAR(255) DEFAULT NULL, regle_calcul VARCHAR(255) DEFAULT NULL, session VARCHAR(255) DEFAULT NULL, INDEX IDX_DFC95C2E469ACDE3 (session_unique_has_type_controle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_unique_has_type_controle (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_controle (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, session_unique_has_type_controle_id INT DEFAULT NULL, INDEX IDX_C3C61E927ECF78B0 (cours_id), INDEX IDX_C3C61E92469ACDE3 (session_unique_has_type_controle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_diplome (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, type_diplome_has_diplome_etablissement_id INT DEFAULT NULL, INDEX IDX_C36D22BB5200282E (formation_id), INDEX IDX_C36D22BBA6FFED1C (type_diplome_has_diplome_etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_diplome_has_diplome_etablissement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue (id INT AUTO_INCREMENT NOT NULL, m_cc_id INT DEFAULT NULL, libelle_ue VARCHAR(255) DEFAULT NULL, INDEX IDX_2E490A9BE4D4012B (m_cc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue_cours (ue_id INT NOT NULL, cours_id INT NOT NULL, INDEX IDX_9E2CE27C62E883B1 (ue_id), INDEX IDX_9E2CE27C7ECF78B0 (cours_id), PRIMARY KEY(ue_id, cours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, workflow_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, adjoint VARCHAR(255) DEFAULT NULL, actif INT DEFAULT NULL, adjoint2 VARCHAR(255) DEFAULT NULL, adjoint3 VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D6492C7C2CBA (workflow_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, date_de_fin DATETIME DEFAULT NULL, date_limite DATETIME DEFAULT NULL, cree_par VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE localisation ADD CONSTRAINT FK_BFD3CE8F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E76E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E7B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E77A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('ALTER TABLE mention ADD CONSTRAINT FK_E20259CD4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours ADD CONSTRAINT FK_C684FF2020CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE35200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE semestre ADD CONSTRAINT FK_71688FBC6E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE session_unique ADD CONSTRAINT FK_DFC95C2E469ACDE3 FOREIGN KEY (session_unique_has_type_controle_id) REFERENCES session_unique_has_type_controle (id)');
        $this->addSql('ALTER TABLE type_controle ADD CONSTRAINT FK_C3C61E927ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE type_controle ADD CONSTRAINT FK_C3C61E92469ACDE3 FOREIGN KEY (session_unique_has_type_controle_id) REFERENCES session_unique_has_type_controle (id)');
        $this->addSql('ALTER TABLE type_diplome ADD CONSTRAINT FK_C36D22BB5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE type_diplome ADD CONSTRAINT FK_C36D22BBA6FFED1C FOREIGN KEY (type_diplome_has_diplome_etablissement_id) REFERENCES type_diplome_has_diplome_etablissement (id)');
        $this->addSql('ALTER TABLE ue ADD CONSTRAINT FK_2E490A9BE4D4012B FOREIGN KEY (m_cc_id) REFERENCES mcc (id)');
        $this->addSql('ALTER TABLE ue_cours ADD CONSTRAINT FK_9E2CE27C62E883B1 FOREIGN KEY (ue_id) REFERENCES ue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ue_cours ADD CONSTRAINT FK_9E2CE27C7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6492C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id)');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CE469ACDE3 FOREIGN KEY (session_unique_has_type_controle_id) REFERENCES session_unique_has_type_controle (id)');
        $this->addSql('ALTER TABLE composante ADD CONSTRAINT FK_D8E84C85200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C20CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('ALTER TABLE cout_hetd ADD CONSTRAINT FK_AF8E3C0D20CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('ALTER TABLE diplome_etablissement ADD CONSTRAINT FK_CE539434A6FFED1C FOREIGN KEY (type_diplome_has_diplome_etablissement_id) REFERENCES type_diplome_has_diplome_etablissement (id)');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD2C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id)');
        $this->addSql('ALTER TABLE formation ADD mention_id INT DEFAULT NULL, DROP mention');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF2C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF7A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('CREATE INDEX IDX_404021BF7A4147F0 ON formation (mention_id)');
        $this->addSql('ALTER TABLE formation_non_diplomante ADD CONSTRAINT FK_A5DD3F92A6FFED1C FOREIGN KEY (type_diplome_has_diplome_etablissement_id) REFERENCES type_diplome_has_diplome_etablissement (id)');
        $this->addSql('ALTER TABLE horaire_type_cours ADD CONSTRAINT FK_323D2DFA20CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mention DROP FOREIGN KEY FK_E20259CD4272FC9F');
        $this->addSql('ALTER TABLE ue DROP FOREIGN KEY FK_2E490A9BE4D4012B');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF7A4147F0');
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E77A4147F0');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C20CE246');
        $this->addSql('ALTER TABLE cout_hetd DROP FOREIGN KEY FK_AF8E3C0D20CE246');
        $this->addSql('ALTER TABLE horaire_type_cours DROP FOREIGN KEY FK_323D2DFA20CE246');
        $this->addSql('ALTER TABLE nb_groupe_type_cours DROP FOREIGN KEY FK_C684FF2020CE246');
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E7B3E9C81');
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E76E38C0DB');
        $this->addSql('ALTER TABLE semestre DROP FOREIGN KEY FK_71688FBC6E38C0DB');
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CE469ACDE3');
        $this->addSql('ALTER TABLE session_unique DROP FOREIGN KEY FK_DFC95C2E469ACDE3');
        $this->addSql('ALTER TABLE type_controle DROP FOREIGN KEY FK_C3C61E92469ACDE3');
        $this->addSql('ALTER TABLE diplome_etablissement DROP FOREIGN KEY FK_CE539434A6FFED1C');
        $this->addSql('ALTER TABLE formation_non_diplomante DROP FOREIGN KEY FK_A5DD3F92A6FFED1C');
        $this->addSql('ALTER TABLE type_diplome DROP FOREIGN KEY FK_C36D22BBA6FFED1C');
        $this->addSql('ALTER TABLE ue_cours DROP FOREIGN KEY FK_9E2CE27C62E883B1');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD2C7C2CBA');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF2C7C2CBA');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6492C7C2CBA');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE mcc');
        $this->addSql('DROP TABLE mention');
        $this->addSql('DROP TABLE nb_groupe_type_cours');
        $this->addSql('DROP TABLE nb_groupe_type_cours_has_cours');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE semestre');
        $this->addSql('DROP TABLE session_unique');
        $this->addSql('DROP TABLE session_unique_has_type_controle');
        $this->addSql('DROP TABLE type_controle');
        $this->addSql('DROP TABLE type_diplome');
        $this->addSql('DROP TABLE type_diplome_has_diplome_etablissement');
        $this->addSql('DROP TABLE ue');
        $this->addSql('DROP TABLE ue_cours');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE workflow');
        $this->addSql('ALTER TABLE composante DROP FOREIGN KEY FK_D8E84C85200282E');
        $this->addSql('DROP INDEX IDX_404021BF7A4147F0 ON formation');
        $this->addSql('ALTER TABLE formation ADD mention VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP mention_id');
    }
}
