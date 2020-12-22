<?php

namespace App\Services;

// Models
use App\Buyer;
use App\Diary;
use App\Pen;
use App\Eraser;
use App\Record;

// Facades
use Illuminate\Support\Facades\DB;
use Exception;

class JsonFormatterService
{
  public function bulkDbInsertionJson()
  {
    $insertionStatus = ['success' => TRUE, 'message' => 'Insertion Successful'];

    try
    {
      DB::transaction(function () {
        $json = file_get_contents(storage_path('app/public/records.json'));
        $objects = json_decode($json,true);
        foreach ($objects as $obj)  {
          foreach ($obj as $key => $value) {
            $insertArr[str_slug($key,'_')] = $value; // laravel/helpers needs to be installed for str_slug() to work
          }
          foreach (array_chunk($insertArr,1000) as $chunk)  // Chunking is necessary for insertion of large amount of data
          {
            DB::table('records')->insert($chunk); 
          }
        }
      });
    } 
    catch(Exception $e) 
    {
      $insertionStatus = ['success' => FALSE, 'message' => $e];;
    }
    
    return (object)$insertionStatus;
  }
}