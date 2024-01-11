<?php

namespace App\Controller\Admin;

use App\Entity\NewsLetters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewsLettersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsLetters::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Newsletter')
            ->setEntityLabelInPlural('newsletters')
            ->setPageTitle('index', 'Liste des %entity_label_plural%')
            ->setPageTitle('new', 'Ajouter une %entity_label_singular%')
            ->setPageTitle('edit', 'Modifier une %entity_label_singular%')
            ->setPageTitle('detail', 'Détails de la %entity_label_singular%')
            ->setDefaultSort(['id' => 'DESC'])
            ->setPaginatorPageSize(10);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW , function (Action $action) {
                return $action->setLabel('Ajouter une newsletters');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Ajouter la newsletters');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Ajouter une autre newsletters');
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setLabel('Voir');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_DETAIL, Action::INDEX, function (Action $action) {
                return $action->setLabel('Retour à la liste');
            })
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Modifier et retourner à la liste');
            })
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom de la newsletter');
        yield TextField::new('description', 'Description de la newsletter');
        yield TextField::new('mainTitle', 'Titre principal');
        yield TextField::new('bannerFile', 'Image')
            ->setFormType(VichImageType::class)
            ->OnlyOnForms();
        yield ImageField::new('bannereName', 'Aperçu')
            ->setBasePath('/uploads/pictures/platforms')
            ->OnlyOnIndex();
        yield TextField::new('secondaryTitle', 'Titre secondaire');
        yield TextField::new('pictureSecondaryFile', 'Image')
            ->setFormType(VichImageType::class)
            ->OnlyOnForms();
        yield ImageField::new('pictureSecondaryTitle', 'Aperçu')
            ->setBasePath('/uploads/pictures/platforms')
            ->OnlyOnIndex();
    }
    
}
