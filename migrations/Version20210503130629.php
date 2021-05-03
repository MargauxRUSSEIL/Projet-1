<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503130629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session_unique_controle_connaissance (session_unique_id INT NOT NULL, controle_connaissance_id INT NOT NULL, INDEX IDX_E9B633B4A024C649 (session_unique_id), INDEX IDX_E9B633B44908D3B4 (controle_connaissance_id), PRIMARY KEY(session_unique_id, controle_connaissance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_unique_controle_connaissance ADD CONSTRAINT FK_E9B633B4A024C649 FOREIGN KEY (session_unique_id) REFERENCES session_unique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_unique_controle_connaissance ADD CONSTRAINT FK_E9B633B44908D3B4 FOREIGN KEY (controle_connaissance_id) REFERENCES controle_connaissance (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE controle_connaissance_session_unique');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE controle_connaissance_session_unique (controle_connaissance_id INT NOT NULL, session_unique_id INT NOT NULL, INDEX IDX_19D53AAE4908D3B4 (controle_connaissance_id), INDEX IDX_19D53AAEA024C649 (session_unique_id), PRIMARY KEY(controle_connaissance_id, session_unique_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE controle_connaissance_session_unique ADD CONSTRAINT FK_19D53AAE4908D3B4 FOREIGN KEY (controle_connaissance_id) REFERENCES controle_connaissance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE controle_connaissance_session_unique ADD CONSTRAINT FK_19D53AAEA024C649 FOREIGN KEY (session_unique_id) REFERENCES session_unique (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE session_unique_controle_connaissance');
    }
}
