<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{

    // Homepage
    public function index(Request $request) : View {

        return view("document.list",[
            //"documents" => Document::with("category")->limit(3)->get(),
            "documents" => Document::all(),
            "categories" => Category::all(),
        ]);
    }


    /**
     * @param \App\Models\Document $doc
     * @return \Illuminate\Contracts\View\View
     */
    public function showPage(Document $doc) : View {
        //Debugbar::debug($doc);
      //  Gate::allows('read-document', $doc);
      // Debugbar::debug(Gate::allows('read-document', $doc));
//        if (! Gate::allows('read-document', $doc)) {
//            abort(403);
//        }
//        Gate::authorize('read-document', $doc); // leve une exception
        //  allows denies none check any @can @cannot @can @cannot @canany
        //authorize denies
        //dd((Gate::inspect('edit-settings', $doc))->);
//        Gate::allowIf(fn (User $user) => $user->isAdministrator());
//        Gate::denyIf(fn (User $user) => $user->banned());

        // With policy
        //        if ($request->user()->cannot('update', $post)) {
        //            abort(403);
        //        }
//        if ($request->user()->cannot('create', Post::class)) {
//            abort(403);
//        }
//        $this->authorize('update', $post);
//        $this->authorize('create', Post::class);

        return view("document.show",[
            "document" => $doc,
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function addFormPage(Request $request): View
    {
        return \view("document.form-add",
            [
                "categories" => Category::all(),
            ]
        );
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addFormAction(Request $request):RedirectResponse  {

        // We save document file in folder inside /docs/(ref_userid)/randomName
        // and retrieve pathFile

        /** @var \Illuminate\Http\UploadedFile $doc */
        $file = $request->file('file');
        $pathFile = $file->store("docs/" . Auth::User()->id);

        // Save All information in database document table
        Document::create([
            'name' => $request->input("name"),
            'category_id' =>$request->input("category_id"),
            'description' => $request->input("description"),
            'source' => $request->input("source"),
            'access' =>$request->input("access"),
            'path' => $pathFile,
            'created_by' => Auth::User()->id,
        ]);

        // Redirect User in Form with success message, to add another doc
        return redirect()->route("document-form-add-page")
                         ->with("success", "Your document had been created in : " .  $pathFile );
    }


    /**
     * @param \App\Models\Document $doc
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadAction(Document $doc) : RedirectResponse|StreamedResponse {

     //   dd(Storage::fileExists($doc->path));
        if(Storage::fileExists($doc->path)){
            return Storage::download($doc->path);

        }
        return redirect()->route("document-show-page",["doc" => $doc])
            ->withErrors(["error-download" => "File not exist in storage"]);

    }



}
