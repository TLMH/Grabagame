<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120430181303 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE booking ADD club_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE61190A32 FOREIGN KEY (club_id) REFERENCES club(id)");
        $this->addSql("CREATE INDEX IDX_E00CEDDE61190A32 ON booking (club_id)");
        $this->addSql("ALTER TABLE club ADD firstBookingTime DATETIME NOT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE61190A32");
        $this->addSql("DROP INDEX IDX_E00CEDDE61190A32 ON booking");
        $this->addSql("ALTER TABLE booking DROP club_id");
        $this->addSql("ALTER TABLE club DROP firstBookingTime");
    }
}
