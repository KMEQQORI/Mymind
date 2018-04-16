<?php

/* @Framework/Form/form.html.php */
class __TwigTemplate_c5ca651bbed4eef3821e0b66d59ab3fd0f0bd912e1cbd0a957fb45b788ce43a9 extends Twig_Template
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
        echo "<?php echo \$view['form']->start(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
<?php echo \$view['form']->end(\$form) ?>
";
    }

    public function getTemplateName()
    {
        return "@Framework/Form/form.html.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Framework/Form/form.html.php", "C:\\xampp2\\htdocs\\Mymind\\vendor\\symfony\\framework-bundle\\Resources\\views\\Form\\form.html.php");
    }
}
