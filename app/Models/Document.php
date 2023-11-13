<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class Document extends Model
{
    use HasFactory;
    // use HasUuids;

    protected $guarded = [];


    const ACCESS_PUBLIC = 'public';
    const ACCESS_PRIVATE = 'private';


    public function createdBy(): BelongsTo
    {
        return $this->BelongsTo(User::class,'created_by', "id");
    }



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usersWithPermission(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,"documents_users_permissions", "document_id", "user_id")
                   ->withPivot("permission_id")
        ;
    }


    /**
     * @param int $user_id
     * @return \Illuminate\Support\Collection|null
     */
    public function permissionUser( int $user_id): int|null {
        $relation = $this->belongsToMany(User::class,"documents_users_permissions")
            ->withPivot("permission_id")
            ->where("user_id",$user_id)
            ->first()
//            ->select("permission_id")
//            ->get()
        ;

        return $relation ? $relation->pivot->permission_id : null;

    }




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }


    /**
     * @param $userId
     * @return bool
     */
    public function userHasPermissions($userId): bool
    {
        return $this->usersWithPermission()
            ->where(["user_id"=>$userId, "document_id" => $this->id])->exists();
    }


}
