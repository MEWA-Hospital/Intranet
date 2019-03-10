<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\Actions;


use App\Domain\Department\DTO\DocumentData;
use Domain\Department\Models\Document;
use Plank\Mediable\MediaUploader;

class CreateDocumentAction
{
    protected $mediaUploader;

    /**
     * CreateDocumentAction constructor.
     * @param MediaUploader $mediaUploader
     */
    public function __construct(MediaUploader $mediaUploader)
    {
        $this->mediaUploader = $mediaUploader;
    }

    /**
     * @param DocumentData $documentData
     * @return
     * @throws \Plank\Mediable\Exceptions\MediaUpload\ConfigurationException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileExistsException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotFoundException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileSizeException
     */
    public function __invoke(DocumentData $documentData)
    {
        $document = Document::create([
            'uuid'        => $documentData->uuid,
            'name'        => $documentData->name,
            'description' => $documentData->description,
            'user_id'     => $documentData->user_id,
        ]);

        $media = $this->mediaUploader->fromSource($documentData->document)
            ->toDirectory('uploaded-documents')
            ->useHashForFilename()
            ->onDuplicateIncrement()
            ->upload();

        $document->attachMedia($media, 'documents');

        return $document;
    }
}
