<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use Debugbar;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Exception\AccessDeniedException;

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
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $remoteBranches = Debugbar::measure('get remote branches', function () {
            return cache()->remember('git::remote-branches', 10, function () {
                return $this->branches(true);
            });
        });

        $localBranches = Debugbar::measure('get local branches', function () {
            return cache()->remember('git::local-branches', 10, function () {
                return $this->branches();
            });
        });

        $currentBranch = Debugbar::measure('get current branch', function () {
            return cache()->remember('git::current-branch', 10, function () {
                return $this->currentBranch();
            });
        });

        $currentBranchUrl = Debugbar::measure('get current branch url', function () {
            return cache()->remember('git::current-branch-url', 10, function () {
                return $this->getBranchUrl($this->currentBranch());
            });
        });

        $lastCommitMessage = Debugbar::measure('get last commit message', function () {
            return cache()->remember('git::last-commit-message', 1, function () {
                return $this->getLastCommitMessage();
            });
        });

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

        $branch = collect($output)->first(function ($line) {
            return Str::startsWith($line, '*');
        });
        $branch = preg_replace('%^\*\s+%', '', $branch);
        return $branch;
    }

    private function branches($remote = false) {
        $cmd = $remote ? 'git branch -r' : 'git branch';

        exec($cmd, $remoteBranches);
        return collect($remoteBranches)->map(function ($name) {
            $name = trim($name);
            $head = Str::startsWith('origin/HEAD -> ', $name);
            $name = str_replace(array('origin/', 'HEAD -> '), '', $name);

            return [
                'name' => $name,
                'url'  => $this->getBranchUrl($name),
                'head' => $head,
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
