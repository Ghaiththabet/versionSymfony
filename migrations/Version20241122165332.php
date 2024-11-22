<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122165332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9996D90CF');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92D233E95C');
        $this->addSql('ALTER TABLE hackathon DROP FOREIGN KEY FK_8B3AF64FFD02F13');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('DROP TABLE hackathon');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('ALTER TABLE evenement ADD type_evenemnt VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_50159CA9996D90CF ON projet');
        $this->addSql('ALTER TABLE projet CHANGE hackathon_id evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9FD02F13 ON projet (evenement_id)');
        $this->addSql('DROP INDEX UNIQ_A412FA92D233E95C ON quiz');
        $this->addSql('ALTER TABLE quiz ADD question JSON NOT NULL COMMENT \'(DC2Type:json)\', CHANGE resultat_id resultat INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hackathon (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, nom_hack VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, resultat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_8B3AF64FFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, question_enonce VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, question_choix LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', reponse_correcte VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, score INT NOT NULL, commentaire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE hackathon ADD CONSTRAINT FK_8B3AF64FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE evenement DROP type_evenemnt');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9FD02F13');
        $this->addSql('DROP INDEX IDX_50159CA9FD02F13 ON projet');
        $this->addSql('ALTER TABLE projet CHANGE evenement_id hackathon_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9996D90CF ON projet (hackathon_id)');
        $this->addSql('ALTER TABLE quiz DROP question, CHANGE resultat resultat_id INT NOT NULL');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92D233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A412FA92D233E95C ON quiz (resultat_id)');
    }
}
