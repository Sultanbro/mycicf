<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class VendorController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class VendorController extends Controller {
    /**
     * Vendor
     *
     * @return |\Illuminate\View\View
     */
    public function index() {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $packages = $this->getComposerPackages();

        $result = [];

        foreach ($packages as $name => $version) {
            $result[$name] = [
                'version' => $version,
                'type'    => $this->getType($name),
            ];
        }

        foreach ($result as $name => &$item) {
            if ($item['type'] === 'package') {
                $item['url'] = sprintf("https://packagist.org/packages/%s", $name);
            }
        }

        $result = collect($result)->sort(function ($a, $b) {
            return strcmp($b['type'], $a['type']);
        });

        return view('dev.vendor', compact('result'));
    }

    private function getComposerPackages() {
        $requiredModules = [];
        foreach (glob("../vendor/*/*/composer.json") as $filePath) {
            $jsonContent = file_get_contents($filePath);
            $jsonArray = json_decode($jsonContent, true);
            if (isset($jsonArray['require'])) {
                $requiredModules += $jsonArray['require'];
            }
        }
        return $requiredModules;
    }

    private function getType(string $name) {
        if (preg_match('/^[\.\w-]+\/[\.\w-]+$/i', $name)) {
            return 'package';
        }

        if (preg_match('/^ext-[\w-]+$/i', $name)) {
            return 'extension';
        }

        if (preg_match('/^lib-[\w-]+$/i', $name)) {
            return 'library';
        }

        if ($name === 'php') {
            return 'php';
        }

        dd($name);
    }
}
