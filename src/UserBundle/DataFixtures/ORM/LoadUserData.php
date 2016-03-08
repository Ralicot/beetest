<?php

/**
 * Created by PhpStorm.
 * User: tudor
 * Date: 08.03.2016
 * Time: 16:20
 */
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword('pass');
        $userAdmin->setEmail('email@bee.ro');
        $manager->persist($userAdmin);

        $oauth = new \UserBundle\Entity\Client();
        $oauth->setRandomId('3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4');
        $oauth->setRedirectUris(array());
        $oauth->setSecret('4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k');
        $oauth->setAllowedGrantTypes(array("password"));
        $manager->persist($oauth);

        $manager->flush();


    }
}