<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718194038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piso_location (piso_id INT NOT NULL, location_id INT NOT NULL, INDEX IDX_D100DF951AC830AF (piso_id), INDEX IDX_D100DF9564D218E (location_id), PRIMARY KEY(piso_id, location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piso_location ADD CONSTRAINT FK_D100DF951AC830AF FOREIGN KEY (piso_id) REFERENCES piso (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE piso_location ADD CONSTRAINT FK_D100DF9564D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE piso CHANGE size size VARCHAR(5) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piso_location DROP FOREIGN KEY FK_D100DF951AC830AF');
        $this->addSql('ALTER TABLE piso_location DROP FOREIGN KEY FK_D100DF9564D218E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE piso_location');
        $this->addSql('ALTER TABLE piso CHANGE size size INT NOT NULL');
    }
}
