<?php

namespace GOLEM\GolemFaucetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->add('wallet', TextType::class, array(
                'attr' => array(
                    'maxlength' => 40,
                    'pattern' => "[A-Fa-f0-9]{40,}"
                ),
                'required'   => true,
                'constraints' => array(
                    new NotBlank(),
                    new Length(array('min' => 40)),
                    new Length(array('max' => 40))
                ),
            ))
            ->add('claim', SubmitType::class, array())
            ->getForm();
        $form->handleRequest($request);

        $utilsService = $this->container->get('golem_golem_faucet.utils');
        $success = null;
        $reward = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $success = true;
            $reward = $utilsService->getReward();
        }

        return $this->render('GOLEMGolemFaucetBundle:GolemFaucet:index.html.twig', [
            'form' => $form->createView(),
            'success' => $success,
            'reward' => $reward
        ]);
    }
}
