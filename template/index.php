<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2007-2019 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory as CMSFactory;
use Joomla\CMS\HTML\HTMLHelper as CMSHTMLHelper;

$app = CMSFactory::getApplication();
$config = CMSFactory::getConfig();
$document = CMSFactory::getDocument();
$menu = $app->getMenu();
$menuActive = $menu->getActive();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$siteName = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

// Add template js
$templateJsFile = CMSHTMLHelper::script('template.js', ['version' => 'auto', 'relative' => true, 'pathOnly' => true]);

// Add Stylesheets
$templateCssFile = CMSHTMLHelper::stylesheet('template.css', ['version' => 'auto', 'relative' => true, 'pathOnly' => true]);

$logoTitle = $this->params->get('logoTitle', '@Anibal_Sanchez');
$siteDescription = htmlspecialchars($this->params->get('siteDescription'), ENT_QUOTES, 'UTF-8');

$pageDescription = htmlspecialchars($document->getdescription(), ENT_QUOTES, 'UTF-8');

if (empty($pageDescription)) {
    $pageDescription = $siteDescription;
}

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
  <title><?php echo $document->getTitle(); ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="<?php echo $templateCssFile; ?>" rel="stylesheet">
</head>

<body class="site <?php echo $option
    .' view-'.$view
    .($layout ? ' layout-'.$layout : ' no-layout')
    .($task ? ' task-'.$task : ' no-task')
    .($itemid ? ' itemid-'.$itemid : '')
    .($params->get('fluidContainer') ? ' fluid' : '')
    .('rtl' === $this->direction ? ' rtl' : '');
?> font-sans leading-normal bg-white">
  <!-- navigation -->
  <header class="static">
    <div class="header-background absolute pin-t pin-l h-32-lite w-full z-10 bg-grey-dark overflow-hidden">
      <svg class="fill-current text-black inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2560 420">
        <path d="M2140.000,240.000 L2560.000,240.000 L2560.000,300.000 L958.000,300.000 L215.000,300.000 L212.000,300.000 C195.432,300.000 182.000,286.568 182.000,270.000 C182.000,253.432 195.432,240.000 212.000,240.000 L215.000,240.000 L465.000,240.000 C481.569,240.000 495.000,226.568 495.000,210.000 C495.000,193.432 481.569,180.000 465.000,180.000 L0.000,180.000 L0.000,0.000 L406.000,0.000 L1501.000,0.000 L1930.000,0.000 C1946.569,0.000 1960.000,13.431 1960.000,30.000 C1960.000,46.569 1946.569,60.000 1930.000,60.000 L1533.000,60.000 C1516.431,60.000 1503.000,73.431 1503.000,90.000 C1503.000,106.569 1516.431,120.000 1533.000,120.000 L2560.000,120.000 L2560.000,60.000 L2560.000,60.000 L2560.000,180.000 L2140.000,180.000 C2123.431,180.000 2110.000,193.432 2110.000,210.000 C2110.000,226.568 2123.431,240.000 2140.000,240.000 ZM601.000,60.000 L406.000,60.000 L81.000,60.000 C64.431,60.000 51.000,73.431 51.000,90.000 C51.000,106.569 64.431,120.000 81.000,120.000 L601.000,120.000 C617.569,120.000 631.000,106.569 631.000,90.000 C631.000,73.431 617.569,60.000 601.000,60.000 ZM1138.000,120.000 L759.000,120.000 C742.431,120.000 729.000,133.431 729.000,150.000 C729.000,166.569 742.431,180.000 759.000,180.000 L1138.000,180.000 C1154.568,180.000 1168.000,166.569 1168.000,150.000 C1168.000,133.431 1154.568,120.000 1138.000,120.000 ZM1905.000,180.000 L1352.000,180.000 C1335.432,180.000 1322.000,193.432 1322.000,210.000 C1322.000,226.568 1335.432,240.000 1352.000,240.000 L1905.000,240.000 C1921.569,240.000 1935.000,226.568 1935.000,210.000 C1935.000,193.432 1921.569,180.000 1905.000,180.000 ZM0.267,300.000 L0.000,300.000 L0.000,240.000 L0.267,240.000 L0.267,300.000 ZM114.000,390.000 C114.000,406.569 100.569,420.000 84.000,420.000 L0.000,420.000 L0.000,360.000 L84.000,360.000 C100.569,360.000 114.000,373.431 114.000,390.000 ZM1400.000,360.000 L1568.000,360.000 C1584.568,360.000 1598.000,373.431 1598.000,390.000 C1598.000,406.569 1584.568,420.000 1568.000,420.000 L1400.000,420.000 C1383.431,420.000 1370.000,406.569 1370.000,390.000 C1370.000,373.431 1383.431,360.000 1400.000,360.000 ZM2338.000,360.000 L2376.000,360.000 C2392.569,360.000 2406.000,373.431 2406.000,390.000 C2406.000,406.569 2392.569,420.000 2376.000,420.000 L2338.000,420.000 C2321.431,420.000 2308.000,406.569 2308.000,390.000 C2308.000,373.431 2321.431,360.000 2338.000,360.000 Z"></path>
      </svg>
    </div>
    <div class="py-8 absolute z-40 w-full">
      <div class="container mx-auto">
        <div class="flex text-3xl">
          <div class="w-5/6">
            <a href="<?php echo $this->baseurl; ?>/" target="_self"
                title="<?php echo $logoTitle; ?>" rel="home" class="font-bold text-white no-underline">
                <?php echo $logoTitle; ?>
            </a>
            <?php
                if ($this->params->get('sitedescription')) {
                    echo '<p class="site-description">'.htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8').'</p>';
                }
            ?>
          </div>
          <div class="w-1/6">
            <jdoc:include type="modules" name="language-switcher" style="none" />
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- container-main -->
  <content class="static">
    <div class="content-background absolute pin-t pin-l h-32-lite w-full z-10 pt-32-lite">
      <svg class="fill-current text-oldlace inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2560 420">
        <path d="M2140.000,240.000 L2560.000,240.000 L2560.000,300.000 L958.000,300.000 L215.000,300.000 L212.000,300.000 C195.432,300.000 182.000,286.568 182.000,270.000 C182.000,253.432 195.432,240.000 212.000,240.000 L215.000,240.000 L465.000,240.000 C481.569,240.000 495.000,226.568 495.000,210.000 C495.000,193.432 481.569,180.000 465.000,180.000 L0.000,180.000 L0.000,0.000 L406.000,0.000 L1501.000,0.000 L1930.000,0.000 C1946.569,0.000 1960.000,13.431 1960.000,30.000 C1960.000,46.569 1946.569,60.000 1930.000,60.000 L1533.000,60.000 C1516.431,60.000 1503.000,73.431 1503.000,90.000 C1503.000,106.569 1516.431,120.000 1533.000,120.000 L2560.000,120.000 L2560.000,60.000 L2560.000,60.000 L2560.000,180.000 L2140.000,180.000 C2123.431,180.000 2110.000,193.432 2110.000,210.000 C2110.000,226.568 2123.431,240.000 2140.000,240.000 ZM601.000,60.000 L406.000,60.000 L81.000,60.000 C64.431,60.000 51.000,73.431 51.000,90.000 C51.000,106.569 64.431,120.000 81.000,120.000 L601.000,120.000 C617.569,120.000 631.000,106.569 631.000,90.000 C631.000,73.431 617.569,60.000 601.000,60.000 ZM1138.000,120.000 L759.000,120.000 C742.431,120.000 729.000,133.431 729.000,150.000 C729.000,166.569 742.431,180.000 759.000,180.000 L1138.000,180.000 C1154.568,180.000 1168.000,166.569 1168.000,150.000 C1168.000,133.431 1154.568,120.000 1138.000,120.000 ZM1905.000,180.000 L1352.000,180.000 C1335.432,180.000 1322.000,193.432 1322.000,210.000 C1322.000,226.568 1335.432,240.000 1352.000,240.000 L1905.000,240.000 C1921.569,240.000 1935.000,226.568 1935.000,210.000 C1935.000,193.432 1921.569,180.000 1905.000,180.000 ZM0.267,300.000 L0.000,300.000 L0.000,240.000 L0.267,240.000 L0.267,300.000 ZM114.000,390.000 C114.000,406.569 100.569,420.000 84.000,420.000 L0.000,420.000 L0.000,360.000 L84.000,360.000 C100.569,360.000 114.000,373.431 114.000,390.000 ZM1400.000,360.000 L1568.000,360.000 C1584.568,360.000 1598.000,373.431 1598.000,390.000 C1598.000,406.569 1584.568,420.000 1568.000,420.000 L1400.000,420.000 C1383.431,420.000 1370.000,406.569 1370.000,390.000 C1370.000,373.431 1383.431,360.000 1400.000,360.000 ZM2338.000,360.000 L2376.000,360.000 C2392.569,360.000 2406.000,373.431 2406.000,390.000 C2406.000,406.569 2392.569,420.000 2376.000,420.000 L2338.000,420.000 C2321.431,420.000 2308.000,406.569 2308.000,390.000 C2308.000,373.431 2321.431,360.000 2338.000,360.000 Z"></path>
      </svg>
    </div>
    <div class="absolute z-40 w-full pin-32-lite">
      <div class="container mx-auto text-grey">
        <div class="flex py-8">
          <div class="w-2/3 pr-4">
            <div class="bg-grey-light rounded opacity-75">
              <ul itemscope="" itemtype="https://schema.org/BreadcrumbList" class="list-reset mt-0 px-2 py-4 mb-6">
                <li class="inline-block">
                  Está aquí: &nbsp;
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="inline-block">
                  <span itemprop="name">
                    Inicio
                  </span>
                  <meta itemprop="position" content="1">
                </li>
              </ul>
            </div>
            <blog-featured>
              <div class="items-leading clearfix">
                <div class="leading-0 clearfix" itemprop="blogPost" itemscope="" itemtype="https://schema.org/BlogPosting">
                  <h2 class="item-title" itemprop="headline">
                    <a href="/es/9-blogueando/44-se-viene-el-evento-joomlero-del-año-joomladay-madrid-2018.html" itemprop="url">
                      Se viene el evento Joomlero del año! JoomlaDay Madrid 2018 </a>
                  </h2>
                  <dl class="article-info muted">
                    <dt class="article-info-term">
                      Detalles </dt>
                    <dd class="published">
                      <span class="fas fa-calendar-alt" aria-hidden="true"></span>
                      <time datetime="2018-10-12T20:09:18+00:00" itemprop="datePublished">
                        Publicado: 12 Octubre 2018 </time>
                    </dd>
                  </dl>
                  <ul class="tags list-reset">
                    <li class="tag-2 tag-list0" itemprop="keywords">
                      <a href="/es/component/tags/tag/joomla.html" class="label label-info">
                        Joomla </a>
                    </li>
                    <li class="tag-3 tag-list1" itemprop="keywords">
                      <a href="/es/component/tags/tag/español.html" class="label label-info">
                        español </a>
                    </li>
                    <li class="tag-17 tag-list2" itemprop="keywords">
                      <a href="/es/component/tags/tag/jday.html" class="label label-info">
                        JDay </a>
                    </li>
                  </ul>
                  <p><a title="Se viene el evento Joomlero del año! JoomlaDay Madrid 2018" href="https://joomlaes.org/joomladays/joomladay-madrid-2018"><img srcset="https://d1hvvp61iyzquq.cloudfront.net/media/xt-adaptive-images/480/images/banner-jday-madrid-2018.jpg 480w, https://d1hvvp61iyzquq.cloudfront.net/images/banner-jday-madrid-2018.jpg 720w" sizes="100vw" src="https://d1hvvp61iyzquq.cloudfront.net/images/banner-jday-madrid-2018.jpg" alt="banner jday madrid 2018"></a></p>
                  <p>Ya está llegando&nbsp;el evento en español del año sobre Joomla!, <a href="https://joomlaes.org/joomladays/joomladay-madrid-2018">el&nbsp;JoomlaDay™ Madrid 2018</a>.</p>
                  <p>Personalmente, va&nbsp;a ser un momento&nbsp;muy especial.&nbsp;<a href="https://www.extly.com/" target="_blank" rel="noopener">Extly</a>&nbsp;tiene el honor de ser&nbsp;<strong>Patrocinador Plata</strong> del <a href="https://joomlaes.org/joomladays/joomladay-madrid-2018" target="_blank" rel="noopener">Joomla Day Madrid 2018</a>; y de esta forma dar continuidad en nuestra labor de apoyo a Joomla y a toda la comunidad en español.</p>
                  <div class="item column-1" itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
                    <p><em>El <strong>Joomla Day Madrid 2018</strong> será el&nbsp;<strong>sábado, 17 de Noviembre de 2018</strong>&nbsp;y tendrá lugar en la Fundación Casa del Corazón (Madrid). El evento será el mayor encuentro en español de Joomleros, y tanto si tienes página web como si vas a comenzar a realizar tu proyecto, no puedes perderte el JoomlaDay Madrid 2018. Aquí se darán cita los mejores profesionales que nos enseñarán sus estrategias y sus trucos para tener un sitio web profesional: Diseño, SEO, WPO, Seguridad, Marketing... Además, <strong>este año será la primera vez que se realice el examen de certificación de Joomla</strong>. Si estás interesado, realiza tu pre-inscripción <a href="http://jdmad18.joomlamadrid.org/examen-certificacion-joomla.html" target="_blank" rel="noopener">aquí</a>.</em></p>
                    <p>Las actividades relacionadas con el evento principal comenzarán el Viernes, por lo cual conviene estar llegando antes:</p>
                    <ul>
                      <li>
                        <p><a href="https://www.meetup.com/es-ES/joomlamadrid/events/254646347/">Viernes, 16 de noviembre de 2018,&nbsp;Joomla Pizza, Bugs &amp; Fun</a></p>
                      </li>
                      <li>
                        <p><a href="https://www.meetup.com/es-ES/joomlamadrid/events/254646347/"></a><a href="https://sergioiglesias.net/blog/cursos/421-examen-de-certificacion-joomla-en-el-joomladay-madrid-2018" target="_blank" rel="noopener">Examen de Certificación Joomla en el JoomlaDay Madrid 2018</a>&nbsp;</p>
                      </li>
                    </ul>
                    <p>Luego, en el Sábado, para la jornada principal del evento, estas son las <a href="https://joomlaes.org/joomladays/joomladay-madrid-2018/ponencias" target="_blank" rel="noopener">actividades y ponencias</a>:</p>
                    <ul>
                      <li><strong>Joomla Performance Run</strong> 07:00 - 07:45</li>
                      <li><strong>Perspectiva Joomla</strong> - 09:45 - 10:00 - Alex Metzler - <em>ATENCIÓN Asiste al evento Alex Vicepresidente actual de la Joomla organization.</em></li>
                      <li><strong>Esta herramienta ¡Me pone!</strong> - 10:00 - 10:30 - Carlos Cámara - <em>Carlos con su particular estilo seguro que nos va a dar un buen recorrido por las mejores herramientas.</em></li>
                      <li><strong>Software libre en una web abierta</strong> - 10:30 - 11:00 - Pablo Arias - <em>Pablo es un evangelista y experto en la implementación de sistemas open source. Super-interesante.</em></li>
                      <li><strong>Slimbook</strong> - 11:00 - 11:30 - Alejandro López - A la gente de Slimbook y sus equipos ya los conozco de la Ubucon Europa 2018, presentan una oferta de productos españoles variada, especialistas en equipos Linux y con soporte local de primer nivel. Realmente una alternativa para tener en cuenta para quienes evitan el sistema de las Ventanas o las Manzanas.</li>
                      <li><strong>Notas sobre tests de aceptación en Joomla!</strong> -&nbsp;12:15 - 12:45 - Berta Guzmán. Berta es una crack picando codigo y es un must asistir a esta ponencia acerca de pruebas automatizadas en Joomla. Muy bien por abrir nuevos caminos!</li>
                      <li><strong>Desarrolla proyectos webs con éxito en base al Software Libre</strong> -&nbsp;12:45 - 13:15 - JuanKa Díaz.&nbsp;JuanKa vuelve a la escena Joomlera, seguramente contándonos que estuvo haciendo en este tiempo reciente y como el código abierto es la mejor solución.</li>
                    </ul>
                    <p>En este punto, hay que tomar un respiro.... demasiada información!!!</p>
                    <ul>
                      <li><strong>Medidas de seguridad en Joomla!&nbsp;</strong>13:15 - 13:45 - Jose Antonio Luque. Siempre la seguridad debe ser una prioridad, y la gente de&nbsp;<strong>Securitycheck&nbsp;</strong>nos informará de lo último que está pasando.</li>
                      <li><strong>Power SEO para Joomla!</strong> - 16:00 - 16:30 - Antonio Muñoz. Por experiencia propia, a Antonio hay que escucharlo y aprender todo lo posible acerca del SEO. Pura experiencia para aprovechar en todos los proyectos web.</li>
                      <li><strong>Ingresos pasivos y olvídate de los clientes</strong> -&nbsp;16:30 - 17:00 - Antonio Torres. Acercandonos al final del evento, Antonio nos hablará de su experiencia en el negocio, y como encontrar formas nuevas de generar ingresos pásivos en el mundo actual online. Para pensar "out-of-the-box".</li>
                      <li><strong>Mesa redonda</strong> -&nbsp;17:00 - 19:00 - JuanKa Díaz, Pablo Arias, Berta Guzmán - Cierre final, para matarlos a preguntas, siempre se calienta el ambiente y no dan ganas de irse!</li>
                    </ul>
                    <p>Nos vemos en Madrid!</p>
                  </div>
                </div>
              </div>
            </blog-featured>
          </div>
          <div class="w-1/3 ml-8">
            <div class="about-me">
              <h3 class="text-2xl mb-8">Acerca de mi</h3>
              <p><img src="https://d1hvvp61iyzquq.cloudfront.net/images/anibal-0612-200.jpg" alt="Aníbal Sánchez - Perdido y Encontrado en la Computación" class="rounded-full"></p>
              <h4>Aníbal Sánchez</h4>
              <h5>Work</h5>
              <p><em class="fas fa-puzzle-piece"></em> <a href="http://www.extly.com" target="_blank">Extly Tech</a></p>
              <ul>
                <li><b></b>Team Leader / Senior Developer</li>
                <li>Today, specialized in Laravel and Joomla. Proudly working on PhoneGap, Ionic &amp; Angular.</li>
                <li>Oviedo, Spain</li>
              </ul>
              <h5>Community</h5>
              <ul>
                <li><a href="https://volunteers.joomla.org/joomlers/273-anibal-sanchez" target="_blank" rel="noopener noreferrer">Joomla! Community Leadership Team</a></li>
                <li><a href="http://extensions.joomla.org/about-jed/about-the-team" target="_blank" rel="noopener noreferrer">Joomla! JED Assistant Team Manager</a></li>
              </ul>
              <h5>Slides & Videos</h5>
              <ul class="list-reset">
                <li><em class="fas fa-desktop"></em> <a href="/es/un-montón-de-diapositivas-y-pensamientos-aleatorios.html">Un Montón de Diapositivas y Pensamientos Aleatorios</a></li>
              </ul>
              <h5>Coordinates</h5>
              <p><code>selector: 'anibal_sanchez'</code></p>
              <ul class="list-reset">
                <li><em class="fab fa-twitter"></em> <a href="https://twitter.com/anibal_sanchez" target="_blank" rel="noopener noreferrer">@anibal_sanchez</a></li>
                <li><em class="fab fa-linkedin"></em> <a href="https://es.linkedin.com/in/anibalsanchez" target="_blank" rel="noopener noreferrer">linkedin.com/in/anibalsanchez</a></li>
                <li><em class="fab fa-facebook"></em> <a href="http://www.facebook.com/anibal.sanchez" target="_blank" rel="noopener noreferrer">facebook/anibal.sanchez</a></li>
                <li><em class="fas fa-mobile"></em> <a href="http://people.phonegap.com/developer/anibal-sanchez" target="_blank" rel="noopener noreferrer">phonegap.com/developer/anibal-sanchez</a></li>
              </ul>
              <p><em class="fab fa-github"></em> <a href="https://github.com/anibalsanchez" target="_blank" rel="noopener noreferrer">github.com/anibalsanchez</a></p>
              <div id="github-widget-holder">&nbsp;</div>
              <p><em class="fab fa-stack-exchange"></em> <a href="https://joomla.stackexchange.com/users/174/anibal" target="_blank" rel="noopener noreferrer">stackexchange/anibal</a> <br> <a href="https://joomla.stackexchange.com/users" target="_blank" rel="noopener noreferrer"> <img src="https://joomla.stackexchange.com/users/flair/174.png?theme=clean" alt="Profile for Anibal Sanchez on Joomla! Stack Exchange, a network of free, community-driven Q&amp;A sites" height="58" title="Profile for Anibal Sanchez on Joomla! Stack Exchange, a network of free, community-driven Q&amp;A site"> </a></p>
              <p><a href="/es/aikido-manual-aetaiki-aikikai.html">Aikido Manual Aetaiki - Aikikai</a></p>
            </div>
          </div>
        </div>
      </div>
  </content>

  <footer class="bg-oldlace text-center">
    <div class="container mx-auto py-8">
      <p>
        &copy; <?php echo date('Y'); ?> <a a href="<?php echo $this->baseurl; ?>/" target="_self"
          title="<?php echo $logoTitle; ?>"><?php echo $logoTitle; ?> - <?php echo $siteName; ?></a>
      </p>
    </div>
  </footer>
  <script type="text/javascript" src="<?php echo $templateJsFile; ?>"></script>

  <jdoc:include type="modules" name="analytics" style="none" />
  <jdoc:include type="modules" name="debug" style="none" />
</body>

</html>
