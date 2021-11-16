<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116215729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand_games (id INT AUTO_INCREMENT NOT NULL, launchcode VARCHAR(255) NOT NULL, brandid INT NOT NULL, category VARCHAR(255) NOT NULL, hot TINYINT(1) NOT NULL, new TINYINT(1) NOT NULL, INDEX IDX_A4DAE2262D031FDF (launchcode), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (launchcode VARCHAR(255) NOT NULL, game_provider_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, rtp DOUBLE PRECISION DEFAULT NULL, INDEX IDX_232B318CD406EAA8 (game_provider_id), PRIMARY KEY(launchcode)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_brand_block (id INT AUTO_INCREMENT NOT NULL, launchcode VARCHAR(255) NOT NULL, brandid INT NOT NULL, INDEX IDX_6B71C372D031FDF (launchcode), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_country_block (id INT AUTO_INCREMENT NOT NULL, launchcode VARCHAR(255) NOT NULL, brandid INT NOT NULL, country VARCHAR(255) DEFAULT NULL, INDEX IDX_8E1F1EA32D031FDF (launchcode), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_providers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE brand_games ADD CONSTRAINT FK_A4DAE2262D031FDF FOREIGN KEY (launchcode) REFERENCES game (launchcode)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CD406EAA8 FOREIGN KEY (game_provider_id) REFERENCES game_providers (id)');
        $this->addSql('ALTER TABLE game_brand_block ADD CONSTRAINT FK_6B71C372D031FDF FOREIGN KEY (launchcode) REFERENCES game (launchcode)');
        $this->addSql('ALTER TABLE game_country_block ADD CONSTRAINT FK_8E1F1EA32D031FDF FOREIGN KEY (launchcode) REFERENCES game (launchcode)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand_games DROP FOREIGN KEY FK_A4DAE2262D031FDF');
        $this->addSql('ALTER TABLE game_brand_block DROP FOREIGN KEY FK_6B71C372D031FDF');
        $this->addSql('ALTER TABLE game_country_block DROP FOREIGN KEY FK_8E1F1EA32D031FDF');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CD406EAA8');
        $this->addSql('DROP TABLE brand_games');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_brand_block');
        $this->addSql('DROP TABLE game_country_block');
        $this->addSql('DROP TABLE game_providers');
    }
}
