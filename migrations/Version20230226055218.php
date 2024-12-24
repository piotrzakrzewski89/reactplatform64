<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230226055218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'init database';
    }

    public function up(Schema $schema): void
    {
    
        $this->addSql('CREATE DATABASE IF NOT EXISTS symfony');
        $this->addSql('CREATE TABLE IF NOT EXISTS `user` (
        id INT AUTO_INCREMENT NOT NULL,
        email VARCHAR(180) NOT NULL,
        password VARCHAR(255) NOT NULL,
        roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\',
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        UNIQUE INDEX UNIQ_8D93D649E7927C74 (email),
        PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
         $this->addSql('TRUNCATE table user;');

        $password = password_hash('admin', PASSWORD_BCRYPT);

        $this->addSql("INSERT INTO user (email, password, roles) 
        VALUES (
            'omb@omb.com', 
            '".$password."', 
             '[\"ROLE_OMB\"]'
        );
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP DATABASE IF EXISTS symfony');
        $this->addSql('DROP TABLE `user`');
    }
}
