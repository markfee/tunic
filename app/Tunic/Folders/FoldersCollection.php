<?php namespace App\Tunic\Folders;


use App\Tunic\Models\Folders;
use Markfee\Responder\Responder\ResponderTrait;

class FoldersCollection {
    use ResponderTrait;

    public function get_all_folders()
    {
        return $this->Paginated(Folders::WhereNotNull("id"));
    }
}