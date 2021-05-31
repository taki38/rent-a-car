<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\Reader\TranslationReaderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class TranslationController extends AbstractController
{
    /**
     * @Route("/translation", name="translation")
     */
    public function index(TranslatorInterface $translator): Response
    {
        $translated = $translator->trans('Email could not be found.');
        return $this->render('translation/index.html.twig', [
            'translated' => $translated,
        ]);
    }
}
