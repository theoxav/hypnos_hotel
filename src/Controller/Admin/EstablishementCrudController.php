<?php

namespace App\Controller\Admin;

use App\Entity\Establishement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EstablishementCrudController extends AbstractCrudController
{
    public const HOTELS_BASE_PATH = 'uploads/images/hotels';
    public const HOTELS_UPLOAD_DIR = 'public/uploads/images/hotels';
   
   
    public static function getEntityFqcn(): string
    {
        return Establishement::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
            yield AssociationField::new('user')
            ;
            yield TextField::new('name', 'Name of the establishement');
            yield SlugField::new('slug')->setTargetFieldName('name');
            yield TextField::new('subtitle');
            yield TextField::new('address');
            yield TextField::new('city');
            yield TextField::new('postalCode');
           

            yield ImageField::new('banner')
            ->setBasePath(self::HOTELS_BASE_PATH)
            ->setUploadDir(self::HOTELS_UPLOAD_DIR)
            ->setRequired(false);

            yield ImageField::new('illustration')
              ->setBasePath(self::HOTELS_BASE_PATH)
              ->setUploadDir(self::HOTELS_UPLOAD_DIR)
              ->setRequired(false);

           
            yield TextEditorField::new('description');

            yield BooleanField::new('isBest');
           
            yield DateTimeField::new('created_at')->hideOnForm();
            
            yield DateTimeField::new('updated_at')->hideOnForm();
            
        
    }
    
}
