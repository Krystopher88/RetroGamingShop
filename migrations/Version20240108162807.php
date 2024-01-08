<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108162807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7B2E54989D9B62 ON categorys_products (slug)');
        $this->addSql('ALTER TABLE coupons ADD name VARCHAR(128) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F5641118989D9B62 ON coupons (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D786EAA989D9B62 ON genres_products (slug)');
        $this->addSql('ALTER TABLE jumbotron ADD name VARCHAR(128) NOT NULL, DROP title');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_848C534A989D9B62 ON jumbotron (slug)');
        $this->addSql('ALTER TABLE news_letters ADD name VARCHAR(128) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ACB1381D989D9B62 ON news_letters (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3B27FD2C989D9B62 ON platforms_products (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3BA5A5A989D9B62 ON products (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_848C534A989D9B62 ON jumbotron');
        $this->addSql('ALTER TABLE jumbotron ADD title VARCHAR(255) NOT NULL, DROP name');
        $this->addSql('DROP INDEX UNIQ_F7B2E54989D9B62 ON categorys_products');
        $this->addSql('DROP INDEX UNIQ_B3BA5A5A989D9B62 ON products');
        $this->addSql('DROP INDEX UNIQ_3B27FD2C989D9B62 ON platforms_products');
        $this->addSql('DROP INDEX UNIQ_ACB1381D989D9B62 ON news_letters');
        $this->addSql('ALTER TABLE news_letters DROP name');
        $this->addSql('DROP INDEX UNIQ_7D786EAA989D9B62 ON genres_products');
        $this->addSql('DROP INDEX UNIQ_F5641118989D9B62 ON coupons');
        $this->addSql('ALTER TABLE coupons DROP name');
    }
}
