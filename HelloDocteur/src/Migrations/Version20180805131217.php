<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180805131217 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel VARCHAR(30) NOT NULL, ordonnance LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(90) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(30) NOT NULL, adresse VARCHAR(30) NOT NULL, image LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, nomcomplet VARCHAR(30) NOT NULL, login VARCHAR(30) NOT NULL, numpiece BIGINT NOT NULL, adresse VARCHAR(255) NOT NULL, tel BIGINT NOT NULL, password VARCHAR(64) NOT NULL, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649289172D6 (numpiece), UNIQUE INDEX UNIQ_8D93D649F037AB0F (tel), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prise_de_rendezvous (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vsl (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel VARCHAR(30) NOT NULL, fiche_maladie LONGBLOB NOT NULL, motif VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE had (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(50) NOT NULL, tel VARCHAR(30) NOT NULL, fichemaladie LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medecin ADD nomcomplet VARCHAR(90) NOT NULL, DROP prenom, DROP nom, CHANGE quartier_id quartier_id INT DEFAULT NULL, CHANGE specialite_id specialite_id INT DEFAULT NULL, CHANGE latitude latitude DOUBLE PRECISION DEFAULT NULL, CHANGE longitude longitude DOUBLE PRECISION DEFAULT NULL, CHANGE image image LONGBLOB DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE prise_de_rendezvous');
        $this->addSql('DROP TABLE vsl');
        $this->addSql('DROP TABLE had');
        $this->addSql('ALTER TABLE medecin ADD prenom VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, ADD nom VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nomcomplet, CHANGE quartier_id quartier_id INT NOT NULL, CHANGE specialite_id specialite_id INT NOT NULL, CHANGE latitude latitude DOUBLE PRECISION NOT NULL, CHANGE longitude longitude DOUBLE PRECISION NOT NULL, CHANGE image image LONGBLOB NOT NULL');
    }
}
