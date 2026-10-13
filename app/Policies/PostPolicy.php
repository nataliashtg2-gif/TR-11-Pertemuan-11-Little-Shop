<?php
namespace App\Policies;
use App\Models\Product; use App\Models\User;
class PostPolicy { public function update(User $u,Product $p):bool{return in_array($u->role,['admin','editor'],true);} public function delete(User $u,Product $p):bool{return $u->role==='admin';} }
