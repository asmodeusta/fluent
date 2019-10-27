<?php

namespace HtmlBuilder;

abstract class AbstractTag implements TagInterface
{

    const TYPE_SINGLE = 0;
    const TYPE_TWIN = 1;
    const TYPE_BOTH = 2;

    /**
     * @var TagInterface
     */
    private $parent;

    /**
     * @var array
     */
    private $inner;

    /**
     * @var array
     */
    private $attributes;

    public function __construct(array $attributes = [], array $inner = null)
    {
        $this->attributes = $attributes;
        $this->inner = is_array($inner) ? $inner : [$inner];
    }

    public function __toString() : string
    {
        $string = '<' . $this->getTagName();
        if (!empty($this->attributes)) {
            foreach ($this->attributes as $name => $value) {
                if (is_string($name)) {
                    $string .= ' ' . $name . '="' . $value . '" ';
                } else {
                    $string .= ' ' . $value;
                }
            }
        }
        switch ($this->getType()) {
            case self::TYPE_SINGLE:
                $string .= '/';
                break;
            case self::TYPE_BOTH:
                if (!empty($this->inner)) {
                    $this->renderInner($string);
                } else {
                    $string .= '/';
                }
                break;
            default:
                $this->renderInner($string);
                break;
        }
        $string .= '>';

        return $string;
    }

    private function renderInner(&$string) : string
    {
        $string .= '>';
        foreach ($this->inner as $item) {
            $string .= $item;
        }
        $string .= '</' . $this->getTagName();
        return $string;
    }

    public function __call($name, $arguments) : TagInterface
    {
        $className = __NAMESPACE__ . '\\Tags\\' . ucfirst($name);
        if (class_exists($className)) {
            $newTag =  new $className($arguments[0], $arguments[1]);
            $this->inner[] = $newTag;
            return $newTag;
        } else {
            return $this;
        }
    }

    protected function addInner($inner)
    {

    }

    abstract protected function getTagName() : string;

    protected function getType()
    {
        return self::TYPE_TWIN;
    }

}