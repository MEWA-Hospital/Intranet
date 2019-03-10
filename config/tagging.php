<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

return [
	// Datatype for primary keys of your models.
	// used in migrations only
	'primary_keys_type' => 'integer', // 'string' or 'integer'
		
	// Value of are passed through this before save of tags
	'normalizer' => '\Conner\Tagging\Util::slug',
	
	// Display value of tags are passed through (for front end display)
	'displayer' => '\Illuminate\Support\Str::title',
	
	// Database connection for Conner\Taggable\Tag model to use
// 	'connection' => 'mysql',
	
	// When deleting a model, remove all the tags first
	'untag_on_delete' => true,
		
	// Auto-delete unused tags from the 'tags' database table (when they are used zero times)
	'delete_unused_tags'=>true,

	// Model to use to store the tags in the database
	'tag_model'=>'\Conner\Tagging\Model\Tag',

	// Delimiter used within tags
	'delimiter' => '-',
	
	// Model to use for the relation between tags and tagged records
	'tagged_model' => '\Conner\Tagging\Model\Tagged',
];
