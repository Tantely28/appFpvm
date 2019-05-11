<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190510190107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adidy (id INT AUTO_INCREMENT NOT NULL, mpiangona_id INT DEFAULT NULL, daty_nanefana DATETIME NOT NULL, volana DATETIME NOT NULL, vola VARCHAR(255) NOT NULL, INDEX IDX_B97A5E201BAA7B22 (mpiangona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpiangona (id INT AUTO_INCREMENT NOT NULL, sampana_id INT DEFAULT NULL, anarana VARCHAR(255) NOT NULL, telephone INT NOT NULL, adresy VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, mpandray VARCHAR(5) NOT NULL, INDEX IDX_3840AB68ED5A3FDC (sampana_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sampana (id INT AUTO_INCREMENT NOT NULL, anarana VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temoignage (id INT AUTO_INCREMENT NOT NULL, mpiangona_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, INDEX IDX_BDADBC461BAA7B22 (mpiangona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE toriteny (id_toriteny INT AUTO_INCREMENT NOT NULL, contenu TEXT DEFAULT NULL, PRIMARY KEY(id_toriteny)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaovao (id_vaovao INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, contenu TEXT DEFAULT NULL, PRIMARY KEY(id_vaovao)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adidy ADD CONSTRAINT FK_B97A5E201BAA7B22 FOREIGN KEY (mpiangona_id) REFERENCES mpiangona (id)');
        $this->addSql('ALTER TABLE mpiangona ADD CONSTRAINT FK_3840AB68ED5A3FDC FOREIGN KEY (sampana_id) REFERENCES sampana (id)');
        $this->addSql('ALTER TABLE temoignage ADD CONSTRAINT FK_BDADBC461BAA7B22 FOREIGN KEY (mpiangona_id) REFERENCES mpiangona (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adidy DROP FOREIGN KEY FK_B97A5E201BAA7B22');
        $this->addSql('ALTER TABLE temoignage DROP FOREIGN KEY FK_BDADBC461BAA7B22');
        $this->addSql('ALTER TABLE mpiangona DROP FOREIGN KEY FK_3840AB68ED5A3FDC');
        $this->addSql('DROP TABLE adidy');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE mpiangona');
        $this->addSql('DROP TABLE sampana');
        $this->addSql('DROP TABLE temoignage');
        $this->addSql('DROP TABLE toriteny');
        $this->addSql('DROP TABLE vaovao');
    }
}
