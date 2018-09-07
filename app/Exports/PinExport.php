<?php
namespace App\Exports;
use App\Pin;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PinExport implements FromQuery
{
  use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
	public function query()
    {
    	
   return Pin::query()->where([['user_id', $this->id],['status',0]])->orderBy('id','ASC')->select('id','user_id','pin');
      
    }
   
}