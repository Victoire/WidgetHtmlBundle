Victoire CMS Html Bundle
============

Need to add html content in a victoire cms website ?
Get this html bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require friendsofvictoire/html-widget

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\HtmlBundle\VictoireWidgetHtmlBundle(),
            );

            return $bundles;
        }
    }
