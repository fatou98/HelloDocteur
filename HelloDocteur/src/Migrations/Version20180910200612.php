<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910200612 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE creneau (id INT AUTO_INCREMENT NOT NULL, creneauitem_id INT DEFAULT NULL, medecin_id INT DEFAULT NULL, heuredebut VARCHAR(30) NOT NULL, heurefin VARCHAR(30) NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_F9668B5F5E99F4DB (creneauitem_id), INDEX IDX_F9668B5F4F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, quartier_id INT DEFAULT NULL, specialite_id INT DEFAULT NULL, matricule VARCHAR(30) NOT NULL, nomcomplet VARCHAR(90) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(30) NOT NULL, adresse VARCHAR(30) NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, image LONGBLOB DEFAULT NULL, INDEX IDX_1BDA53C6DF1E57AB (quartier_id), INDEX IDX_1BDA53C62195E0F0 (specialite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, INDEX IDX_F62F176A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prise_de_rendezvous (id INT AUTO_INCREMENT NOT NULL, creneau_id INT DEFAULT NULL, medecin_id INT DEFAULT NULL, patient_id INT DEFAULT NULL, motif VARCHAR(250) NOT NULL, INDEX IDX_3C4CB6457D0729A9 (creneau_id), INDEX IDX_3C4CB6454F31A84 (medecin_id), INDEX IDX_3C4CB6456B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quartier (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, INDEX IDX_FEE8962D98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE had (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, adresse VARCHAR(50) NOT NULL, tel VARCHAR(30) NOT NULL, motif VARCHAR(250) NOT NULL, INDEX IDX_8FBCBC2D6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_structure (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, nom_complet VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel VARCHAR(30) NOT NULL, ordonnance LONGBLOB NOT NULL, INDEX IDX_A60C9F1F6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(90) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(30) NOT NULL, adresse VARCHAR(30) NOT NULL, image LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure (id INT AUTO_INCREMENT NOT NULL, type_structure_id INT NOT NULL, medecins_id INT DEFAULT NULL, quartier_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(30) NOT NULL, adresse VARCHAR(30) NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, INDEX IDX_6F0137EAA277BA8E (type_structure_id), INDEX IDX_6F0137EADA00906 (medecins_id), INDEX IDX_6F0137EADF1E57AB (quartier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicamments (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prix DOUBLE PRECISION NOT NULL, dosage VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, nomcomplet VARCHAR(30) NOT NULL, login VARCHAR(30) NOT NULL, numpiece BIGINT NOT NULL, adresse VARCHAR(255) NOT NULL, tel BIGINT NOT NULL, password VARCHAR(64) NOT NULL, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649289172D6 (numpiece), UNIQUE INDEX UNIQ_8D93D649F037AB0F (tel), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vsl (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, nom_complet VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel VARCHAR(30) NOT NULL, fiche_maladie LONGBLOB NOT NULL, motif VARCHAR(255) NOT NULL, INDEX IDX_EF2BCAB66B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creneau_item (id INT AUTO_INCREMENT NOT NULL, datecreneau DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, structure_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, INDEX IDX_E7D6FCC12534008B (structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5F5E99F4DB FOREIGN KEY (creneauitem_id) REFERENCES creneau_item (id)');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5F4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6DF1E57AB FOREIGN KEY (quartier_id) REFERENCES quartier (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C62195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE prise_de_rendezvous ADD CONSTRAINT FK_3C4CB6457D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id)');
        $this->addSql('ALTER TABLE prise_de_rendezvous ADD CONSTRAINT FK_3C4CB6454F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE prise_de_rendezvous ADD CONSTRAINT FK_3C4CB6456B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE quartier ADD CONSTRAINT FK_FEE8962D98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE had ADD CONSTRAINT FK_8FBCBC2D6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EAA277BA8E FOREIGN KEY (type_structure_id) REFERENCES type_structure (id)');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EADA00906 FOREIGN KEY (medecins_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EADF1E57AB FOREIGN KEY (quartier_id) REFERENCES quartier (id)');
        $this->addSql('ALTER TABLE vsl ADD CONSTRAINT FK_EF2BCAB66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC12534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prise_de_rendezvous DROP FOREIGN KEY FK_3C4CB6457D0729A9');
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5F4F31A84');
        $this->addSql('ALTER TABLE prise_de_rendezvous DROP FOREIGN KEY FK_3C4CB6454F31A84');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EADA00906');
        $this->addSql('ALTER TABLE quartier DROP FOREIGN KEY FK_FEE8962D98260155');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C6DF1E57AB');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EADF1E57AB');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EAA277BA8E');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176A6E44244');
        $this->addSql('ALTER TABLE prise_de_rendezvous DROP FOREIGN KEY FK_3C4CB6456B899279');
        $this->addSql('ALTER TABLE had DROP FOREIGN KEY FK_8FBCBC2D6B899279');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F6B899279');
        $this->addSql('ALTER TABLE vsl DROP FOREIGN KEY FK_EF2BCAB66B899279');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC12534008B');
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5F5E99F4DB');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C62195E0F0');
        $this->addSql('DROP TABLE creneau');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE prise_de_rendezvous');
        $this->addSql('DROP TABLE quartier');
        $this->addSql('DROP TABLE had');
        $this->addSql('DROP TABLE type_structure');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE structure');
        $this->addSql('DROP TABLE medicamments');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vsl');
        $this->addSql('DROP TABLE creneau_item');
        $this->addSql('DROP TABLE specialite');
    }
}
