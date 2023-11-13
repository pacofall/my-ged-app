<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsUsersPermission extends Model
{
    use HasFactory;

    public $timestamps = false;



    public function getPermissionForDoc(int $docment_id, int $user_id): string {

        return
            $this->where([
                "user_id" => $user_id,
                "docment_id" => $docment_id]
            );

    }


}
