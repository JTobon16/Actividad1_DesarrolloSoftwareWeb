<?php

declare(strict_types=1);

namespace Infrastructure\Adapters\Persistence\MySQL\Repository;

use PDO;
use RuntimeException;
use Application\Ports\Out\SaveUserPort;
use Application\Ports\Out\UpdateUserPort;
use Application\Ports\Out\DeleteUserPort;
use Application\Ports\Out\GetUserByIdPort;
use Application\Ports\Out\GetUserByEmailPort;
use Application\Ports\Out\GetAllUsersPort;
use Infrastructure\Adapters\Persistence\MySQL\Mapper\UserPersistenceMapper;
use Domain\Models\UserModel;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserEmail;

final class UserRepositoryMySQL implements
    SaveUserPort,
    UpdateUserPort,
    DeleteUserPort,
    GetUserByIdPort,
    GetUserByEmailPort,
    GetAllUsersPort
{
    private PDO                  $pdo;
    private UserPersistenceMapper $mapper;

    public function __construct(PDO $pdo, UserPersistenceMapper $mapper)
    {
        $this->pdo    = $pdo;
        $this->mapper = $mapper;
    }

    public function save(UserModel $user): UserModel
    {
        $dto = $this->mapper->fromModelToDto($user);
        $sql = '
            INSERT INTO users (id, name, email, password, role, status, created_at, updated_at)
            VALUES (:id, :name, :email, :password, :role, :status, NOW(), NOW())
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'       => $dto->id(),
            ':name'     => $dto->name(),
            ':email'    => $dto->email(),
            ':password' => $dto->password(),
            ':role'     => $dto->role(),
            ':status'   => $dto->status(),
        ]);

        $saved = $this->FindById(new UserId($dto->id()));
        if ($saved === null) {
            throw new RuntimeException('El usuario no pudo ser recuperado después de guardarse.');
        }
        return $saved;
    }

    public function update(UserModel $user): UserModel
    {
        $dto = $this->mapper->fromModelToDto($user);
        $sql = '
            UPDATE users
            SET name = :name, email = :email, password = :password,
                role = :role, status = :status, updated_at = NOW()
            WHERE id = :id
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'       => $dto->id(),
            ':name'     => $dto->name(),
            ':email'    => $dto->email(),
            ':password' => $dto->password(),
            ':role'     => $dto->role(),
            ':status'   => $dto->status(),
        ]);

        $updated = $this->FindById(new UserId($dto->id()));
        if ($updated === null) {
            throw new RuntimeException('El usuario no pudo ser recuperado después de actualizarse.');
        }
        return $updated;
    }

    public function FindById(UserId $userId): ?UserModel
    {
        $sql  = 'SELECT * FROM users WHERE id = :id LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $userId->value()]);
        $row = $stmt->fetch();
        return $row === false ? null : $this->mapper->fromRowToModel($row);
    }

    public function FindByEmail(UserEmail $email): ?UserModel
    {
        $sql  = 'SELECT * FROM users WHERE email = :email LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email->value()]);
        $row = $stmt->fetch();
        return $row === false ? null : $this->mapper->fromRowToModel($row);
    }

    public function FindAll(): array
    {
        $sql  = 'SELECT * FROM users ORDER BY name ASC';
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll();
        return $this->mapper->fromRowsToModels($rows);
    }

    public function delete(UserId $userId): void
    {
        $sql  = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $userId->value()]);
    }
}
