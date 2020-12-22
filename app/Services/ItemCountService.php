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

class ItemCountService
{
  private function formatItemsEloquent($buyer)
  {
      $item = array();
    
      $total_diaries = $buyer->diaries->sum('amount');
      $total_pens = $buyer->pens->sum('amount');
      $total_erasers = $buyer->erasers->sum('amount');

      $item['buyer_id'] = $buyer->id;
      $item['buyer_name'] = $buyer->name;
      $item['total_diary_taken'] = $total_diaries;
      $item['total_pen_taken'] = $total_pens;
      $item['total_eraser_taken'] = $total_erasers;
      $item['total_items_taken'] = $total_diaries + $total_pens + $total_erasers;

      return (object)$item;
  } 
  
  private function formatItemsNoEloquent($buyers, $diaries, $erasers, $pens)
  {
    $total_buyers = count($buyers);

    $data = array();

    foreach($buyers as $buyer)
    {
      $item = array();

      // initial item value
      $item['buyer_id'] = $buyer->id;
      $item['buyer_name'] = $buyer->name;
      $item['total_diary_taken'] = 0;
      $item['total_eraser_taken'] = 0;
      $item['total_pen_taken'] = 0;
      $item['total_items_taken'] = 0;

      // diaries
      foreach($diaries as $diary)
      {
        if($diary->buyer_id == $buyer->id)
        {
          $item['total_diary_taken'] = $diary->total;
          $item['total_items_taken'] += $diary->total; 
        }
      }

      // erasers
      foreach($erasers as $eraser)
      {
        if($eraser->buyer_id == $buyer->id)
        {
          $item['total_eraser_taken'] = $eraser->total;
          $item['total_items_taken'] += $eraser->total;
        }
      }

      // pens
      foreach($pens as $pen)
      {
        if($pen->buyer_id == $buyer->id)
        {
          $item['total_pen_taken'] = $pen->total;
          $item['total_items_taken'] += $pen->total;
        }
      }

      $data[] = (object)$item;
    }

    return $data;
  }   
  
  public function enlistBuyersOnItemsEloquent()
  {
    $data = array();
    $buyers = Buyer::with(['diaries', 'erasers', 'pens'])->get();

    foreach($buyers as $buyer)
    {
        $data[] = $this->formatItemsEloquent($buyer);
    }

    $data = collect($data);
    
    return $data;
  }

  public function enlistBuyersOnItemsNoEloquent()
  {
    $buyers = DB::select(DB::raw("SELECT * FROM buyers"));
    
    $diaries = DB::select(
      DB::raw(
        "SELECT a.id as buyer_id, a.name as buyer_name, SUM(b.amount) AS total 
          FROM buyers a INNER JOIN diary_taken b ON a.id=b.buyer_id
          GROUP BY a.id, a.name"
      )
    );

    $erasers = DB::select(
      DB::raw(
        "SELECT a.id as buyer_id, a.name as buyer_name, SUM(b.amount) AS total
          FROM buyers a INNER JOIN eraser_taken b ON a.id=b.buyer_id
          GROUP BY a.id, a.name"
      )
    );

    $pens = DB::select(
      DB::raw(
        "SELECT a.id as buyer_id, a.name as buyer_name, SUM(b.amount) AS total
         FROM buyers a INNER JOIN pen_taken b ON a.id=b.buyer_id
         GROUP BY a.id, a.name"
      )
    );

    $data = $this->formatItemsNoEloquent($buyers, $diaries, $erasers, $pens);
    $data = collect($data);
    
    return $data;
  }  
}