<?php

namespace App\Controller\Admin;

use App\Entity\CategorysProducts;
use App\Entity\Coupons;
use App\Entity\GenresProducts;
use App\Entity\Jumbotron;
use App\Entity\NewsLetters;
use App\Entity\PlatformsProducts;
use App\Entity\Products;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

// attribute supported directly in security bundle, not required
#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('RetroGamingShop')
        ;
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->showEntityActionsInlined();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield Menuitem::linkToCrud('Produits', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', CategorysProducts::class);
        yield MenuItem::linkToCrud('Genres', 'fas fa-list', GenresProducts::class);
        yield MenuItem::linkToCrud('Plateforms', 'fa-solid fa-layer-group', PlatformsProducts::class);
        yield MenuItem::linktoCrud('Coupons', 'fa-solid fa-ticket', Coupons::class);
        yield MenuItem::linkToCrud('Jumbotrons', 'fa-solid fa-tv', Jumbotron::class);
        yield MenuItem::linkToCrud('Newsletters', 'fa-solid fa-envelope', NewsLetters::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-users', Users::class);
    }
}
