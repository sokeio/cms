<?php

namespace Sokeio\CMS\Support\Shortcode;

use Livewire\Livewire;

class ShortcodeManager
{
    private $compiler = null;
    public function __construct()
    {
        $this->compiler = new ShortcodeCompiler($this);
    }
    public function getCompiler(): ShortcodeCompiler
    {
        return $this->compiler;
    }
    public function compile($value)
    {
        return $this->compiler->compile($value);
    }
    protected $registered = [];

    /**
     * Enabled state
     *
     * @var boolean
     */
    protected $enabled = false;

    /**
     * Enable strip state
     *
     * @var boolean
     */
    protected $strip = false;

    /**
     * @return boolean
     */
    public function getStrip()
    {
        return $this->strip;
    }

    /**
     * @param boolean $strip
     */
    public function setStrip($strip)
    {
        $this->strip = $strip;
    }


    /**
     * Get shortcode names
     *
     * @return string
     */
    public function getNames()
    {
        return join('|', array_map('preg_quote', array_keys($this->registered)));
    }

    /**
     * Get shortcode regex.
     *
     * @author Wordpress
     * @return string
     */
    public function getRegex()
    {
        $names = $this->getNames();

        return "\\[(\\[?)($names)(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*+(?:\\[(?!\\/\\2\\])[^\\[]*+)*+)\\[\\/\\2\\])?)(\\]?)";
    }

    /**
     * Remove all shortcode tags from the given content.
     *
     * @param string $content Content to remove shortcode tags.
     *
     * @return string Content without shortcode tags.
     */
    public function strip($content)
    {
        if (empty($this->registered)) {
            return $content;
        }
        $pattern = $this->getRegex();

        return preg_replace_callback("/{$pattern}/s", [$this, 'stripTag'], $content);
    }
    /**
     * Remove shortcode tag
     *
     * @param type $m
     *
     * @return string Content without shortcode tag.
     */
    protected function stripTag($m)
    {
        if ($m[1] == '[' && $m[6] == ']') {
            return substr($m[0], 1, -1);
        }

        return $m[1] . $m[6];
    }
    /**
     * Enable
     *
     * @return void
     */
    public function enable()
    {
        $this->enabled = true;
    }
    /**
     * Check if laravel-shortcodes have been registered
     *
     * @return boolean
     */
    public function hasShortcodes()
    {
        return !empty($this->registered);
    }
    /**
     * Disable
     *
     * @return void
     */
    public function disable()
    {
        $this->enabled = false;
    }
    public function getStatus()
    {
        return $this->enabled;
    }
    public function register($shortocde)
    {
        $info = ShortcodeInfo::getInfoFromUI($shortocde);
        if (!$info) {
            return;
        }
        $this->registered[$info->key] = [
            'key' => $info->key,
            'class' => $shortocde,
            'name' => $info->name,
            'icon' => $info->icon,
            'stripTags' => $info->stripTags
        ];
    }
    public function render($shortcode, $attributes = [], $content = '')
    {
        return Livewire::mount('cms::shortcode', [
            'shortcode' => $shortcode,
            'attrs' => $attributes,
            'content' => $content
        ]);
    }
    public function all()
    {
        return $this->registered;
    }
    public function getShortcode($shortcode, $key = null, $default = null)
    {
        if (!isset($this->registered[$shortcode])) {
            return $default;
        }

        if ($key) {
            return data_get($this->registered[$shortcode], $key, $default);
        }
        return $this->registered[$shortcode];
    }
    public function getAllShortcodeFromText($shortcode)
    {
        if (!$shortcode) {
            return null;
        }
        $pattern = '/\[([\w-:]+)((?:\s+\w+\s*=\s*"[^"]*")*)\](.*?)\[\/\1\]/s';
        // Extract all shortcode matches
        preg_match_all($pattern, $shortcode, $matches, PREG_SET_ORDER);

        $shortcodeObjects = [];

        foreach ($matches as $match) {
            $shortcodeName = $match[1];
            $attributesString = $match[2];
            $shortcodeContent = $match[3];

            // Regular expression pattern to match attribute-value pairs
            $attributePattern = '/(\w+)\s*=\s*"([^"]*)"/';

            // Extract attributes using preg_match_all()
            preg_match_all($attributePattern, $attributesString, $attributeMatches, PREG_SET_ORDER);

            // Create an array to store attribute-value pairs
            $attributes = [];

            // Iterate over attribute matches and populate the attributes array
            foreach ($attributeMatches as $attributeMatch) {
                $attribute = $attributeMatch[1];
                $value = $attributeMatch[2];
                $attributes[$attribute] = $value;
            }

            // Create shortcode object
            $shortcodeObject = [
                'shortcode' => $shortcodeName,
                'attributes' => $attributes,
                'content' => $shortcodeContent
            ];

            // Add shortcode object to the list
            $shortcodeObjects[] = $shortcodeObject;
        }

        return $shortcodeObjects;
    }
}
