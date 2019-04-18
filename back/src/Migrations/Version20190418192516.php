<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190418192516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE temoignage DROP FOREIGN KEY temoignage_ibfk_1');
        $this->addSql('ALTER TABLE mpiangona DROP FOREIGN KEY mpiangona_ibfk_1');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE mpiangona');
        $this->addSql('DROP TABLE sampana');
        $this->addSql('DROP TABLE temoignage');
        $this->addSql('DROP TABLE toriteny');
        $this->addSql('DROP TABLE vaovao');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mpiangona (id_mpiangona INT AUTO_INCREMENT NOT NULL, id_sampana INT DEFAULT NULL, anaarana VARCHAR(255) NOT NULL COLLATE utf8_general_ci, tel INT DEFAULT NULL, adresy VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, login VARCHAR(255) NOT NULL COLLATE utf8_general_ci, mdp VARCHAR(255) NOT NULL COLLATE utf8_general_ci, INDEX id_sampana (id_sampana), PRIMARY KEY(id_mpiangona)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sampana (id_sampana INT AUTO_INCREMENT NOT NULL, anarana VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(id_sampana)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE temoignage (id_temoignage INT AUTO_INCREMENT NOT NULL, id_mpiangona INT DEFAULT NULL, contenue TEXT DEFAULT NULL COLLATE utf8_general_ci, INDEX id_mpiangona (id_mpiangona), PRIMARY KEY(id_temoignage)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE toriteny (id_toriteny INT AUTO_INCREMENT NOT NULL, contenu TEXT DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(id_toriteny)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vaovao (id_vaovao INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, contenu TEXT DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(id_vaovao)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mpiangona ADD CONSTRAINT mpiangona_ibfk_1 FOREIGN KEY (id_sampana) REFERENCES sampana (id_sampana)');
        $this->addSql('ALTER TABLE temoignage ADD CONSTRAINT temoignage_ibfk_1 FOREIGN KEY (id_mpiangona) REFERENCES mpiangona (id_mpiangona)');
        $this->addSql('DROP TABLE admin');
    }
}
