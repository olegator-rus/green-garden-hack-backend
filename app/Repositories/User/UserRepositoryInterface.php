<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function all() : Collection;
    public function createUser(array $input) : Model;
    public function findUsersByIds(array $ids) : Collection;
    public function findUserByEmail(string $email) : Model|null;
    public function findUser(int $id) : Model;
    public function updateUser(int $id, array $input) : Model;
}
