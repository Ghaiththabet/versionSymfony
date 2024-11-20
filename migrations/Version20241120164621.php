<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241120164621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT NOT NULL, quiz_id INT NOT NULL, cours_title VARCHAR(50) NOT NULL, cours_desc VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_FDCA8C9CE455FCC0 (enseignant_id), UNIQUE INDEX UNIQ_FDCA8C9C853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_etudiant (cours_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_B6EA8C3E7ECF78B0 (cours_id), INDEX IDX_B6EA8C3EDDEAB1A3 (etudiant_id), PRIMARY KEY(cours_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, event_name VARCHAR(50) NOT NULL, event_date DATE NOT NULL, event_place VARCHAR(50) NOT NULL, event_desc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feedback (id INT AUTO_INCREMENT NOT NULL, etudiants_id INT NOT NULL, contenu VARCHAR(255) NOT NULL, INDEX IDX_D2294458A873A5C6 (etudiants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hackathon (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, nom_hack VARCHAR(50) NOT NULL, resultat VARCHAR(255) NOT NULL, INDEX IDX_8B3AF64FFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, hackathon_id INT NOT NULL, title VARCHAR(50) NOT NULL, projetdesc VARCHAR(255) DEFAULT NULL, INDEX IDX_50159CA9996D90CF (hackathon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, question_enonce VARCHAR(255) NOT NULL, question_choix LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', reponse_correcte VARCHAR(50) NOT NULL, INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, resultat_id INT NOT NULL, quiz_title VARCHAR(50) NOT NULL, quiz_type VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_A412FA92D233E95C (resultat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, score INT NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, evenement_id INT DEFAULT NULL, username VARCHAR(50) NOT NULL, user_email VARCHAR(100) NOT NULL, user_pwd VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', role VARCHAR(255) NOT NULL, INDEX IDX_1483A5E9FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE cours_etudiant ADD CONSTRAINT FK_B6EA8C3E7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_etudiant ADD CONSTRAINT FK_B6EA8C3EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA1BF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3BF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D2294458A873A5C6 FOREIGN KEY (etudiants_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE hackathon ADD CONSTRAINT FK_8B3AF64FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92D233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CE455FCC0');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C853CD175');
        $this->addSql('ALTER TABLE cours_etudiant DROP FOREIGN KEY FK_B6EA8C3E7ECF78B0');
        $this->addSql('ALTER TABLE cours_etudiant DROP FOREIGN KEY FK_B6EA8C3EDDEAB1A3');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA1BF396750');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3BF396750');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458A873A5C6');
        $this->addSql('ALTER TABLE hackathon DROP FOREIGN KEY FK_8B3AF64FFD02F13');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9996D90CF');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92D233E95C');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9FD02F13');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_etudiant');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE feedback');
        $this->addSql('DROP TABLE hackathon');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
