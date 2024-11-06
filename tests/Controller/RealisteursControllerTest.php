<?php

namespace App\Test\Controller;

use App\Entity\Realisteurs;
use App\Repository\RealisteursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RealisteursControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private RealisteursRepository $repository;
    private string $path = '/realisteurs/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Realisteurs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Realisteur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'realisteur[id_real]' => 'Testing',
            'realisteur[nom]' => 'Testing',
            'realisteur[prenom]' => 'Testing',
        ]);

        self::assertResponseRedirects('/realisteurs/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Realisteurs();
        $fixture->setId_real('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Realisteur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Realisteurs();
        $fixture->setId_real('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'realisteur[id_real]' => 'Something New',
            'realisteur[nom]' => 'Something New',
            'realisteur[prenom]' => 'Something New',
        ]);

        self::assertResponseRedirects('/realisteurs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getId_real());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Realisteurs();
        $fixture->setId_real('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/realisteurs/');
    }
}
