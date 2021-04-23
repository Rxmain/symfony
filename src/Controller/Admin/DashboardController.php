<?php

namespace App\Controller\Admin;

use App\Controller\ArticlesController;
use App\Controller\HomeController;
use App\Controller\UserRoleController;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return parent::index();
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ArticlesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Blog');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to website', 'fa fa-blog', 'articles');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToLogout('Logout', 'fa fa-times');
    }

//    public function configureAssets(): Assets
//    {
//        return Assets::new()
//            // ...
//            ->addHtmlContentToHead('<style>:root { --color-primary: #0000; }</style>');
//    }
}
