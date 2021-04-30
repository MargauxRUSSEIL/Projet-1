<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210430130813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE controle_connaissance_session_unique (controle_connaissance_id INT NOT NULL, session_unique_id INT NOT NULL, INDEX IDX_19D53AAE4908D3B4 (controle_connaissance_id), INDEX IDX_19D53AAEA024C649 (session_unique_id), PRIMARY KEY(controle_connaissance_id, session_unique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE controle_connaissance_session_unique ADD CONSTRAINT FK_19D53AAE4908D3B4 FOREIGN KEY (controle_connaissance_id) REFERENCES controle_connaissance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE controle_connaissance_session_unique ADD CONSTRAINT FK_19D53AAEA024C649 FOREIGN KEY (session_unique_id) REFERENCES session_unique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE controle_connaissance DROP FOREIGN KEY FK_55EA1EF8A024C649');
        $this->addSql('DROP INDEX IDX_55EA1EF8A024C649 ON controle_connaissance');
        $this->addSql('ALTER TABLE controle_connaissance DROP session_unique_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE controle_connaissance_session_unique');
        $this->addSql('ALTER TABLE controle_connaissance ADD session_unique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE controle_connaissance ADD CONSTRAINT FK_55EA1EF8A024C649 FOREIGN KEY (session_unique_id) REFERENCES session_unique (id)');
        $this->addSql('CREATE INDEX IDX_55EA1EF8A024C649 ON controle_connaissance (session_unique_id)');
    }
}
