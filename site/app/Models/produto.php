<?php declare(strict_types=1); 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $table = 'produtos';

    protected $fillable =[
        'name',
        'descricao',
        'preco',
        'slug',
        'imagem',
        
    ];
}
