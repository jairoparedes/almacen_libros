<?php

namespace App\Controller\Admin;

use App\Entity\AutorLibro;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AutorLibroCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AutorLibro::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
