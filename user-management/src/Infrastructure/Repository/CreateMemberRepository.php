<?php

namespace Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Business\Member\Repository\CreateMemberRepositoryInterface;
use Infrastructure\Entity\Member\Member;
use Infrastructure\Entity\User;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreateMemberRepository extends ServiceEntityRepository implements CreateMemberRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }
	/**
	 *
	 * @param \Domain\Business\Member\Member $member
	 *
	 * @return string
	 */
	function save(\Domain\Business\Member\Member $member): string {
		$information = $member->getSummary();
		$newMember = (new Member())
			->setIdentifier($information['identifier'])
			->setFirstName($information['firstName'])
			->setLastName($information['lastName'])
			->setGender($information['gender']['value'])
			->setMemberSinceAt($information['memberSinceAt'])
			->setContact($information['contact']->toArray());
		$this->_em->persist($newMember);
		return $newMember->getIdentifier();
    }
}