<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180923215040 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vsl ADD etat TINYINT(1) NOT NULL, ADD datedemande DATETIME NOT NULL');
        $this->addSql('ALTER TABLE had ADD etat TINYINT(1) NOT NULL, ADD datedemande DATETIME NOT NULL');
        $this->addSql('ALTER TABLE livraison ADD etat TINYINT(1) NOT NULL, ADD datedemande DATETIME NOT NULL');
        $this->addSql('ALTER TABLE prise_de_rendezvous ADD datedemande DATETIME NOT NULL');
        $this->addSql('DROP INDEX libelle ON quartier');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE had DROP etat, DROP datedemande');
        $this->addSql('ALTER TABLE livraison DROP etat, DROP datedemande');
        $this->addSql('ALTER TABLE prise_de_rendezvous DROP datedemande');
        $this->addSql('CREATE UNIQUE INDEX libelle ON quartier (libelle)');
        $this->addSql('ALTER TABLE vsl DROP etat, DROP datedemande');
    }
}
