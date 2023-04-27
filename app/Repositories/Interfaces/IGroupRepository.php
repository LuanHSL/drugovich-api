<?php

namespace App\Repositories\Interfaces;

use App\Models\Group;
use Illuminate\Support\Collection;

interface IGroupRepository
{
  public function existsById(int $id): bool;
  public function findById(int $id): Group|null;
  public function create(array $newGroup): Group;
  public function update(array $newGroup): Group;
  public function delete(int $id): void;
  public function createOrUpdate(array $newGroup): Group;
  public function all(): Collection;
}
