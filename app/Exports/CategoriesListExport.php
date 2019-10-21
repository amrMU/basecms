<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class CategoriesListExport implements FromCollection
{
    
       /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $categories = DB::table('categories')
                             ->join('category_translations','categories.id','category_translations.category_id')

                             ->groupby('category_translations.category_id')
                             ->distinct()
                            ->select(
                                 'categories.id',
                                'category_translations.name',
                                'category_translations.lang_id',
                                'categories.parent_id'
                            )->get();

        return $categories;
    }

    public function headings(): array
    {
        return [
            'ID', 
            'Name Ar',
            'Name En',
            'Parent ID',
            
        ];
    }
}
