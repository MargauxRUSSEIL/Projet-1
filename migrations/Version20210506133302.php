<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506133302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracteristiques (id INT AUTO_INCREMENT NOT NULL, type_diplome_id INT DEFAULT NULL, complement VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_61B5DA1D3BFB8FC7 (type_diplome_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteristiques_niveau (caracteristiques_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_5CFDC1ADB2639FE4 (caracteristiques_id), INDEX IDX_5CFDC1ADB3E9C81 (niveau_id), PRIMARY KEY(caracteristiques_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, blocs VARCHAR(255) DEFAULT NULL, seuil_blocs VARCHAR(255) DEFAULT NULL, ect VARCHAR(255) DEFAULT NULL, coeff VARCHAR(255) DEFAULT NULL, seuil VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composante (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composante_user (composante_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_35ED6CE3AC12F1AD (composante_id), INDEX IDX_35ED6CE3A76ED395 (user_id), PRIMARY KEY(composante_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE controle_connaissance (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, session_unique_has_controle_connaissance_id INT DEFAULT NULL, INDEX IDX_55EA1EF87ECF78B0 (cours_id), INDEX IDX_55EA1EF8CCA5EC1C (session_unique_has_controle_connaissance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, code_apogee VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cout_hetd (id INT AUTO_INCREMENT NOT NULL, cout_cm VARCHAR(255) DEFAULT NULL, cout_tp VARCHAR(255) DEFAULT NULL, cout_td VARCHAR(255) DEFAULT NULL, cout_hetdcol VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creationformation (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, modalite_formation_id INT DEFAULT NULL, modalite_pedagogique_id INT DEFAULT NULL, modalite_recrutement_id INT DEFAULT NULL, niveau_requis VARCHAR(255) DEFAULT NULL, nb_etudiants VARCHAR(255) DEFAULT NULL, date_ouverture DATETIME DEFAULT NULL, organisation LONGTEXT DEFAULT NULL, competences LONGTEXT DEFAULT NULL, motivation LONGTEXT DEFAULT NULL, points_spe LONGTEXT DEFAULT NULL, public LONGTEXT DEFAULT NULL, insertion_pro LONGTEXT DEFAULT NULL, concurrence LONGTEXT DEFAULT NULL, partenaires_historique VARCHAR(255) DEFAULT NULL, diversification_peda LONGTEXT DEFAULT NULL, service_diversification TINYINT(1) DEFAULT NULL, mutualisation LONGTEXT DEFAULT NULL, recherche LONGTEXT DEFAULT NULL, equipements LONGTEXT DEFAULT NULL, strategie LONGTEXT DEFAULT NULL, actions LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B4C0DDDD5200282E (formation_id), INDEX IDX_B4C0DDDDD2ACA42A (modalite_formation_id), INDEX IDX_B4C0DDDD2316CC3 (modalite_pedagogique_id), INDEX IDX_B4C0DDDD7CA59BD8 (modalite_recrutement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creationformation_partenaire (creationformation_id INT NOT NULL, partenaire_id INT NOT NULL, INDEX IDX_D5EB295B4CE21A05 (creationformation_id), INDEX IDX_D5EB295B98DE13AC (partenaire_id), PRIMARY KEY(creationformation_id, partenaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, workflow_id INT DEFAULT NULL, intitule VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, date_validation DATETIME DEFAULT NULL, date_limite DATETIME DEFAULT NULL, INDEX IDX_285F75DD2C7C2CBA (workflow_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, composante_id INT DEFAULT NULL, localisation_id INT DEFAULT NULL, type_diplome_id INT DEFAULT NULL, domaine_id INT DEFAULT NULL, mention_id INT DEFAULT NULL, niveau_id INT DEFAULT NULL, user_id INT DEFAULT NULL, structure_haute INT DEFAULT NULL, code_diplome VARCHAR(255) DEFAULT NULL, ecole_doctorale VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, vdi VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, INDEX IDX_404021BFAC12F1AD (composante_id), INDEX IDX_404021BFC68BE09C (localisation_id), INDEX IDX_404021BF3BFB8FC7 (type_diplome_id), INDEX IDX_404021BF4272FC9F (domaine_id), INDEX IDX_404021BF7A4147F0 (mention_id), INDEX IDX_404021BFB3E9C81 (niveau_id), INDEX IDX_404021BFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire_type_cours (id INT AUTO_INCREMENT NOT NULL, horaire_cm VARCHAR(255) DEFAULT NULL, horaire_tp VARCHAR(255) DEFAULT NULL, horaire_td VARCHAR(255) DEFAULT NULL, horaire_autre VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mcc_ue (mcc_id INT NOT NULL, ue_id INT NOT NULL, INDEX IDX_FAD999BE6BA9F475 (mcc_id), INDEX IDX_FAD999BE62E883B1 (ue_id), PRIMARY KEY(mcc_id, ue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modalite_formation (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modalite_pedagogique (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modalite_recrutement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles_user (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, roles_id INT DEFAULT NULL, INDEX IDX_57048B30A76ED395 (user_id), INDEX IDX_57048B3038C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_unique_has_controle_connaissance (id INT AUTO_INCREMENT NOT NULL, competences_id INT DEFAULT NULL, INDEX IDX_7913F650A660B158 (competences_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_diplome_mention (type_diplome_id INT NOT NULL, mention_id INT NOT NULL, INDEX IDX_5F2BD47B3BFB8FC7 (type_diplome_id), INDEX IDX_5F2BD47B7A4147F0 (mention_id), PRIMARY KEY(type_diplome_id, mention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_roles (user_id INT NOT NULL, roles_id INT NOT NULL, INDEX IDX_54FCD59FA76ED395 (user_id), INDEX IDX_54FCD59F38C751C4 (roles_id), PRIMARY KEY(user_id, roles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow_user (workflow_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C80CC6722C7C2CBA (workflow_id), INDEX IDX_C80CC672A76ED395 (user_id), PRIMARY KEY(workflow_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracteristiques ADD CONSTRAINT FK_61B5DA1D3BFB8FC7 FOREIGN KEY (type_diplome_id) REFERENCES type_diplome (id)');
        $this->addSql('ALTER TABLE caracteristiques_niveau ADD CONSTRAINT FK_5CFDC1ADB2639FE4 FOREIGN KEY (caracteristiques_id) REFERENCES caracteristiques (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caracteristiques_niveau ADD CONSTRAINT FK_5CFDC1ADB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composante_user ADD CONSTRAINT FK_35ED6CE3AC12F1AD FOREIGN KEY (composante_id) REFERENCES composante (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composante_user ADD CONSTRAINT FK_35ED6CE3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE controle_connaissance ADD CONSTRAINT FK_55EA1EF87ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE controle_connaissance ADD CONSTRAINT FK_55EA1EF8CCA5EC1C FOREIGN KEY (session_unique_has_controle_connaissance_id) REFERENCES session_unique_has_controle_connaissance (id)');
        $this->addSql('ALTER TABLE creationformation ADD CONSTRAINT FK_B4C0DDDD5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE creationformation ADD CONSTRAINT FK_B4C0DDDDD2ACA42A FOREIGN KEY (modalite_formation_id) REFERENCES modalite_formation (id)');
        $this->addSql('ALTER TABLE creationformation ADD CONSTRAINT FK_B4C0DDDD2316CC3 FOREIGN KEY (modalite_pedagogique_id) REFERENCES modalite_pedagogique (id)');
        $this->addSql('ALTER TABLE creationformation ADD CONSTRAINT FK_B4C0DDDD7CA59BD8 FOREIGN KEY (modalite_recrutement_id) REFERENCES modalite_recrutement (id)');
        $this->addSql('ALTER TABLE creationformation_partenaire ADD CONSTRAINT FK_D5EB295B4CE21A05 FOREIGN KEY (creationformation_id) REFERENCES creationformation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE creationformation_partenaire ADD CONSTRAINT FK_D5EB295B98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD2C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFAC12F1AD FOREIGN KEY (composante_id) REFERENCES composante (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFC68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF3BFB8FC7 FOREIGN KEY (type_diplome_id) REFERENCES type_diplome (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF7A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE mcc_ue ADD CONSTRAINT FK_FAD999BE6BA9F475 FOREIGN KEY (mcc_id) REFERENCES mcc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mcc_ue ADD CONSTRAINT FK_FAD999BE62E883B1 FOREIGN KEY (ue_id) REFERENCES ue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roles_user ADD CONSTRAINT FK_57048B30A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE roles_user ADD CONSTRAINT FK_57048B3038C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE session_unique_has_controle_connaissance ADD CONSTRAINT FK_7913F650A660B158 FOREIGN KEY (competences_id) REFERENCES competences (id)');
        $this->addSql('ALTER TABLE type_diplome_mention ADD CONSTRAINT FK_5F2BD47B3BFB8FC7 FOREIGN KEY (type_diplome_id) REFERENCES type_diplome (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_diplome_mention ADD CONSTRAINT FK_5F2BD47B7A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59F38C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_user ADD CONSTRAINT FK_C80CC6722C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_user ADD CONSTRAINT FK_C80CC672A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE session_unique_has_type_controle');
        $this->addSql('DROP TABLE type_controle');
        $this->addSql('DROP TABLE type_diplome_has_diplome_etablissement');
        $this->addSql('ALTER TABLE domaine CHANGE libelle_domaine libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_BFD3CE8F5200282E ON localisation');
        $this->addSql('ALTER TABLE localisation DROP formation_id');
        $this->addSql('DROP INDEX IDX_252589E7B3E9C81 ON mcc');
        $this->addSql('ALTER TABLE mcc ADD statut VARCHAR(255) DEFAULT NULL, ADD niveau VARCHAR(255) DEFAULT NULL, DROP site, DROP contact, DROP type_diplome, CHANGE niveau_id formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E76E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E77A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E75200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_252589E75200282E ON mcc (formation_id)');
        $this->addSql('ALTER TABLE mention CHANGE libelle_mention libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE mention ADD CONSTRAINT FK_E20259CD4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('DROP INDEX IDX_C684FF2020CE246 ON nb_groupe_type_cours');
        $this->addSql('ALTER TABLE nb_groupe_type_cours DROP nb_groupe_type_cours_has_cours_id');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours ADD horaire_type_cours_id INT DEFAULT NULL, ADD cours_id INT DEFAULT NULL, ADD cout_hetd_id INT DEFAULT NULL, ADD nb_groupe_type_cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours ADD CONSTRAINT FK_35711335A65025FA FOREIGN KEY (horaire_type_cours_id) REFERENCES horaire_type_cours (id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours ADD CONSTRAINT FK_357113357ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours ADD CONSTRAINT FK_35711335176A8114 FOREIGN KEY (cout_hetd_id) REFERENCES cout_hetd (id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours ADD CONSTRAINT FK_3571133527FD395D FOREIGN KEY (nb_groupe_type_cours_id) REFERENCES nb_groupe_type_cours (id)');
        $this->addSql('CREATE INDEX IDX_35711335A65025FA ON nb_groupe_type_cours_has_cours (horaire_type_cours_id)');
        $this->addSql('CREATE INDEX IDX_357113357ECF78B0 ON nb_groupe_type_cours_has_cours (cours_id)');
        $this->addSql('CREATE INDEX IDX_35711335176A8114 ON nb_groupe_type_cours_has_cours (cout_hetd_id)');
        $this->addSql('CREATE INDEX IDX_3571133527FD395D ON nb_groupe_type_cours_has_cours (nb_groupe_type_cours_id)');
        $this->addSql('ALTER TABLE niveau CHANGE libelle_niveau libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE parcours ADD user_id INT DEFAULT NULL, ADD libelle VARCHAR(255) DEFAULT NULL, ADD annuel TINYINT(1) DEFAULT NULL, DROP contact, DROP libelle_parcours, DROP annu_ou_semest');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE35200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_99B1DEE3A76ED395 ON parcours (user_id)');
        $this->addSql('ALTER TABLE roles CHANGE libelle_role libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE semestre ADD mention_id INT DEFAULT NULL, ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE semestre ADD CONSTRAINT FK_71688FBC6E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE semestre ADD CONSTRAINT FK_71688FBC7A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('ALTER TABLE semestre ADD CONSTRAINT FK_71688FBC5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_71688FBC7A4147F0 ON semestre (mention_id)');
        $this->addSql('CREATE INDEX IDX_71688FBC5200282E ON semestre (formation_id)');
        $this->addSql('DROP INDEX IDX_DFC95C2E469ACDE3 ON session_unique');
        $this->addSql('ALTER TABLE session_unique DROP type_controle, CHANGE session_unique_has_type_controle_id session_unique_has_controle_connaissance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session_unique ADD CONSTRAINT FK_DFC95C2ECCA5EC1C FOREIGN KEY (session_unique_has_controle_connaissance_id) REFERENCES session_unique_has_controle_connaissance (id)');
        $this->addSql('CREATE INDEX IDX_DFC95C2ECCA5EC1C ON session_unique (session_unique_has_controle_connaissance_id)');
        $this->addSql('DROP INDEX IDX_C36D22BBA6FFED1C ON type_diplome');
        $this->addSql('DROP INDEX IDX_C36D22BB5200282E ON type_diplome');
        $this->addSql('ALTER TABLE type_diplome ADD libelle VARCHAR(255) DEFAULT NULL, DROP formation_id, DROP type_diplome_has_diplome_etablissement_id');
        $this->addSql('DROP INDEX IDX_2E490A9BE4D4012B ON ue');
        $this->addSql('ALTER TABLE ue DROP m_cc_id, CHANGE libelle_ue libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ue_cours ADD CONSTRAINT FK_9E2CE27C62E883B1 FOREIGN KEY (ue_id) REFERENCES ue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ue_cours ADD CONSTRAINT FK_9E2CE27C7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX IDX_8D93D6492C7C2CBA ON user');
        $this->addSql('ALTER TABLE user DROP workflow_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracteristiques_niveau DROP FOREIGN KEY FK_5CFDC1ADB2639FE4');
        $this->addSql('ALTER TABLE session_unique_has_controle_connaissance DROP FOREIGN KEY FK_7913F650A660B158');
        $this->addSql('ALTER TABLE composante_user DROP FOREIGN KEY FK_35ED6CE3AC12F1AD');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFAC12F1AD');
        $this->addSql('ALTER TABLE controle_connaissance DROP FOREIGN KEY FK_55EA1EF87ECF78B0');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_357113357ECF78B0');
        $this->addSql('ALTER TABLE ue_cours DROP FOREIGN KEY FK_9E2CE27C7ECF78B0');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_35711335176A8114');
        $this->addSql('ALTER TABLE creationformation_partenaire DROP FOREIGN KEY FK_D5EB295B4CE21A05');
        $this->addSql('ALTER TABLE creationformation DROP FOREIGN KEY FK_B4C0DDDD5200282E');
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E75200282E');
        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE35200282E');
        $this->addSql('ALTER TABLE semestre DROP FOREIGN KEY FK_71688FBC5200282E');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_35711335A65025FA');
        $this->addSql('ALTER TABLE creationformation DROP FOREIGN KEY FK_B4C0DDDDD2ACA42A');
        $this->addSql('ALTER TABLE creationformation DROP FOREIGN KEY FK_B4C0DDDD2316CC3');
        $this->addSql('ALTER TABLE creationformation DROP FOREIGN KEY FK_B4C0DDDD7CA59BD8');
        $this->addSql('ALTER TABLE creationformation_partenaire DROP FOREIGN KEY FK_D5EB295B98DE13AC');
        $this->addSql('ALTER TABLE controle_connaissance DROP FOREIGN KEY FK_55EA1EF8CCA5EC1C');
        $this->addSql('ALTER TABLE session_unique DROP FOREIGN KEY FK_DFC95C2ECCA5EC1C');
        $this->addSql('CREATE TABLE session_unique_has_type_controle (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_controle (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, session_unique_has_type_controle_id INT DEFAULT NULL, INDEX IDX_C3C61E92469ACDE3 (session_unique_has_type_controle_id), INDEX IDX_C3C61E927ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_diplome_has_diplome_etablissement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE caracteristiques');
        $this->addSql('DROP TABLE caracteristiques_niveau');
        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE composante');
        $this->addSql('DROP TABLE composante_user');
        $this->addSql('DROP TABLE controle_connaissance');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cout_hetd');
        $this->addSql('DROP TABLE creationformation');
        $this->addSql('DROP TABLE creationformation_partenaire');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE horaire_type_cours');
        $this->addSql('DROP TABLE mcc_ue');
        $this->addSql('DROP TABLE modalite_formation');
        $this->addSql('DROP TABLE modalite_pedagogique');
        $this->addSql('DROP TABLE modalite_recrutement');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE roles_user');
        $this->addSql('DROP TABLE session_unique_has_controle_connaissance');
        $this->addSql('DROP TABLE type_diplome_mention');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE workflow_user');
        $this->addSql('ALTER TABLE domaine CHANGE libelle libelle_domaine VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE localisation ADD formation_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_BFD3CE8F5200282E ON localisation (formation_id)');
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E76E38C0DB');
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E77A4147F0');
        $this->addSql('DROP INDEX IDX_252589E75200282E ON mcc');
        $this->addSql('ALTER TABLE mcc ADD site VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD contact VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD type_diplome VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP statut, DROP niveau, CHANGE formation_id niveau_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_252589E7B3E9C81 ON mcc (niveau_id)');
        $this->addSql('ALTER TABLE mention DROP FOREIGN KEY FK_E20259CD4272FC9F');
        $this->addSql('ALTER TABLE mention CHANGE libelle libelle_mention VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nb_groupe_type_cours ADD nb_groupe_type_cours_has_cours_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_C684FF2020CE246 ON nb_groupe_type_cours (nb_groupe_type_cours_has_cours_id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_3571133527FD395D');
        $this->addSql('DROP INDEX IDX_35711335A65025FA ON nb_groupe_type_cours_has_cours');
        $this->addSql('DROP INDEX IDX_357113357ECF78B0 ON nb_groupe_type_cours_has_cours');
        $this->addSql('DROP INDEX IDX_35711335176A8114 ON nb_groupe_type_cours_has_cours');
        $this->addSql('DROP INDEX IDX_3571133527FD395D ON nb_groupe_type_cours_has_cours');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP horaire_type_cours_id, DROP cours_id, DROP cout_hetd_id, DROP nb_groupe_type_cours_id');
        $this->addSql('ALTER TABLE niveau CHANGE libelle libelle_niveau VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE3A76ED395');
        $this->addSql('DROP INDEX IDX_99B1DEE3A76ED395 ON parcours');
        $this->addSql('ALTER TABLE parcours ADD libelle_parcours VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD annu_ou_semest VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP user_id, DROP annuel, CHANGE libelle contact VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE roles CHANGE libelle libelle_role VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE semestre DROP FOREIGN KEY FK_71688FBC6E38C0DB');
        $this->addSql('ALTER TABLE semestre DROP FOREIGN KEY FK_71688FBC7A4147F0');
        $this->addSql('DROP INDEX IDX_71688FBC7A4147F0 ON semestre');
        $this->addSql('DROP INDEX IDX_71688FBC5200282E ON semestre');
        $this->addSql('ALTER TABLE semestre DROP mention_id, DROP formation_id');
        $this->addSql('DROP INDEX IDX_DFC95C2ECCA5EC1C ON session_unique');
        $this->addSql('ALTER TABLE session_unique ADD type_controle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE session_unique_has_controle_connaissance_id session_unique_has_type_controle_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_DFC95C2E469ACDE3 ON session_unique (session_unique_has_type_controle_id)');
        $this->addSql('ALTER TABLE type_diplome ADD formation_id INT DEFAULT NULL, ADD type_diplome_has_diplome_etablissement_id INT DEFAULT NULL, DROP libelle');
        $this->addSql('CREATE INDEX IDX_C36D22BBA6FFED1C ON type_diplome (type_diplome_has_diplome_etablissement_id)');
        $this->addSql('CREATE INDEX IDX_C36D22BB5200282E ON type_diplome (formation_id)');
        $this->addSql('ALTER TABLE ue ADD m_cc_id INT DEFAULT NULL, CHANGE libelle libelle_ue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE INDEX IDX_2E490A9BE4D4012B ON ue (m_cc_id)');
        $this->addSql('ALTER TABLE ue_cours DROP FOREIGN KEY FK_9E2CE27C62E883B1');
        $this->addSql('ALTER TABLE `user` ADD workflow_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_8D93D6492C7C2CBA ON `user` (workflow_id)');
    }
}
