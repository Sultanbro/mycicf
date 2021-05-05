<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use App\Library\Services\KiasServiceInterface;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class VendorController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class KiasController extends Controller {
    /**
     * Vendor
     *
     * @param KiasServiceInterface $kias
     * @return \Illuminate\View\View
     */
    public function index(KiasServiceInterface $kias) {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $response = $kias->authenticate('Developer', 'Password');

        return view('dev.kias', [
            'response' => $response,
            'config' => config('kias'),
        ]);
    }

}
