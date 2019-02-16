<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentCreateRequest;
use App\Interfaces\DocumentRepository;
use Plank\Mediable\MediaUploader;

class DocumentController extends Controller
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * DocumentsController constructor.
     *
     * @param DocumentRepository $repository
     */
    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $documents = $this->repository->orderBy('created_at', 'desc')->paginate(20);

        if (request()->wantsJson()) {
            return response()->json($documents);
        }

        return view('Frontend.Documents.index', compact('documents'));
    }

    /**
     * Store newly created resource in storage
     * @param DocumentCreateRequest $request
     * @param MediaUploader $mediaUploader
     * @return \Illuminate\Http\JsonResponse
     * @throws \Plank\Mediable\Exceptions\MediaUpload\ConfigurationException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileExistsException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotFoundException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileSizeException
     */
    public function store(DocumentCreateRequest $request, MediaUploader $mediaUploader)
    {
        $data = $request->all();

        $data['uuid'] = $this->repository->generateUniqueIdentifier();
        $data['user_id'] = auth()->user()->id;

        $document = $this->repository->skipPresenter()->create($data);

        $media = $mediaUploader
            ->fromSource($request->file('document'))
            ->toDirectory('uploaded-documents')
            ->useHashForFilename()
            ->onDuplicateIncrement()
            ->upload();

        $document->attachMedia($media, 'documents');

        $response = [
            'message' => 'Document created.',
            'data'    => $document->load('media'),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return response()->json('Document uploaded!');

    }

    /**
     * Download specified document
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($uuid)
    {
        $document = $this->repository
            ->skipPresenter()
            ->with('media')
            ->findByField('uuid', $uuid);

        if ($document) {

            $media = $document[0]->firstMedia('documents');

            $response = response()->download($media->getAbsolutePath());
            $response->headers->set('Content-Type', $media->mime_type);
            $response->headers->set('Content-Disposition', 'inline;filename="' . $media->basename . '"');

            return $response;
        }

        return redirect()->back();
    }
}
