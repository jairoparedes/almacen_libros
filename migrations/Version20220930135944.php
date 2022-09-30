<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930135944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE autor_libro_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categoria_libro_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE autor_libro (id INT NOT NULL, autor_id INT NOT NULL, libro_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE categoria_libro (id INT NOT NULL, nombre_categoria VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE libro ADD categoria_relacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE libro ADD categoria INT NOT NULL');
        $this->addSql('ALTER TABLE libro ADD CONSTRAINT FK_5799AD2B8F687F84 FOREIGN KEY (categoria_relacion_id) REFERENCES categoria_libro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5799AD2B8F687F84 ON libro (categoria_relacion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE libro DROP CONSTRAINT FK_5799AD2B8F687F84');
        $this->addSql('DROP SEQUENCE autor_libro_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categoria_libro_id_seq CASCADE');
        $this->addSql('DROP TABLE autor_libro');
        $this->addSql('DROP TABLE categoria_libro');
        $this->addSql('DROP INDEX IDX_5799AD2B8F687F84');
        $this->addSql('ALTER TABLE libro DROP categoria_relacion_id');
        $this->addSql('ALTER TABLE libro DROP categoria');
    }
}
