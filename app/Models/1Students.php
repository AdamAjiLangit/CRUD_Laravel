<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    private static $students = [
        [
            "id" => 1,
            "nis" => "123674",
            "nama" => "jihad",
            "tanggal_lahir" => "05 Januari 2007",
            "kelas" => "11 PPLG 2",
            "alamat" => "Jln. Pandawa 56 Jakarta",
        ],
        [
            "id" => 2,
            "nis" => "123456",
            "nama" => "Aryo",
            "tanggal_lahir" => "25 Mei 2007",
            "kelas" => "10 PPLG 1",
            "alamat" => "Semarang, Jawa Tengah"

        ],
        [
            "id" => 3,
            "nis" => "789012",
            "nama" => "Maureen",
            "tanggal_lahir" => "10 Desember 2006",
            "kelas" => "12 PPLG 1",
            "alamat" => "Purwodadi, Jawa Tengah"

        ],
        [
            "id" => 4,
            "nis" => "695525",
            "nama" => "Khayla",
            "tanggal_lahir" => "07 Juli 2007",
            "kelas" => "11 PPLG 1",
            "alamat" => "Solo, Jawa Tengah"

        ],
        [
            "id" => 5,
            "nis" => "955836",
            "nama" => "Anes",
            "tanggal_lahir" => "04 April 2007",
            "kelas" => "10 PPLG 2",
            "alamat" => "Karanganyar, Jawa Tengah"

        ]
    ];

    public static function all()
    {
        return self::$students;
    }
}
