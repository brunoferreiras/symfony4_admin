<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181021180934 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post ADD image_id INT DEFAULT NULL, ADD gallery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D3DA5256D FOREIGN KEY (image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D4E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D3DA5256D ON post (image_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D4E7AF8F ON post (gallery_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D3DA5256D');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D4E7AF8F');
        $this->addSql('DROP INDEX IDX_5A8A6C8D3DA5256D ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8D4E7AF8F ON post');
        $this->addSql('ALTER TABLE post DROP image_id, DROP gallery_id');
    }
}
