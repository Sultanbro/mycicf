<?php

namespace Tests\Feature;

class CLI {
    // https://misc.flogisoft.com/bash/tip_colors_and_formatting
    public const CLI_STYLE_BOLD = 1;
    public const CLI_STYLE_UNDERLINED = 4;
    public const CLI_COLOR_RED = 31;
    public const CLI_COLOR_GREEN = 32;
    public const CLI_COLOR_YELLOW = 33;
    public const CLI_COLOR_BLUE = 34;

    protected $enableColors = true;

    /**
     * @var CLI
     */
    private static $instance;

    /**
     * @return CLI
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function color(string $string, int $color) {
        // https://misc.flogisoft.com/bash/tip_colors_and_formatting
        if (! $this->enableColors) {
            return $string;
        }
        return "\e[${color}m${string}\e[0m";
    }

    public function time($value) {
        return $this->color($value, self::CLI_COLOR_BLUE);
    }

    public function label($value) {
        return $this->color($value, self::CLI_COLOR_GREEN);
    }

    public function int($value) {
        return $this->color($value, self::CLI_COLOR_RED);
    }

    public function bold($value) {
        return $this->color($value, self::CLI_STYLE_BOLD);
    }

    public function underlined($value) {
        return $this->color($value, self::CLI_STYLE_UNDERLINED);
    }
}
