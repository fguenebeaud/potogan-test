<?php

namespace Potogan\TestBundle\Controller;

use Potogan\TestBundle\Entity\UserConference;
use Potogan\TestBundle\Type\UserConferenceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Index controller
 */
class IndexController extends Controller
{
    /**
     * Index page
     *
     * @Route("/")
     * @Method({"GET"})
     * @Template
     */
    public function indexAction(Request $request)
    {
        $userConference = new UserConference();
        $form = $this->createForm(UserConferenceType::class, $userConference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            $file = $userConference->getAvatar();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('avatar_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $userConference->setAvatar($fileName);

            return $this->redirect($this->generateUrl('app_product_list'));
        }

        return $this->render('@PotoganTest/Index/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
