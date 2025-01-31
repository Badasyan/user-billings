<?php

namespace App\Services\Action\Users;

use App\Services\DTO\Users\CreateUserDTO;
use App\Http\Resources\Users\UserResource;
use App\Repositories\Write\Users\UserWriteRepositoryInterface;
use App\Repositories\Write\Balances\BalancesWriteRepositoryInterface;

readonly class CreateUserAction
{

    /**
     * @param UserWriteRepositoryInterface $userWriteRepository
     * @param BalancesWriteRepositoryInterface $balancesWriteRepository
     */
    public function __construct(
        private UserWriteRepositoryInterface $userWriteRepository,
        private BalancesWriteRepositoryInterface $balancesWriteRepository,
    ) {
    }

    public function run(CreateUserDTO $dto): UserResource
    {
        $user = $this->userWriteRepository->create($dto->toArray());
        $this->balancesWriteRepository->create($user->id);

        return new UserResource($user);
    }
}
