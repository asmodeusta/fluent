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
     * @var TagInterface[]|string
     */
    private $inner;

    /**
     * @var array
     */
    private $attributes;

    public function __construct(array $attributes = [], TagInterface $parent = null, array $inner = null)
    {
        $this->attributes = $attributes;
        $this->parent = $parent;
        $this->inner = $inner;
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
                break;
            case self::TYPE_BOTH:
                if (!empty($this->inner)) {
                    $this->renderInner($string);
                }
                break;
            default:
                $this->renderInner($string);
                break;
        }
        $string .= '/>';

        return $string;
    }

    private function renderInner(&$string) : string
    {
        if (!is_array($this->inner)) {
            $this->inner = [$this->inner];
        }
        $string .= '>';
        foreach ($this->inner as $item) {
            $string .= $item;
        }
        $string .= '<' . $this->getTagName();
        return $string;
    }

    public function __call($name, $arguments) : TagInterface
    {
        $className = __NAMESPACE__ . '\\' . ucfirst($name);
        if (class_exists($className)) {
            return new $className(...$arguments);
        } else {
            return $this;
        }
    }

    abstract protected function getTagName() : string;

    protected function getType()
    {
        return self::TYPE_TWIN;
    }

}