<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Frontend;

use App\Domain\Department\Actions\CreateDocumentAction;
use App\Domain\Department\DTO\DocumentData;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use Domain\Department\Models\Document;

class DocumentController extends Controller
{

    public function index()
    {
        $documents = Document::latest()->paginate(20);

        if (request()->wantsJson()) {
            return response()->json($documents);
        }

        return view('Frontend.Documents.index', compact('documents'));
    }

    /**
     * Store newly created resource in storage
     * @param DocumentRequest $documentRequest
     * @param CreateDocumentAction $createDocumentAction
     * @return \Illuminate\Http\JsonResponse
     * @throws \Plank\Mediable\Exceptions\MediaUpload\ConfigurationException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileExistsException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotFoundException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileSizeException
     */
    public function store(
        DocumentRequest $documentRequest,
        CreateDocumentAction $createDocumentAction
    ) {
        $document = $createDocumentAction(DocumentData::fromRequest($documentRequest));

        $response = [
            'message' => 'Document created.',
            'data'    => $document->load('media'),
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return response()->json('Document uploaded!');

    }

    /**
     * Download specified resource
     *
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($uuid)
    {
        $document = Document::where('uuid', $uuid)->first();


        if ($document) {

            $media = $document->firstMedia('documents');

            $response = response()->download($media->getAbsolutePath());
            $response->headers->set('Content-Type', $media->mime_type);
            $response->headers->set('Content-Disposition', 'inline;filename="' . $media->basename . '"');

            return $response;
        }

        return redirect()->back();
    }

    /**
     * Remove specified resource from storage
     *
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($uuid)
    {
        $document = Document::where('uuid', $uuid)->first();


        $document->delete();

        $response = [
            'message' => 'Document deleted.',
        ];

        return response()->json($response);

    }
}
