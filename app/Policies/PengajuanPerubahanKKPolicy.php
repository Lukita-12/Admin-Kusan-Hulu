<?php

namespace App\Policies;

use App\Models\PengajuanPerubahanKK;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PengajuanPerubahanKKPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PengajuanPerubahanKK $pengajuanPerubahanKK): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PengajuanPerubahanKK $pengajuanPerubahanKK): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PengajuanPerubahanKK $pengajuanPerubahanKK): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PengajuanPerubahanKK $pengajuanPerubahanKK): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PengajuanPerubahanKK $pengajuanPerubahanKK): bool
    {
        return false;
    }

    public function acceptOrReject(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function completeOrEditOrDelete(User $user): bool
    {
        return $user->role === 'super_admin';
    }
}
