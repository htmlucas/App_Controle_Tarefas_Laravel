<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all();

        return auth()->user()->tarefas()->get();
    }

    public function headings():array{ //declarando o tipo de retorno (array)
        return ['ID Da Tarefa','ID do Usuario','Tarefa','Data de Limite de Conclusao','Data Criacao','Data Atualizacao'];
    }
}
