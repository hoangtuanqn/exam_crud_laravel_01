<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    // Raw Query
    public function getAll() {
        return DB::select("SELECT * FROM customer");
    }
    public function getDetail($code) {
        return DB::select("SELECT * FROM customer WHERE CCode = ?", [$code]);
    }
    public function insertCustomer($data) {
        return DB::insert("INSERT INTO customer (CCode, CName, CPhone, CEmail) VALUES (?, ?, ?, ?)", $data);
    }
    public function updateCustomer($data) {
        return DB::update("UPDATE customer SET CCode = ?, CName = ?, CPhone = ?, CEmail = ? WHERE CCode = ?", $data);
    }
    public function deleteCustomer($code) {
        return DB::delete("DELETE FROM customer WHERE CCode =?", [$code]);
    }
}
