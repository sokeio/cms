<?php

namespace Sokeio\CMS\Support\Shortcode;

use Illuminate\Support\Facades\Log;

class ShortcodeCompiler
{
    public function __construct(
        private ShortcodeManager $manager
    ) {}
    /**
     * @var
     */
    protected $matches;

    /**
     * Set the matches
     *
     * @param array $matches
     */
    protected function setMatches($matches = [])
    {
        $this->matches = $matches;
    }
    private function base64Decode($hash)
    {
        return urldecode(base64_decode($hash ?? ''));
    }
    /**
     * Return the shortcode name
     *
     * @return string
     */
    public function getName()
    {
        return $this->matches[2];
    }
    /**
     * Compile the contents
     *
     * @param  string $value
     *
     * @return string
     */
    public function compile($value)
    {
        // Only continue is laravel-shortcodes have been registered
        if (!$this->manager->hasShortcodes() || !$this->manager->getStatus()) {
            return $value;
        }
        // Set empty result
        $result = '';
        // Here we will loop through all of the tokens returned by the Zend lexer and
        // parse each one into the corresponding valid PHP. We will then have this
        // template as the correctly rendered PHP that can be rendered natively.
        foreach (token_get_all($value) as $token) {
            $result .= is_array($token) ? $this->parseToken($token) : $token;
        }

        return $result;
    }
    public function compileOnly($value)
    {
        $flg = $this->manager->getStatus();
        if (!$flg) {
            $this->manager->enable();
        }
        $content = $this->compile($value);
        if (!$flg) {
            $this->manager->disable();
        }
        // return compiled contents
        return $content;
    }

    /**
     * Get Compiled Attributes.
     *
     * @param $matches
     *
     * @return \Sokeio\Cms\Shortcode\Shortcode
     */
    protected function compileShortcode($matches)
    {
        // Set matches
        $this->setMatches($matches);
        // pars the attributes
        $attributes = $this->parseAttributes($this->matches[3]);
        return [
            'shortcode' => $this->getName(),
            'content' => $this->getContent($this->getName()),
            'attributes' => $attributes
        ];
    }
    /**
     * Return the shortcode content
     *
     * @return string
     */
    public function getContent($name)
    {
        try {
            $content = $this->base64Decode($this->matches[5]);
            $short = $this->manager->all()[$name];
            if (data_get($short, 'stripTags')) {
                $content = preg_replace('/<[^>]*>/', '', $content);
            }
            // Compile the content, to support nested laravel-shortcodes
            return $this->compile($content);
        } catch (\Exception $ex) {
            Log::error($ex);
            // Compile the content, to support nested laravel-shortcodes
            return $this->compile($this->matches[5]);
        }
    }

    /**
     * Parse the tokens from the template.
     *
     * @param  array $token
     *
     * @return string
     */
    protected function parseToken($token)
    {
        list($id, $content) = $token;
        if ($id == T_INLINE_HTML) {
            $content = $this->renderShortcodes($content);
        }

        return $content;
    }

    /**
     * Render laravel-shortcodes
     *
     * @param  string $value
     *
     * @return string
     */
    protected function renderShortcodes($value)
    {
        $pattern = $this->manager->getRegex();

        return preg_replace_callback("/{$pattern}/s", [$this, 'render'], $value);
    }
    /**
     * Render the current calld shortcode.
     *
     * @param  array $matches
     *
     * @return string
     */
    public function render($matches)
    {
        [
            'shortcode' => $shortcode,
            'content' => $content,
            'attributes' => $attributes
        ] = $this->compileShortcode($matches);

        return $this->manager->render($shortcode, $attributes, $content);
    }
    /**
     * Parse the shortcode attributes
     *
     * @author Wordpress
     * @return array
     */
    protected function parseAttributes($text)
    {
        // decode attribute values
        $text = htmlspecialchars_decode($text, ENT_QUOTES);

        $attributes = [];
        // attributes pattern
        $pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';
        // Match
        if (preg_match_all($pattern, preg_replace('/[\x{00a0}\x{200b}]+/u', " ", $text), $match, PREG_SET_ORDER)) {
            foreach ($match as $m) {
                if (!empty($m[1])) {
                    $attributes[$m[1]] = stripcslashes($m[2]);
                } elseif (!empty($m[3])) {
                    $attributes[$m[3]] = stripcslashes($m[4]);
                } elseif (!empty($m[5])) {
                    $attributes[$m[5]] = stripcslashes($m[6]);
                } elseif (isset($m[7]) && strlen($m[7])) {
                    $attributes[] = stripcslashes($m[7]);
                } elseif (isset($m[8])) {
                    $attributes[] = stripcslashes($m[8]);
                }
            }
        } else {
            $attributes = ltrim($text);
        }

        // return attributes
        return is_array($attributes) ? $attributes : [$attributes];
    }
}
