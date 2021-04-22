<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
+  * Require ROLE_ADMIN for *every* controller method in this class.
+  *
+  * @IsGranted("ROLE_ADMIN")
+  */
class UserRoleController extends AbstractController
{
    /**
     * @Route("/user/role", name="user_role")
     */
    public function index(): Response
    {
        return $this->render('user_role/index.html.twig', [
            'controller_name' => 'UserRoleController',
        ]);
    }
    /**
    +      * Require ROLE_ADMIN for only this controller method.
    +      *
    +      * @IsGranted("ROLE_ADMIN")
    +      */
    public function adminDashboard(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // or add an optional message - seen by developers
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
    }
}
