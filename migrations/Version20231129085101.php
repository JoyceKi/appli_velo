<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129085101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_coordonnees (user_id INT NOT NULL, coordonnees_id INT NOT NULL, INDEX IDX_A2D325EFA76ED395 (user_id), INDEX IDX_A2D325EF5853DEDF (coordonnees_id), PRIMARY KEY(user_id, coordonnees_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_velo (user_id INT NOT NULL, velo_id INT NOT NULL, INDEX IDX_4FC83D3CA76ED395 (user_id), INDEX IDX_4FC83D3CEC6AC5BD (velo_id), PRIMARY KEY(user_id, velo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE velo_vols (velo_id INT NOT NULL, vols_id INT NOT NULL, INDEX IDX_FFD7B45AEC6AC5BD (velo_id), INDEX IDX_FFD7B45A573E0EFC (vols_id), PRIMARY KEY(velo_id, vols_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_coordonnees ADD CONSTRAINT FK_A2D325EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_coordonnees ADD CONSTRAINT FK_A2D325EF5853DEDF FOREIGN KEY (coordonnees_id) REFERENCES coordonnees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_velo ADD CONSTRAINT FK_4FC83D3CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_velo ADD CONSTRAINT FK_4FC83D3CEC6AC5BD FOREIGN KEY (velo_id) REFERENCES velo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE velo_vols ADD CONSTRAINT FK_FFD7B45AEC6AC5BD FOREIGN KEY (velo_id) REFERENCES velo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE velo_vols ADD CONSTRAINT FK_FFD7B45A573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_coordonnees DROP FOREIGN KEY FK_A2D325EFA76ED395');
        $this->addSql('ALTER TABLE user_coordonnees DROP FOREIGN KEY FK_A2D325EF5853DEDF');
        $this->addSql('ALTER TABLE user_velo DROP FOREIGN KEY FK_4FC83D3CA76ED395');
        $this->addSql('ALTER TABLE user_velo DROP FOREIGN KEY FK_4FC83D3CEC6AC5BD');
        $this->addSql('ALTER TABLE velo_vols DROP FOREIGN KEY FK_FFD7B45AEC6AC5BD');
        $this->addSql('ALTER TABLE velo_vols DROP FOREIGN KEY FK_FFD7B45A573E0EFC');
        $this->addSql('DROP TABLE user_coordonnees');
        $this->addSql('DROP TABLE user_velo');
        $this->addSql('DROP TABLE velo_vols');
    }
}
