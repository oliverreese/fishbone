<?php

namespace App\Test\Repository;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ClientRepositoryTest extends KernelTestCase
{

    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByName()
    {
        $product = $this->entityManager
            ->getRepository(Client::class)
            ->findOneBy(['firstName' => 'oliver'])
        ;

        $this->assertSame('reese', $product->getLastName());
    }
}