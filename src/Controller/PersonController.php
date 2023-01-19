<?php
// src/Controller/PersonController.php
namespace App\Controller;

use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\PersonType;

class PersonController extends AbstractController
{
    public function new(Request $request): Response
    {
        $person = new Person();
        $person->setName('Vložte jméno');
        $person->setSurname('Vložte příjmení');
        $person->setNumber('Vložte číslo');
        $person->setMail('Vložte mail');
        $person->setNote('Zadejte poznámku');


        //$form = $this->createFormBuilder($person)
        //    ->add('name', PostalAddressType::class)
        //    ->add('surname', PostalAddressType::class)
        //    ->add('number', PostalAddressType::class)
        //    ->add('mail', PostalAddressType::class)
        //    ->add('note', TextType::class)
        //    ->add('save', SubmitType::class, ['label' => 'Create Task'])
        //    ->getForm();

        $form = $this->createForm(PersonType::class, $person);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // TODO $form->getData()

            $task = $form->getData();

            // TODO save the person ID into the database

            return $this->redirectToRoute('person_success');
        }

        return $this->render('person/new.html.twig', [
           'form' => $form,
        ]);
    }

}