<?php

namespace App\Exports;

use App\Models\personnel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonnelExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
        {
            return personnel::select(
                "immat", "Nomper", "prenomper","email",'date_naissance','grade','CIN','date_affectation','diplome','lieu_naissance'
                )->get();;
        }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Matricule", "Nom", "Prenom","Email","Dade de naissance","Grade","CIN","Date d'affectation","Diplome","Lieu de Naissance"];
    }
}
