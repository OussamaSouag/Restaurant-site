<?php

namespace App\Enums;

enum StatutCommande: string
{
    case EnAttente = 'En_attente';
    case EnPreparation = 'En_préparation';
    case Prete = 'Prête';
}
