<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Role\UserRoleChecker;
use Illuminate\Auth\Access\AuthorizationException;
// use Illuminate\Support\Facades\Auth;

use Auth;

/**
 * Class CheckUserRole
 * @package App\Http\Middleware
 */
class CheckUserRole
{
    /**
     * @var RoleChecker
     */
    protected $roleChecker;

    public function __construct(UserRoleChecker $roleChecker)
    {
        $this->roleChecker = $roleChecker;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next, $role)
    {
        /** @var User $user */
        $user = Auth::guard('api')->user();

        if (!$this->roleChecker->check($user, $role)) {
            throw new AuthorizationException('You do not have permission to view this page');
        }

        return $next($request);
    }
}
