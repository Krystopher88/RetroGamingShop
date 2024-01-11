<?php

namespace App\Controller\Admin;

use App\Entity\Coupons;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CouponsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coupons::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Coupon')
            ->setEntityLabelInPlural('Coupons')
            ->setPageTitle('index', 'Liste des %entity_label_plural%')
            ->setPageTitle('new', 'Ajouter un %entity_label_singular%')
            ->setPageTitle('edit', 'Modifier un %entity_label_singular%')
            ->setPageTitle('detail', 'Détails du %entity_label_singular%')
            ->setDefaultSort(['id' => 'DESC'])
            ->setPaginatorPageSize(10);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter un coupon');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Ajouter le coupon');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Ajouter un autre coupons');
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
        yield TextField::new('name', 'Titre');
        yield TextField::new('code', 'Code');
        yield IntegerField::new('discount', 'Réduction');
        yield DateTimeField::new('validity', 'Date');
        yield BooleanField::new('is_valid', 'Valide');
    }
}
