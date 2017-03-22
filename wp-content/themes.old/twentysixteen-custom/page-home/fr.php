<?php get_header();
/*
 Template name: Home_FR
 */
require_once(dirname(__DIR__) . '/custom_functions/get_homepage_news_items.php');
?>
  
  <div class="container page-home">
    <div class="row jumbotron">
      <h1>Ingram Micro facilite la réussite sur le Cloud.</h1>
      <br />
      <h2>Ingram Micro est un fournisseur de services cloud offrant à son réseau de fournisseurs et de professionnels un accès au marché mondial, proposant des solutions et programmes d’habilitation qui améliorent les performances des organisations pour configurer, fournir, et gérer les technologies du cloud avec confiance et facilité.</h2>
    </div>
    <div class="row">
      <?php get_homepage_news_items(); ?>
    </div>
  </div>

<?php get_footer(); ?>