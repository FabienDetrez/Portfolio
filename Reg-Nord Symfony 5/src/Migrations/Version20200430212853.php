<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430212853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(150) NOT NULL, email VARCHAR(100) NOT NULL, sujet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, entreprise VARCHAR(100) NOT NULL, telephone VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, statut TINYINT(1) DEFAULT NULL, texte LONGTEXT NOT NULL, logo VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, statut TINYINT(1) DEFAULT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_5A6F91CEEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(100) NOT NULL, texte LONGTEXT DEFAULT NULL, carousel TINYINT(1) DEFAULT NULL, marquee TINYINT(1) DEFAULT NULL, produit TINYINT(1) DEFAULT NULL, statut TINYINT(1) DEFAULT NULL, gallerie TINYINT(1) DEFAULT NULL, filename VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_6A2CA10CCD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, marques_id INT DEFAULT NULL, gammes_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, reference VARCHAR(100) DEFAULT NULL, descriptif LONGTEXT NOT NULL, statut TINYINT(1) DEFAULT NULL, INDEX IDX_29A5EC27C256483C (marques_id), INDEX IDX_29A5EC272D19822A (gammes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CEEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CCD11A2CF FOREIGN KEY (produits_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C256483C FOREIGN KEY (marques_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272D19822A FOREIGN KEY (gammes_id) REFERENCES gamme (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272D19822A');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C256483C');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CEEA9FDD75');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CCD11A2CF');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE gamme');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
    }
}
