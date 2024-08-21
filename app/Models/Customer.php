<?php
// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'customer';

    // Columns that are mass assignable
    protected $fillable = ['name', 'address', 'age'];
}

?>