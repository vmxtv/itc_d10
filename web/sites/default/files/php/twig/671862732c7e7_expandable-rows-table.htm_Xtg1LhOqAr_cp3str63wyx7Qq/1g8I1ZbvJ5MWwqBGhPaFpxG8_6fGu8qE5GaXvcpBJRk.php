<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/contrib/jsonapi_extras/templates/expandable-rows-table.html.twig */
class __TwigTemplate_c626fd9d291fab195cf77484519d1e78 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 45
        yield "<table";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 45, $this->source), "html", null, true);
        yield ">
    ";
        // line 46
        if (($context["caption"] ?? null)) {
            // line 47
            yield "        <caption>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null), 47, $this->source), "html", null, true);
            yield "</caption>
    ";
        }
        // line 49
        yield "
    ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["colgroups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["colgroup"]) {
            // line 51
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["colgroup"], "cols", [], "any", false, false, true, 51)) {
                // line 52
                yield "            <colgroup";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["colgroup"], "attributes", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
                yield ">
                ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["colgroup"], "cols", [], "any", false, false, true, 53));
                foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                    // line 54
                    yield "                    <col";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["col"], "attributes", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
                    yield " />
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['col'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                yield "            </colgroup>
        ";
            } else {
                // line 58
                yield "            <colgroup";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["colgroup"], "attributes", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
                yield " />
        ";
            }
            // line 60
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['colgroup'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        yield "
    ";
        // line 62
        if (($context["header"] ?? null)) {
            // line 63
            yield "        <thead>
        <tr>
            ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                // line 66
                yield "            ";
                // line 67
                $context["cell_classes"] = [((CoreExtension::getAttribute($this->env, $this->source,                 // line 68
$context["cell"], "active_table_sort", [], "any", false, false, true, 68)) ? ("is-active") : (""))];
                // line 71
                yield "            <";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 71), "addClass", [($context["cell_classes"] ?? null)], "method", false, false, true, 71), 71, $this->source), "html", null, true);
                yield ">";
                // line 72
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
                // line 73
                yield "</";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
                yield ">
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cell'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            yield "        </tr>
        </thead>
    ";
        }
        // line 78
        yield "
    ";
        // line 79
        if (($context["rows"] ?? null)) {
            // line 80
            yield "        <tbody>
        ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 82
                yield "            ";
                // line 83
                $context["row_classes"] = [(( !                // line 84
($context["no_striping"] ?? null)) ? (Twig\Extension\CoreExtension::cycle(["odd", "even"], $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 84), 84, $this->source))) : (""))];
                // line 87
                yield "        <tr";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 87), "addClass", [($context["row_classes"] ?? null)], "method", false, false, true, 87), 87, $this->source), "html", null, true);
                yield ">
            ";
                // line 88
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 88));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                    // line 89
                    yield "                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 89) < (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 89)) - 3))) {
                        // line 90
                        yield "                    <";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                        yield ">";
                        // line 91
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 91), 91, $this->source), "html", null, true);
                        // line 92
                        yield "</";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 92), 92, $this->source), "html", null, true);
                        yield ">
                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 93
$context["loop"], "index", [], "any", false, false, true, 93) == (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 93)) - 3))) {
                        // line 94
                        yield "                    <";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 94), 94, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 94), 94, $this->source), "html", null, true);
                        yield ">
                        <a class=\"toggle-expanded content-collapsed button button--small\" data-open=\"adv-opt-";
                        // line 95
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, true, 95), "loop", [], "any", false, false, true, 95), "index", [], "any", false, false, true, 95), 95, $this->source), "html", null, true);
                        yield "\">
                            <span></span>";
                        // line 97
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
                        // line 98
                        yield "</a>
                    </";
                        // line 99
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
                        yield ">
                ";
                    }
                    // line 101
                    yield "            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 102
                yield "        </tr>
        <tr ";
                // line 103
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 103), "addClass", [($context["row_classes"] ?? null)], "method", false, false, true, 103), "addClass", [($context["row_classes"] ?? null)], "method", false, false, true, 103), "addClass", ["advanced-opts"], "method", false, false, true, 103), 103, $this->source), "html", null, true);
                yield " id=\"adv-opt-";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 103), 103, $this->source), "html", null, true);
                yield "\">
            ";
                // line 104
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 104));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                    // line 105
                    yield "                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 105) >= (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 105)) - 2))) {
                        // line 106
                        yield "                    <";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 106), 106, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 106), 106, $this->source), "html", null, true);
                        yield ">";
                        // line 107
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
                        // line 108
                        yield "</";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 108), 108, $this->source), "html", null, true);
                        yield ">
                ";
                    }
                    // line 110
                    yield "            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 111
                yield "        </tr>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            yield "        </tbody>
    ";
        } elseif (        // line 114
($context["empty"] ?? null)) {
            // line 115
            yield "        <tbody>
        <tr class=\"odd\">
            <td colspan=\"";
            // line 117
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_columns"] ?? null), 117, $this->source), "html", null, true);
            yield "\" class=\"empty message\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 117, $this->source), "html", null, true);
            yield "</td>
        </tr>
        </tbody>
    ";
        }
        // line 121
        yield "    ";
        if (($context["footer"] ?? null)) {
            // line 122
            yield "        <tfoot>
        ";
            // line 123
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["footer"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 124
                yield "        <tr";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 124), 124, $this->source), "html", null, true);
                yield ">
            ";
                // line 125
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "cells", [], "any", false, false, true, 125));
                foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                    // line 126
                    yield "                <";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 126), 126, $this->source), "html", null, true);
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "attributes", [], "any", false, false, true, 126), 126, $this->source), "html", null, true);
                    yield ">";
                    // line 127
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "content", [], "any", false, false, true, 127), 127, $this->source), "html", null, true);
                    // line 128
                    yield "</";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["cell"], "tag", [], "any", false, false, true, 128), 128, $this->source), "html", null, true);
                    yield ">
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['cell'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 130
                yield "            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            yield "        </tfoot>
    ";
        }
        // line 134
        yield "</table>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "caption", "colgroups", "header", "rows", "no_striping", "loop", "empty", "header_columns", "footer"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/jsonapi_extras/templates/expandable-rows-table.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  378 => 134,  374 => 132,  367 => 130,  358 => 128,  356 => 127,  351 => 126,  347 => 125,  342 => 124,  338 => 123,  335 => 122,  332 => 121,  323 => 117,  319 => 115,  317 => 114,  314 => 113,  299 => 111,  285 => 110,  279 => 108,  277 => 107,  272 => 106,  269 => 105,  252 => 104,  246 => 103,  243 => 102,  229 => 101,  224 => 99,  221 => 98,  219 => 97,  215 => 95,  209 => 94,  207 => 93,  202 => 92,  200 => 91,  195 => 90,  192 => 89,  175 => 88,  170 => 87,  168 => 84,  167 => 83,  165 => 82,  148 => 81,  145 => 80,  143 => 79,  140 => 78,  135 => 75,  126 => 73,  124 => 72,  119 => 71,  117 => 68,  116 => 67,  114 => 66,  110 => 65,  106 => 63,  104 => 62,  101 => 61,  95 => 60,  89 => 58,  85 => 56,  76 => 54,  72 => 53,  67 => 52,  64 => 51,  60 => 50,  57 => 49,  51 => 47,  49 => 46,  44 => 45,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/jsonapi_extras/templates/expandable-rows-table.html.twig", "/var/www/web/modules/contrib/jsonapi_extras/templates/expandable-rows-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 46, "for" => 50, "set" => 67);
        static $filters = array("escape" => 45, "length" => 89);
        static $functions = array("cycle" => 84);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape', 'length'],
                ['cycle'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
