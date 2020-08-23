<?php

namespace App\Controller\Admin;
use App\Entity\Users;
use App\Entity\Equipe;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Service;
use App\Entity\Actualite;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_USER')")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function index(): Response
    {
        
        
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('ACME Corp.')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle(' DIAMANT  <span class="text-small">TECHNOLOGY SOLAR</span>')

            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')
        ;
    }
  

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        
      yield  MenuItem::section('Blog');
      yield MenuItem::linkToCrud('Actualite', 'fa fa-tags',Actualite::class);
      yield  MenuItem::linkToCrud('Product', 'fa fa-plug',Product::class);
      yield  MenuItem::linkToCrud('Service', 'fa fa-plug',Service::class);

      yield  MenuItem::linkToCrud('Equipe',"fa fa-users" ,Equipe::class);


      yield MenuItem::section('Users');
      yield MenuItem::linkToCrud('Contact', 'fa fa-phone',Contact::class);
      yield  MenuItem::linkToCrud('Users', 'fa fa-user', Users::class);


        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
    public function configureCrud(): Crud
    {
        return Crud::new()
            // this defines the pagination size for all CRUD controllers
            // (each CRUD controller can override this value if needed)
            ->setPaginatorPageSize(30)
        ;
    }
    public function createEntity(string $entityFqcn)
    {
        $product = new Product();
        $product->createdBy($this->getUser());

        return $product;
    }
    

}
