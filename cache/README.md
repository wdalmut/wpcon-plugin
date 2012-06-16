# Twig Cache folder

In this folder Twig generate the cache...

```php
<?php

/* tweets.twig */
class __TwigTemplate_92eb00b86b526f6e67a97de82969e7a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul>
    ";
        // line 2
        if (isset($context["elements"])) { $_elements_ = $context["elements"]; } else { $_elements_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_elements_);
        foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
            // line 3
            echo "    <li>
        <a href='https://www.twitter.com/";
            // line 4
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "name"), "html", null, true);
            echo "/status/";
            if (isset($context["id_str"])) { $_id_str_ = $context["id_str"]; } else { $_id_str_ = null; }
            echo twig_escape_filter($this->env, $_id_str_, "html", null, true);
            echo "' target='_blank'>";
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "text"), "html", null, true);
            echo "</a>
        <ul>
            <li>
                <a href='https://www.twitter.com/";
            // line 7
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "name"), "html", null, true);
            echo "' target='_blank'>@";
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_element_, "user"), "screen_name"), "html", null, true);
            echo "</a>
            </li>
        </ul>
    </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "tweets.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  41 => 7,  28 => 4,  25 => 3,  20 => 2,  17 => 1,);
    }
}

```