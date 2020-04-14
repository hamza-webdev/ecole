<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413144148 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE examin (id INT AUTO_INCREMENT NOT NULL, matiere_cour_id INT DEFAULT NULL, proffesseur_id INT DEFAULT NULL, type_examin_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX IDX_FDF9C0E0D4B2A0FF (matiere_cour_id), INDEX IDX_FDF9C0E07B4C535 (proffesseur_id), INDEX IDX_FDF9C0E074FEC98B (type_examin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examin_classeroom (examin_id INT NOT NULL, classeroom_id INT NOT NULL, INDEX IDX_4F89EFD7C038889B (examin_id), INDEX IDX_4F89EFD7856F58DA (classeroom_id), PRIMARY KEY(examin_id, classeroom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_examin_eleve (id INT AUTO_INCREMENT NOT NULL, examin_id INT DEFAULT NULL, matiere_cour_id INT DEFAULT NULL, proffesseur_id INT DEFAULT NULL, classeroom_id INT DEFAULT NULL, eleve_id INT DEFAULT NULL, note DOUBLE PRECISION NOT NULL, INDEX IDX_424E6DA4C038889B (examin_id), INDEX IDX_424E6DA4D4B2A0FF (matiere_cour_id), INDEX IDX_424E6DA47B4C535 (proffesseur_id), INDEX IDX_424E6DA4856F58DA (classeroom_id), INDEX IDX_424E6DA4A6CC7B2 (eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proffesseur (id INT AUTO_INCREMENT NOT NULL, sexe_id INT NOT NULL, civilite_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, INDEX IDX_27BFB7C0448F3B3C (sexe_id), INDEX IDX_27BFB7C039194ABF (civilite_id), UNIQUE INDEX UNIQ_27BFB7C0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE examin ADD CONSTRAINT FK_FDF9C0E0D4B2A0FF FOREIGN KEY (matiere_cour_id) REFERENCES matiere_cour (id)');
        $this->addSql('ALTER TABLE examin ADD CONSTRAINT FK_FDF9C0E07B4C535 FOREIGN KEY (proffesseur_id) REFERENCES proffesseur (id)');
        $this->addSql('ALTER TABLE examin ADD CONSTRAINT FK_FDF9C0E074FEC98B FOREIGN KEY (type_examin_id) REFERENCES type_examin (id)');
        $this->addSql('ALTER TABLE examin_classeroom ADD CONSTRAINT FK_4F89EFD7C038889B FOREIGN KEY (examin_id) REFERENCES examin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examin_classeroom ADD CONSTRAINT FK_4F89EFD7856F58DA FOREIGN KEY (classeroom_id) REFERENCES classeroom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_examin_eleve ADD CONSTRAINT FK_424E6DA4C038889B FOREIGN KEY (examin_id) REFERENCES examin (id)');
        $this->addSql('ALTER TABLE note_examin_eleve ADD CONSTRAINT FK_424E6DA4D4B2A0FF FOREIGN KEY (matiere_cour_id) REFERENCES matiere_cour (id)');
        $this->addSql('ALTER TABLE note_examin_eleve ADD CONSTRAINT FK_424E6DA47B4C535 FOREIGN KEY (proffesseur_id) REFERENCES proffesseur (id)');
        $this->addSql('ALTER TABLE note_examin_eleve ADD CONSTRAINT FK_424E6DA4856F58DA FOREIGN KEY (classeroom_id) REFERENCES classeroom (id)');
        $this->addSql('ALTER TABLE note_examin_eleve ADD CONSTRAINT FK_424E6DA4A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE proffesseur ADD CONSTRAINT FK_27BFB7C0448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE proffesseur ADD CONSTRAINT FK_27BFB7C039194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE proffesseur ADD CONSTRAINT FK_27BFB7C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE adresse CHANGE adresse_p1_id adresse_p1_id INT DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classeroom CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD user_id INT NOT NULL, ADD parent_p1_p2_id INT DEFAULT NULL, ADD classeroom_id INT DEFAULT NULL, CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F79F833A2B FOREIGN KEY (parent_p1_p2_id) REFERENCES parent_pere_mere (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7856F58DA FOREIGN KEY (classeroom_id) REFERENCES classeroom (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ECA105F7A76ED395 ON eleve (user_id)');
        $this->addSql('CREATE INDEX IDX_ECA105F79F833A2B ON eleve (parent_p1_p2_id)');
        $this->addSql('CREATE INDEX IDX_ECA105F7856F58DA ON eleve (classeroom_id)');
        $this->addSql('ALTER TABLE matiere CHANGE coefficient coefficient DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere_cour ADD proffesseur_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere_cour ADD CONSTRAINT FK_D4CD10117B4C535 FOREIGN KEY (proffesseur_id) REFERENCES proffesseur (id)');
        $this->addSql('CREATE INDEX IDX_D4CD10117B4C535 ON matiere_cour (proffesseur_id)');
        $this->addSql('ALTER TABLE parent_pere_mere CHANGE sexe_p1_id sexe_p1_id INT DEFAULT NULL, CHANGE civilite_id civilite_id INT DEFAULT NULL, CHANGE sexe_p2_id sexe_p2_id INT DEFAULT NULL, CHANGE adresse_p2_id adresse_p2_id INT DEFAULT NULL, CHANGE civilite_p2_id civilite_p2_id INT DEFAULT NULL, CHANGE situation_familiale_id situation_familiale_id INT DEFAULT NULL, CHANGE prenom_p1 prenom_p1 VARCHAR(255) DEFAULT NULL, CHANGE email_p1 email_p1 VARCHAR(255) DEFAULT NULL, CHANGE telephone_p1 telephone_p1 VARCHAR(20) DEFAULT NULL, CHANGE name_p2 name_p2 VARCHAR(255) DEFAULT NULL, CHANGE prenom_p2 prenom_p2 VARCHAR(255) DEFAULT NULL, CHANGE email_p2 email_p2 VARCHAR(255) DEFAULT NULL, CHANGE telephone_p2 telephone_p2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE situation_familialle CHANGE desciption desciption VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE examin_classeroom DROP FOREIGN KEY FK_4F89EFD7C038889B');
        $this->addSql('ALTER TABLE note_examin_eleve DROP FOREIGN KEY FK_424E6DA4C038889B');
        $this->addSql('ALTER TABLE examin DROP FOREIGN KEY FK_FDF9C0E07B4C535');
        $this->addSql('ALTER TABLE matiere_cour DROP FOREIGN KEY FK_D4CD10117B4C535');
        $this->addSql('ALTER TABLE note_examin_eleve DROP FOREIGN KEY FK_424E6DA47B4C535');
        $this->addSql('DROP TABLE examin');
        $this->addSql('DROP TABLE examin_classeroom');
        $this->addSql('DROP TABLE note_examin_eleve');
        $this->addSql('DROP TABLE proffesseur');
        $this->addSql('ALTER TABLE adresse CHANGE adresse_p1_id adresse_p1_id INT DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classeroom CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7A76ED395');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F79F833A2B');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7856F58DA');
        $this->addSql('DROP INDEX UNIQ_ECA105F7A76ED395 ON eleve');
        $this->addSql('DROP INDEX IDX_ECA105F79F833A2B ON eleve');
        $this->addSql('DROP INDEX IDX_ECA105F7856F58DA ON eleve');
        $this->addSql('ALTER TABLE eleve DROP user_id, DROP parent_p1_p2_id, DROP classeroom_id, CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE matiere CHANGE coefficient coefficient DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX IDX_D4CD10117B4C535 ON matiere_cour');
        $this->addSql('ALTER TABLE matiere_cour DROP proffesseur_id, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE parent_pere_mere CHANGE sexe_p1_id sexe_p1_id INT DEFAULT NULL, CHANGE civilite_id civilite_id INT DEFAULT NULL, CHANGE sexe_p2_id sexe_p2_id INT DEFAULT NULL, CHANGE adresse_p2_id adresse_p2_id INT DEFAULT NULL, CHANGE civilite_p2_id civilite_p2_id INT DEFAULT NULL, CHANGE situation_familiale_id situation_familiale_id INT DEFAULT NULL, CHANGE prenom_p1 prenom_p1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email_p1 email_p1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_p1 telephone_p1 VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE name_p2 name_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_p2 prenom_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email_p2 email_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_p2 telephone_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE situation_familialle CHANGE desciption desciption VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
