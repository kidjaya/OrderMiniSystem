<?php

namespace App\Policies;

use App\WxUser;
use App\UserAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAddressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user address.
     *
     * @param  \App\WxUser  $user
     * @param  \App\UserAddress  $userAddress
     * @return mixed
     */
    public function view(WxUser $user, UserAddress $userAddress)
    {
        //

    }

    /**
     * Determine whether the user can create user addresses.
     *
     * @param  \App\WxUser  $user
     * @return mixed
     */
    public function create(WxUser $user)
    {
        //
    }

    /**
     * Determine whether the user can update the user address.
     *
     * @param  \App\WxUser  $user
     * @param  \App\UserAddress  $userAddress
     * @return mixed
     */
    public function update(WxUser $user, UserAddress $userAddress)
    {
        //
        return $user->id === $userAddress->user_id;
    }

    /**
     * Determine whether the user can delete the user address.
     *
     * @param  \App\WxUser  $user
     * @param  \App\UserAddress  $userAddress
     * @return mixed
     */
    public function delete(WxUser $user, UserAddress $userAddress)
    {
        //
    }

    /**
     * Determine whether the user can restore the user address.
     *
     * @param  \App\WxUser  $user
     * @param  \App\UserAddress  $userAddress
     * @return mixed
     */
    public function restore(WxUser $user, UserAddress $userAddress)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the user address.
     *
     * @param  \App\WxUser  $user
     * @param  \App\UserAddress  $userAddress
     * @return mixed
     */
    public function forceDelete(WxUser $user, UserAddress $userAddress)
    {
        //
    }
}
