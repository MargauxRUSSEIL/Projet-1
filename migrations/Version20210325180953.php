<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325180953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD mention_id INT DEFAULT NULL, DROP mention');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF7A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id)');
        $this->addSql('CREATE INDEX IDX_404021BF7A4147F0 ON formation (mention_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF7A4147F0');
        $this->addSql('DROP INDEX IDX_404021BF7A4147F0 ON formation');
        $this->addSql('ALTER TABLE formation ADD mention VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP mention_id');
    }
}
