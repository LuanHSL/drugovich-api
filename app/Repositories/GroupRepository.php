<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\Interfaces\IGroupRepository;
use Illuminate\Support\Collection;

class GroupRepository implements IGroupRepository
{

  public function existsById(int $id): bool
  {
    return Group::where('id', $id)->exists();
  }

  public function findById(int $id): Group|null
  {
    return Group::where('id', $id)->first();
  }

  public function create(array $newGroup): Group
  {
    return Group::create($newGroup);
  }
  
  public function update(array $newGroup): Group
  {
    $groupUpdated = $this->findById($newGroup["id"]);
    $groupUpdated->name = $newGroup["name"];
    $groupUpdated->save();
    return $groupUpdated;
  }

  public function delete(int $id): void
  {
    $group = $this->findById($id);
    $group->delete();
  }
  
  public function createOrUpdate(array $group): Group
  {
    if (empty($group["id"])) {
      return $this->create($group);
    }
    return $this->update($group);
  }
  
  public function all(): Collection
  {
    return Group::all();
  }
}
