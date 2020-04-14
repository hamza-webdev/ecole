<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413141828 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, adresse_p1_id INT DEFAULT NULL, numero INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(100) NOT NULL, INDEX IDX_C35F08168127E502 (adresse_p1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civilite (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classeroom (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, sexe_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATETIME NOT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, INDEX IDX_ECA105F7448F3B3C (sexe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, coefficient DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_cour (id INT AUTO_INCREMENT NOT NULL, matiere_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX IDX_D4CD1011F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_cour_classeroom (matiere_cour_id INT NOT NULL, classeroom_id INT NOT NULL, INDEX IDX_CD313091D4B2A0FF (matiere_cour_id), INDEX IDX_CD313091856F58DA (classeroom_id), PRIMARY KEY(matiere_cour_id, classeroom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parent_pere_mere (id INT AUTO_INCREMENT NOT NULL, sexe_p1_id INT DEFAULT NULL, civilite_id INT DEFAULT NULL, user_id INT NOT NULL, sexe_p2_id INT DEFAULT NULL, adresse_p2_id INT DEFAULT NULL, civilite_p2_id INT DEFAULT NULL, situation_familiale_id INT DEFAULT NULL, name_p1 VARCHAR(255) NOT NULL, prenom_p1 VARCHAR(255) DEFAULT NULL, email_p1 VARCHAR(255) DEFAULT NULL, telephone_p1 VARCHAR(20) DEFAULT NULL, name_p2 VARCHAR(255) DEFAULT NULL, prenom_p2 VARCHAR(255) DEFAULT NULL, email_p2 VARCHAR(255) DEFAULT NULL, telephone_p2 VARCHAR(255) DEFAULT NULL, INDEX IDX_41E6F90D9BA6A26A (sexe_p1_id), INDEX IDX_41E6F90D39194ABF (civilite_id), UNIQUE INDEX UNIQ_41E6F90DA76ED395 (user_id), INDEX IDX_41E6F90D89130D84 (sexe_p2_id), UNIQUE INDEX UNIQ_41E6F90D93924AEC (adresse_p2_id), INDEX IDX_41E6F90D4528D6E6 (civilite_p2_id), INDEX IDX_41E6F90DF11CEA43 (situation_familiale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexe (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE situation_familialle (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, classeroom VARCHAR(50) NOT NULL, desciption VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_examin (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F08168127E502 FOREIGN KEY (adresse_p1_id) REFERENCES parent_pere_mere (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE matiere_cour ADD CONSTRAINT FK_D4CD1011F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE matiere_cour_classeroom ADD CONSTRAINT FK_CD313091D4B2A0FF FOREIGN KEY (matiere_cour_id) REFERENCES matiere_cour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_cour_classeroom ADD CONSTRAINT FK_CD313091856F58DA FOREIGN KEY (classeroom_id) REFERENCES classeroom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90D9BA6A26A FOREIGN KEY (sexe_p1_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90D39194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90D89130D84 FOREIGN KEY (sexe_p2_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90D93924AEC FOREIGN KEY (adresse_p2_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90D4528D6E6 FOREIGN KEY (civilite_p2_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE parent_pere_mere ADD CONSTRAINT FK_41E6F90DF11CEA43 FOREIGN KEY (situation_familiale_id) REFERENCES situation_familialle (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90D93924AEC');
        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90D39194ABF');
        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90D4528D6E6');
        $this->addSql('ALTER TABLE matiere_cour_classeroom DROP FOREIGN KEY FK_CD313091856F58DA');
        $this->addSql('ALTER TABLE matiere_cour DROP FOREIGN KEY FK_D4CD1011F46CD258');
        $this->addSql('ALTER TABLE matiere_cour_classeroom DROP FOREIGN KEY FK_CD313091D4B2A0FF');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F08168127E502');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7448F3B3C');
        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90D9BA6A26A');
        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90D89130D84');
        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90DF11CEA43');
        $this->addSql('ALTER TABLE parent_pere_mere DROP FOREIGN KEY FK_41E6F90DA76ED395');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE classeroom');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE matiere_cour');
        $this->addSql('DROP TABLE matiere_cour_classeroom');
        $this->addSql('DROP TABLE parent_pere_mere');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP TABLE situation_familialle');
        $this->addSql('DROP TABLE type_examin');
        $this->addSql('DROP TABLE user');
    }
}
