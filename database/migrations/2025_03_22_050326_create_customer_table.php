<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->string('CCode', 50)->primary();
            $table->string('CName', 50);
            $table->string('CPhone', 50);
            $table->string('CEmail', 50);
        });
        // Chèn dữ liệu mẫu
        DB::table('customer')->insert([
            [
                'CCode' => 'GC001',
                'CName' => 'Hazem Abolrous',
                'CPhone' => '849-555-0139',
                'CEmail' => 'Hazem@Digit.edu.vn',
            ],
            [
                'CCode' => 'GC002',
                'CName' => 'Gabrielle Cannata',
                'CPhone' => '115-721-431',
                'CEmail' => 'Gabrielle@Digit.com',
            ],
            [
                'CCode' => 'GC003',
                'CName' => 'Chris Cannon',
                'CPhone' => '231-212-342',
                'CEmail' => 'Chris@Digit.com',
            ],
            [
                'CCode' => 'GC004',
                'CName' => 'Joseph Cantoni',
                'CPhone' => '443-223-513',
                'CEmail' => 'Joseph@Digit.com',
            ],
            [
                'CCode' => 'GC005',
                'CName' => 'Pilar Ackerman',
                'CPhone' => '123-564-344',
                'CEmail' => 'Pilar@Digit.com',
            ],
        ]);
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
