<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417113439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresse CHANGE adresse_p1_id adresse_p1_id INT DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classeroom CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE parent_p1_p2_id parent_p1_p2_id INT DEFAULT NULL, CHANGE classeroom_id classeroom_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE examin CHANGE matiere_cour_id matiere_cour_id INT DEFAULT NULL, CHANGE proffesseur_id proffesseur_id INT DEFAULT NULL, CHANGE type_examin_id type_examin_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE title title VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere CHANGE coefficient coefficient DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere_cour CHANGE proffesseur_id proffesseur_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE note_examin_eleve CHANGE examin_id examin_id INT DEFAULT NULL, CHANGE matiere_cour_id matiere_cour_id INT DEFAULT NULL, CHANGE proffesseur_id proffesseur_id INT DEFAULT NULL, CHANGE classeroom_id classeroom_id INT DEFAULT NULL, CHANGE eleve_id eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parent_pere_mere CHANGE sexe_p1_id sexe_p1_id INT DEFAULT NULL, CHANGE civilite_id civilite_id INT DEFAULT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE sexe_p2_id sexe_p2_id INT DEFAULT NULL, CHANGE adresse_p2_id adresse_p2_id INT DEFAULT NULL, CHANGE civilite_p2_id civilite_p2_id INT DEFAULT NULL, CHANGE situation_familiale_id situation_familiale_id INT DEFAULT NULL, CHANGE prenom_p1 prenom_p1 VARCHAR(255) DEFAULT NULL, CHANGE email_p1 email_p1 VARCHAR(255) DEFAULT NULL, CHANGE telephone_p1 telephone_p1 VARCHAR(20) DEFAULT NULL, CHANGE name_p2 name_p2 VARCHAR(255) DEFAULT NULL, CHANGE prenom_p2 prenom_p2 VARCHAR(255) DEFAULT NULL, CHANGE email_p2 email_p2 VARCHAR(255) DEFAULT NULL, CHANGE telephone_p2 telephone_p2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE proffesseur CHANGE civilite_id civilite_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE situation_familialle CHANGE classeroom classeroom VARCHAR(50) DEFAULT NULL, CHANGE desciption desciption VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresse CHANGE adresse_p1_id adresse_p1_id INT DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classeroom CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE eleve CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE parent_p1_p2_id parent_p1_p2_id INT DEFAULT NULL, CHANGE classeroom_id classeroom_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE examin CHANGE matiere_cour_id matiere_cour_id INT DEFAULT NULL, CHANGE proffesseur_id proffesseur_id INT DEFAULT NULL, CHANGE type_examin_id type_examin_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE matiere CHANGE coefficient coefficient DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE matiere_cour CHANGE proffesseur_id proffesseur_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE note_examin_eleve CHANGE examin_id examin_id INT DEFAULT NULL, CHANGE matiere_cour_id matiere_cour_id INT DEFAULT NULL, CHANGE proffesseur_id proffesseur_id INT DEFAULT NULL, CHANGE classeroom_id classeroom_id INT DEFAULT NULL, CHANGE eleve_id eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parent_pere_mere CHANGE sexe_p1_id sexe_p1_id INT DEFAULT NULL, CHANGE civilite_id civilite_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE sexe_p2_id sexe_p2_id INT DEFAULT NULL, CHANGE adresse_p2_id adresse_p2_id INT DEFAULT NULL, CHANGE civilite_p2_id civilite_p2_id INT DEFAULT NULL, CHANGE situation_familiale_id situation_familiale_id INT DEFAULT NULL, CHANGE prenom_p1 prenom_p1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email_p1 email_p1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_p1 telephone_p1 VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE name_p2 name_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_p2 prenom_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email_p2 email_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_p2 telephone_p2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE proffesseur CHANGE civilite_id civilite_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE situation_familialle CHANGE classeroom classeroom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE desciption desciption VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
