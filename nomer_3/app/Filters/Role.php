<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Role implements FilterInterface
{
    public function before(RequestInterface $request, $roles = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $userRole = session()->get('role');

        if ($roles !== null && !in_array($userRole, $roles)) {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
