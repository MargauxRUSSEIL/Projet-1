<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325175749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mcc ADD mention_id INT DEFAULT NULL, DROP mention');
        $this->addSql('ALTER TABLE mcc ADD CONSTRAINT FK_252589E77A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('CREATE INDEX IDX_252589E77A4147F0 ON mcc (mention_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mcc DROP FOREIGN KEY FK_252589E77A4147F0');
        $this->addSql('DROP INDEX IDX_252589E77A4147F0 ON mcc');
        $this->addSql('ALTER TABLE mcc ADD mention VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP mention_id');
    }
}
