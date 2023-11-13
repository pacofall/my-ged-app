<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\DocumentsUsersPermission;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IndexController extends Controller
{

    public function index(Request $request) : View {

        $doc =  Document::find(1);

        dump($doc->getPermissionForUser2(1, 6)->get());
        //dump( $doc->getPermissionForUser(7));




//
//        $user_id = 10;
////        dd( document::find(1)->getPermissionForUser( 9)->toArray() );
////        Gate::authorize()
////
////
////            @can()
//        //$myPermissions = Document::find(5)->getPermission( $user_id);
//
//
//        //$myPermissions = Document::getPermission($user);
//
//
//        dd(Document::with("createdBy", "usersWithPermission")->find(1)->toArray());

        return view("homepage",[]);
    }


    public function signIn(Request $request) : View {
        return view("auth.signin");
    }

}


//        dd(User::find(1)->documentsWithPermissions()->get()->toArray());
//        dd(Document::with("usersWithPermission")->find(10)->toArray());
//        $doc =  Document::find(10);
//        $usersWithPermissions = $doc->usersWithPermission()->get();
//        dd($usersWithPermissions->toArray());
//        dd(compact('usersWithPermissions'));
//               dd($usersWithPermissions);
//        foreach ($usersWithPermissions as $l){
//            dump(Permission::find($l->pivot->permission_id)->name);
//        }
//        dump ( $list->toArray());
