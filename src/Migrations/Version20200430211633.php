<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430211633 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ken_categories ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ken_categories ADD CONSTRAINT FK_F2DE1CA4A76ED395 FOREIGN KEY (user_id) REFERENCES ken_users (id)');
        $this->addSql('CREATE INDEX IDX_F2DE1CA4A76ED395 ON ken_categories (user_id)');
        $this->addSql('ALTER TABLE ken_articles ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ken_articles ADD CONSTRAINT FK_BBAC6076A76ED395 FOREIGN KEY (user_id) REFERENCES ken_users (id)');
        $this->addSql('CREATE INDEX IDX_BBAC6076A76ED395 ON ken_articles (user_id)');
        $this->addSql('ALTER TABLE ken_users ADD roles VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ken_articles DROP FOREIGN KEY FK_BBAC6076A76ED395');
        $this->addSql('DROP INDEX IDX_BBAC6076A76ED395 ON ken_articles');
        $this->addSql('ALTER TABLE ken_articles DROP user_id');
        $this->addSql('ALTER TABLE ken_categories DROP FOREIGN KEY FK_F2DE1CA4A76ED395');
        $this->addSql('DROP INDEX IDX_F2DE1CA4A76ED395 ON ken_categories');
        $this->addSql('ALTER TABLE ken_categories DROP user_id');
        $this->addSql('ALTER TABLE ken_users DROP roles');
    }
}
