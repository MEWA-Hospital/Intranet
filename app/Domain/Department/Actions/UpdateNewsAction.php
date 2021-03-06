<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\Actions;


use App\Domain\Department\DTO\NewsData;
use Domain\Department\Models\News;

class UpdateNewsAction
{
    public function __invoke(NewsData $newsData, $id): void
    {
        $news = News::find($id);

        if ($news) {
            $news->update([
                'title' => $newsData->title,
                'body'  => $newsData->body,
            ]);
        }
    }
}
