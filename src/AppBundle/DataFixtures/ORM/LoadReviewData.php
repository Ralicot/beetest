<?php



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Review;

class LoadReviewData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $content = [
            'Nu prea mi-a placut',
            'Il folosesc toata ziua. Nu ma pot desparti de el!!!',
            'EEEEE SUUUPER',
            'Produsul asta ma ajuta. Not.'
        ];
        $produse = [
            'Ceas Electric',
            'Nike Air-Max',
            'Oculus Rift',
            'Pijamale'
        ];
        $author = $manager->getRepository('UserBundle:User')->findOneBy(['username'=>'admin']);
        for($i=0;$i<=10;$i++){
            $review = new Review();
            $review->setRating(rand(1,10));
            $review->setAuthor($author);
            $review->setContent($content[rand(0,3)]);
            $review->setProduct($produse[rand(0,3)]);
            $manager->persist($review);
        }
        $manager->flush();
    }
}
