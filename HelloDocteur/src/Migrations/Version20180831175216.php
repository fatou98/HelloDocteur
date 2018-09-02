<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180831175216 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE type_structure ADD email VARCHAR(50) NOT NULL, ADD tel VARCHAR(50) NOT NULL, ADD adresse VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC12534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('CREATE INDEX IDX_E7D6FCC12534008B ON specialite (structure_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC12534008B');
        $this->addSql('DROP INDEX IDX_E7D6FCC12534008B ON specialite');
        $this->addSql('ALTER TABLE type_structure DROP email, DROP tel, DROP adresse');
    }
}
