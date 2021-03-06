<?php

namespace App\User\Responder;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class UserCreateResponder
{
    /**
     * @var \Twig\Environment
     */
    private $twig;
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    public function __construct(Environment $twig, RouterInterface $router)
    {

        $this->twig = $twig;
        $this->router = $router;
    }

    public function __invoke(
        FormView $formView,
        Request $request,
        $redirect = false
    ): Response {
        
        if ($redirect) {
            return new RedirectResponse($this->router->generate('app_create_user'));
        }

        return new Response($this->twig->render('User/form.html.twig', [
            'form' => $formView,
        ]));
    }
}
