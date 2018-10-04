<?php

namespace App\Controller;

use App\Entity\LifestyleProfile;
use App\Entity\User;
use App\Form\LifestyleProfileType;
use App\Repository\LifestyleProfileRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lifestyle/profile")
 */
class LifestyleProfileController extends Controller
{
    /**
     * @Route("/", name="lifestyle_profile_index", methods="GET")
     */
    public function index(): Response
    {
        $lifestyleProfiles = $this->getRepository()->findAll();

        return $this->json($lifestyleProfiles);
    }

    /**
     * @Route("/new", name="lifestyle_profile_new", methods="POST")
     */
    public function new(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        /** @var User $user */
        $user = $this->getUserRepository()->find($data['user_id']);

        if ($user === null) {
            return $this->json(
                ['success' => 0, 'message' => 'Perfil do estilo de vida não salvo, dados do usuário não encontrado']
            );
        }

        $lifestyle_profile = new LifestyleProfile();
        $lifestyle_profile->populate($data);
        $lifestyle_profile->setUser($user);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lifestyle_profile);
            $em->flush();

            $result = ['success' => 1, 'message' => 'Perfil do estilo de vida salvo'];

            return $this->json($result);
        } catch (\Exception $exception) {
            $result = [
                'success' => 0,
                'message' => 'Perfil do estilo de vida não salvo',
                'error' => $exception->getMessage(),
            ];

            return $this->json($result);
        }
    }

    /**
     * @Route("/{id}", name="lifestyle_profile_show", methods="GET")
     */
    public function show(LifestyleProfile $lifestyleProfile): Response
    {
        return $this->json($lifestyleProfile);
    }

    /**
     * @Route("/{id}/edit", name="lifestyle_profile_edit", methods="GET|POST")
     */
    public function edit(Request $request, LifestyleProfile $lifestyleProfile): Response
    {
        $form = $this->createForm(LifestyleProfileType::class, $lifestyleProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lifestyle_profile_edit', ['id' => $lifestyleProfile->getId()]);
        }

        return $this->render(
            'lifestyle_profile/edit.html.twig',
            [
                'lifestyle_profile' => $lifestyleProfile,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="lifestyle_profile_delete", methods="DELETE")
     */
    public function delete(Request $request, LifestyleProfile $lifestyleProfile): Response
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lifestyleProfile);
            $em->flush();

            return $this->json(['success' => 0, 'message' => 'Perfil do estilo de vida excluído']);
        } catch (\Exception $exception) {
            return $this->json(['success' => 0, 'message' => 'Erro ao excluír Perfil do estilo de vida']);
        }
    }

    /**
     * @Route("/already/create", name="already_create", methods="POST")
     */
    public function isAlreadyCreate(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        if (!isset($data['id'])) {
            return $this->json(['is_valid' => false]);
        }

        $is_get = isset($data['is_get']) ? $data['is_get'] : false;

        $result = $this->getRepository()->isAlreadyCreate($data['id'], $is_get);

        return $this->json($result);
    }

    /**
     * @return LifestyleProfileRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getRepository()
    {
        return $this->getDoctrine()->getRepository(LifestyleProfile::class);
    }

    /**
     * @return UserRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getUserRepository()
    {
        return $this->getDoctrine()->getRepository(User::class);
    }
}
