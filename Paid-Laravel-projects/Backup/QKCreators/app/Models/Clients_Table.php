<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients_Table extends Model
{
    use HasFactory;
    protected $table='clients';
    protected $primary_key='client_Id';
}
