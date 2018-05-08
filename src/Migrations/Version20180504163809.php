<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180504163809 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, titre_categorie VARCHAR(100) NOT NULL, desc_categorie LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, tache_id INT DEFAULT NULL, creation_date_comment DATE DEFAULT NULL, comment_text LONGTEXT NOT NULL, INDEX IDX_9474526CD2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goal (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, titre_goal VARCHAR(100) NOT NULL, desc_goal LONGTEXT NOT NULL, creation_date_goal DATE DEFAULT NULL, INDEX IDX_FCDCEB2EBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, goal_id INT DEFAULT NULL, titre_tache VARCHAR(100) NOT NULL, value_tache INT NOT NULL, pers_tache INT NOT NULL, desc_tache LONGTEXT NOT NULL, creation_date_tache DATE DEFAULT NULL, dead_line_tache DATE DEFAULT NULL, INDEX IDX_93872075667D1AFE (goal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CD2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2EBCF5E72D');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075667D1AFE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CD2235D39');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE goal');
        $this->addSql('DROP TABLE tache');
    }
}
