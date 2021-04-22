<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422185259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CECCA5EC1C');
        $this->addSql('DROP INDEX IDX_DB2077CECCA5EC1C ON competences');
        $this->addSql('ALTER TABLE competences DROP session_unique_has_controle_connaissance_id');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C20CE246');
        $this->addSql('DROP INDEX IDX_FDCA8C9C20CE246 ON cours');
        $this->addSql('ALTER TABLE cours DROP nb_groupe_type_cours_has_cours_id');
        $this->addSql('ALTER TABLE cout_hetd DROP FOREIGN KEY FK_AF8E3C0D20CE246');
        $this->addSql('DROP INDEX IDX_AF8E3C0D20CE246 ON cout_hetd');
        $this->addSql('ALTER TABLE cout_hetd DROP nb_groupe_type_cours_has_cours_id');
        $this->addSql('ALTER TABLE horaire_type_cours DROP FOREIGN KEY FK_323D2DFA20CE246');
        $this->addSql('DROP INDEX IDX_323D2DFA20CE246 ON horaire_type_cours');
        $this->addSql('ALTER TABLE horaire_type_cours DROP nb_groupe_type_cours_has_cours_id');
        $this->addSql('ALTER TABLE nb_groupe_type_cours DROP FOREIGN KEY FK_C684FF2020CE246');
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
        $this->addSql('ALTER TABLE session_unique_has_controle_connaissance ADD competences_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session_unique_has_controle_connaissance ADD CONSTRAINT FK_7913F650A660B158 FOREIGN KEY (competences_id) REFERENCES competences (id)');
        $this->addSql('CREATE INDEX IDX_7913F650A660B158 ON session_unique_has_controle_connaissance (competences_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences ADD session_unique_has_controle_connaissance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CECCA5EC1C FOREIGN KEY (session_unique_has_controle_connaissance_id) REFERENCES session_unique_has_controle_connaissance (id)');
        $this->addSql('CREATE INDEX IDX_DB2077CECCA5EC1C ON competences (session_unique_has_controle_connaissance_id)');
        $this->addSql('ALTER TABLE cours ADD nb_groupe_type_cours_has_cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C20CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C20CE246 ON cours (nb_groupe_type_cours_has_cours_id)');
        $this->addSql('ALTER TABLE cout_hetd ADD nb_groupe_type_cours_has_cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cout_hetd ADD CONSTRAINT FK_AF8E3C0D20CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('CREATE INDEX IDX_AF8E3C0D20CE246 ON cout_hetd (nb_groupe_type_cours_has_cours_id)');
        $this->addSql('ALTER TABLE horaire_type_cours ADD nb_groupe_type_cours_has_cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire_type_cours ADD CONSTRAINT FK_323D2DFA20CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('CREATE INDEX IDX_323D2DFA20CE246 ON horaire_type_cours (nb_groupe_type_cours_has_cours_id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours ADD nb_groupe_type_cours_has_cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nb_groupe_type_cours ADD CONSTRAINT FK_C684FF2020CE246 FOREIGN KEY (nb_groupe_type_cours_has_cours_id) REFERENCES nb_groupe_type_cours_has_cours (id)');
        $this->addSql('CREATE INDEX IDX_C684FF2020CE246 ON nb_groupe_type_cours (nb_groupe_type_cours_has_cours_id)');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_35711335A65025FA');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_357113357ECF78B0');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_35711335176A8114');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP FOREIGN KEY FK_3571133527FD395D');
        $this->addSql('DROP INDEX IDX_35711335A65025FA ON nb_groupe_type_cours_has_cours');
        $this->addSql('DROP INDEX IDX_357113357ECF78B0 ON nb_groupe_type_cours_has_cours');
        $this->addSql('DROP INDEX IDX_35711335176A8114 ON nb_groupe_type_cours_has_cours');
        $this->addSql('DROP INDEX IDX_3571133527FD395D ON nb_groupe_type_cours_has_cours');
        $this->addSql('ALTER TABLE nb_groupe_type_cours_has_cours DROP horaire_type_cours_id, DROP cours_id, DROP cout_hetd_id, DROP nb_groupe_type_cours_id');
        $this->addSql('ALTER TABLE session_unique_has_controle_connaissance DROP FOREIGN KEY FK_7913F650A660B158');
        $this->addSql('DROP INDEX IDX_7913F650A660B158 ON session_unique_has_controle_connaissance');
        $this->addSql('ALTER TABLE session_unique_has_controle_connaissance DROP competences_id');
    }
}
