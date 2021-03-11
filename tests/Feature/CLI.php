<?php

namespace Tests\Feature;

use Tests\Collector;

class CLI {
    // https://misc.flogisoft.com/bash/tip_colors_and_formatting
    public const CLI_STYLE_BOLD = 1;
    public const CLI_STYLE_DIM = 2;
    public const CLI_STYLE_UNDERLINED = 4;
    public const CLI_COLOR_RED = 31;
    public const CLI_COLOR_GREEN = 32;
    public const CLI_COLOR_YELLOW = 33;
    public const CLI_COLOR_BLUE = 34;
    public const CLI_COLOR_DARK_GRAY = 90;
    public const CLI_COLOR_LIGHT_YELLOW = 93;
    public const CLI_COLOR_LIGHT_CYAN = 96;

    protected $enableColors = true;

    /**
     * @var CLI
     */
    private static $instance;

    /**
     * @var Collector
     */
    private $col;

    /**
     * @return CLI
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->col = Collector::instance()->init()->debugbar->getCollector('queries');
    }

    public function color(string $string, int $color) {
        // https://misc.flogisoft.com/bash/tip_colors_and_formatting
        if (! $this->enableColors) {
            return $string;
        }
        return "\e[${color}m${string}\e[0m";
    }

    public function time($value) {
        $formattedValue = $this->col->getDataFormatter()->formatDuration($value);

        if ($value >= 1.0) {
            // Если значение в секундах, подсветить красным
            $color = self::CLI_COLOR_RED;
        } else if ($value >= 1.0 / 1000) {
            // Если значение в миллисекундах, подсветить жёлтым
            $color = self::CLI_COLOR_YELLOW;
        } else {
            // Если значение в микросекундах, подсветить зелёным
            $color = self::CLI_COLOR_GREEN;
        }

        return $this->color($formattedValue, $color);
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

    public function dim($value) {
        return "\e[2m{$value}\e[22m";
    }
}
