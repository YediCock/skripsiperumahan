<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['faq_category_id', 'kategori', 'pertanyaan', 'jawaban', 'urutan', 'aktif'];

    protected $casts = ['aktif' => 'boolean'];

    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true)->orderBy('urutan')->orderBy('id');
    }
}
