<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Debugbar;
use Illuminate\Support\Str;

/**
 * Class GitController
 * @package App\Http\Controllers\Dev
 * @group Dev
 */
class GitController extends Controller {
    /**
     * @var string
     */
    public $url;

    public function __construct() {
        exec('git remote get-url origin', $output);

        [$url] = $output;

        $this->url = $url;

        $this->url = preg_replace('/\.git$/', '', $this->url);
    }

    /**
     * Git
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $remoteBranches = Debugbar::measure('get remote branches', function () {
            return $this->branches(true);
        });
        $localBranches = Debugbar::measure('get local branches', function () {
            return $this->branches();
        });
        $currentBranch = $this->currentBranch();
        $currentBranchUrl = $this->getBranchUrl($this->currentBranch());
        $lastCommitMessage = $this->getLastCommitMessage();
        $url = $this->url;

        return view('dev.git', compact(
            'remoteBranches',
            'localBranches',
            'url',
            'currentBranch',
            'currentBranchUrl',
            'lastCommitMessage'
        ));
    }

    private function currentBranch() {
        exec('git branch', $output);

        return collect($output)->first(function ($line) {
            return Str::startsWith($line, '*');
        });
    }

    private function branches($remote = false) {
        if ($remote) {
            $cmd = 'git branch -r';
        } else {
            $cmd = 'git branch';
        }

        exec($cmd, $remoteBranches);
        return collect($remoteBranches)->map(function ($name) {
            $name = trim($name);
            $name = str_replace('origin/', '', $name);

            return [
                'name' => $name,
                'url'  => $this->getBranchUrl($name)
            ];
        });
    }

    private function getBranchUrl($name) {
        return sprintf("%s/-/tree/%s", $this->url, $name);
    }

    private function getLastCommitMessage() {
        exec('git log -n 1', $message);
        exec('git log --format="%H" -n 1', $id);

        [$id] = $id;

        $url = $this->getCommitUrl($id);

        return compact('message', 'url');
    }

    private function getCommitUrl($commit) {
        return sprintf('%s/-/commit/%s', $this->url, $commit);
    }
}
