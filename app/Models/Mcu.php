<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mcu extends Model
{
    protected $table = 'mcu';

    protected $fillable = [
        'const_id',
        'kdMCU',
        'noKunjungan',
        'kdProvider',
        'tglPelayanan',
        'tekananDarahSistole',
        'tekananDarahDiastole',
        'radiologiFoto',
        'darahRutinHemo',
        'darahRutinLeu',
        'darahRutinErit',
        'darahRutinLaju',
        'darahRutinHema',
        'darahRutinTrom',
        'lemakDarahHDL',
        'lemakDarahLDL',
        'lemakDarahChol',
        'lemakDarahTrigli',
        'gulaDarahSewaktu',
        'gulaDarahPuasa',
        'gulaDarahPostPrandial',
        'gulaDarahHbA1c',
        'fungsiHatiSGOT',
        'fungsiHatiSGPT',
        'fungsiHatiGamma',
        'fungsiHatiProtKual',
        'fungsiHatiAlbumin',
        'fungsiGinjalCrea',
        'fungsiGinjalUreum',
        'fungsiGinjalAsam',
        'fungsiJantungABI',
        'fungsiJantungEKG',
        'fungsiJantungEcho',
        'funduskopi',
        'pemeriksaanLain',
        'keterangan',
    ];
}
