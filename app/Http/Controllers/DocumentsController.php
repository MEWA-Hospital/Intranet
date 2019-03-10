<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Domain\Department\Actions\CreateDocumentAction;
use App\Domain\Department\Actions\DeleteDocumentAction;
use App\Domain\Department\DTO\DocumentData;
use App\Http\Requests\DocumentRequest;
use Domain\Department\Models\Document;
use Yajra\DataTables\DataTables;

/**
 * Class DocumentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DocumentsController extends Controller
{
    public function dataTable()
    {
        $documents = Document::all();

        return DataTables::of($documents)
            ->addColumn('action', function ($document) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu3"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						
						<a href="' . route('admin.documents.edit', $document->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('admin.documents.destroy', $document) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . ' 
						<button type="submit" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete? \')"><i class="icon-trash"></i> Delete</button>
						</form>
						</div>
						</div>
						</div>';
            })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $documents,
            ]);
        }

        return view('Backend.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('Backend.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $documentRequest
     * @param CreateDocumentAction $createDocumentAction
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $documentRequest, CreateDocumentAction $createDocumentAction)
    {
        $createDocumentAction(DocumentData::fromRequest($documentRequest));

        $response = [
            'message' => 'Document created.',
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back()->with('message', $response['message']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DocumentUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DocumentUpdateRequest $request, $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteDocumentAction $deleteDocumentAction
     * @param Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteDocumentAction $deleteDocumentAction, Document $document)
    {
        $deleteDocumentAction($document);

        return redirect()->back()->with('message', 'Document deleted.');
    }
}
