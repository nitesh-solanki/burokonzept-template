<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.BUROKONZEPT
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** Loading Joomla! application and other supporting libraries */

$app  = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();

// Output as HTML5
$this->setHtml5(true);


// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

if ($task === 'edit' || $layout === 'form')
{
    $fullWidth = 1;
}
else
{
    $fullWidth = 0;
}


// Loading Default Javascript framework of Joomla! "mootool-core.js" & "core.js"
JHtml::_('behavior.framework'); 


if ($this->params->get('bootstrapFramework'))
{
    // Load Bootstrap CSS from Joomla! System
    $doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');
}

// Add fontawesome Stylesheet from CDN
JHtml::_('stylesheet', 'fontawesome-all-5.8.1.css', array('version' => 'auto', 'relative' => true));

// Add owl Carousel Stylesheet from Template
JHtml::_('stylesheet', 'owl.carousel.min.css', array('version' => 'auto', 'relative' => true));

// Add Bootstrap Stylesheet from CDN
JHtml::_('stylesheet', 'bootstrap-4.3.1.min.css', array('version' => 'auto', 'relative' => true));

// Add template Stylesheets
JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));

// Add Tabuler Navigation Stylesheets 1
JHtml::_('stylesheet', 'https://fonts.googleapis.com/css?family=Lato:400,700', array('version' => 'auto', 'relative' => true));

// Add Tabuler Navigation Stylesheets 2
JHtml::_('stylesheet', 'normalize-5.0.0.min.css', array('version' => 'auto', 'relative' => true));


// Logo file or site title param
if ($this->params->get('logoFile'))
{
    $logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
    $logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
}
else
{
    $logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

?>

<!doctype html>
<!-- <html lang="en"> -->
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <jdoc:include type="head" />
  </head>
  <body class="site <?php echo $option
    . ' view-' . $view
    . ($layout ? ' layout-' . $layout : ' no-layout')
    . ($task ? ' task-' . $task : ' no-task')
    . ($itemid ? ' itemid-' . $itemid : '')
    . ($params->get('fluidContainer') ? ' fluid' : '')
    . ($this->direction === 'rtl' ? ' rtl' : '');
?>">
    <!-- Body -->
    <div class="body" id="top">  
    <header>

  
<nav class="navbar navbar-expand-lg navbar-dark bg-primary top-menu">
<div class="container">
    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Printing Solutions</a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <span class="">Druckerlösungen</span>
                  <ul class="nav flex-column">
                    <?php  if ($this->countModules('printing-solutions-a')) :               
                        jimport( 'joomla.application.module.helper' );
                        $modules_list = JModuleHelper::getModules('printing-solutions-a');
                        for($i=0; $i<$this->countModules('printing-solutions-a'); $i++){

                            echo '<li class="nav-item"><a class="nav-link" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.'</a></li>';
                        }
                    endif;
                    ?>
                    <?php  if (!$this->countModules('printing-solutions-a')) :               
                        echo '<div style="opacity:0.2">custom modules list from' . '<br>';
                        echo '{{printing-solution-a}}' . '<br>';
                        echo 'position</div>';
                    endif;
                    ?>
                  </ul>
                </div>
                
                <div class="col-lg-3">
                  <span class="">Dienstleistungen</span>
                  <ul class="nav flex-column">
                    <?php  if ($this->countModules('printing-solutions-b')) :               
                        jimport( 'joomla.application.module.helper' );
                        $modules_list = JModuleHelper::getModules('printing-solutions-b');
                        for($i=0; $i<$this->countModules('printing-solutions-b'); $i++){

                            echo '<li class="nav-item"><a class="nav-link" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.'</a></li>';
                        }
                    endif;
                    ?>
                    <?php  if (!$this->countModules('printing-solutions-b')) :               
                        echo '<div style="opacity:0.2">custom modules list from' . '<br>';
                        echo '{{printing-solution-b}}' . '<br>';
                        echo 'position</div>';
                    endif;
                    ?>
                  <!-- <li class="nav-item"><a class="nav-link active" href="#">Serviceorganisation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Managed Print Services</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Fleetmanager</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Follow Printing</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Mobile printing</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Kostenberechnung</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Finanzierung</a></li> -->
                </ul>
                </div>

                <div class="col-lg-2">
                  <span class="">Support</span>
                  <ul class="nav flex-column">
                    <?php  if ($this->countModules('printing-solutions-c')) :               
                        jimport( 'joomla.application.module.helper' );
                        $modules_list = JModuleHelper::getModules('printing-solutions-c');
                        for($i=0; $i<$this->countModules('printing-solutions-c'); $i++){

                            echo '<li class="nav-item"><a class="nav-link" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.'</a></li>';
                        }
                    endif;
                    ?>
                    <?php  if (!$this->countModules('printing-solutions-c')) :               
                        echo '<div style="opacity:0.2">custom modules list from' . '<br>';
                        echo '{{printing-solution-c}}' . '<br>';
                        echo 'position</div>';
                    endif;
                    ?>
                  <!-- <li class="nav-item"><a class="nav-link" href="#">Hotline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Downloads</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Zählerstandsmeldung</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Verbrauchsmaterial</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Portrait-Technik</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Quick Support</a></li> -->
                </ul>
                </div>

                <div class="col-lg-2">
                  <span class="">Unsere Marken</span>
                </div>

                <div class="col-lg-2">
                  <span class="">Referenzen</span>
                </div>

              </div>
            </div>
            <!--  /.container  -->
          </div>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Working Places</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <span class="">Konzept Interior Design</span>
                  <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link active" href="#">News</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Produkte</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">USM Konfi gurator</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Occasionen</a></li>
                </ul>
                </div>
                
                <div class="col-lg-3">
                  <span class="">Design und Planung</span>
                  <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link active" href="#">Raumplanung</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Nutzungsoptimierung</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Raumkonzepte</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Ergonomie & Akkustik</a></li>
                </ul>
                </div>

                <div class="col-lg-2">
                  <span class="">Dienstleistungen</span>
                  <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link" href="#">Umzugsmanagement</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Projektmanagement</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Bemusterung</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Leihmöbel</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Finanzierung</a></li>
                </ul>
                </div>

                <div class="col-lg-2">
                  <span class="">Unsere Marken</span>
                </div>

                <div class="col-lg-2">
                  <span class="">Referenzen</span>
                </div>

              </div>
            </div>
            <!--  /.container  -->
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Über uns</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <span class="">Kontakt</span>
                  <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link active" href="#">Team</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Karriere</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Standorte</a></li>
                </ul>
                </div>
                
                <div class="col-lg-3">
                  <span class="">Unternehmen</span>
                  <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link active" href="#">Leitbild</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Angebot</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Geschichte</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Nachhaltigkeit</a></li>
                </ul>
                </div>


                <div class="col-lg-3">
                  <span class="">News</span>
                  <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link active" href="#">Aktuell</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Newsletter</a></li>
                </ul>
                </div>

              </div>
            </div>
            <!--  /.container  -->
          </div>
        </li>

        <li class="nav-item"><a class="nav-link" href="#"> Shop</a></li>

        <li class="nav-item"><a class="nav-link" href="#"> Showroom</a></li>
        </ul>

        <ul class="short-links">
            <li><a class="short-link" href="#" title="Burokonzept | Standorte/Kontakt">Standorte/Kontakt</a></li>
            <li><a class="short-link" href="#" title="Burokonzept | Suche">Suche</a></li>
            <li><a class="short-link" href="#" title="Burokonzept | Newsletter">Newsletter</a></li>
        </ul>
    </div>
</div>
</nav>
    </header> 
   
      <article>  
        <section class="secLogo">
            <nav class="nav">
                <div class="container">
                    <div class="nav-heading">
                        <button class="toggle-nav" data-toggle="open-navbar1"><i class="fa fa-align-right"></i></button>
                        <a class="brand" href="#" title="Burokonzept | Logo">
                            <?php echo $logo; ?>
                                <?php if ($this->params->get('sitedescription')) : ?>
                                    <?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8') . '</div>'; ?>
                                <?php endif; ?>
                        </a>
                    </div>
                    <div class="menu" id="open-navbar1">
                        <ul class="list">
                            <li><a href="#">Printing Solutions</a></li>
                            <li><a href="#">Working Places</a></li>
                            <li><a href="#">Über uns</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Showroom</a></li>
                            <li><a href="#">Standorte/Kontakt</a></li>
                            <li><a href="#">Suche</a></li>
                            <li><a href="#">Newsletter</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section class="secDisplay">
            <div class="container">
                <jdoc:include type="modules" name="hero-home" style="xhtml" />
            </div>
        </section>
        <section class="secDruckerlosungen">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 col-sm-12"></div>
                <div class="col-lg-8 col-sm-12">
                    <jdoc:include type="modules" name="top" style="xhtml" />
                </div>
              </div>
            </div>
        </section>  

<!-- custom modules on the postion 'printing-solutions-a' with their TAB SLIDER MENU-->  

<!--=============TAB SLIDER MENU=============-->

<?php                     
/* This code block is used to generate a list of titles of Custom HTML module which are rendered on "printing-solution-a" position only.  */
        if ($this->countModules('printing-solutions-a')) :               
        ?>
        <section class="plotter-sec p-3 et-hero-tabs">
            <div class="et-hero-tabs-container">
              <div class="container">
                <div class="plotter_text">
                  <?php   
                    jimport( 'joomla.application.module.helper' );
                    $modules_list = JModuleHelper::getModules('printing-solutions-a');

                    for($i=0; $i<$this->countModules('printing-solutions-a'); $i++){

                      if($i<$this->countModules('printing-solutions-a')-1){

                        echo '<a class="et-hero-tab" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.' -&nbsp;</a>';
                      } else {

                        echo '<a class="et-hero-tab" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.'&nbsp;</a>';
                      }
                    }
                  ?>
                  <span class="et-hero-tab-slider"></span>
                </div>
              </div>
            </div>
        </section>
        <?php
        endif;
        ?>
<!--=============TAB SLIDER MENU=============-->


        <?php if ($this->countModules('printing-solutions-a')) : ?>
            <jdoc:include type="modules" name="printing-solutions-a" style="custom" />
        <?php endif; ?>
 
<!-- custom modules on the postion 'printing-solutions-a' with their TAB SLIDER MENU--> 


<!-- custom modules on the postion 'printing-solutions-b' with their TAB SLIDER MENU-->  

<!--=============TAB SLIDER MENU=============-->

<?php                     
/* This code block is used to generate a list of titles of Custom HTML module which are rendered on "printing-solution-b" position only.  */
        if ($this->countModules('printing-solutions-b')) :               
        ?>
        <section class="plotter-sec p-3 et-hero-tabs">
            <div class="et-hero-tabs-container">
              <div class="container">
                <div class="plotter_text">
                  <?php   
                    jimport( 'joomla.application.module.helper' );
                    $modules_list = JModuleHelper::getModules('printing-solutions-b');

                    for($i=0; $i<$this->countModules('printing-solutions-b'); $i++){

                      if($i<$this->countModules('printing-solutions-b')-1){

                        echo '<a class="et-hero-tab" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.' -&nbsp;</a>';
                      } else {

                        echo '<a class="et-hero-tab" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.'&nbsp;</a>';
                      }
                    }
                  ?>
                  <span class="et-hero-tab-slider"></span>
                </div>
              </div>
            </div>
        </section>
        <?php
        endif;
        ?>
<!--=============TAB SLIDER MENU=============-->


        <?php if ($this->countModules('printing-solutions-b')) : ?>
            <jdoc:include type="modules" name="printing-solutions-b" style="custom" />
        <?php endif; ?>
 
<!-- custom modules on the postion 'printing-solutions-b' with their TAB SLIDER MENU-->



<!-- custom modules on the postion 'printing-solutions-c' with their TAB SLIDER MENU-->  

<!--=============TAB SLIDER MENU=============-->

<?php                     
/* This code block is used to generate a list of titles of Custom HTML module which are rendered on "printing-solution-a" position only.  */
        if ($this->countModules('printing-solutions-c')) :               
        ?>
        <section class="plotter-sec p-3 et-hero-tabs">
            <div class="et-hero-tabs-container">
              <div class="container">
                <div class="plotter_text">
                  <?php   
                    jimport( 'joomla.application.module.helper' );
                    $modules_list = JModuleHelper::getModules('printing-solutions-c');

                    for($i=0; $i<$this->countModules('printing-solutions-c'); $i++){

                      if($i<$this->countModules('printing-solutions-c')-1){

                        echo '<a class="et-hero-tab" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.' -&nbsp;</a>';
                      } else {

                        echo '<a class="et-hero-tab" href="#tab-'.strtolower(str_replace(' ','',$modules_list[$i]->title)).'">'.$modules_list[$i]->title.'&nbsp;</a>';
                      }
                    }
                  ?>
                  <span class="et-hero-tab-slider"></span>
                </div>
              </div>
            </div>
        </section>
        <?php
        endif;
        ?>
<!--=============TAB SLIDER MENU=============-->


        <?php if ($this->countModules('printing-solutions-c')) : ?>
            <jdoc:include type="modules" name="printing-solutions-c" style="custom" />
        <?php endif; ?>
 
<!-- custom modules on the postion 'printing-solutions-c' with their TAB SLIDER MENU-->

          <section class="secoffer">
            <div class="container">
                <div class="secwraper">
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <jdoc:include type="modules" name="hero-a" style="xhtml" />
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 col-sm-12">
                            <jdoc:include type="modules" name="hero-b" style="xhtml" />
                        </div>
                    </div>
                </div>
            </div>
          </section>

          <section class="stimmen-carousel">
            <div class="container">
                <jdoc:include type="modules" name="slider-1" style="xhtml" />
            </div>
          </section>
          <section class="showroom-carousel">
            <div class="container">
                <jdoc:include type="modules" name="slider-2" style="xhtml" />
            </div>
          </section>
          <section class="showroom-carousel">
            <div class="container">
                <jdoc:include type="modules" name="slider-3" style="xhtml" />
            </div>
          </section>
          <section class="showroom-carousel">
            <div class="container">
                <jdoc:include type="modules" name="slider-4" style="xhtml" />
            </div>
          </section>
          <section class="showroom-carousel">
            <div class="container">
                <jdoc:include type="modules" name="slider-5" style="xhtml" />
            </div>
          </section>
          <section class="secPatners">
            <div class="container">
                <jdoc:include type="modules" name="slider-partner" style="xhtml" />
            </div>
          </section>
        </article>

       <footer>
          <div class="footer_sec">
            <div class="container">
                <div class="row text-white">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="footer_link">
                            <jdoc:include type="modules" name="footer-a" style="xhtml" />
                            <!-- <h3 class="footer_hadding">Burokonzept Schaller AG</h3>
                            <ul>
                                <li><a href="#">Info@buerokonzept.ch</a></li> 
                                <li><a href="#">www.burrokonzept.ch</a></li> 
                            </ul> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="footer_link">
                            <jdoc:include type="modules" name="footer-b" style="xhtml" />
                            <!-- <h3 class="footer_hadding">Ringstrasse Nord 41 5600 Lenzburg</h3>
                            <ul>
                                <li><a href="#">T   062 886 30 60 </a></li> 
                                <li><a href="#">F   062 886 30 70</a></li> 
                            </ul> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="footer_link">
                            <jdoc:include type="modules" name="footer-c" style="xhtml" />
                            <!-- <h3 class="footer_hadding">Falkenweg 1 6340 Baar</h3>
                            <ul>
                                <li><a href="#">T   041 763 22 88</a></li> 
                                <li><a href="#">F   041 763 22 89 </a></li> 
                            </ul> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="footer_link">
                            <jdoc:include type="modules" name="footer-d" style="xhtml" />
                            <!-- <h3 class="footer_hadding">Fulachstrasse 10 8200 Scgaffhausen</h3>
                            <ul>
                                <li><a href="#">T   052 624 91 31</a></li> 
                                <li><a href="#">F   052 624 91 32</a></li> 
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </footer>
    </div>
  
  <!-- this will add 'JavaScript' in the HEAD element of HTML. To prevent Javascript loading before the template body. these have been written below explicitly. -->
<?php   
        //JHtml::script(Juri::base() . 'templates/'.$this->template.'/js/jquery-3.1.0.min.js');
?>

    <script src="<?php echo JURI::base(); ?>templates/burokonzept/js/jquery-3.1.0.min.js"></script>
    <script src="<?php echo JURI::base(); ?>templates/burokonzept/js/popper-1.14.7.min.js"></script>
    <script src="<?php echo JURI::base(); ?>templates/burokonzept/js/owl.carousel.min.js"></script>
    <script src="<?php echo JURI::base(); ?>templates/burokonzept/js/bootstrap-4.3.1.min.js"></script>
    <script src="<?php echo JURI::base(); ?>templates/burokonzept/js/main.js"></script>

    <?php
        if (!$this->params->get('jQueryFramework'))
        {
            // This Block will run to unset default javascript libraries in Joomla!
            $doc = JFactory::getDocument();
            $headData = $doc->getHeadData();
            $scripts = $headData['scripts'];

            //scripts to remove, default jQuery framework of Joomla!
            //unset($scripts[JUri::root(true) . '/media/jui/js/jquery-noconflict.js']);
            unset($scripts[JUri::root(true) . '/media/jui/js/jquery-migrate.min.js']);
            unset($scripts[JUri::root(true) . '/media/system/js/caption.js']);
            unset($scripts[JUri::root(true) . '/media/system/js/mootools-core.js']);
            unset($scripts[JUri::root(true) . '/media/system/js/mootools-more.js']);
            unset($scripts[JUri::root(true) . '/media/system/js/core.js']);
            unset($scripts[JUri::root(true) . '/media/system/js/modal.js']);
            unset($scripts[JUri::root(true) . '/media/jui/js/bootstrap.min.js']);
            unset($scripts[JUri::root(true) . '/media/jui/js/bootstrap.min.js']);
            unset($scripts[JUri::root(true) . '/media/jui/js/jquery.min.js']);
            
            $headData['scripts'] = $scripts;
            $doc->setHeadData($headData);
        }
    ?>
  </body>
</html>